<?php namespace FashionDifferent\Events;

use FashionDifferent\Element;
use FashionDifferent\Events\Event;

use Illuminate\Queue\SerializesModels;

class ElementUpdated extends Event {

	use SerializesModels;

	public $element;

	/**
	 * Create a new event instance.
	 *
	 * @param  \FashionDifferent\Element  $element
	 * @return void
	 */
	public function __construct(Element $element)
	{
		$this->element = $element;
	}

}
