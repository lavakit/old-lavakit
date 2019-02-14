<?php

namespace Inspire\User\Services\Authentication;

use Illuminate\Http\Request;
use Inspire\User\Contracts\AuthenticationContract;
use Inspire\User\Services\Authentication\Users\Confirm;
use Inspire\User\Services\Authentication\Users\Forgot;
use Inspire\User\Services\Authentication\Users\Login;
use Inspire\User\Services\Authentication\Users\Logout;
use Inspire\User\Services\Authentication\Users\Register;
use Inspire\User\Services\Authentication\Users\Reset;

/**
 * Class AuthenticationService
 * @package Inspire\User\Services\Authentication
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class AuthenticationService implements AuthenticationContract
{
    /**
     * Authenticate a user
     *
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
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
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function register(Request $request)
    {
        return app(Register::class)->handler($request);
    }

    /**
     * @param string $email
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function confirm(string $email = null)
    {
        return app(Confirm::class)->handler($email);
    }

    /**
     * Reset password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
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
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function forgot(Request $request)
    {
        return app(Forgot::class)->handler($request);
    }

    /**
     * Logout the user of the application
     *
     * @param array $args
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function logout(array $args = [])
    {
        return app(Logout::class)->handler($args);
    }

    /**
     * Check if the user has been confirmed
     *
     * @param object $user
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function hasConfirmed(object $user): bool
    {
        if (!$user->confirmed) {
            return false;
        }

        return true;
    }
}
