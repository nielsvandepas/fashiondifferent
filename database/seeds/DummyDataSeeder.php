<?php

use FashionDifferent\Element;
use FashionDifferent\User;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class DummyDataSeeder extends Seeder
{
	public function run()
	{
		Model::unguard();
		
		$this->command->info('Dummy data will now be seeded into the database...');
		
		$this->SeedUsers();

		$this->command->info('Dummy users have been seeded, now proceeding with elements...');

		$this->SeedElements();
		
		$this->command->info('Dummy data has been seeded!');
		
		Model::reguard();
	}

	private function SeedUsers()
	{
		$faker = Faker::create('nl_NL');

		for ($i = 0; $i < 100; $i++)
		{
			User::create([
				'name'			=> $faker->firstNameFemale . ' ' . $faker->lastName,
				'email'			=> $faker->email,
				'password'		=> '123456'
			]);
		}
	}

	private function SeedElements()
	{
		$faker = Faker::create('nl_NL');

		$types = array('(sun)glasses', 'bag', 'baggy jeans', 'ballerinas', 'blazer', 'boots', 'bracelet', 'crop top', 'dress',
			'hat', 'hot-pants', 'jeans', 'jogging pants', 'longsleeve t-shirt', 'necklace', 'other accessory', 'other shoes',
			'other top', 'other trousers', 'pumps', 'ring', 'shawl', 'shirt', 'skinny jeans', 'skirt', 'slippers', 'sneakers',
			'socks', 'sports shoes', 'sweater', 't-shirt', 'vest', 'watch');

		for ($i = 0; $i < 100; $i++)
		{
			Element::create([
				'name'			=> $faker->sentence,
				'description'	=> $faker->paragraph,
				'type'			=> $faker->randomElement($types),
				'user_id'		=> $faker->numberBetween(1, 100),
				'shop'			=> $faker->company
			]);
		}
	}
}