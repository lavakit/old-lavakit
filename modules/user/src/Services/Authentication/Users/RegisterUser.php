<?php

namespace Inspire\User\Services\Authentication\Users;

use Illuminate\Http\Request;
use Inspire\User\Repositories\Interfaces\UserRepository;
use EmailHandler;

/**
 * Class RegisterUser
 * @package Inspire\User\Services\Authentication\Users
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class RegisterUser
{
    /** @var UserRepository */
    protected $repository;

    /**
     * RegisterUser constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(Request $request)
    {
        $repository = $this->repository->getFirstBy(['email' => $request['email']]);
        if (!$repository) {
            $repository = $this->repository->getModel();
        }

        $repository->fill($request->all());

        //$this->repository->createOrUpdate($repository);

        EmailHandler::send('subject TQHOA', 'content TQHOA', [
            'name' => 'NameTQHOA', 'to' => $request['email']
        ]);
    }
}
