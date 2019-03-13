<?php

namespace Inspire\Notification\Services\FlashMessages\Toast;

use Inspire\Notification\Services\FlashMessages\Abstracts\FlashMessageAbstract;

/**
 * Class FlashMessage
 * @package Inspire\Notification\Services\FlashMessages\Toast
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class FlashMessage extends FlashMessageAbstract
{
    /**
     * FlashMessage constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->messages = collect();

        $this->configure($config);
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
        $this->messages = collect();
    }
}
