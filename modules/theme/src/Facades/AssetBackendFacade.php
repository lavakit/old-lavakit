<?php

namespace Inspire\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Theme\Contracts\Assets\Backend as BackendContract;

/**
 * Class AssetBackendFacade
 * @package Inspire\Theme\Facades
 * @copyright 2018 Inspire Group
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
