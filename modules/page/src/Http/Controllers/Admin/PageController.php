<?php

namespace Lavakit\Page\Http\Controllers\Admin;

use Lavakit\Base\Http\Controllers\BaseController;

/**
 * Class PageController
 * @package Lavakit\Page\Http\Controllers\Admin
 * @copyright 2018 Lavakit Group
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
