<?php

namespace Inspire\Theme\Services\Breadcrumbs\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Theme\Services\Breadcrumbs\Foundation\Breadcrumbs as BreadcrumbsContract;

/**
 * Class Breadcrumbs
 * @package Inspire\Theme\Services\Breadcrumbs\Facades
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Breadcrumbs extends Facade
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
