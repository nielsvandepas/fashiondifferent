<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the Routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'PagesController@home', 'as' => 'home']);
Route::get('about', ['uses' => 'PagesController@about', 'as' => 'about']);
Route::get('terms', ['uses' => 'PagesController@terms', 'as' => 'terms']);

Route::get('wardrobe', ['uses' => 'WardrobeController@index', 'as' => 'wardrobe.index']);

Route::get('mixandmatch', ['uses' => 'MixAndMatchController@index', 'as' => 'mixandmatch.index']);
Route::get('mixandmatch/{collection}', ['uses' => 'MixAndMatchController@show', 'as' => 'mixandmatch.show']);
Route::delete('mixandmatch/{collection}', ['uses' => 'MixAndMatchController@destroy', 'as' => 'mixandmatch.destroy']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => ['web']], function () {
    //
//});
