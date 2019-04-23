<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Http\Request;
use Lavakit\Base\Services\JsonResponse;
use Email;

/**
 * Class Forgot
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Forgot
{
    /**
     * @var \Illuminate\Auth\Passwords\PasswordBroker|\Illuminate\Foundation\Application|mixed
     */
    protected $passwordBroker;
    
    /**
     * Forgot constructor.
     */
    public function __construct()
    {
        $this->passwordBroker = app('auth.password.broker');
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function handler(Request $request)
    {
        $user = $this->passwordBroker->getUser($request->only('email'));
        
        if (is_null($user)) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.passwords.user')
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        $token = $this->passwordBroker->createToken($user);
        
        //Updated token for Users table
        $user->confirm_token = $token;
        $user->save();
        
        //Sent mail reset request
        $this->sentMail($user, $token);
    
        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('user::auth.messages.passwords.sent')
        ], JsonResponse::HTTP_OK);
    }
    
    /**
     * @param $user
     * @param string $token
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function sentMail($user, string $token)
    {
        $subject = trans('user::auth.messages.forgot.subject');
        $body = trans('user::auth.messages.forgot.body');
        $args = [
            'to' => $user->email,
            'name' => $user->full_name,
            'btn_link' => route('auth.reset', $token)
        ];
    
        Email::send($subject, $body, $args);
    }
}
