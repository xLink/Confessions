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

}
