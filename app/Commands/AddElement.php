<?php namespace FashionDifferent\Commands;

use FashionDifferent\Commands\Command;

use FashionDifferent\Element;
use FashionDifferent\Events\ElementAdded;
use FashionDifferent\Http\Requests\ElementRequest;
use FashionDifferent\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

use Flash;
use Event;

class AddElement extends Command implements SelfHandling {

	use DispatchesCommands;

	private $element;
	private $request;
	private $user;

	/**
	 * Create a new command instance.
	 *
	 * @param  \FashionDifferent\Http\Requests\ElementRequest  $request
	 * @param  \FashionDifferent\Element  $element
	 * @return void
	 */
	public function __construct(ElementRequest $request, Element $element, User $user)
	{
		$this->request = $request;
		$this->element = $element;
		$this->user = $user;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->element->fill($this->request->all());
		$this->user->elements()->save($this->element);

		if (array_key_exists('image', $this->request->all()))
			$this->dispatch(new ProcessImage('element-images', $this->element));

		Flash::success($this->element->name . ' has been added successfully!');
		Event::fire(new ElementAdded($this->element));
	}

}
