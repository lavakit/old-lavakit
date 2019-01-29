<?php

namespace Inspire\User\Http\Controllers;

use Inspire\Base\Http\Controllers\BaseController;
use AssetBackend;
use Inspire\User\Http\Requests\LoginRequest;

/**
 * Class AuthController
 * @package Inspire\User\Http\Controllers
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AuthController extends BaseController
{
    /** @var string */
    protected $module = 'user';

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        AssetBackend::onlyStylesheets(['bootstrap', 'iconkit', 'core']);
        AssetBackend::onlyJavascript(['jquery', 'bootstrap']);
    }

    /**
     * Show the view login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2018 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function showLogin()
    {
        title()->set('Auth-Login');

        return view('user::auth.login');
    }

    public function login(LoginRequest $request)
    {
        echo __CLASS__;
    }
}
