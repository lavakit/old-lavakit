<?php

namespace Inspire\Post\Providers;

use Inspire\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

class RouteServiceProvider extends BaseRoutingServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     * @var string
     */
    protected $namespace = 'Inspire\Post\Http\Controllers';

    /**
     * @return string
     */
    protected function getFrontendRoute()
    {
        return __DIR__ . '/../../routes/frontendRoutes.php';
    }

    /**
     * @return string
     */
    protected function getBackendRoute()
    {
        return __DIR__ . '/../../routes/backendRoutes.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        return __DIR__ . '/../../routes/apiRoutes.php';
    }
}
