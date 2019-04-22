<?php

namespace Lavakit\User\Services\Authorization\Users;
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
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function handler($token)
    {
        $credentials = [
            'confirm_token' => $token
        ];
        
        $user = $this->passwordBroker->getUser($credentials);
        
        if (is_null($user) || !$this->passwordBroker->tokenExists($user, $token)) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.passwords.token')
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => 'Success',
            'data' => ['email' => $user->email ,'token' => $token]
        ], JsonResponse::HTTP_OK);
    }
}
