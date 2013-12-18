<?php

class ConfessionSeeder extends Seeder {

	/**
	 * Create some sample users.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Creating an anonymous and a non-anonymous confession.');

		$user = User::first();
		$user->confessions()->create([
			'anonymous' => true,
			'body'      => "This is an auto-generated anonymous post.",
		]);
		$user->confessions()->create([
			'anonymous' => false,
			'body'      => "This is an auto-generated non-anonymous post.",
		]);
	}

}
