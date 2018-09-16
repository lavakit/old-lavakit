<?php

namespace Inspire\Base\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class RoutingServiceProvider
 * @package Inspire\Base\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
abstract class RoutingServiceProvider extends ServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions
     *
     * @var string
     */
    protected $namespace = '';

    /**
     * Define your route model bindings, pattern filters, etc
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    abstract protected function getFrontendRoute();

    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    abstract protected function getBackendRoute();

    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    abstract protected function getApiRoute();

    /**
     * Define the routers for the application
     *
     * @param Router $router
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function (Router $router) {
            $this->loadApiRoutes($router);
        });

        $router->group([
            'namespace' => $this->namespace,
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localizationRedirect', 'web'],
        ], function (Router $router) {
            $this->loadBackendRoutes($router);
            $this->loadFrontendRoutes($router);
        });
    }

    /**
     * @param Router $router
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function loadFrontendRoutes(Router $router)
    {
        $frontend = $this->getFrontendRoute();
        if ($frontend && file_exists($frontend)) {
            $router->group([
                'middleware' => config('base.middleware.frontend', []),
            ], function (Router $router) use ($frontend) {
                require $frontend;
            });
        }
    }

    /**
     * @param Router $router
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function loadBackendRoutes(Router $router)
    {
        $backend = $this->getBackendRoute();

        if ($backend && file_exists($backend)) {
            $router->group([
                'namespace' => 'Admin',
                'prefix' => config('base.admin-prefix'),
                'middleware' => config('base.middleware.backend', []),
            ], function (Router $router) use ($backend) {
                require $backend;
            });
        }
    }

    /**
     * @param Router $router
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function loadApiRoutes(Router $router)
    {
        $api = $this->getApiRoute();

        if ($api && file_exists($api)) {
            $router->group([
                'namespace'     => 'Api',
                'prefix'        => LaravelLocalization::setLocale() . '/api',
                'middleware'    => config('base.middleware.api', [])
            ], function (Router $router) use ($api) {
                require $api;
            });
        }
    }
}
