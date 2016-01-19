<?php

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