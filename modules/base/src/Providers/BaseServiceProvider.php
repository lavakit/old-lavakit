<?php

namespace Inspire\Base\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Inspire\Base\Facades\PageTitleFacade;
use Inspire\Acl\Providers\AclServiceProvider;
use Inspire\Base\Traits\CanPublishConfiguration;
use Inspire\Posts\Providers\PostsServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

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
        /*Load Services on Lucky*/
        $this->app->register(AclServiceProvider::class);
        $this->app->register(PostsServiceProvider::class);


        //Enviroment local
        if ($this->app->environment() == 'local') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        /*Load Config*/
        $this->publishConfig('base', 'base');

        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'base');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'base');


        if (app()->runningInConsole()) {

            /*Load migrations*/
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([
                __DIR__ . '/../../resources/assets' => resource_path('assets'),
                __DIR__ . '/../../resources/public' => public_path(),], 'assets'
            );
            $this->publishes([__DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/base',], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/base'),], 'lang');
            $this->publishes([__DIR__ . '/../../database' => base_path('database'),], 'migrations');
            $this->publishes([__DIR__ . '/../../config/base.php' => config_path('base.php')], 'config');
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

        //Register aliases
        $this->registerFacadeAliases();

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(BootstrapModuleServiceProvider::class);

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
     * Load additional Aliases
     */
    public function registerFacadeAliases() {
        $loader = AliasLoader::getInstance();
        foreach ($this->facadeAliases as $alias => $facade) {
            $loader->alias($alias, $facade);
        }
    }
}
