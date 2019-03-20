<?php

if (!function_exists('flash')) {
    /**
     * Initialize for a flash message
     *
     * @return \Lavakit\Notification\Services\Messages\Message
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    function flash()
    {
        return \Lavakit\Notification\Facades\MessageFacade::getFacadeRoot();
    }
}
