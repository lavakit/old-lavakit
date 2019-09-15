<?php

namespace Lavakit\Translation\Services\Transformers;

use Illuminate\Http\Resources\Json\Resource;

/**
 * Class Transformer
 * @package Lavakit\Translation\Services\Transformers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Transformer extends Resource
{
    /**
     * @param $request
     * @return mixed
     */
    public function toArray($request)
    {
        echo __LINE__ . ' - ' . __METHOD__ . ' - ' . __FILE__;
        echo die;
    }
}
