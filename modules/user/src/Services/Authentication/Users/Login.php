<?php

namespace Inspire\User\Services\Authentication\Users;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Inspire\User\Contracts\AuthenticationContract;
use Illuminate\Validation\ValidationException;

/**
 * Class Login
 * @package Inspire\User\Services\Authentication\Users
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Login
{
    use AuthenticatesUsers;

    /** @var AuthenticationContract */
    protected $auth;

    /**
     * Login constructor.
     * @param AuthenticationContract $auth
     */
    public function __construct(AuthenticationContract $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(Request $request)
    {
        // If the class is using the Throttles Login trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the failed login response instance
     *
     * @param Request $request
     * @throws ValidationException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('user::auth.messages.auth.failed')],
        ]);
    }

    /**
     * @param Request $request
     * @param $user
     * @return bool
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function authenticated(Request $request, $user)
    {
        if (!$this->auth->hasConfirmed($user)) {
            return $this->auth->logout(['confirm' => 'user::auth.messages.confirms.confirm_email']);
        }

        return redirect()->route('dashboard.index');
    }
}
