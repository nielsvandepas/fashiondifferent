<?php

Route::get('chat', ['uses' => 'ChatController@index', 'as' => 'chat.index']);
Route::get('chat/latest', ['uses' => 'ChatController@latest', 'as' => 'chat.latest']);
Route::post('chat/{partner}', ['uses' => 'ChatController@store', 'as' => 'chat.create']);
Route::get('chat/{partner}', ['uses' => 'ChatController@show', 'as' => 'chat.show']);
Route::get('chat/{partner}/fetch', ['uses' => 'ChatController@fetch', 'as' => 'chat.fetch']);
