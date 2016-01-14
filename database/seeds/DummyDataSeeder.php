<?php

use FashionDifferent\Element;
use FashionDifferent\User;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
	public function run()
	{
		Model::unguard();
		
		$this->command->info('Dummy data will now be seeded into the database...');
		
		$this->SeedUsers();
		$this->SeedElements();
		
		$this->command->info('Dummy data has been seeded!');
		
		Model::reguard();
	}

	private function SeedUsers()
	{
		User::create([
			'id'			=> 2,
			'name'			=> 'Dummy User',
			'email'			=> 'dummy@dummy.com',
			'password'		=> Hash::make('123456')
		]);
	}

	private function SeedElements()
	{
		Element::create([
			'name'			=> 'Amazing element',
			'description'	=> 'This is an amazing element',
			'type'			=> 'jeans',
			'user_id'		=> 2
		]);
	}
}