<?php

namespace Lavakit\User\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Lavakit\User\Http\Requests\LoginRequest;
use Lavakit\Base\Services\LavakitResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->all();
        $credentials = request(['email', 'password']);
        $credentials['confirmed'] = true;
        
        if (!\Auth::attempt($credentials)) {
            return response()->json([
                'success' => LavakitResponse::STATUS_FAILURE,
                'message' => 'Wrong combination of email and password or email has not been verified'
            ], LavakitResponse::HTTP_UNAUTHORIZED);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        $data = [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];

        return response()->json([
            'success' => LavakitResponse::STATUS_SUCCESS,
            'data' => $data,
            'message' => 'Login OK'
        ], LavakitResponse::HTTP_OK);
    }

    public function getUser(Request $request)
    {
        return response()->json([
            'success' => LavakitResponse::STATUS_SUCCESS,
            'data' => $request->user()
        ], LavakitResponse::HTTP_OK);
    }
}
