<?php

namespace Inspire\Theme\Middleware;

use Closure;
use Theme;

/**
 * Class RouteMiddleware
 * @package Inspire\Theme\Middleware
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteMiddleware
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
        Theme::set($themeName);

        return $next($request);
    }
}
