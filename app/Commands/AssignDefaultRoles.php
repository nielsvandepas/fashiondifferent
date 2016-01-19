<?php namespace FashionDifferent\Commands;

use FashionDifferent\Commands\Command;

use FashionDifferent\Events\RoleAdded;
use FashionDifferent\Role;
use FashionDifferent\User;
use Illuminate\Contracts\Bus\SelfHandling;

class AssignDefaultRoles extends Command implements SelfHandling {

	private $user;

	/**
	 * Create a new command instance.
	 *
	 * @param  \FashionDifferent\User  $user
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->addElementsRole();

		$this->addCommentsRole();
	}

	private function addElementsRole()
	{
		$role = Role::whereName('upload_elements')->first()->id;

		$this->user->roles()->attach($role);

		Event::fire(new RoleAdded($this->user, $role));
	}

	private function addCommentsRole()
	{
		$role = Role::whereName('write_comments')->first()->id;

		$this->user->roles()->attach($role);

		Event::fire(new RoleAdded($this->user, $role));
	}

}
