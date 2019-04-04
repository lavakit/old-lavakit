<?php

namespace Lavakit\Theme\Services\Breadcrumbs\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Theme\Services\Breadcrumbs\Foundation\Breadcrumbs as BreadcrumbsContract;

/**
 * Class BreadcrumbsFacade
 * @package Lavakit\Theme\Services\Breadcrumbs\Facades
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class BreadcrumbsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BreadcrumbsContract::class;
    }
}
