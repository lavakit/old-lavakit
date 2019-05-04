<?php

namespace Lavakit\Setting\Http\Controllers\Api;

use Lavakit\Base\Http\Controllers\Api\BaseApiController;
use Lavakit\Base\Services\JsonResponse;

/**
 * Class SettingController
 * @package Lavakit\Setting\Http\Controllers\Api
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingController extends BaseApiController
{
    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
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
            'message' => 'Success',
            'data' => ['pageTitle' => 'Page tile Setting Email']
        ], JsonResponse::HTTP_OK);
    }
}
