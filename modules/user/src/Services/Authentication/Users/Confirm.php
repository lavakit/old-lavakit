<?php

namespace Lavakit\User\Services\Authentication\Users;

use Lavakit\User\Repositories\Interfaces\UserRepository;
use Crypt;

/**
 * Class Confirm
 * @package Lavakit\User\Services\Authentication\Users
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
     * @param string|null $token
     * @return \Illuminate\Http\RedirectResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(string $token = null)
    {
        if (is_null($token)) {
            return redirect()->route('login');
        }

        $email = Crypt::decrypt($token);

        $user = $this->repository->getFirstBy(['email' => $email, 'confirm_token' => $token]);

        if (!$user) {
            return redirect()->route('login');
        }

        $condition = ['email' => $email];
        $data = ['confirmed' => true, 'registered' => true, 'confirm_token' => null];
        $this->repository->updateBy($condition, $data);

        return redirect()->route('login', [$email])
            ->with('alert-success', trans('user::auth.messages.confirms.completed'));
    }
}
