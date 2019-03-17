<?php

if (!function_exists('flash')) {
    /**
     * Initialize for a flash message
     *
     * @return \Inspire\Notification\Services\Messages\Message
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    function flash()
    {
        return \Inspire\Notification\Facades\MessageFacade::getFacadeRoot();
    }
}
