<?php

namespace Inspire\Menu\Providers;

use Inspire\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Inspire\Menu\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteServiceProvider extends BaseRoutingServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'Inspire\Menu\Http\Controllers';

    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getFrontendRoute()
    {
        return __DIR__ . '/../../routes/frontendRoutes.php';
    }

    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getBackendRoute()
    {
        return __DIR__ . '/../../routes/backendRoutes.php';
    }

    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getApiRoute()
    {
        return false;
    }
}
