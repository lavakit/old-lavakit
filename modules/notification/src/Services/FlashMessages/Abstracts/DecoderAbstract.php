<?php

namespace Inspire\Notification\Services\FlashMessages\Abstracts;

use Inspire\Notification\Services\FlashMessages\Exception\NotReadableException;

/**
 * Class DecoderAbstract
 * @package Inspire\Notification\Services\FlashMessages\Abstracts
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class DecoderAbstract
{
    /** @var string The message data */
    protected $message;
    
    /**
     * DecoderAbstract constructor.
     * @param string|null $message
     */
    public function __construct($message = null)
    {
        $this->message = $message;
    }
    
    /**
     * Initiates new flash message from Sweet Js
     *
     * @param $resource
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    abstract function initSweet($resource);
    
    
    /**
     * Initiates new flash message from Toast Js
     *
     * @param $resource
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    abstract function initToast($resource);
    
    /**
     * Initiates new flash message from mixed data
     *
     * @param $message
     * @return mixed
     * @throws NotReadableException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function init($message)
    {
        switch (true) {
            case $this->isSweet():
                return $this->initSweet($message);
                
            case $this->isToast():
                return $this->initToast($message);
                
            default:
                throw new NotReadableException(
                    "Flash message not readable"
                );
        }
    }
    
    /**
     * Determines if current driver is Sweet
     *
     * @return bool
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    private function isSweet()
    {
        if (!$this->availableDriver($this->getDriver())) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Determines if current driver is Toast
     *
     * @return bool
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    private function isToast()
    {
        return true;
    }
    
    private function availableDriver(string $driver)
    {
        $class = sprintf();
    }
    
    /**
     * @return string
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    private function getDriver()
    {
        return config('notification::flash.driver');
    }
}
