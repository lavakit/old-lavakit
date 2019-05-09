<?php

namespace Lavakit\Setting\Http\Controllers\Api;

use Illuminate\Http\Request;
use Lavakit\Base\Http\Controllers\Api\BaseApiController;
use Lavakit\Base\Services\JsonResponse;
use Lavakit\Setting\Repositories\SettingRepository;
use Lavakit\Setting\Services\Transformers\SettingTransformer;

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

    public function setting($type = null)
    {
        if (is_null($type)) {
            $type = $this->module;
        }

        $filterData = new SettingTransformer($this->repository->loadSettings($type, false));
        $loadSettings = $this->repository->loadSettings($type);

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('base::base.response.message.success'),
            'data' => ['settings' => $loadSettings, 'filterData' => $filterData->toArray()]
        ], JsonResponse::HTTP_OK);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
//    public function general()
//    {
//        $loadSettings = $this->repository->separateViewSettings($this->module, __FUNCTION__);
//
//        //Remove empty array
//        $settings = array_map(function ($data) {
//            foreach ($data as $key => $value) {
//                if (empty($value)) {
//                    unset($data[$key]);
//                }
//            }
//
//            return $data;
//        }, $loadSettings);
//
//        $dbSettings = $this->repository->loadDbSetting('locale');
//
//        $filterData = [
//            'en' => [
//                'site_name' => 'Site name [en]',
//                'seo_title' => 'Seo title [en]',
//                'seo_keyword' => 'Seo keyword [en]',
//                'seo_description' => 'Seo description [en]'
//            ],
//            'vi' => [
//                'site_name' => 'Site name [vi]',
//                'seo_title' => 'Seo title [vi]',
//                'seo_keyword' => 'Seo keyword [vi]',
//                'seo_description' => 'Seo description [vi]'
//            ],
//            'site_frontend_template' => 'default'
//        ];
//
//        return response()->json([
//            'success' => JsonResponse::STATUS_SUCCESS,
//            'message' => trans('base::base.response.message.success'),
//            'data' => ['settings' => $settings, 'filterData' => $filterData]
//        ], JsonResponse::HTTP_OK);
//    }

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
