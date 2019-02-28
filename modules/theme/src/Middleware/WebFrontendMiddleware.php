<?php

namespace Inspire\Theme\Middleware;

use Closure;
use ThemeFrontend;

/**
 * Class WebFrontendMiddleware
 * @package Inspire\Theme\Middleware
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class WebFrontendMiddleware
{
    /**
     * Handle an incoming request
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function handle($request, Closure $next)
    {
        ThemeFrontend::set(config('theme.theme.active'));

        return $next($request);
    }
}
