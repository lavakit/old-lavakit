<?php

namespace Lavakit\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Theme\Contracts\Themes\Frontend as ThemeFrontendContract;

/**
 * Class ThemeFrontendFacade
 * @package Lavakit\Theme\Facades
 * @copyright 2018 Lavakit Group
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
