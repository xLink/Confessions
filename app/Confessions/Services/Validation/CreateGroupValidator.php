<?php namespace Confessions\Services\Validation;

class CreateGroupValidator extends Validator {

	static $rules = array(
		'name'        => 'required|min:4|max:40',
		'description' => 'max:255',
	);

}
