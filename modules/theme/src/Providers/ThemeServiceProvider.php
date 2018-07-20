<?php

namespace Inspire\Theme\Providers;

use App;
use File;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanPublishConfiguration;
use Inspire\Theme\Console\ThemeGeneratorCommand;
use Inspire\Theme\Console\ThemeListCommand;
use Inspire\Theme\Contracts\ThemeContract;
use Inspire\Theme\Managers\Theme;
use Inspire\Theme\Facades\ThemeFacade;

class ThemeServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    const THEME_CREATE_COMMAND  = 'theme.create';
    const THEME_LIST_COMMAND    = 'theme.list';

    /**
     * @var array Facade Aliases
     */
    protected $facadeAliases = [
        'Theme' => ThemeFacade::class
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!File::exists(public_path('Themes')) && config('theme.symlink') && File::exists(config('theme.theme_path'))) {
            App::make('files')->link(config('theme.theme_path'), public_path('Themes'));
        }
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
                $this->app['router']->aliasMiddleware($middleware, '\Inspire\Theme\Middleware\RouteMiddleware:' .$themeName);
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

    protected function registerTheme()
    {
        $this->app->singleton(ThemeContract::class, function ($app) {
            $theme = new Theme($app, $this->app['view']->getFinder(), $this->app['config'], $this->app['translator']);

            return $theme;
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
        $this->commands(
            self::THEME_CREATE_COMMAND,
            self::THEME_LIST_COMMAND
        );
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
    protected function registerFacadeAliases() {
        $loader = AliasLoader::getInstance();
        foreach ($this->facadeAliases as $alias => $facade) {
            $loader->alias($alias, $facade);
        }
    }
}
