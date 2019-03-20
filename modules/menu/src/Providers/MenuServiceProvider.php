<?php

namespace Lavakit\Menu\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class MenuServiceProvider
 * @package Lavakit\Menu\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'menu');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'menu');

        if (app()->runningInConsole()) {
            /*Load migrations*/
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
            $this->publishes([__DIR__ . '/../../resources/assets' => resource_path('assets'),], 'assets');
            $this->publishes([__DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/menu',], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/menu'),], 'lang');
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
