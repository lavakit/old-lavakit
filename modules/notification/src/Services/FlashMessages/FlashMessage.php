<?php

namespace Inspire\Notification\Services\FlashMessages;

use Inspire\Notification\Services\FlashMessages\Abstracts\DriverAbstract;
use Inspire\Notification\Services\FlashMessages\Abstracts\FlashMessageAbstract;

/**
 * Class FlashMessage
 * @package Inspire\Notification\Services\FlashMessages
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class FlashMessage extends FlashMessageAbstract
{
    /**
     * Instance of current Flash Message driver
     *
     * @var DriverAbstract
     */
    protected $driver;
    
    /**
     * Flash message of current driver processor
     *
     * @var mixed
     */
    protected $core;
    
    /**
     * FlashMessage constructor.
     * @param DriverAbstract $driver
     * @param null $core
     */
    public function __construct(DriverAbstract $driver, $core = null)
    {
        $this->driver = $driver;
        $this->core = $core;
    }
    
    /**
     * @param null $format
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function encode($format = null)
    {
        return $this->driver->encode($this, $format);
    }
    
    /**
     * Creates a general flash message.
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function message()
    {
        $this->flash();
    }
    
    
    /**
     * Empty the flash message collection.
     *
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function clear()
    {
        //
    }
}
