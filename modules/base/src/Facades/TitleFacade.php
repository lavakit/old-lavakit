<?php

namespace Lavakit\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Base\Supports\Title;

/**
 * Class TitleFacade
 * @package Lavakit\Base\Facades
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class TitleFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Title::class;
    }
}
