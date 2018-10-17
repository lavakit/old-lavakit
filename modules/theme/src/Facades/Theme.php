<?php

namespace Inspire\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Theme\Contracts\ThemeContract;

/**
 * Class Theme
 * @package Inspire\Theme\Facades
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Theme extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ThemeContract::class;
    }
}
