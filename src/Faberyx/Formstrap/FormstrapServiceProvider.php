<?php 
namespace Faberyx\Formstrap;
use Illuminate\Support\ServiceProvider;

class FormstrapServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		//$loader = \Illuminate\Foundation\AliasLoader::getInstance();
  		//$loader->alias('Formstrap', 'Faberyx\Formstrap\Facades\Formstrap');
		$this->package('faberyx/formstrap');

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//

		$this->app->bind('formstrap.validation', function($app)  {
		    return new Validation(
		    	$app['view'], 
	        	$app['config']);
		});

		//$this->app->bind('formstrap.utils', function($app)  {
		//    return new Utils(
	    //    	$app['config']);
		//});

	    $this->app['formstrap'] = $this->app->share(function($app)
	    {
	        return new Formstrap(
	        	$app['view'], 
	        	$app['config'], 
	        	$app->make('formstrap.validation'),
	        	new Utils
        	);
	    });



		
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('formstrap');
	}

}
