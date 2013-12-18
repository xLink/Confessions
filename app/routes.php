<?php

/* Home route */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showHome']);

/* Auth routes */
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create', 'before' => 'guest']);
Route::post('login', ['as' => 'sessions.store', 'uses' => 'SessionsController@store', 'before' => 'guest']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

/* User routes */
Route::get('signup', ['as' => 'signup', 'uses' => 'UsersController@create', 'before' => 'guest']);
Route::post('signup', ['as' => 'users.store', 'uses' => 'UsersController@store', 'before' => 'guest']);

/* Confessions routes */
Route::get('confessions', ['as' => 'confessions.index', 'uses' => 'ConfessionsController@index']);
Route::get('confessions/create', ['as' => 'confessions.create', 'uses' => 'ConfessionsController@create', 'before' => 'auth']);
Route::post('confessions', ['as' => 'confessions.store', 'uses' => 'ConfessionsController@store', 'before' => 'auth|csrf']);
Route::get('confessions/{id}', ['as' => 'confessions.show', 'uses' => 'ConfessionsController@show']);
Route::delete('confessions/{id}', ['as' => 'confessions.destroy', 'uses' => 'ConfessionsController@destroy', 'before' => 'auth|csrf']);

/* Group routes */
Route::get('groups', ['as' => 'groups.index', 'uses' => 'GroupsController@index']);
Route::get('groups/create', ['as' => 'groups.create', 'uses' => 'GroupsController@create', 'before' => 'auth']);
Route::post('groups', ['as' => 'groups.store', 'uses' => 'GroupsController@store', 'before' => 'auth|csrf']);
Route::get('groups/{id}', ['as' => 'groups.show', 'uses' => 'GroupsController@show']);
Route::get('groups/{id}/edit', ['as' => 'groups.edit', 'uses' => 'GroupsController@edit', 'before' => 'auth']);
Route::patch('groups/{id}', ['as' => 'groups.update', 'uses' => 'GroupsController@update', 'before' => 'auth|csrf']);
Route::delete('groups/{id}', ['as' => 'groups.destroy', 'uses' => 'GroupsController@destroy', 'before' => 'auth|csrf']);
