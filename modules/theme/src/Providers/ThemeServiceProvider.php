<?php

namespace Lavakit\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Theme\Console\ThemeGeneratorCommand;
use Lavakit\Theme\Console\ThemeListCommand;
use Lavakit\Theme\Contracts\Themes\Frontend as ThemeFrontendContract;
use Lavakit\Theme\Contracts\Themes\Backend as ThemeBackendContract;
use Lavakit\Theme\Facades\ThemeFrontendFacade;
use Lavakit\Theme\Facades\ThemeBackendFacade;
use Config;
use Lavakit\Theme\Managers\Themes\Frontend as ThemeFrontend;
use Lavakit\Theme\Managers\Themes\Backend as ThemeBackend;
use Lavakit\Theme\Services\Breadcrumbs\Providers\BreadcrumbsProvider;

/**
 * Class ThemeServiceProvider
 * @package Lavakit\Theme\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ThemeServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    use CanRegisterFacadeAliases;

    const THEME_CREATE_COMMAND  = 'theme.create';
    const THEME_LIST_COMMAND    = 'theme.list';

    /**
     * @var array Facade aliases
     */
    protected $facadeAliases = [
        'ThemeFrontend' => ThemeFrontendFacade::class,
        'ThemeBackend' => ThemeBackendFacade::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();

        $this->registerConfig();
        $this->registerTheme();
        $this->consoleCommand();
        $this->registerMiddleware();

        $this->app->register(AssetServiceProvider::class);
        $this->app->register(ComposerServiceProvider::class);
        $this->app->register(BreadcrumbsProvider::class);

        //Register aliases
        $this->registerFacadeAliases($this->facadeAliases);

        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'theme');
    }

    /**
     * Add Theme Types Middleware.
     *
     * @return void
     */
    public function registerMiddleware()
    {
        if (config('theme.theme.types.enable')) {
            $themeTypes = config('theme.theme.types.middleware');
            foreach ($themeTypes as $middleware => $themeName) {
                /** Register Middleware */
                $this->app['router']->aliasMiddleware($middleware, "Lavakit\\Theme\\Middleware\\Route{$middleware}Middleware");

                /** Push Config middleware theme */
                Config::push('base.base.middleware.' . $middleware, $middleware . ':' . $themeName);
            }
        }
    }

    /**
     * Publish config file
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishConfig('theme', 'theme');
        $this->publishConfig('theme', 'frontend');
        $this->publishConfig('theme', 'backend');
        $this->publishConfig('theme', 'breadcrumbs');
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

    /**
     * Register theme Frontend
     *
     * @return void
     */
    protected function registerTheme()
    {
        $this->app->singleton(ThemeFrontendContract::class, function ($app) {
            return new ThemeFrontend(
                $app,
                $this->app['view']->getFinder(),
                $this->app['config'],
                $this->app['translator']
            );
        });

        $this->app->singleton(ThemeBackendContract::class, function ($app) {
            return new ThemeBackend(
                $app,
                $this->app['view']->getFinder(),
                $this->app['config'],
                $this->app['translator']
            );
        });
    }

    /**
     * Add Commands.
     *
     * @return void
     */
    public function consoleCommand()
    {
        $this->registerThemeGeneratorCommand();
        $this->registerThemeListCommand();

        // Assign commands.
        $this->commands([
            self::THEME_CREATE_COMMAND,
            self::THEME_LIST_COMMAND
        ]);
    }

    /**
     * Register generator command.
     *
     * @return void
     */
    public function registerThemeGeneratorCommand()
    {
        $this->app->singleton(self::THEME_CREATE_COMMAND, function ($app) {
            return new ThemeGeneratorCommand($app['config'], $app['files']);
        });
    }

    /**
     * Register theme list command.
     *
     * @return void
     */
    public function registerThemeListCommand()
    {
        $this->app->singleton(self::THEME_LIST_COMMAND, ThemeListCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
