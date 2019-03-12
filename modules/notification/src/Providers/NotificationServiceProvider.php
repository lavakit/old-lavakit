<?php

namespace Inspire\Notification\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class NotificationServiceProvider
 * @package Inspire\Notification\Providers
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'notification');

        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'notification');

        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../resources/assets' => resource_path('assets'),
            ], 'assets');
            $this->publishes([
                __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/notification',
            ], 'views');
            $this->publishes([
                __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/notification'),
            ], 'lang');
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
    }

    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__ . '/../../helpers/*.php');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }
}
