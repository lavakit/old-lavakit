<?php

namespace Lavakit\User\Services\Authorization\Users;

use Illuminate\Http\Request;
use Lavakit\User\Repositories\Interfaces\UserRepository;
use Lavakit\Base\Services\JsonResponse;
use Email;

/**
 * Class Register
 * @package Lavakit\User\Services\Authorization\Users
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Register
{
    /** @var UserRepository */
    protected $repository;

    /**
     * Register constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(Request $request)
    {
        $user = $this->repository->create($request->all());

        //Send mail
        $subject = trans('user::auth.messages.confirms.subject');
        $body = trans('user::auth.messages.confirms.body');
        $args = [
            'to' => $user->email,
            'name' => $user->full_name,
            'btn_link' => route('api.auth.confirm', $user->confirm_token)
        ];

        Email::send($subject, $body, $args);

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'data' => $user,
            'message' => trans('user::auth.messages.confirms.check_email')
        ], JsonResponse::HTTP_OK);
    }
}
