<?php

namespace Lavakit\Setting\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Lavakit\Base\Http\Controllers\Admin\BaseAdminController;
use Lavakit\Setting\Repositories\SettingRepository;

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

    /** @var SettingRepository */
    protected $repository;

    /**
     * SettingController constructor.
     * @param SettingRepository $repository
     */
    public function __construct(SettingRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    public function general(Request $request)
    {
        echo'<pre>';
            print_r($this->repository->loadAllSettings('setting', __FUNCTION__));
        echo'</pre>';
        die;

        if ($request->isMethod('get')) {
            title()->set('Setting General');
            $configs = [];

            return view('setting::admins.general')->with(compact('configs'));
        }

        $dataRequest = $request->all();
    }
}
