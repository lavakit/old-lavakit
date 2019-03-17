<?php

namespace Inspire\Notification\Foundation\Messages;

use Illuminate\Session\Store;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;
use Inspire\Notification\Contracts\Messages\Message as MessageContract;

/**
 * Class MessageAbstract
 * @package Inspire\Notification\Foundation\Messages
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class MessageAbstract implements MessageContract
{
    use Macroable;

    /**
     * The session store
     *
     * @var Store
     */
    protected $session;

    /**
     * The messages collection
     *
     * @var Collection
     */
    public $messages;

    /**
     * Messages constructor.
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->messages = collect();
    }

    /**
     * Creates a success level flash message
     *
     * @param string|null $message
     * @return mixed
     */
    public function success(string $message = null)
    {
        return $this->message($message, __FUNCTION__);
    }

    /**
     * Creates a info level flash message
     *
     * @param string|null $message
     * @return mixed
     */
    public function info(string $message = null)
    {
        return $this->message($message, __FUNCTION__);
    }

    /**
     * Creates a error level flash message
     *
     * @param string|null $message
     * @return mixed
     */
    public function error(string $message = null)
    {
        return $this->message($message, __FUNCTION__);
    }

    /**
     * Creates a warning level flash message
     *
     * @param string|null $message
     * @return mixed
     */
    public function warning(string $message = null)
    {
        return $this->message($message, __FUNCTION__);
}

    /**
     * Set the title of a flash message
     *
     * @param string|null $title
     * @return $this
     */
    public function title(string $title = null)
    {
        $this->updateLastMessage(['title' => $title]);

        return $this;
    }

    /**
     * Creates a general flash message.
     *
     * @param string $message
     * @param string $level
     * @return mixed
     */
    public function message(string $message = null, string $level = 'info')
    {
        if (is_null($message)) {
            return $this->updateLastMessage(compact('level'));
        }

        if (!$message instanceof Message) {
            $message = new Message(compact('message', 'level'));
        }

        $this->messages->push($message);

        return $this->flash();
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return mixed
     */
    public function important()
    {
        $this->messages->last()->autohide = false;

        return $this;
    }

    /**
     * Clear all registered messages.
     *
     * @return $this
     */
    public function clear()
    {
        $this->messages = collect();

        return $this;
    }

    /**
     * Flash an overlay modal
     *
     * @param string $message
     * @param string $title
     * @return mixed
     */
    abstract public function overlay(string $message = null, $title = 'Notice');

    /**
     * Flash all messages to the session
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    abstract protected function flash();

    /**
     * Modify the most recently added message
     *
     * @param array $overrides
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    abstract protected function updateLastMessage(array $overrides = []);
}
