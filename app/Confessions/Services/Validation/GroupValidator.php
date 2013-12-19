<?php namespace Confessions\Services\Validation;

class GroupValidator extends Validator {

	static $rules = array(
		'name'        => 'required|min:4|max:40',
		'description' => 'max:255',
	);

}
