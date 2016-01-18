<?php namespace FashionDifferent;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	public function users()
	{
		return $this->belongsToMany('\FashionDifferent\User');
	}

}
