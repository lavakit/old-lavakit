<?php

namespace Lavakit\Setting\Http\Controllers\Admin;

use Dimsav\Translatable\Translatable;
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
        $settings = $this->repository->separateViewSettings($this->module, __FUNCTION__);
        $dbSettings = $this->repository->loadDbSetting(__FUNCTION__);

        if ($request->isMethod('get')) {
            title()->set('Setting General');
            
            return view('setting::admins.general')->with(compact('settings', 'dbSettings'));
        }

        $dataRequest = $request->all();
    }
}
