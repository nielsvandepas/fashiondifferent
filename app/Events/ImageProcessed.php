<?php namespace FashionDifferent\Events;

use FashionDifferent\Events\Event;

use FashionDifferent\User;
use Illuminate\Queue\SerializesModels;

use Intervention\Image\Image;

class ImageProcessed extends Event {

	use SerializesModels;

	public $image;

	/**
	 * Create a new event instance.
	 *
	 * @param  Image  $image
	 * @return void
	 */
	public function __construct(Image $image)
	{
		$this->image = $image;
	}

}
