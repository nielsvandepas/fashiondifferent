<?php namespace FashionDifferent\Http\Controllers;

use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('admin.index');
	}

	public function moderateElements()
	{
		if (!Auth::user()->hasRole('moderate_elements'))
			return view('errors.403');
	}

	public function moderateComments()
	{
		if (!Auth::user()->hasRole('moderate_comments'))
			return view('errors.403');
	}

	public function admin()
	{
		if (!Auth::user()->hasRole('administrator'))
			return view('errors.403');

		return 'Authenticated';
	}

}
