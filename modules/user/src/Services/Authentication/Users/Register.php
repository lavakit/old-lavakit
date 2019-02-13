<?php

namespace Inspire\User\Services\Authentication\Users;

use Illuminate\Http\Request;
use Inspire\User\Repositories\Interfaces\UserRepository;
use Email;

/**
 * Class Register
 * @package Inspire\User\Services\Authentication\Users
 * @copyright 2019 Inspire Group
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
     * Registration request for the application
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(Request $request)
    {
        $repository = $this->repository->getFirstBy(['email' => $request['email']]);
        if (!$repository) {
            $repository = $this->repository->getModel();
        }

        $repository->fill($request->all());
        $user = $this->repository->createOrUpdate($repository);

        $subject = trans('user::auth.messages.confirms.subject');
        $body = trans('user::auth.messages.confirms.body');
        $args = [
            'to' => $user->email,
            'name' => $user->full_name,
            'btn_link' => route('auth.confirm', $user->confirm_token)
        ];

        Email::send($subject, $body, $args);

        return redirect()->route('login')->with('alert-success', trans('user::auth.messages.confirms.check_email'));
    }
}
