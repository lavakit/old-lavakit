<?php

namespace Lavakit\User\Http\Controllers;

use Lavakit\Base\Http\Controllers\BaseController;

/**
 * Class AuthController
 * @package Lavakit\User\Http\Controllers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AuthController extends BaseController
{
    /** @var string */
    protected $module = 'user';

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the view login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2018 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getLogin()
    {
        title()->set('Login-Authenticate');

        return view('user::auth.login');
    }

    /**
     * Show the view register page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getRegister()
    {
        title()->set('Register-Authenticate');

        return view('user::auth.register');
    }

    /**
     * Get the view forgot password
     *
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getForgot()
    {
        title()->set('Forgot-Password');

        return view('user::auth.forgot');
    }

    /**
     * Get the view reset password
     *
     * @param string|null $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getReset(string $token)
    {
        title()->set('Reset-Password');

        return view('user::auth.reset');
    }
}
