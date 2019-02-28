<?php

namespace Inspire\Theme\Middleware;

use Closure;
use ThemeFrontend;

/**
 * Class RouteFrontendMiddleware
 * @package Inspire\Theme\Middleware
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteFrontendMiddleware
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
        ThemeFrontend::set($themeName);

        return $next($request);
    }
}
