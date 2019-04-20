<?php

namespace Lavakit\User\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Lavakit\User\Http\Requests\LoginRequest;
use Lavakit\Base\Services\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        $credentials['confirmed'] = true;
        
        if (!\Auth::attempt($credentials)) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => 'Wrong combination of email and password or email has not been verified'
            ], JsonResponse::HTTP_OK);
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
            'success' => JsonResponse::STATUS_SUCCESS,
            'data' => $data,
            'message' => 'Login OK'
        ], JsonResponse::HTTP_OK);
    }

    public function getUser(Request $request)
    {
        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'data' => $request->user()
        ], JsonResponse::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->delete();

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => 'Successfully logged out'
        ], JsonResponse::HTTP_OK);
    }
}
