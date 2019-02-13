<?php

namespace Inspire\User\Contracts;

use Illuminate\Http\Request;

/**
 * Interface AuthenticationContract
 * @package Inspire\User\Contracts
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
interface AuthenticationContract
{
    /**
     * Authenticate a user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function login(Request $request);

    /**
     * Register a new user
     *
     * @param $request
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function register(Request $request);

    /**
     * Confirmation
     *
     * @param string $email
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function confirm(string $email = null);

    /**
     * Reset password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function reset(Request $request);

    /**
     * Forgot password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function forgot(Request $request);

    /**
     * Logout the user of the application
     *
     * @param array $args
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function logout(array $args = []);
}
