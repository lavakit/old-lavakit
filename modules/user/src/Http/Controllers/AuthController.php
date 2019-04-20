<?php

namespace Lavakit\User\Http\Controllers;

use Lavakit\Base\Http\Controllers\BaseController;
use Lavakit\User\Contracts\AuthenticationContract;
use Lavakit\User\Http\Requests\ForgotRequest;
use Lavakit\User\Http\Requests\RegisterRequest;
use Lavakit\User\Http\Requests\ResetRequest;

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

    /** @var AuthenticationContract */
    protected $auth;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth = app(AuthenticationContract::class);
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
     * Registration request for the application
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Support\ServiceProvider|mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function register(RegisterRequest $request)
    {
        return $this->auth->register($request);
    }

    /**
     * Confirmation
     *
     * @param string|null $email
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function confirm(string $email = null)
    {
        return $this->auth->confirm($email);
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
     * Forgot password
     *
     * @param ForgotRequest $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function forgot(ForgotRequest $request)
    {
        return $this->auth->forgot($request);
    }

    /**
     * Get the view reset password
     *
     * @param string|null $email
     * @param string|null $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getReset(string $email = null, string $token = null)
    {
        if (is_null($email)) {
            return redirect()->route('login');
        }

        if (is_null($token)) {
            return redirect()->route('forgot');
        }

        title()->set('Reset-Password');
        $email = base64_decode($email);

        return view('user::auth.reset', compact('token', 'email'));
    }

    /**
     * Reset password
     *
     * @param ResetRequest $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function reset(ResetRequest $request)
    {
        return $this->auth->reset($request);
    }

    /**
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function logout()
    {
        return $this->auth->logout();
    }
}
