<?php

namespace Lavakit\Setting\Http\Controllers\Api;

use Illuminate\Http\Request;
use Lavakit\Base\Http\Controllers\Api\BaseApiController;
use Lavakit\Base\Services\JsonResponse;
use Lavakit\Setting\Repositories\SettingRepository;

/**
 * Class SettingController
 * @package Lavakit\Setting\Http\Controllers\Api
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingController extends BaseApiController
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

    /**
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function general()
    {
        $loadSettings = $this->repository->separateViewSettings($this->module, __FUNCTION__);

        //Changed name key
//        array_walk($loadSettings, function (&$value, $key) use (&$settings) {
//            return $settings[trans('setting::setting.tab.' . $key)] = $value;
//        });

        //Remove empty array
        $settings = array_map(function ($data) {
            foreach ($data as $key => $value) {
                if (empty($value)) {
                    unset($data[$key]);
                }
            }

            return $data;
        }, $loadSettings);

        $dbSettings = $this->repository->loadDbSetting('locale');
        
        $objectFilterData = [
            'site_title' => null,
            'seo_name' => null
        ];

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('base::base.response.message.success'),
            'data' => ['settings' => $settings, 'dbSettings' => $dbSettings, 'objectFilterData' => $objectFilterData]
        ], JsonResponse::HTTP_OK);
    }

    public function postGeneral(Request $request)
    {
        echo'<pre>';
            print_r($request->all());
        echo'</pre>';
        die;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function email()
    {
        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('base::base.response.message.success'),
            'data' => ['pageTitle' => 'Page tile Setting Email']
        ], JsonResponse::HTTP_OK);
    }
}
