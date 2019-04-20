<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Http\Request;
use Lavakit\Base\Services\JsonResponse;

/**
 * Class Logout
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Logout
{
    /**
     * Log the user out of the application
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handle(Request $request)
    {
        $request->user()->token()->delete();

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => 'Successfully logged out'
        ], JsonResponse::HTTP_OK);
    }
}
