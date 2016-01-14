<?php namespace FashionDifferent\Http\Controllers;

use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function home()
	{
		return view('pages.home');
	}

	public function about()
	{
		return view('pages.about');
	}

}
