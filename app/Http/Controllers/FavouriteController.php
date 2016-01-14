<?php namespace FashionDifferent\Http\Controllers;

use FashionDifferent\Element;
use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

class FavouriteController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function show(Element $element)
	{
		if ($element->isFavourite())
			return 'true';
		else
			return 'false';
	}

	public function store(Request $request, Element $element)
	{
		Auth::user()->favourites()->attach($element->id);
	}

	public function destroy(Element $element)
	{
		Auth::user()->favourites()->detach($element->id);
	}

}
