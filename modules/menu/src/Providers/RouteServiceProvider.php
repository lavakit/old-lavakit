<?php

namespace Lavakit\Menu\Providers;

use Lavakit\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Lavakit\Menu\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteServiceProvider extends BaseRoutingServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'Lavakit\Menu\Http\Controllers';

    /**
     * @return string
     */
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
