<?php

namespace Inspire\Theme\Middleware;

use Closure;
use ThemeBackend;

/**
 * Class RouteBackendMiddleware
 * @package Inspire\Theme\Middleware
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteBackendMiddleware
{
    /**
     * Handle an incoming request
     *
     * @param $request
     * @param Closure $next
     * @param $themeName
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function handle($request, Closure $next, $themeName)
    {
        ThemeBackend::set($themeName);

        return $next($request);
    }
}
