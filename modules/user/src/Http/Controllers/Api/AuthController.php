<?php

namespace Lavakit\User\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Lavakit\User\Http\Requests\LoginRequest;
use Lavakit\Base\Services\LavakitResponse;

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
    
        
        return response()->json([
            'errors' => false,
            'message' => 'Login Ok',
        ]);
    }
}
