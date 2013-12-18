<?php

class SessionsController extends BaseController {

	/**
	 * Displays a form for a user to login.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Attempts to log a user in.
	 *
	 * @return Reponse
	 */
	public function store()
	{
		$form = Input::only('email', 'password');

		if(Auth::attempt($form))
			return Redirect::intended(route('home'))->with('success', "You have been successfully logged in.");

		return Redirect::route('login')->withInput()->with('error', "The information you provided was invalid.");
	}

	/**
	 * Logs a user out.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home();
	}
}
