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
    /** @var array $config */
    protected $config = [];

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
     * Overrides configuration settings
     *
     * @param array $config
     * @return $this
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function configure(array $config = [])
    {
        $this->config = array_replace($this->config, $config);

        return $this;
    }

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
     * Creates a general flash message.
     *
     * @param string $message
     * @param string $level
     * @param string|null $title
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function message(string $message = null, string $level = null, string $title = null)
    {
        $messages = [];

        if (empty($message)) {
            return $this->updateLastMessage(compact('level'));
        }

        if (!$message instanceof Message) {
            $messages = new Message(compact('message', 'level', 'title'));
        }

        $this->messages->push($messages);

        return $this->flash();
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
