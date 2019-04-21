<?php

namespace Lavakit\User\Contracts;

use Illuminate\Http\Request;

/**
 * Interface AuthorizationContract
 * @package Lavakit\User\Contracts
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
interface AuthorizationContract
{
    /**
     * Authenticate a user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function login(Request $request);

    /**
     * Register a new user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function register(Request $request);

    /**
     * Confirmation
     *
     * @param string $email
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function confirm(string $email = null);

    /**
     * Reset password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function reset(Request $request);

    /**
     * Forgot password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function forgot(Request $request);

    /**
     * Logout the user of the application
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function logout(Request $request);

    /**
     * Check if the user has been confirmed
     *
     * @param object $user
     * @return bool
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function hasConfirmed(object $user): bool;

    /**
     * Get the user detail
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function user(Request $request);
}
