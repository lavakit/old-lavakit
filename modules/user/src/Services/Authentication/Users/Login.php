<?php

namespace Inspire\User\Services\Authentication\Users;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Inspire\User\Contracts\AuthenticationContract;

class LoginUser
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        echo'<pre>';
            print_r($request->all());
        echo'</pre>';
    }
}
