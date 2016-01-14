<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'PagesController@home', 'as' => 'home']);
Route::get('about', ['uses' => 'PagesController@about', 'as' => 'about']);

Route::get('element/wardrobe', ['uses' => 'ElementController@wardrobe', 'as' => 'element.wardrobe']);

Route::get('element/{element}/favourite', ['uses' => 'FavouriteController@show', 'as' => 'element.favourite']);
Route::post('element/{element}/favourite', ['uses' => 'FavouriteController@store', 'as' => 'element.favourite']);
Route::delete('element/{element}/favourite', ['uses' => 'FavouriteController@destroy', 'as' => 'element.favourite']);

Route::resource('element', 'ElementController', [
    'except'    => [
        'destroy'
    ]
]);

Route::resource('element.comment', 'ElementCommentController', [
    'except'    => [
		'create',
		'show'
    ]
]);

Route::get('chat', ['uses' => 'ChatController@index', 'as' => 'chat.index']);
Route::get('chat/latest', ['uses' => 'ChatController@latest', 'as' => 'chat.latest']);
Route::post('chat/{partner}', ['uses' => 'ChatController@store', 'as' => 'chat.create']);
Route::get('chat/{partner}', ['uses' => 'ChatController@show', 'as' => 'chat.show']);
Route::get('chat/{partner}/fetch', ['uses' => 'ChatController@fetch', 'as' => 'chat.fetch']);

Route::get('profile/edit', ['uses' => 'ProfileController@edit', 'as' => 'profile.edit']);
Route::resource('profile', 'ProfileController', [
	'only'	=> [
		'index',
		'update',
		'destroy'
	]
]);

Route::controllers([
	'profile'	=> 'Auth\AuthController',
	'password'	=> 'Auth\PasswordController'
]);

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
