<?php

namespace Lavakit\Setting\Http\Controllers\Admin;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function general()
    {
        title()->set(trans('setting::setting.generals.page_title'));

        return view('setting::admins.general');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function email()
    {
        title()->set(trans('setting::setting.emails.page_title'));

        return view('setting::admins.email');
    }
}
