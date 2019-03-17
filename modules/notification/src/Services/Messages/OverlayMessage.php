<?php

namespace Inspire\Notification\Services\Messages;

/**
 * Class OverlayMessage
 * @package Inspire\Notification\Services\Messages
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class OverlayMessage extends \Inspire\Notification\Foundation\Messages\Message
{
    /**
     * The title of the message.
     *
     * @var string
     */
    public $title = 'Notice';

    /**
     * Whether the message is an overlay.
     *
     * @var bool
     */
    public $overlay = true;
}
