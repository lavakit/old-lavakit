<?php

namespace Inspire\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Base\Supports\Title;

/**
 * Class TitleFacade
 * @package Inspire\Base\Facades
 * @copyright 2018 Inspire Group
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
