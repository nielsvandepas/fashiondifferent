<?php namespace FashionDifferent\Commands;

use FashionDifferent\Commands\Command;

use FashionDifferent\Element;
use FashionDifferent\Events\ElementUpdated;
use FashionDifferent\Http\Requests\UpdateElementRequest;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

use Event;

class UpdateElement extends Command implements SelfHandling {

	use DispatchesCommands;

	private $request;
	private $element;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(UpdateElementRequest $request, Element $element)
	{
		$this->request = $request;
		$this->element = $element;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->element->fill($this->request->all());
		$this->element->save();

		if (array_key_exists('image', $this->request->all()))
			$this->dispatch(new ProcessImage('element-images', $this->element));

		Flash::success($this->element->name . ' has been updated successfully!');
		Event::fire(new ElementUpdated($this->element));
	}

}
