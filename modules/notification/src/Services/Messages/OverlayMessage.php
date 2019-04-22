<?php

namespace Lavakit\Notification\Services\Messages;

/**
 * Class OverlayMessage
 * @package Lavakit\Notification\Services\Messages
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class OverlayMessage extends \Lavakit\Notification\Foundation\Messages\Message
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
