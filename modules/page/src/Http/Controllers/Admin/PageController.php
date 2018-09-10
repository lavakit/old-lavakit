<?php

namespace Inspire\Page\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        echo __CLASS__;
    }
}