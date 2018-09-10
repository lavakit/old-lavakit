<?php

namespace Inspire\Page\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanPublishConfiguration;

class PageServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'page');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'page');

        if (app()->runningInConsole()) {
            /*Load migrations*/
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([__DIR__ . '/../../resources/assets' => resource_path('assets')], 'assets');
            $this->publishes([__DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/page'], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/page')], 'lang');
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

        /*Load Config*/
        $this->publishConfig('page', 'config');

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
