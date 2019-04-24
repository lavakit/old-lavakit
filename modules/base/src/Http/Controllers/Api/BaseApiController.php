<?php

namespace Lavakit\Base\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * Class BaseApiController
 * @package Lavakit\Base\Http\Controllers\Api
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class BaseApiController extends Controller
{
    /**
     * BaseApiController constructor.
     */
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title=APP_NAME
     * )
     */

    /**
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Local server"
     * )
     */

    /**
     * @OA\SecurityScheme(
     *      securityScheme="bearerAuth",
     *      in="header",
     *      name="bearerAuth",
     *      type="http",
     *      scheme="bearer",
     *      bearerFormat="JWT",
     * ),
     */
    public function __construct()
    {
    }
}
