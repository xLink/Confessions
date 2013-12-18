<?php

class GroupSeeder extends Seeder {

	/**
	 * Create some sample users.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Creating a group named Test Group.');

		$user = User::first();
		$user->groups()->create([
			'name'        => 'Test Group',
			'description' => 'This is an automatically generated test group.',
		]);
	}

}
