<?php

namespace FashionDifferent\Http\Controllers;

use Illuminate\Http\Request;

use FashionDifferent\Comment;
use FashionDifferent\Element;
use FashionDifferent\User;
use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Auth;

class ElementCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index'
        ]]);
    }
    
    /**
     * Display a listing of the resource.
     *
	 * @param \FashionDifferent\Element  $element
	 * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Element $element, Request $request)
    {
		$comments = $element->comments->sortBy('id')->values();
		$filteredComments = null;

		$query = $request->query->all();

		if (count($query) && array_key_exists('since', $query))
		{
			$since = intval($query['since']);
			$filteredComments = $comments->filter(function ($comment) use ($since) {
				return $comment->id > $since;
			})->values();
		}
		else
			$filteredComments = $comments;

		foreach ($filteredComments as $comment)
		{
			$comment->user = User::find($comment->user_id);
			$comment->body = htmlspecialchars($comment->body);
		}

		return $filteredComments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param  \FashionDifferent\Element  $element
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Element $element, Request $request)
    {
        $comment = new Comment($request->all());
		$comment->allowed = true;
		$comment->element_id = $element->id;
		return Auth::user()->comments()->save($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
