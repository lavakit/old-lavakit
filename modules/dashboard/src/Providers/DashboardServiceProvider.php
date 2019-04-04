<?php

namespace Lavakit\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class DashboardServiceProvider
 * @package Lavakit\Dashboard\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'dashboard');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'dashboard');

        if (app()->runningInConsole()) {
            /*Load migrations*/
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
            $this->publishes([__DIR__ . '/../../resources/assets' => resource_path('assets')], 'assets');
            $this->publishes([__DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/dashboard',], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/dashboard'),], 'lang');
            $this->publishes([__DIR__ . '/../../database' => base_path('database'),], 'migrations');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Load helpers
        $this->loadHelpers();

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__ . '/../../helpers/*.php');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }
}
