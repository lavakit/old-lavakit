<?php

namespace Inspire\Notification\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanPublishConfiguration;
use Inspire\Base\Traits\CanRegisterFacadeAliases;
use Inspire\Notification\Facades\FlashMessageFacade;
use Inspire\Notification\Services\FlashMessages\Contracts\FlashMessageManagerContract;
use Inspire\Notification\Services\FlashMessages\FlashMessageManager;

/**
 * Class NotificationServiceProvider
 * @package Inspire\Notification\Providers
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class NotificationServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    use CanRegisterFacadeAliases;

    protected $facadeAliases = [
        'FlashMessage' => FlashMessageFacade::class,
    ];

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
        $this->publishConfig('notification', 'flash');

        //Load helpers
        $this->loadHelpers();

        $this->app->singleton(FlashMessageManagerContract::class, function () {
            return new FlashMessageManager($this->app['config']->get('notification.flash'));
        });

        $this->registerFacadeAliases($this->facadeAliases);
    }

    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__ . '/../../helpers/*.php');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }
}
