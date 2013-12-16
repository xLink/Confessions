<?php

class SessionsController extends BaseController {

	/**
	 * Displays a form for a user to login.
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Attempts to log a user in.
	 */
	public function store()
	{
		$form = Input::only('email', 'password');

		if(Auth::attempt($form))
			return Redirect::intended(route('home'))->withSuccess("You have been successfully logged in.");

		return Redirect::route('login')->withInput()->withError("The information you provided was invalid.");
	}

	/**
	 * Logs a user out.
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home();
	}
}
