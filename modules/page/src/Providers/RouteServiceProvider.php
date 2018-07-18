<?php

namespace Inspire\Page\Providers;

use Inspire\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

class RouteServiceProvider extends BaseRoutingServiceProvider
{
    protected $namespace = 'Inspire\Page\Http\Controllers';


    protected function getFrontendRoute()
    {
        require __DIR__ . '/../../routes/web.php';
    }

    /**
     * @return string
     */
    protected function getBackendRoute()
    {
        require __DIR__ . '/../../routes/web.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        require __DIR__ . '/../../routes/api.php';
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */

    /*
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web'],
            'namespace' => $this->namespace,
            'prefix' => LaravelLocalization::setLocale(),
        ], function ($router) {
            require __DIR__ . '/../../routes/web.php';
        });
    }
    */

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    /*
    protected function mapApiRoutes()
    {
        Route::group([
             'middleware' => 'api',
             'namespace' => $this->namespace,
             'prefix' => 'api'
         ], function ($router) {
            require __DIR__ . '/../../routes/api.php';
        });
    }
    */
}
