<?php

namespace Lavakit\Notification\Foundation\Messages;

/**
 * Class Message
 * @package Lavakit\Notification\Services\Messages
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Message implements \ArrayAccess
{
    /**
     * Title of the flash message
     *
     * @var string
     */
    public $title;

    /**
     * Content if the flash message
     *
     * @var string
     */
    public $message;

    /**
     * The "level" of the notification (info, success, warning, error).
     *
     * @var string
     */
    public $level;

    /**
     * Whether the message should auto-hide or not
     * @var bool
     */
    public $autohide = true;

    /**
     *  Whether the message is an overlay
     * @var bool
     */
    public $overlay = false;

    /**
     * Message constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->update($attributes);
    }

    /**
     * Update the attributes.
     *
     * @param array $attributes
     * @return $this
     */
    public function update(array $attributes = [])
    {
        $attributes = array_filter($attributes);

        foreach ($attributes as $key => $attribute) {
            $this->$key = $attribute;
        }

        return $this;
    }

    /**
     * Whether the given offset exists
     *
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * Fetch the offset
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * Assign the offset.
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**Unset the offset.
     *
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        //
    }
}
