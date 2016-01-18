<?php

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