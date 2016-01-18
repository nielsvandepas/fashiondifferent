<?php namespace FashionDifferent\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller Routes in your Routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'FashionDifferent\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		$router->model('element', 'FashionDifferent\Element');
		$router->model('collection', 'FashionDifferent\ElementCollection');
		//$router->model('profile', 'FashionDifferent\User');
		$router->model('partner', 'FashionDifferent\User');
	}

	/**
	 * Define the Routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/Routes/Main.php');

			require app_path('Http/Routes/Admin.php');

			require app_path('Http/Routes/Profile.php');

			require app_path('Http/Routes/Chat.php');
		});
	}

}
