<?php namespace FashionDifferent;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model {

	protected $fillable = [
		'body'
	];

	public function from()
	{
		return $this->belongsTo('\FashionDifferent\User', 'from_id');
	}

	public function to()
	{
		return $this->belongsTo('\FashionDifferent\User', 'to_id');
	}

}
