<?php

namespace Inspire\Page\Http\Controllers;

use Inspire\Base\Http\Controllers\BaseController;

/**
 * Class PublicController
 * @package Inspire\Page\Http\Controllers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class PublicController extends BaseController
{
    /**
     * PublicController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        return view('index.index');
    }
}
