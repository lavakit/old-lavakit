<?php

namespace Inspire\Notification\Services\FlashMessages\Abstracts;

/**
 * Class EncoderAbstracts
 * @package Inspire\Notification\Services\FlashMessages\Abstracts
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class EncoderAbstracts
{
    public function process(string $message, string $format)
    {
        echo __CLASS__ . '-' . __LINE__;
        die;
    }
}