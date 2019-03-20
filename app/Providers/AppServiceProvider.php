<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
	    if ($this->app->environment() !== 'production') {
		    $this->app->register( IdeHelperServiceProvider::class);
	    }
    }

	/**
	 * Bootstrap any application services.
	 *
	 * @param UrlGenerator $url
	 *
	 * @return void
	 */
    public function boot(UrlGenerator $url)
    {
	    if( $this->app->environment() === 'production'){
	    	$url->formatScheme('https://');
	    }
    }
}
