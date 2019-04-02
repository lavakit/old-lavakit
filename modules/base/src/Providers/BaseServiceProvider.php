<?php

namespace Lavakit\Base\Providers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Lavakit\Base\Composers\TranslationsViewComposer;
use Lavakit\Base\Exceptions\Handler;
use Lavakit\Base\Facades\EmailFacade;
use Lavakit\Base\Facades\TitleFacade;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Base\Traits\CanRegisterViewComposer;
use Lavakit\Dashboard\Providers\DashboardServiceProvider;
use Lavakit\Menu\Providers\MenuServiceProvider;
use Lavakit\Page\Providers\PageServiceProvider;
use Lavakit\Post\Providers\PostServiceProvider;
use Lavakit\Setting\Providers\SettingServiceProvider;
use Lavakit\Theme\Providers\ThemeServiceProvider;
use Lavakit\Translation\Providers\TranslationServiceProvider;
use Lavakit\User\Providers\UserServiceProvider;
use Lavakit\Notification\Providers\NotificationServiceProvider;

/**
 * Class BaseServiceProvider
 * @package Lavakit\Base\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class BaseServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    use CanRegisterFacadeAliases;
    use CanRegisterViewComposer;

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
            'localizationRedirect' => 'LocalizationMiddleware',
            'SessionTimeout' => 'SessionTimeoutMiddleware',
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
        $this->publishConfig('base', 'available_locales');

        /*Load view composer*/
        $this->registerViewComposer(['layouts.master'], TranslationsViewComposer::class);

        /*Register middleware*/
        $this->registerMiddleware();

        /*Load Service on Vendor*/
        $this->app->register(VendorProvider::class);

        /*Load Services on Lucky*/
        $this->app->register(DashboardServiceProvider::class);
        $this->app->register(MenuServiceProvider::class);
        $this->app->register(NotificationServiceProvider::class);
        $this->app->register(PageServiceProvider::class);
        $this->app->register(PostServiceProvider::class);
        $this->app->register(SettingServiceProvider::class);
        $this->app->register(ThemeServiceProvider::class);
        $this->app->register(TranslationServiceProvider::class);
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
        $this->app->singleton('lavakit.isBackend', function () {
            return $this->isBackend();
        });

        //Load helpers
        $this->loadHelpers();

        $this->app->singleton(ExceptionHandler::class, Handler::class);

        //Register aliases
        $this->registerFacadeAliases($this->facadeAliases);

        $this->app->register(EventServiceProvider::class);
        $this->app->register(ComposerServiceProvider::class);
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
                $class = "Lavakit\\{$module}\\Http\\Middleware\\{$middleware}";
                $this->app['router']->aliasMiddleware($name, $class);
            }
        }
    }

    /**
     * Check if the current URL matches the configured backend uri
     *
     * @return bool
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    private function isBackend()
    {
        $url = app(Request::class)->path();

        if (Str::contains($url, config('base.base.admin-prefix'))) {
            return true;
        }

        return false;
    }
}
