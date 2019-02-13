<?php

namespace Inspire\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Base\Services\Emails\EmailHandler;

/**
 * Class EmailFacade
 * @package Inspire\Base\Facades
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class EmailFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return EmailHandler::class;
    }
}
