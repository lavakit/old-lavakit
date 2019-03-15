<?php

namespace Inspire\Notification\Services\FlashMessages\Contracts;

/**
 * Class FlashMessageManagerContract
 * @package Inspire\Notification\Services\FlashMessages\Contracts
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
interface FlashMessageManagerContract
{
    
    /**
     * Overrides configuration settings
     *
     * @param array $configs
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function configure(array $configs = []);
    
    /**
     * Initiates an Image instance from different input types
     *
     * @param $data
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function make($data);
}
