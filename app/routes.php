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
