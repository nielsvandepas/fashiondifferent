<?php

namespace FashionDifferent;

use Illuminate\Database\Eloquent\Model;

use FashionDifferent\Services\RandomizerService;

class ElementCollection extends Model
{

    protected $table = 'element_collections';

	public function random()
	{
		return RandomizerService::getRandomCollection();
	}

	public function owner()
	{
		return $this->belongsTo('\FashionDifferent\User');
	}

	public function top()
	{
		return $this->hasOne('\FashionDifferent\Element', 'id', 'top_id');
	}

	public function trousers()
	{
		return $this->hasOne('\FashionDifferent\Element', 'id', 'trousers_id');
	}

	public function shoes()
	{
		return $this->hasOne('\FashionDifferent\Element', 'id', 'shoes_id');
	}

	public function accessory()
	{
		return $this->hasOne('\FashionDifferent\Element', 'id', 'accessory_id');
	}

}
