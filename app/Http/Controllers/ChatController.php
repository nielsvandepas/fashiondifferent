<?php

namespace FashionDifferent\Http\Controllers;

use FashionDifferent\ChatMessage;
use Illuminate\Http\Request;

use FashionDifferent\User;
use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat.index');
    }

    public function store(User $partner, Request $request)
    {
        $message = new ChatMessage($request->all());
		$message->to_id = $partner->id;
		Auth::user()->sentChatMessages()->save($message);

		return $message->id;
    }

    public function show(User $partner)
    {
		if ($partner == Auth::user())
			return redirect()->route('chat.index');

        return view('chat.with', compact('partner'));
    }

	public function fetch(User $partner, Request $request)
	{
		// Get to and from our current chat partner
		$receivedMessages = Auth::user()->receivedChatMessages()->where('from_id', '=', $partner->id)->get();
		$sentMessages = Auth::user()->sentChatMessages()->where('to_id', '=', $partner->id)->get();
		$allMessages = $receivedMessages->merge($sentMessages)->sortBy('created_at')->values();

		$query = $request->query->all();

		// If there is a 'since' query parameter, we should only return messages
		// after that specific id
		if (count($query) && array_key_exists('since', $query))
		{
			$since = intval($query['since']);
			return $allMessages->filter(function ($message) use ($since) {
				return $message->id > $since;
			})->values()->all();
		}
		else
		{
			return $allMessages->all();
		}
	}

	/**
	 * @return mixed
	 */
	public function latest()
	{
		// Get all messages to and from the current user and sort them latest first
		$messages = Auth::user()->allChatMessages()->sortByDesc('created_at')->values();

		// Store the user id for later comparison
		$userId = Auth::user()->id;

		$uniqueChats = [];

		// Filter through the messages to find the first message in every conversation
		$filteredMessages = $messages->filter(function ($message) use ($userId, &$uniqueChats) {
			if ($message->to_id != $userId && array_search($message->to_id, $uniqueChats) === false)
			{
				array_push($uniqueChats, $message->to_id);
				return true;
			}
			else if ($message->from_id != $userId && array_search($message->from_id, $uniqueChats) === false)
			{
				array_push($uniqueChats, $message->from_id);
				return true;
			}
		});

		// Select only the first ten results, this will keep the page nice and compact
		$selectedMessages = $filteredMessages->take(10);

		// Append partner information
		foreach ($selectedMessages as $message)
		{
			if ($message->to_id == $userId)
				$message->user = User::find($message->from_id);
			else
				$message->user = User::find($message->to_id);
		}

		return $selectedMessages;
	}
}
