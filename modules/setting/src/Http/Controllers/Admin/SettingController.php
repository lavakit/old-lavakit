<?php

namespace Lavakit\Setting\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Lavakit\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class SettingController
 * @package Lavakit\Setting\Http\Controllers\Admin
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
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
    
    /**
     * @param null $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function show($type = null)
    {
        title()->set(Str::finish('Settings', '-') . $type);
    
        return view('setting::admins.setting');
    }
}
