<?php

namespace Inspire\Setting\Http\Controllers\Admin;

use Inspire\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class SettingController
 * @package Inspire\Setting\Http\Controllers\Admin
 * @copyright 2019 Inspire Group
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
