<?php

namespace Inspire\Dashboard\Http\Controllers\Admin;

use Inspire\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class DashboardController
 * @package Inspire\Dashboard\Http\Controllers\Admin
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class DashboardController extends BaseAdminController
{
    /**
     * DashboardController constructor.
     */

    /** @var string */
    protected $module = [
        'tables', 'widgets', 'charts'
    ];

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function index()
    {
        \FlashMessage::make('test')->message();
        
        echo'<pre>';
        print_r(\Session::all());
        echo'</pre>';
        echo __CLASS__ . ' - ' . __METHOD__ . ' - ' . __LINE__;
        die;
        return view('dashboard::index');
    }
}
