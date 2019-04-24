<?php

namespace Lavakit\Notification\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Notification\Contracts\Messages\Message;

/**
 * Class MessageFacade
 * @package Lavakit\Notification\Facades
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class MessageFacade extends Facade
{
    /**
     * @return string
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected static function getFacadeAccessor()
    {
        return Message::class;
    }
}
