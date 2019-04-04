<?php

namespace Lavakit\Notification\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Notification\Contracts\Messages\Message as MessageContract;
use Lavakit\Notification\Services\Messages\Message;

/**
 * Class NotificationServiceProvider
 * @package Lavakit\Notification\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class NotificationServiceProvider extends ServiceProvider
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
        $this->publishConfig('notification', 'message');

        //Load helpers
        $this->loadHelpers();

        $this->app->singleton(MessageContract::class, function () {
            return $this->app->make(Message::class);
        });
    }

    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__ . '/../../helpers/*.php');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }
}
