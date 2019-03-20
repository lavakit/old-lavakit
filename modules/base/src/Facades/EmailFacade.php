<?php

namespace Lavakit\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Base\Services\Emails\EmailHandler;

/**
 * Class EmailFacade
 * @package Lavakit\Base\Facades
 * @copyright 2019 Lavakit Group
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
