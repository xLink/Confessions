<?php

class UserSeeder extends Seeder {

	/**
	 * Create some sample users.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'username' => 'test',
			'email'    => 'test@example.com',
			'password' => Hash::make('test'),
		]);
	}

}
