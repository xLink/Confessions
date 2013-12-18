<?php

class UserSeeder extends Seeder {

	/**
	 * Create some sample users.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Truncating users table.');

		DB::table('users')->delete();

		$this->command->info('Creating test user with email: test@example.com / password: test');

		User::create([
			'username' => 'test',
			'email'    => 'test@example.com',
			'password' => Hash::make('test'),
		]);
	}

}
