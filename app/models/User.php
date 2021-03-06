<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * The attributes guarded from mass assignment.
	 *
	 * @var array
	 */
	protected $guarded = array('id', 'created_at', 'updated_at');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Creates an accessor to the related confessions.
	 * 
	 * @return Relation
	 */
	public function confessions()
	{
		return $this->hasMany('Confession');
	}

	/**
	 * Creates an accessor to the related owned groups.
	 * 
	 * @return Relation
	 */
	public function groups()
	{
		return $this->hasMany('Group');
	}

}
