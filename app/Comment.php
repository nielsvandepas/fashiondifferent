<?php

namespace FashionDifferent;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'body'
	];

	public function element()
	{
		return $this->belongsTo('\FashionDifferent\Element');
    }

	public function author()
	{
		return $this->belongsTo('\FashionDifferent\User', 'user_id');
	}
}
