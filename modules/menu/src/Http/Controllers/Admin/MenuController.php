<?php

namespace Inspire\Menu\Http\Controllers\Admin;

use Inspire\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class MenuController
 * @package Inspire\Menu\Http\Controllers\Admin
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class MenuController extends BaseAdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return __CLASS__;
    }
}
