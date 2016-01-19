<?php namespace FashionDifferent\Events;

use FashionDifferent\Events\Event;

use FashionDifferent\User;
use Illuminate\Queue\SerializesModels;

class RoleRemoved extends Event {

	use SerializesModels;

	public $user;
	public $role;

	/**
	 * Create a new event instance.
	 *
	 * @param  \FashionDifferent\User  $user
	 * @param  integer  $role
	 * @return void
	 */
	public function __construct(User $user, $role)
	{
		$this->user = $user;
		$this->role = $role;
	}

}
