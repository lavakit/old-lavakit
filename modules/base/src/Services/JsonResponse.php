<?php

namespace Lavakit\Base\Services;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response as ResponseLaravel;

/**
 * Class JsonResponse
 * @package Lavakit\Base\Services
 * @copyright 2019 LUCY VN
 * @author Pencii Team <hoatq@lucy.ne.jp>
 */
class JsonResponse extends ResponseLaravel
{
    const STATUS_SUCCESS = true;
    const STATUS_FAILURE = false;
}
