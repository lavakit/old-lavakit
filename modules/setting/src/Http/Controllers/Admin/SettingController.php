<?php

namespace Lavakit\Setting\Http\Controllers\Admin;

use Lavakit\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class SettingController
 * @package Lavakit\Setting\Http\Controllers\Admin
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class SettingController extends BaseAdminController
{
    /** @var string */
    protected $module = 'setting';

    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getGeneral()
    {
        title()->set('Setting');
        $configs = [];

        return view('setting::email')->with(compact('configs'));
    }
}
