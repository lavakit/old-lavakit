<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Http\Request;
use Auth;
use Lavakit\Base\Services\JsonResponse;

/**
 * Class ChangePassword
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 LUCY VN
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ChangePassword
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 LUCY VN
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function handler(Request $request)
    {
        $user = $this->validateChangePassword($request);
        
        if (!$user instanceof CanResetPassword) {
            return $user;
        }
        
        //Updated password
        $user->password = $request->get('new_password');
        $user->save();
    
        //Revoked token
        $user->token()->delete();
        
        //Sent mail
        $this->sendMail($user);
        
        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('user::auth.messages.passwords.success'),
            'data' => $user
        ], JsonResponse::HTTP_OK);
    }
    
    /**
     * Validate a password change for the given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     * @copyright 2019 LUCY VN
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function validateChangePassword(Request $request)
    {
        //$user = Auth::guard('api')->user();
        $user = $request->user();
    
        $credentials = [
            'email' => $user->email,
            'password' => $request->get('password'),
            'confirmed' => true,
        ];
    
        if (!Auth::guard('web')->attempt($credentials)) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.auth.failed')
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }
        
        return $user;
    }
    
    /**
     * @param $user
     * @copyright 2019 LUCY VN
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function sendMail($user)
    {
        $subject = trans('user::auth.messages.passwords.subject');
        $body = trans('user::auth.messages.passwords.body');
        $args = [
            'to' => $user->email,
            'name' => $user->full_name,
        ];
    
        \Email::send($subject, $body, $args);
    }
}
