<?php namespace Confessions\Services\Validation;

class ConfessionValidator extends Validator {

	static $rules = array(
		'body' => 'required|min:10|max:255',
	);

}
