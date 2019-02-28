<?php

namespace Inspire\Base\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Inspire\Base\Exceptions\Handler;
use Inspire\Base\Facades\EmailFacade;
use Inspire\Base\Facades\TitleFacade;
use Inspire\Base\Traits\CanPublishConfiguration;
use Inspire\Base\Traits\CanRegisterFacadeAliases;
use Inspire\Dashboard\Providers\DashboardServiceProvider;
use Inspire\Menu\Providers\MenuServiceProvider;
use Inspire\Page\Providers\PageServiceProvider;
use Inspire\Post\Providers\PostServiceProvider;
use Inspire\Setting\Providers\SettingServiceProvider;
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
        'Title' => TitleFacade::class,
        'Email' => EmailFacade::class,
    ];

    /**
     * The filters base class name
     * @var array
     */
    protected $middleware = [
        'Base' => [
            'localizationRedirect' => 'LocalizationMiddleware'
        ]
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
        $this->publishConfig('base', 'mail');

        $this->registerMiddleware();

        /*Load Service on Vendor*/
        $this->app->register(VendorProvider::class);

        /*Load Services on Lucky*/
        $this->app->register(DashboardServiceProvider::class);
        $this->app->register(MenuServiceProvider::class);
        $this->app->register(PageServiceProvider::class);
        $this->app->register(PostServiceProvider::class);
        $this->app->register(SettingServiceProvider::class);
        $this->app->register(ThemeServiceProvider::class);
        $this->app->register(UserServiceProvider::class);

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

        $this->app->register(EventServiceProvider::class);
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

    /**
     * Register the filters
     *
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function registerMiddleware()
    {
        foreach ($this->middleware as $module => $middlewares) {
            foreach ($middlewares as $name => $middleware) {
                $class = "Inspire\\{$module}\\Http\\Middleware\\{$middleware}";
                $this->app['router']->aliasMiddleware($name, $class);
            }
        }
    }
}
