<?php

namespace Lavakit\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Theme\Contracts\Assets\Frontend as FrontendContract;

/**
 * Class AssetContract
 * @package Lavakit\Theme\Facades
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AssetFrontendFacade extends Facade
{
    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected static function getFacadeAccessor()
    {
        return FrontendContract::class;
    }
}
