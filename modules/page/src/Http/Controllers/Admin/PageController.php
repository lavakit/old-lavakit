<?php

namespace Inspire\Page\Http\Controllers\Admin;

use Inspire\Base\Http\Controllers\BaseController;

/**
 * Class PageController
 * @package Inspire\Page\Http\Controllers\Admin
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class PageController extends BaseController
{
    /**
     * PageController constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        echo __CLASS__;
    }
}
