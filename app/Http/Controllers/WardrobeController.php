<?php namespace FashionDifferent\Http\Controllers;

use FashionDifferent\Element;
use FashionDifferent\ElementType;
use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WardrobeController extends Controller {

	public function index()
	{
		$elements = Element::all(['name', 'description', 'image', 'type']);
		$types = ElementType::all();

		return view('wardrobe.index', compact('elements', 'types'));
	}

}
