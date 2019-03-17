<?php

namespace Inspire\Notification\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Notification\Contracts\Messages\Message;

/**
 * Class MessageFacade
 * @package Inspire\Notification\Facades
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class MessageFacade extends Facade
{
    /**
     * @return string
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected static function getFacadeAccessor()
    {
        return Message::class;
    }
}
