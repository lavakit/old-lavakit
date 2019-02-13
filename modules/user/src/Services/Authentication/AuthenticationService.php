<?php

namespace Inspire\User\Services\Authentication;

use Illuminate\Http\Request;
use Inspire\User\Contracts\AuthenticationContract;
use Inspire\User\Services\Authentication\Users\Confirm;
use Inspire\User\Services\Authentication\Users\Login;
use Inspire\User\Services\Authentication\Users\Register;

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
     * @param $request
     * @return mixed
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
        // TODO: Implement reset() method.
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
        // TODO: Implement forgot() method.
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
        // TODO: Implement logout() method.
    }

}
