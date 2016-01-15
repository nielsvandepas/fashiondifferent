<?php

use FashionDifferent\ElementType;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ElementTypeTableSeeder extends Seeder
{
	public function run()
	{
		$this->command->info('Element type table will now be seeded...');

		$this->seedTops();
		$this->seedTrousers();
		$this->seedShoes();
		$this->seedAccessories();

		ElementType::create([
			'type'		=> 'dress',
			'plural'	=> 'dresses',
			'category'	=> 'dresses'
		]);

		$this->command->info('Element type table has been seeded!');
	}

	private function seedTops()
	{
		ElementType::create([
			'type'		=> 't-shirt',
			'plural'	=> 't-shirts',
			'category'	=> 'tops'
		]);

		ElementType::create([
			'type'		=> 'longsleeve t-shirt',
			'plural'	=> 'longsleeve t-shirts',
			'category'	=> 'tops'
		]);

		ElementType::create([
			'type'		=> 'sweater',
			'plural'	=> 'sweaters',
			'category'	=> 'tops'
		]);

		ElementType::create([
			'type'		=> 'crop top',
			'plural'	=> 'crop tops',
			'category'	=> 'tops'
		]);

		ElementType::create([
			'type'		=> 'shirt',
			'plural'	=> 'shirts',
			'category'	=> 'tops'
		]);

		ElementType::create([
			'type'		=> 'other top',
			'plural'	=> 'other tops',
			'category'	=> 'tops'
		]);
	}

	private function seedTrousers()
	{
		ElementType::create([
			'type'		=> 'jeans',
			'plural'	=> 'jeans',
			'category'	=> 'trousers'
		]);

		ElementType::create([
			'type'		=> 'skirt',
			'plural'	=> 'skirts',
			'category'	=> 'trousers'
		]);

		ElementType::create([
			'type'		=> 'skinny jeans',
			'plural'	=> 'skinny jeans',
			'category'	=> 'trousers'
		]);

		ElementType::create([
			'type'		=> 'hot-pants',
			'plural'	=> 'hot-pants',
			'category'	=> 'trousers'
		]);

		ElementType::create([
			'type'		=> 'jogging pants',
			'plural'	=> 'jogging pants',
			'category'	=> 'trousers'
		]);

		ElementType::create([
			'type'		=> 'baggy jeans',
			'plural'	=> 'baggy jeans',
			'category'	=> 'trousers'
		]);

		ElementType::create([
			'type'		=> 'other trousers',
			'plural'	=> 'other trousers',
			'category'	=> 'trousers'
		]);
	}

	private function seedShoes()
	{
		ElementType::create([
			'type'		=> 'sneakers',
			'plural'	=> 'sneakers',
			'category'	=> 'shoes'
		]);

		ElementType::create([
			'type'		=> 'boots',
			'plural'	=> 'boots',
			'category'	=> 'shoes'
		]);

		ElementType::create([
			'type'		=> 'sports shoes',
			'plural'	=> 'sports shoes',
			'category'	=> 'shoes'
		]);

		ElementType::create([
			'type'		=> 'ballerinas',
			'plural'	=> 'ballerinas',
			'category'	=> 'shoes'
		]);

		ElementType::create([
			'type'		=> 'pumps',
			'plural'	=> 'pumps',
			'category'	=> 'shoes'
		]);

		ElementType::create([
			'type'		=> 'slippers',
			'plural'	=> 'slippers',
			'category'	=> 'shoes'
		]);

		ElementType::create([
			'type'		=> 'other shoes',
			'plural'	=> 'other shoes',
			'category'	=> 'shoes'
		]);
	}

	private function seedAccessories()
	{
		ElementType::create([
			'type'		=> 'vest',
			'plural'	=> 'vests',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'blazer',
			'plural'	=> 'blazers',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'ring',
			'plural'	=> 'rings',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'necklace',
			'plural'	=> 'necklaces',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'bracelet',
			'plural'	=> 'bracelets',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'bag',
			'plural'	=> 'bags',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'hat',
			'plural'	=> 'hats',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> '(sun)glasses',
			'plural'	=> '(sun)glasses',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'watch',
			'plural'	=> 'watches',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'shawl',
			'plural'	=> 'shawls',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'socks',
			'plural'	=> 'socks',
			'category'	=> 'accessories'
		]);

		ElementType::create([
			'type'		=> 'other accessory',
			'plural'	=> 'other accessories',
			'category'	=> 'accessories'
		]);
	}
}