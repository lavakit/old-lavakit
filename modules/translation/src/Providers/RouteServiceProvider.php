<?php

namespace Lavakit\Translation\Providers;

use Lavakit\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Lavakit\Translation\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class RouteServiceProvider extends BaseRoutingServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $namespace = 'Lavakit\Translation\Http\Controllers';

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
        return __DIR__ . '/../../routes/backend.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        return false;
    }

}
