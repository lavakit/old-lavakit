<?php

namespace Inspire\Notification\Services\FlashMessages\Toast;

use Inspire\Notification\Services\FlashMessages\Abstracts\DecoderAbstract;
use Inspire\Notification\Services\FlashMessages\Exception\NotReadableException;
use Inspire\Notification\Services\FlashMessages\FlashMessage;

/**
 * Class Decoder
 * @package Inspire\Notification\Services\FlashMessages\Toast
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Decoder extends DecoderAbstract
{
    /**
     * Initiates new flash message from Sweet Js
     *
     * @param $resource
     * @return mixed|void
     * @throws NotReadableException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    function initSweet($resource)
    {
        throw new NotReadableException(
            'Toast JS driver is unable to init from Sweet JS'
        );
    }
    
    /**
     * Initiates new flash message from Toast Js
     *
     * @param $resource
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    function initToast($resource)
    {
        return new FlashMessage(new Driver, $resource);
    }
}
