<?php

class Group extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';

	/**
	 * The attributes guarded from mass assignment.
	 *
	 * @var array
	 */
	protected $guarded = array('id', 'user_id');

	/**
	 * Creates an accessor to the related user.
	 * 
	 * @return Relation
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}
