<?php

namespace Inspire\User\Http\Controllers;

use Inspire\Base\Http\Controllers\BaseController;
use AssetBackend;
use Inspire\User\Contracts\AuthenticationContract;
use Inspire\User\Http\Requests\LoginRequest;
use Inspire\User\Http\Requests\RegisterRequest;

/**
 * Class AuthController
 * @package Inspire\User\Http\Controllers
 * @copyright 2019 Inspire Group
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

        AssetBackend::onlyStylesheets(['bootstrap', 'iconkit', 'core']);
        AssetBackend::onlyJavascript(['jquery', 'bootstrap']);
        AssetBackend::addAppModule(['auth']);
    }

    /**
     * Show the view login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2018 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getLogin()
    {
        title()->set('Login-Authenticate');

        return view('user::auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function login(LoginRequest $request)
    {
        return $this->auth->login($request);
    }

    /**
     * Show the view register page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Inspire Group
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
     * @copyright 2019 Inspire Group
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
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function confirm(string $email = null)
    {
        return $this->auth->confirm($email);
    }
}
