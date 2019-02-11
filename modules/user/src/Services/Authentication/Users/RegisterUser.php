<?php

namespace Inspire\User\Services\Authentication\Users;

use Illuminate\Http\Request;

/**
 * Class RegisterUser
 * @package Inspire\User\Services\Authentication\Users
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class RegisterUser
{
    public function register(Request $request)
    {
        echo'<pre>';
            print_r($request->all());
        echo'</pre>';
    }
}
