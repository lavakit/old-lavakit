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
     *
     * @OA\Post(
     *         path="/api/auth/login",
     *         tags={"Authentication"},
     *         summary="Login",
     *         description="Login an user",
     *         operationId="login",
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=422,
     *             description="Invalid input"
     *         ),
     *         @OA\Response(
     *             response=401,
     *             description="Wrong combination of email and password or email not been verified"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     *         @OA\RequestBody(
     *             required=true,
     *             @OA\MediaType(
     *                 mediaType="application/x-www-form-urlencoded",
     *                 @OA\Schema(
     *                     type="object",
     *                      @OA\Property(
     *                         property="email",
     *                         description="Email",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="password",
     *                         description="Password",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="remember",
     *                         description="Remember me",
     *                         type="boolean",
     *                     )
     *                 )
     *             )
     *         )
     * )
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
     *
     * @OA\Post(
     *         path="/api/auth/register",
     *         tags={"Authentication"},
     *         summary="Register",
     *         description="Register a new user and send notification mail",
     *         operationId="register",
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=422,
     *             description="Invalid input or email taken"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     *         @OA\RequestBody(
     *             required=true,
     *             @OA\MediaType(
     *                 mediaType="application/x-www-form-urlencoded",
     *                 @OA\Schema(
     *                     type="object",
     *                     @OA\Property(
     *                         property="first_name",
     *                         description="First Name",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="last_name",
     *                         description="Last Name",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         description="Email",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="password",
     *                         description="Password",
     *                         type="string",
     *                         format="password"
     *                     ),
     *                     @OA\Property(
     *                         property="password_confirmation",
     *                         description="Confirm password",
     *                         type="string",
     *                         format="password"
     *                     )
     *                 )
     *             )
     *         )
     * )
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
     *
     * @OA\Get(
     *         path="/api/auth/confirm/{token}",
     *         tags={"Authentication"},
     *         summary="Activate user",
     *         description="Activate an registered user",
     *         operationId="activateUser",
     *         @OA\Parameter(
     *             name="token",
     *             in="path",
     *             description="User activating token (should be included in the verification mail)",
     *             required=true,
     *             @OA\Schema(
     *                 type="string",
     *             )
     *         ),
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=400,
     *             description="Invalid token"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     * )
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
     *
     * @OA\Post(
     *         path="/api/auth/forgot",
     *         tags={"Authentication"},
     *         summary="Request resetting password",
     *         description="Generate password reset token and send that token to user through mail",
     *         operationId="createPasswordResetToken",
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=400,
     *             description="Email not existing"
     *         ),
     *         @OA\Response(
     *             response=422,
     *             description="Invalid input"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     *         @OA\RequestBody(
     *             required=true,
     *             @OA\MediaType(
     *                 mediaType="application/x-www-form-urlencoded",
     *                 @OA\Schema(
     *                     type="object",
     *                     @OA\Property(
     *                         property="email",
     *                         description="Email",
     *                         type="string",
     *                     ),
     *                 )
     *             )
     *         )
     * )
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
     *
     * @OA\Get(
     *         path="/api/auth/token/find/{token}",
     *         tags={"Authentication"},
     *         summary="Verify reset password token",
     *         description="Verify the reset password token and make sure it is existing and still valid",
     *         operationId="findPasswordResetToken",
     *         @OA\Parameter(
     *             name="token",
     *             in="path",
     *             description="Password reset token (should be included in the notification mail)",
     *             required=true,
     *             @OA\Schema(
     *                 type="string",
     *             )
     *         ),
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=400,
     *             description="Invalid token"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     * )
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
     *
     * @OA\Post(
     *         path="/api/auth/reset",
     *         tags={"Authentication"},
     *         summary="Reset password",
     *         description="Set new password for the user",
     *         operationId="resetPassword",
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=400,
     *             description="Password reset token invalid or email not existing"
     *         ),
     *         @OA\Response(
     *             response=422,
     *             description="Invalid input"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     *         @OA\RequestBody(
     *             required=true,
     *             @OA\MediaType(
     *                 mediaType="application/x-www-form-urlencoded",
     *                 @OA\Schema(
     *                     type="object",
     *                     @OA\Property(
     *                         property="email",
     *                         description="Email",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="password",
     *                         description="Password",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="password_confirmation",
     *                         description="Confirm password",
     *                         type="string",
     *                     ),
     *                     @OA\Property(
     *                         property="token",
     *                         description="Password reset token",
     *                         type="string",
     *                     ),
     *                 )
     *             )
     *         )
     * )
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
     *
     * @OA\Get(
     *         path="/api/auth/get-user",
     *         tags={"Authentication"},
     *         summary="Get user",
     *         description="Retrieve information from current user",
     *         operationId="getUser",
     *         security={
     *           {"bearerAuth": {}}
     *         },
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     * )
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
     *
     * @OA\Get(
     *         path="/api/auth/logout",
     *         tags={"Authentication"},
     *         summary="Logout",
     *         description="Logout an user",
     *         operationId="logout",
     *         security={
     *           {"bearerAuth": {}}
     *         },
     *         @OA\Response(
     *             response=200,
     *             description="Successful operation"
     *         ),
     *         @OA\Response(
     *             response=500,
     *             description="Server error"
     *         ),
     * )
     */
    public function logout(Request $request)
    {
        return $this->auth->logout($request);
    }
}
