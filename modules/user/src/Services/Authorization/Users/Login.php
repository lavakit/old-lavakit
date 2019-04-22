<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Http\Request;
use Lavakit\Base\Services\JsonResponse;
use Carbon\Carbon;

/**
 * Class Login
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Login
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(Request $request)
    {
        $credentials = request(['email', 'password']);
        $credentials['confirmed'] = true;

        if (!\Auth::attempt($credentials)) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.authorizations.unauthenticated_message')
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if (!$request->get('remember')) {
            $token->expires_at = Carbon::now()->addDay(1);
        }

        $token->save();

        $data = [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'data' => $data,
            'message' => trans('user::auth.messages.login.success')
        ], JsonResponse::HTTP_OK);
    }
}
