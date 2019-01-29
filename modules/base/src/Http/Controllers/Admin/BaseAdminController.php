<?php

namespace Inspire\Base\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Asset;

/**
 * Class BaseAdminController
 * @package Inspire\Base\Http\Controllers\Admin
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class BaseAdminController extends Controller
{
    /** @var string */

    protected $module;

    /**
     * BaseAdminController constructor.
     */
    public function __construct()
    {
        $this->addJsModule();
    }

    /**
     * @copyright 2018 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function addJsModule()
    {
        Asset::addAppModule($this->module);
    }
}
