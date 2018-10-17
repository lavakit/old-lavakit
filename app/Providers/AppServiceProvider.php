<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
       |--------------------------------------------------------------------------------------------
       | Import when environment local
       |--------------------------------------------------------------------------------------------
       */
        if ($this->app->environment() == 'local') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
