<?php

namespace Inspire\Notification\Services\FlashMessages\Abstracts;

/**
 * Class DriverAbstract
 * @package Inspire\Notification\Services\FlashMessages\Abstracts
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class DriverAbstract
{
    /**
     * Decoder instance to init flash message from
     *
     * @var \Inspire\Notification\Services\FlashMessages\Abstracts\DecoderAbstract
     */
    protected $decoder;
    
    /**
     * Encoder instance to init flash message from
     *
     * @var EncoderAbstracts
     */
    protected $encoder;
    
    /**
     * Initiates new flash message from
     *
     * @param $message
     * @return mixed
     * @throws \Inspire\Notification\Services\FlashMessages\Exception\NotReadableException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function init($message)
    {
        return $this->decoder->init($message);
    }
    
    /**
     * Encodes given flash message
     *
     * @param $message
     * @param $format
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function encode($message, $format)
    {
        return $this->encoder->process($message, $format);
    }
}
