<?php

namespace Inspire\User\Services\Authentication\Users;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Inspire\User\Contracts\AuthenticationContract;

/**
 * Class Login
 * @package Inspire\User\Services\Authentication\Users
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Login
{
    use AuthenticatesUsers;

    public function handler(Request $request)
    {
        echo'<pre>';
            print_r($request->all());
        echo'</pre>';
    }
}
