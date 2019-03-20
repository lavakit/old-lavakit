<?php

namespace Lavakit\Notification\Contracts\Messages;

/**
 * Interface Message
 * @package Lavakit\Notification\Contracts\Messages
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
interface Message
{
    /**
     * Flash message key to the session
     *
     * @var string
     */
    const NOTIFICATION_KEY = 'flash-notification';
    /**
     * Creates a success level flash message
     *
     * @param string|null $message
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function success(string $message = null);

    /**
     * Creates a info level flash message
     *
     * @param string|null $message
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function info(string $message = null);

    /**
     * Creates a error level flash message
     *
     * @param string|null $message
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function error(string $message = null);

    /**
     * Creates a warning level flash message
     *
     * @param string|null $message
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function warning(string $message = null);

    /**
     * Set the title of a flash message
     *
     * @param string|null $title
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function title(string $title = null);

    /**
     * Creates a general flash message.
     *
     * @param string $message
     * @param string $level
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function message(string $message = null, string $level = 'info');

    /**
     * Add an "important" flash to the session.
     *
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function important();
}
