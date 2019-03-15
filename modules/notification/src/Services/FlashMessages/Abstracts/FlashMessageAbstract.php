<?php

namespace Inspire\Notification\Services\FlashMessages\Abstracts;

use Inspire\Notification\Services\FlashMessages\Contracts\FlashMessageContract;
use Inspire\Notification\Services\FlashMessages\Toast\Message;

/**
 * Class FlashMessage
 * @package Inspire\Notification\Services\FlashMessages
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class FlashMessageAbstract implements FlashMessageContract
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $messages;

    /**
     * Empty the flash message collection.
     *
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    abstract public function clear();
    
    /**
     * Creates a general flash message.
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    abstract public function message();

    /**
     * Creates a success level flash message
     *
     * @param string $message
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function success(string $message)
    {
        $this->message($message, __METHOD__);
    }

    /**
     * Creates a info level flash message
     *
     * @param string $message
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function info(string $message)
    {
        $this->message($message, __METHOD__);
    }

    /**
     * Creates a error level flash message
     *
     * @param string $message
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function error(string $message)
    {
        $this->message($message, __METHOD__);
    }

    /**
     * Creates a warning level flash message
     *
     * @param string $message
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function warning(string $message)
    {
        $this->message($message, __METHOD__);
    }

    /**
     * Set the title of a flash message
     *
     * @param string $title
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function title(string $title)
    {
        $this->updateLastMessage(["title" => $title]);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function hide()
    {
        $this->updateLastMessage(['hide' => false]);

        return $this;
    }

    /**
     * Flash an overlay modal
     *
     * @param string $message
     * @param string $title
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function overlay(string $message, $title = 'Notice')
    {
        // TODO: Implement overlay() method.
    }

    /**
     * Modify the most recently added flash message
     *
     * @param array $overriders
     * @return $this
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function updateLastMessage($overriders = [])
    {
        $this->messages->last()->update($overriders);

        return $this;
    }

    /**
     * Flash the flash message collection to the session
     *
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    protected function flash()
    {
        app()->session->flash('flash_messages', $this->messages);
    }

}
