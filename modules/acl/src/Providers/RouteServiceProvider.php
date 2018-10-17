<?php

namespace Inspire\Acl\Providers;

use Inspire\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Inspire\Acl\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteServiceProvider extends BaseRoutingServiceProvider
{
    protected $namespace = 'Inspire\Acl\Http\Controllers';

    protected function getFrontendRoute()
    {
        return false;
    }

    protected function getBackendRoute()
    {
        return __DIR__ . '/../../routes/backendRoutes.php';
    }

    protected function getApiRoute()
    {
        return false;
    }
}
