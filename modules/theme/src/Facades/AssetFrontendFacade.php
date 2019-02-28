<?php

namespace Inspire\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Theme\Contracts\Assets\Frontend as FrontendContract;

/**
 * Class AssetContract
 * @package Inspire\Theme\Facades
 * @copyright 2018 Inspire Group
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
