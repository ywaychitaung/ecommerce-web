<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // If the application is in production environment, we will enforce all url to be https
        if ($this->app->environment() !== 'production') {
            $this->app['url']->forceScheme('https');
        }
    }
}
