<?php

Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'admin.index']);

Route::get('admin/moderate/elements', ['uses' => 'AdminController@moderateElements', 'as' => 'admin.moderate.elements']);

Route::get('admin/moderate/comments', ['uses' => 'AdminController@moderateComments', 'as' => 'admin.moderate.comments']);

Route::get('admin/edit', ['uses' => 'AdminController@edit', 'as' => 'admin.edit']);

Route::get('admin/admin', ['uses' => 'AdminController@admin', 'as' => 'admin.admin']);