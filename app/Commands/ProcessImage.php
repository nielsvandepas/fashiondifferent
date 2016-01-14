<?php namespace FashionDifferent\Commands;

use FashionDifferent\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Database\Eloquent\Model;

use Image;
use Input;

/**
 * Process an image so that it doesn't consume excessive space and bandwidth.
 *
 * @param string  $destination
 * @return string
 */
class ProcessImage extends Command implements SelfHandling {

	private $destinationBase = '';
	private $newName = '';
	private $image = null;

	/**
	 * Create a new command instance.
	 *
	 * @param string  $destination
	 * @param \Illuminate\Database\Eloquent\Model  $model
	 * @return void
	 */
	public function __construct($destination, Model $model)
	{
		// Calculate the base for the destination folders
		$this->destinationBase = 'uploads/' . $destination . '/';

		// Generate a new, completely unique name for the processed image
		$this->newName = $this->generateName();

		$model->image = $this->newName;
		$model->save();

		// Create the sub-paths if they don't exist
		$this->createPaths();

		Input::file('image')->move($this->destinationBase, $this->newName);
		$this->image = Image::make($this->destinationBase . $this->newName);
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		// Transform the image
		$this->cropImage();
		$this->resizeImage();
	}

	/**
	 * Create the sub-paths used by the image processor if they don't exist.
	 */
	private function createPaths()
	{
		if (!realpath('uploads'))
			mkdir('uploads');

		if (!realpath($this->destinationBase))
			mkdir($this->destinationBase);

		if (!realpath($this->destinationBase . 'cropsized'))
			mkdir($this->destinationBase . 'cropsized');
	}

	/**
	 * Generate a new, completely unique name for the processed image.
	 *
	 * @return string
	 */
	private function generateName()
	{
		// Fetch the original file extension and prepend a new, unique string
		$extension = Input::file('image')->getClientOriginalExtension();
		return uniqid('', true) . '-' . Carbon::now()->format('dmYHms') . '.' . $extension;
	}

	/**
	 * Crop the image along its longest side so it is equal to the short
	 * side of the image, thus creating a perfect square picture.
	 *
	 * @param $image
	 */
	private function cropImage()
	{
		$shortest = min($this->image->width(), $this->image->height());

		$this->image->crop($shortest, $shortest);
	}

	/**
	 *
	 */
	private function resizeImage()
	{
		$this->image->resize(400, 400, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($this->destinationBase . 'cropsized/' . $this->newName, 90);
	}

}
