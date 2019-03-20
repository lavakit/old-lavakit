<?php

namespace Lavakit\Base\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use AssetBackend;

/**
 * Class BaseAdminController
 * @package Lavakit\Base\Http\Controllers\Admin
 * @copyright 2018 Lavakit Group
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
     * @copyright 2018 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function addJsModule()
    {
        AssetBackend::addAppModule($this->module);
    }
}
