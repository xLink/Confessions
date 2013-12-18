<?php

use Confessions\Services\Validation\UserValidator;

class UsersController extends BaseController {

	protected $validator;

	public function __construct(UserValidator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Displays a form for signing up.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Attempts to save the user to the database.
	 *
	 * @return Response
	 */
	public function store()
	{
		$form = Input::only('username', 'email', 'password', 'confirm_password');
		if(!$this->validator->validates($form))
		{
			return Redirect::route('signup')->withErrors($this->validator->errors())->withInput();
		}

		User::create([
			'username' => $form['username'],
			'email'    => $form['email'],
			'password' => Hash::make($form['password']),
		]);

		return Redirect::route('login')->with('success', "You may now login.");
	}

}
