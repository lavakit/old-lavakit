<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\Request;
use Lavakit\Base\Services\JsonResponse;

/**
 * Class Reset
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 LUCY VN
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Reset
{
    /*** @var \Illuminate\Auth\Passwords\PasswordBroker|\Illuminate\Foundation\Application|mixed */
    protected $passwordBroker;

    /**
     * FindToken constructor.
     */
    public function __construct()
    {
        $this->passwordBroker = app('auth.password.broker');
    }

    /**
     * @param Request $request
     * @return CanResetPasswordContract|\Illuminate\Http\JsonResponse|null
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function handler(Request $request)
    {
        $user = $this->validateReset($this->credentials($request));

        if (!$user instanceof CanResetPasswordContract) {
            return $user;
        }

        $this->resetPassword($user, $request->get('password'));
        $this->passwordBroker->deleteToken($user);

        $this->sendMailReset($user);

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('user::auth.messages.passwords.reset'),
            'data' => $user
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Reset the given user's password.
     *
     * @param $user
     * @param $password
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function resetPassword($user, $password)
    {
        /** @var $user \Illuminate\Database\Eloquent\Model*/
        $user->forceFill([
            'password' => $password,
            'remember_token' => null,
            'confirm_token' => null
        ])->save();
    }

    /**
     * Validate a password reset for the given credentials.
     *
     * @param array $credentials
     * @return CanResetPasswordContract|\Illuminate\Http\JsonResponse|null
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function validateReset(array $credentials)
    {
        if (is_null($user = $this->passwordBroker->getUser($credentials))) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.passwords.user'),
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        if (!$this->passwordBroker->tokenExists($user, $credentials['token'])) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.passwords.token')
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        return $user;
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only([
            'email', 'password', 'password_confirmation', 'token'
        ]);
    }

    /**
     * @param $user
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function sendMailReset($user)
    {
        $subject = trans('user::auth.messages.reset.subject');
        $body = trans('user::auth.messages.reset.body');
        $args = [
            'to' => $user->email,
            'name' => $user->full_name,
        ];

        \Email::send($subject, $body, $args);
    }
}
