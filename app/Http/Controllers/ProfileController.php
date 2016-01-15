<?php namespace FashionDifferent\Http\Controllers;

use FashionDifferent\Commands\ProcessImage;
use FashionDifferent\Commands\UpdateProfile;
use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Controllers\Controller;
use FashionDifferent\User;

use Illuminate\Http\Request;

use Auth;
use Flash;

class ProfileController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$mine = Auth::user()->elements;
		$favourites = Auth::user()->favourites;
		$collections = Auth::user()->collections;

		return view('profile.index', compact('user', 'mine', 'favourites', 'collections'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
		$user = Auth::user();

		return view('profile.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \FashionDifferent\Http\Requests\Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$this->dispatch(new UpdateProfile($request, Auth::user()));

		return redirect()->route('profile.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
