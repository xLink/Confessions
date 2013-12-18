<?php namespace Confessions\Services\Validation;

class UserValidator extends Validator {

	static $rules = array(
		'username'         => 'required|max:20|unique:users|not_in:Anonymous,anonymous',
		'email'            => 'required|max:255|email|unique:users',
		'password'         => 'required',
		'confirm_password' => 'required|same:password',
	);

}
