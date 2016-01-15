<?php namespace FashionDifferent\Commands;

use FashionDifferent\Commands\Command;

use FashionDifferent\User;
use FashionDifferent\Http\Requests\Request;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

class UpdateProfile extends Command implements SelfHandling {

	use DispatchesCommands;

	private $request;
	private $profile;

	/**
	 * Create a new command instance.
	 *
	 * @param  \FashionDifferent\Http\Requests\Request  $request
	 * @param  \FashionDifferent\User  $profile
	 * @return void
	 */
	public function __construct(Request $request, User $profile)
	{
		$this->request = $request;
		$this->profile = $profile;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->profile->fill($this->request->only(['name', 'email']));

		if ($this->request->password != '')
			$this->profile->password = $this->request->password;

		$this->profile->save();

		// If the user added a profile image, send it to the image
		// processor, so that file sizes will be reduced
		if (array_key_exists('image', $this->request->all()))
			$this->dispatch(new ProcessImage('profile-images', $this->profile));

		Flash::success('Your profile has been updated successfully!');
	}

}
