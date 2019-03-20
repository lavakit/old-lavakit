<?php

namespace Lavakit\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class UserController
 * @package Lavakit\User\Http\Controllers\Admin
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        echo __CLASS__;
    }
}
