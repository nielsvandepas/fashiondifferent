<?php namespace FashionDifferent\Events;

use FashionDifferent\Events\Event;

use Illuminate\Queue\SerializesModels;

class RoleAdded extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

}
