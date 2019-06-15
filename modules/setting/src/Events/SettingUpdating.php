<?php

namespace Lavakit\Setting\Events;

use Lavakit\Setting\Models\Setting;

/**
 * Class SettingUpdating
 * @package Lavakit\Setting\Events
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingUpdating
{
    private $name;
    private $values;
    private $original;
    
    /** @var Setting */
    private $setting;
    
    /**
     * SettingUpdated constructor.
     * @param Setting $setting
     * @param $name
     * @param $group
     * @param $values
     */
    public function __construct(Setting $setting, $name, $values)
    {
        $this->name = $name;
        $this->values = $values;
        $this->original = $values;
        $this->setting = $setting;
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
