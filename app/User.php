<?php namespace FashionDifferent;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'image'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function roles()
	{
		return $this->belongsToMany('\FashionDifferent\Role')->withTimestamps();
	}

	public function elements()
	{
		return $this->hasMany('\FashionDifferent\Element');
	}

	public function favourites()
	{
		return $this->belongsToMany('\FashionDifferent\Element', 'favourites');
	}

	public function collections()
	{
		return $this->hasMany('\FashionDifferent\ElementCollection');
	}

	public function sentChatMessages()
	{
		return $this->hasMany('\FashionDifferent\ChatMessage', 'from_id');
	}

	public function receivedChatMessages()
	{
		return $this->hasMany('\FashionDifferent\ChatMessage', 'to_id');
	}

	public function allChatMessages()
	{
		return $this->sentChatMessages->merge($this->receivedChatMessages);
	}

	public function comments()
	{
		return $this->hasMany('\FashionDifferent\Comment');
	}

	public function points()
	{
		return $this->elements->count() + $this->favourites->count() + $this->collections->count();
	}

	public function level()
	{
		$elements = $this->elements->count();

		$xp = $this->points();

		if ($xp > 250 && $elements > 0)
			return 'expert';
		else if ($xp > 250)
			return 'advanced';
		else if ($xp > 200 && $elements > 0)
			return 'advanced';
		else if ($xp > 100)
			return 'intermediate';
		else if ($xp > 50 && $elements > 0)
			return 'intermediate';
		else
			return 'beginner';
	}

	/**
	 * Checks if a user has the specified role.
	 *
	 * @param $roleName
	 * @return mixed
	 */
	public function hasRole($roleName)
	{
		return $this->roles->keyBy('name')->has($roleName);
	}

}
