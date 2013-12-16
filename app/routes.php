<?php

/* Home route */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showHome']);

/* Auth routes */
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create', 'before' => 'guest']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
