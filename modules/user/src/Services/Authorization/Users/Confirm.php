<?php

namespace Lavakit\User\Services\Authorization\Users;

use Lavakit\User\Repositories\Interfaces\UserRepository;
use Lavakit\Base\Services\JsonResponse;

/**
 * Class Confirm
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Confirm
{
    /** @var UserRepository */
    protected $repository;

    /**
     * Confirm constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(string $token)
    {
        $user = $this->repository->getFirstBy(['confirm_token' => $token]);

        if (!$user) {
            return response()->json([
                'success' => JsonResponse::STATUS_FAILURE,
                'message' => trans('user::auth.messages.auth.token_invalid')
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        $this->repository->update($user, [
            'confirmed' => true,
            'confirm_token' => null
        ]);

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('user::auth.messages.confirms.completed')
        ], JsonResponse::HTTP_OK);
    }
}
