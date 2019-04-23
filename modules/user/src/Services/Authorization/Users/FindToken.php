<?php

namespace Lavakit\User\Services\Authorization\Users;
use Illuminate\Contracts\Auth\CanResetPassword;
use Lavakit\Base\Services\JsonResponse;

/**
 * Class FindToken
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 LUCY VN
 * @author hoatq <tqhoa8th@gmail.com>
 */
class FindToken
{
    /**
     * @var \Illuminate\Auth\Passwords\PasswordBroker|\Illuminate\Foundation\Application|mixed
     */
    protected $passwordBroker;
    
    /**
     * FindToken constructor.
     */
    public function __construct()
    {
        $this->passwordBroker = app('auth.password.broker');
    }
    
    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function handler($token)
    {
        $user = $this->validate($token);
        
        if (!$user instanceof CanResetPassword) {
            return $user;
        }
        
        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => 'Success',
            'data' => ['email' => $user->email ,'token' => $token]
        ], JsonResponse::HTTP_OK);
    }
    
    /**
     * Validate a find token for the given credentials.
     *
     * @param string $token
     * @return CanResetPassword|\Illuminate\Http\JsonResponse|null
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function validate(string $token)
    {
        $credentials = [
            'confirm_token' => $token
        ];
        
        if (is_null($user = $this->passwordBroker->getUser($credentials))) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.passwords.user'),
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        if (!$this->passwordBroker->tokenExists($user, $token)) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.passwords.token')
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        return $user;
    }
}
