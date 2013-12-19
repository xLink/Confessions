<?php namespace Confessions\Services\Validation;

class UpdateGroupValidator extends Validator {

	static $rules = array(
		'description' => 'max:255',
	);

}
