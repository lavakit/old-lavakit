<?php

namespace Lavakit\User\Http\Controllers\Api;

use Carbon\Carbon;
use Lavakit\Base\Http\Controllers\BaseController;
use Lavakit\User\Contracts\AuthorizationContract;
use Lavakit\User\Http\Requests\ForgotRequest;
use Lavakit\User\Http\Requests\LoginRequest;
use Lavakit\Base\Services\JsonResponse;
use Illuminate\Http\Request;
use Lavakit\User\Http\Requests\RegisterRequest;

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
     * @author hoatq <tqhoa8th@gmail.com
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
     * @author hoatq <tqhoa8th@gmail.com
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
     * @author hoatq <tqhoa8th@gmail.com
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
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function forgot(ForgotRequest $request)
    {
        return $this->auth->forgot($request);
    }

    /**
     * @param Request $request
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getUser(Request $request)
    {
        return $this->auth->user($request);
    }

    /**
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
