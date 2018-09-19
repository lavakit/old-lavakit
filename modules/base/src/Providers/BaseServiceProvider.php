<?php

namespace Inspire\Base\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Inspire\Base\Exceptions\Handler;
use Inspire\Base\Facades\PageTitleFacade;
use Inspire\Base\Traits\CanPublishConfiguration;
use Inspire\Acl\Providers\AclServiceProvider;
use Inspire\Base\Traits\CanRegisterFacadeAliases;
use Inspire\Dashboard\Providers\DashboardServiceProvider;
use Inspire\Menu\Providers\MenuServiceProvider;
use Inspire\Page\Providers\PageServiceProvider;
use Inspire\Post\Providers\PostServiceProvider;
use Inspire\Theme\Providers\ThemeServiceProvider;
use Inspire\User\Providers\UserServiceProvider;

/**
 * Class BaseServiceProvider
 * @package Inspire\Base\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class BaseServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    use CanRegisterFacadeAliases;
    /**
     * @var array Facade Aliases
     */
    protected $facadeAliases = [
        'PageTitle' => PageTitleFacade::class
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        /*Load Config*/
        $this->publishConfig('base', 'base');
        $this->publishConfig('base', 'cache');

        /*Load Services on Lucky*/
        $this->app->register(AclServiceProvider::class);
        $this->app->register(PostServiceProvider::class);
        $this->app->register(PageServiceProvider::class);
        $this->app->register(DashboardServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
        $this->app->register(ThemeServiceProvider::class);
        $this->app->register(MenuServiceProvider::class);

        /*Load views Backend*/
        $pathView =  config('theme.theme.backend_path') . '/' . config('theme.theme.active_backend') . '/views';
        $this->loadViewsFrom($pathView, 'backend');

        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'base');


        if (app()->runningInConsole()) {
            /*Load migrations*/
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([__DIR__ . '/../../resources/assets' => resource_path('assets')], 'assets');
            $this->publishes([__DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/base'], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/base')], 'lang');
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

        $this->app->singleton(ExceptionHandler::class, Handler::class);

        //Register aliases
        $this->registerFacadeAliases($this->facadeAliases);
    }

    /**
     * Load helper
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
}
