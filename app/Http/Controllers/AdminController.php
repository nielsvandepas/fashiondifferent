<?php namespace FashionDifferent\Http\Controllers;

use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('admin.index');
	}

}
