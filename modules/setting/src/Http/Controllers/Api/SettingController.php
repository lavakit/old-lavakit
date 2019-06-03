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
    
    /**
     * @param null $type
     * @return \Illuminate\Http\JsonResponse
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function setting($type = null)
    {
        if (is_null($type)) {
            $type = $this->module;
        }

        $loadDbSettings = $this->repository->loadDbSetting($type);
        $filterData = new SettingTransformer($this->repository->loadSettings($type, false), $loadDbSettings);
        $loadSettings = $this->repository->loadSettings($type);

        return response()->json([
            'success' => JsonResponse::STATUS_SUCCESS,
            'message' => trans('base::base.response.message.success'),
            'data' => [
                'settings' => $loadSettings,
                'filterData' => $filterData->toArray(),
                'activeTranslatable' => $filterData->toActiveTranslatable(),
                'availableLocales' => config('base.available_locales'),
            ]
        ], JsonResponse::HTTP_OK);
    }
    
    /**
     * @param Request $request
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function postSetting(Request $request)
    {
        echo'<pre>';
            print_r($request->all());
        echo'</pre>';
        die;
    }
}
