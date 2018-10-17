<?php

namespace Inspire\Post\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class PostController
 * @package Inspire\Post\Http\Controllers\Admin
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        echo __CLASS__;
    }
}
