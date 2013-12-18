<?php namespace Confessions\Services\Validation;

class UserValidator extends Validator {

	static $rules = array(
		'username'         => 'required|unique:users|not_in:Anonymous,anonymous',
		'email'            => 'required|email|unique:users',
		'password'         => 'required',
		'confirm_password' => 'required|same:password',
	);

}
