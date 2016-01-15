<?php

use FashionDifferent\User;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class UserTableSeeder extends Seeder
{
	public function run()
	{
		$this->command->info('User table will now be seeded...');

		User::create([
			'id'		=> 1,
			'name'		=> 'Administrator',
			'email'		=> 'admin@admin.com',
			'password'	=> '123456'
		]);

		$this->command->info('User table has been seeded!');
	}
}