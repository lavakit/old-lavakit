<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Http\Request;

/**
 * Class Reset
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 LUCY VN
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Reset
{
    public function handler(Request $request)
    {
        echo __CLASS__ . ' - ' . __METHOD__ . ' - ' . __LINE__;
        die;
    }
}
