<?php namespace FashionDifferent\Http\Controllers;

use FashionDifferent\Element;
use FashionDifferent\ElementCollection;
use FashionDifferent\ElementType;
use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MixAndMatchController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['only' => [
			'show',
			'destroy'
		]]);
	}

	public function index(ElementCollection $collection)
	{
		$random = $collection->getRandom();
		$top = $random->top;
		$trousers = $random->trousers;
		$shoes = $random->shoes;
		$accessory = $random->accessory;

		return view('mixandmatch.index', compact('top', 'trousers', 'shoes', 'accessory'));
	}

}
