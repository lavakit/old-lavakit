<?php

namespace Inspire\Notification\Services\FlashMessages\Toast;

use Inspire\Notification\Services\FlashMessages\Abstracts\DriverAbstract;

/**
 * Class Driver
 * @package Inspire\Notification\Services\FlashMessages\Toast
 * @copyright 2019 LUCY VN
 * @author Pencii Team <hoatq@lucy.ne.jp>
 */
class Driver extends DriverAbstract
{
    /**
     * Driver constructor.
     * @param Decoder|null $decoder
     * @param Encoder|null $encoder
     */
    public function __construct(Decoder $decoder = null, Encoder $encoder = null)
    {
        $this->decoder = $decoder ?? new Decoder;
        $this->encoder = $encoder ?? new Encoder;
    }
}
