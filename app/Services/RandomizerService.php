<?php namespace FashionDifferent\Services;

use FashionDifferent\Element;
use FashionDifferent\ElementCollection;
use FashionDifferent\ElementType;

class RandomizerService
{
	/**
	 * Fetches a random top, trousers, shoes and accessory and returns
	 * these combined as an element collection.
	 *
	 * @return ElementCollection
	 */
	public static function getRandomCollection()
	{
		$tops = self::getRandomElement('tops')['id'];
		$trousers = self::getRandomElement('trousers')['id'];
		$shoes = self::getRandomElement('shoes')['id'];
		$accessory = self::getRandomElement();
		$accessoryCategory = ElementType::find($accessory->type, ['category'])['category'];

		$blacklist = [
			'tops',
			'trousers',
			'shoes'
		];

		while (in_array($accessoryCategory, $blacklist))
		{
			$accessory = self::getRandomElement();
			$accessoryCategory = ElementType::find($accessory->type, ['category'])['category'];
		}

		$collection = new ElementCollection();
		$collection->top_id = $tops;
		$collection->trousers_id = $trousers;
		$collection->shoes_id = $shoes;
		$collection->accessory_id = $accessory['id'];

		return $collection;
	}

	/**
	 * Fetches a random element, from a specific category if supplied.
	 *
	 * @param null $ofCategory
	 * @return mixed
	 */
	public static function getRandomElement($ofCategory = null)
	{
		$elements = null;

		if (!is_null($ofCategory))
		{
			$types = ElementType::whereCategory($ofCategory)->get(['type'])->lists('type');
			$elements = Element::whereIn('type', $types)->get();
		}
		else
			$elements = Element::all();

		if ($elements->count() > 0)
			return $elements->random();
	}
}