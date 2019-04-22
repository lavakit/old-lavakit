<?php

namespace Lavakit\User\Services\Authorization;

use Illuminate\Http\Request;
use Lavakit\User\Contracts\AuthorizationContract;
use Lavakit\User\Services\Authorization\Users\Confirm;
use Lavakit\User\Services\Authorization\Users\FindToken;
use Lavakit\User\Services\Authorization\Users\Forgot;
use Lavakit\User\Services\Authorization\Users\Login;
use Lavakit\User\Services\Authorization\Users\Logout;
use Lavakit\User\Services\Authorization\Users\Register;
use Lavakit\User\Services\Authorization\Users\Reset;
use Lavakit\User\Services\Authorization\Users\User;

/**
 * Class AuthorizationServices
 * @package Lavakit\User\Services\Authorization
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AuthorizationServices implements AuthorizationContract
{
    /**
     * Authenticate a user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function login(Request $request)
    {
        return app(Login::class)->handler($request);
    }

    /**
     * Register a new user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function register(Request $request)
    {
        return app(Register::class)->handler($request);
    }

    /**
     * Confirmation
     *
     * @param string $token
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function confirm(string $token)
    {
        return app(Confirm::class)->handler($token);
    }

    /**
     * Reset password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function reset(Request $request)
    {
        return app(Reset::class)->handler($request);
    }

    /**
     * Forgot password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function forgot(Request $request)
    {
        return app(Forgot::class)->handler($request);
    }

    /**
     * Logout the user of the application
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed|\Symfony\Component\HttpFoundation\Response
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function logout(Request $request)
    {
        return app(Logout::class)->handler($request);
    }
    
    /**
     * Get the user detail
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function user(Request $request)
    {
        return app(User::class)->handler($request);
    }
    
    /**
     * Find token
     *
     * @param $token
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function findToken($token)
    {
        return app(FindToken::class)->handler($token);
    }
}
