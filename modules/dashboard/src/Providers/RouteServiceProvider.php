<?php

namespace Inspire\Dashboard\Providers;

use Inspire\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

class RouteServiceProvider extends BaseRoutingServiceProvider
{
    protected $namespace = 'Inspire\Dashboard\Http\Controllers';

    protected function getFrontendRoute()
    {
        return false;
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
        return false;
    }
}
