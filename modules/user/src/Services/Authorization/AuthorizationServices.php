<?php

namespace Lavakit\User\Services\Authorization;

use Illuminate\Http\Request;
use Lavakit\User\Contracts\AuthorizationContract;
use Lavakit\User\Services\Authorization\Users\Login;
use Lavakit\User\Services\Authorization\Users\Logout;
use Lavakit\User\Services\Authorization\Users\User;

/**
 * Class AuthorizationServices
 * @package Lavakit\User\Services\Authorization
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class AuthorizationServices implements AuthorizationContract
{
    /**
     * Authenticate a user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function login(Request $request)
    {
        return app(Login::class)->handle($request);
    }

    /**
     * Register a new user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function register(Request $request)
    {
        // TODO: Implement register() method.
    }

    /**
     * Confirmation
     *
     * @param string $email
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function confirm(string $email = null)
    {
        // TODO: Implement confirm() method.
    }

    /**
     * Reset password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function reset(Request $request)
    {
        // TODO: Implement reset() method.
    }

    /**
     * Forgot password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function forgot(Request $request)
    {
        // TODO: Implement forgot() method.
    }

    /**
     * Logout the user of the application
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed|\Symfony\Component\HttpFoundation\Response
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function logout(Request $request)
    {
        return app(Logout::class)->handle($request);
    }

    /**
     * Check if the user has been confirmed
     *
     * @param object $user
     * @return bool
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function hasConfirmed(object $user): bool
    {
        // TODO: Implement hasConfirmed() method.
    }

    /**
     * Get the user detail
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function user(Request $request)
    {
        return app(User::class)->handle($request);
    }
}
