<?php

namespace Inspire\Notification\Services\FlashMessages;

use Inspire\Notification\Services\FlashMessages\Abstracts\DriverAbstract;
use Inspire\Notification\Services\FlashMessages\Contracts\FlashMessageManagerContract;
use Inspire\Notification\Services\FlashMessages\Exception\NotSupportedException;

/**
 * Class FlashMessageManager
 * @package Inspire\Notification\Services\FlashMessages
 * @copyright 2019 LUCY VN
 * @author Pencii Team <hoatq@lucy.ne.jp>
 */
class FlashMessageManager implements FlashMessageManagerContract
{
    /** @var array $config */
    protected $configs = [];
    
    /**
     * FlashMessageManager constructor.
     * @param array $configs
     */
    public function __construct(array $configs = [])
    {
        $this->configure($configs);
    }
    
    /**
     * Overrides configuration settings
     *
     * @param array $configs
     * @return $this
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function configure(array $configs = [])
    {
        $this->configs = array_replace($this->configs, $configs);
        
        return $this;
    }
    
    /**
     * Initiates an flash message
     *
     * @param $message
     * @return mixed
     * @throws Exception\NotReadableException
     * @throws NotSupportedException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function make($message)
    {
        return $this->createDriver()->init($message);
    }
    
    /**
     * Creates a driver instance according to config settings
     *
     * @return DriverAbstract
     * @throws NotSupportedException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function createDriver()
    {
        if (is_string($this->configs['driver'])) {
            $name = ucfirst($this->configs['driver']);
            $class = sprintf('Inspire\\Notification\\Services\\FlashMessages\\%s\\Driver', $name);
            
            if (class_exists($class)) {
                return new $class;
            }
    
            throw new NotSupportedException(
                "Driver ({$class}) could not be instantiated"
            );
        }
        
        if ($this->configs['driver'] instanceof DriverAbstract) {
            return $this->configs['driver'];
        }
        
        throw new NotSupportedException(
            "Unknown driver type"
        );
    }
}
