<?php

namespace Inspire\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Theme\Contracts\Themes\Frontend as ThemeFrontendContract;

/**
 * Class ThemeFrontendFacade
 * @package Inspire\Theme\Facades
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ThemeFrontendFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ThemeFrontendContract::class;
    }
}
