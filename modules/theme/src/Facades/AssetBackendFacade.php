<?php

namespace Lavakit\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Theme\Contracts\Assets\Backend as BackendContract;

/**
 * Class AssetBackendFacade
 * @package Lavakit\Theme\Facades
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AssetBackendFacade extends Facade
{
    /**
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected static function getFacadeAccessor()
    {
        return BackendContract::class;
    }
}
