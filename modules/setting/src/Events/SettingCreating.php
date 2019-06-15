<?php

namespace Lavakit\Setting\Events;

/**
 * Class SettingCreating
 * @package Lavakit\Setting\Events
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingCreating
{
    private $name;
    private $values;
    private $original;
    
    /**
     * SettingUpdated constructor.
     * @param $name
     * @param $group
     * @param $values
     */
    public function __construct($name, $values)
    {
        $this->name = $name;
        $this->values = $values;
        $this->original = $values;
    }
    
    /**
     * @param $name
     * @param $value
     * @return mixed
     * @throws \Exception
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            return $this->$name = $value;
        }
        
        throw new \Exception('Error! The property dose not exits');
    }
    
    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    
        throw new \Exception('Error! The property dose not exits');
    }
}
