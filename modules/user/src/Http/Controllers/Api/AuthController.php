<?php

namespace Lavakit\User\Http\Controllers\Api;

use Lavakit\Base\Http\Controllers\BaseController;
use Lavakit\User\Contracts\AuthorizationContract;
use Lavakit\User\Http\Requests\ForgotRequest;
use Lavakit\User\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Lavakit\User\Http\Requests\RegisterRequest;
use Lavakit\User\Http\Requests\ResetRequest;

/**
 * Class AuthController
 * @package Lavakit\User\Http\Controllers\Api
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AuthController extends BaseController
{
    /** @var AuthorizationContract */
    protected $auth;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth = app(AuthorizationContract::class);
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function login(LoginRequest $request)
    {
        return $this->auth->login($request);
    }

    /**
     * Registration request for the application
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Support\ServiceProvider|mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function register(RegisterRequest $request)
    {
        return $this->auth->register($request);
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
        return $this->auth->confirm($token);
    }

    /**
     * Forgot password
     *
     * @param ForgotRequest $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function forgot(ForgotRequest $request)
    {
        return $this->auth->forgot($request);
    }
    
    /**
     * Find token
     *
     * @param $token
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function findToken($token)
    {
        return $this->auth->findToken($token);
    }

    /**
     * Reset password
     *
     * @param ResetRequest $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function reset(ResetRequest $request)
    {
        return $this->auth->reset($request);
    }

    /**
     * Get current user information by request
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getUser(Request $request)
    {
        return $this->auth->user($request);
    }

    /**
     * Logout
     *
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function logout(Request $request)
    {
        return $this->auth->logout($request);
    }
}
