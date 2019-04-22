<?php

namespace Lavakit\Dashboard\Http\Controllers\Admin;

use Lavakit\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class DashboardController
 * @package Lavakit\Dashboard\Http\Controllers\Admin
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class DashboardController extends BaseAdminController
{
    /**
     * DashboardController constructor.
     */

    /** @var string */
    protected $module = ['dashboard'];

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        title()->set('Admin');

        return view('dashboard::index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function dashboard()
    {
        title()->set('Dashboard');

        return view('dashboard::index');
    }
}
