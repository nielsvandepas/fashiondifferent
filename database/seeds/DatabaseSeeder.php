<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->command->info('Now starting user table seeder...');
		$this->call('UserTableSeeder');

		$this->command->info('Now starting element type table seeder...');
		$this->call('ElementTypeTableSeeder');

		Model::reguard();
	}

}
