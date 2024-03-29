<?php

namespace Lavakit\Translation\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Translation\Contracts\Transformer as TransformerContract;
use Lavakit\Translation\Services\Transformers\Transformer;

/**
 * Class TranslationServiceProvider
 * @package Lavakit\Translation\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class TranslationServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig('translation', 'translation');

        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'translation');

        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'translation');

        if (app()->runningInConsole()) {
            /*Load migrations*/
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([__DIR__ . '/../../resources/assets' => resource_path('assets')], 'assets');
            $this->publishes([
                __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/translation',
            ], 'views');

            $this->publishes([
                __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/translation'),
            ], 'lang');

            $this->publishes([
                __DIR__ . '/../../database' => base_path('database'),
            ], 'migrations');
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
