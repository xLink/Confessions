<?php namespace Confessions\Services\Validation;

use Validator as LaravelValidator;

abstract class Validator {

	protected $errors;

	public function validates($input)
	{
		$validator = LaravelValidator::make($input, static::$rules);

		if($validator->fails())
		{
			$this->errors = $validator->messages();

			return false;
		}

		return true;
	}

	public function errors()
	{
		return $this->errors;
	}

}
