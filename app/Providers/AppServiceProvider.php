<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Add;
use App\Category;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('common.top_adds', function($view)
		{
			$view->with('topAdds', Add::where('position', 'top')->get());
		});

		view()->composer('common.bottom_adds', function($view)
		{
			$view->with('bottomAdds', Add::where('position', 'bottom')->get());
		});

		view()->composer('common.pic_adds', function($view)
		{
			$view->with('picAdds', Add::where('position', 'picture')->get());
		});

		view()->composer('common.link_adds', function($view)
		{
			$view->with('linkAdds', Add::where('position', 'link')->get());
		});

		view()->composer('common.categories', function($view)
		{
			$view->with('categories', Category::all());
		});

}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
