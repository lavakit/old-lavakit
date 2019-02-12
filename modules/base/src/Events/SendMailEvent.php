<?php

namespace Inspire\Base\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class SendMailEvent
 * @package Inspire\Base\Events
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class SendMailEvent
{
    use SerializesModels;

    /** @var string */
    public $subject;

    /** @var string */
    public $body;

    /** @var array */
    public $args;

    /**
     * SendMailEvent constructor.
     * @param string $subject
     * @param string $body
     * @param array $args
     */
    public function __construct(string $subject, string $body, array $args = [])
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->args = $args;
    }

    /**
     * Get the channels the event should be broadcast on
     *
     * @return array
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function broadcastOn()
    {
        return [];
    }
}
