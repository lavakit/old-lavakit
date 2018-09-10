<?php

namespace Inspire\Post\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        echo __CLASS__;
    }
}