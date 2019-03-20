<?php

namespace Lavakit\Page\Providers;

use Lavakit\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Lavakit\Page\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteServiceProvider extends BaseRoutingServiceProvider
{
    protected $namespace = 'Lavakit\Page\Http\Controllers';

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
        return false;
    }
}
