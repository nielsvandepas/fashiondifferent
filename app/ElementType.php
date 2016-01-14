<?php namespace FashionDifferent;

use Illuminate\Database\Eloquent\Model;

class ElementType extends Model {

	protected $primaryKey = 'type';

	public $timestamps = false;

	public function elements()
	{
		return $this->hasMany('\FashionDifferent\Element');
	}

}
