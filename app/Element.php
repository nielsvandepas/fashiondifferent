<?php

namespace FashionDifferent;

use Illuminate\Database\Eloquent\Model;

use FashionDifferent\Services\RandomizerService;

use Auth;

class Element extends Model
{

    protected $fillable = [
        'name',
        'description',
        'author',
        'image',
		'type'
    ];

	public static function random($ofCategory = null)
	{
		return RandomizerService::getRandomElement($ofCategory);
	}

	public function author()
	{
		return $this->belongsTo('\FashionDifferent\User');
	}

	public function comments()
	{
		return $this->hasMany('\FashionDifferent\Comment');
	}

	public function isFavourite()
	{
		if (!Auth::check())
			return false;

		if (!is_null(Auth::user()->favourites->find($this->id)))
			return true;
		else
			return false;
	}

}
