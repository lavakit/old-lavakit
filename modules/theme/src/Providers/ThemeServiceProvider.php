<?php

namespace Inspire\Theme\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanPublishConfiguration;
use Inspire\Theme\Console\ThemeGeneratorCommand;
use Inspire\Theme\Console\ThemeListCommand;
use Inspire\Theme\Contracts\ThemeContract;
use Inspire\Theme\Facades\Theme;
use Config;
use Inspire\Theme\Managers\ThemeManager;
use Inspire\Theme\Middleware\RouteAdminMiddleware;
use Inspire\Theme\Middleware\RouteMiddleware;

/**
 * Class ThemeServiceProvider
 * @package Inspire\Theme\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ThemeServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    const THEME_CREATE_COMMAND  = 'theme.create';
    const THEME_LIST_COMMAND    = 'theme.list';

    /**
     * @var array Facade aliases
     */
    protected $facadeAliases = [
        'Theme' => Theme::class
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerTheme();
        $this->loadHelpers();
        $this->consoleCommand();
        $this->registerMiddleware();

        //Register aliases
        $this->registerFacadeAliases();

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
        if (config('theme.types.enable')) {
            $themeTypes = config('theme.types.middleware');
            foreach ($themeTypes as $middleware => $themeName) {
                /** Register Middleware */
                $this->app['router']->aliasMiddleware($middleware, RouteMiddleware::class);

                /** Push Config middleware theme */
                Config::push('base.middleware.frontend', $middleware . ':' . $themeName);
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

    /**
     * Register theme Frontend
     *
     * @return void
     */
    protected function registerTheme()
    {
        $this->app->singleton(ThemeContract::class, function ($app) {
            return new ThemeManager(
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

    /**
     * Load additional Aliases
     *
     * @return void
     */
    protected function registerFacadeAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->facadeAliases as $alias => $facade) {
            $loader->alias($alias, $facade);
        }
    }
}
