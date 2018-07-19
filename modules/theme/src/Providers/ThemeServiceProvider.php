<?php namespace Inspire\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanPublishConfiguration;
use Inspire\Theme\Contracts\ThemeContract;

class ThemeServiceProvider extends ServiceProvider
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
        //$this->loadViewsFrom(__DIR__ . '/../../resources/views', 'theme');
        /*Load translations*/
        //$this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'theme');

        //if (app()->runningInConsole()) {
            /*Load migrations*/
        //    $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        //    $this->publishes([
        //        __DIR__ . '/../../resources/assets' => resource_path('assets')
        //    ], 'assets');
        //    $this->publishes([
        //        __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/theme',
        //    ], 'views');
        //    $this->publishes([
        //        __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/theme'),
        //    ], 'lang');
        //    $this->publishes([
        //        __DIR__ . '/../../database' => base_path('database'),
        //    ], 'migrations');
        //}
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->loadHelpers();

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Publish config file
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishConfig('theme', 'theme');
        $this->publishConfig('theme', 'assets');
    }

    /**
     * Load all Helpers
     *
     * @return void
     */
    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__ . '/../../helpers/*.php');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }

    protected function registerTheme()
    {
        $this->app->singleton(ThemeContract::class, function ($app) {

        });
    }
}
