<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Http\Request;
use Lavakit\Base\Services\JsonResponse;

/**
 * Class User
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class User
{
    /**
     * Get the user detail
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(Request $request)
    {
        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'data' => $request->user()
        ], JsonResponse::HTTP_OK);
    }
}
