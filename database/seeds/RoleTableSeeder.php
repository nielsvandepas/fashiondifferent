<?php

use FashionDifferent\Role;
use FashionDifferent\User;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class RoleTableSeeder extends Seeder
{
	public function run()
	{
		$this->command->info('Role table will now be seeded...');

		$this->seedRoles();

		$this->command->info('Role table has been seeded!');
	}

	private function seedRoles()
	{
		Role::create([
			'name' => 'upload_elements'
		]);

		Role::create([
			'name' => 'moderate_elements'
		]);

		Role::create([
			'name' => 'write_comments'
		]);

		Role::create([
			'name' => 'moderate_comments'
		]);

		Role::create([
			'name' => 'edit_content'
		]);

		Role::create([
			'name' => 'administrator'
		]);
	}
}