<?php

namespace Inspire\Notification\Services\FlashMessages\Abstracts;

use Inspire\Notification\Services\FlashMessages\Contracts\FlashMessageContract;

/**
 * Class FlashMessage
 * @package Inspire\Notification\Services\FlashMessages
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class FlashMessage implements FlashMessageContract
{
    /** @var array $config */
    protected $config = [
        'driver' => 'toast_js'
    ];

    /**
     * FlashMessage constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->configure($config);
    }

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
     * Empty the flash message collection.
     *
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    abstract public function clear();
    
    /**
     * Flash the flash message collection to the session
     *
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    protected function flash()
    {
        app()->session->flash('flash_message');
    }
}
