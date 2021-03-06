<?php

class Confession extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'confessions';

	/**
	 * The attributes guarded from mass assignment.
	 *
	 * @var array
	 */
	protected $guarded = array('id', 'user_id', 'group_id', 'created_at', 'updated_at');

	/**
	 * Creates an accessor to the related user.
	 * 
	 * @return Relation
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Creates an accessor to the related group.
	 * 
	 * @return Relation
	 */
	public function group()
	{
		return $this->belongsTo('Group');
	}

}
