<?php

namespace Inspire\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Base\Supports\PageTitle;

/**
 * Class PageTitleFacade
 * @package Inspire\Base\Facades
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class PageTitleFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PageTitle::class;
    }
}
