<?php

namespace Inspire\Notification\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Notification\Services\FlashMessages\Contracts\FlashMessageManagerContract;

/**
 * Class FlashMessageFacade
 * @package Inspire\Notification\Facades
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class FlashMessageFacade extends Facade
{
    /**
     * @return string
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected static function getFacadeAccessor()
    {
        return FlashMessageManagerContract::class;
    }
}
