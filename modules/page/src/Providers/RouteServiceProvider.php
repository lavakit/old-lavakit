<?php

namespace Inspire\Page\Providers;

use Inspire\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

class RouteServiceProvider extends BaseRoutingServiceProvider
{
    protected $namespace = 'Inspire\Page\Http\Controllers';

    protected function getFrontendRoute()
    {
        return __DIR__ . '/../../routes/web.php';
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
