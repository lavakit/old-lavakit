<?php

namespace Inspire\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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