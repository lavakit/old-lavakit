<?php

namespace Inspire\Dashboard\Http\Controllers\Admin;

use Inspire\Base\Http\Controllers\BaseController;

/**
 * Class DashboardController
 * @package Inspire\Dashboard\Http\Controllers\Admin
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class DashboardController extends BaseController
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        return view('dashboard::index');
    }
}
