<?php

namespace Lavakit\Notification\Services\Messages;

use Lavakit\Notification\Foundation\Messages\MessageAbstract;

/**
 * Class Message
 * @package Lavakit\Notification\Services\Messages
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Message extends MessageAbstract
{
    /**
     * Flash an overlay modal
     *
     * @param string|null $message
     * @param string $title
     * @return Message|mixed
     */
    public function overlay(string $message = null, $title = 'Notice')
    {
        if (is_null($message)) {
            return $this->updateLastMessage(['title' => $title, 'overlay' => true]);
        }

        return $this->message(
            new OverlayMessage(compact('message', 'title'))
        );
    }

    /**
     * Flash all messages to the session
     *
     * @return $this
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function flash()
    {
        $this->session->flash(self::NOTIFICATION_KEY, $this->messages);

        return $this;
    }

    /**
     * Modify the most recently added message
     *
     * @param array $overrides
     * @return $this
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function updateLastMessage(array $overrides = [])
    {
        $this->messages->last()->update($overrides);

        return $this;
    }
}
