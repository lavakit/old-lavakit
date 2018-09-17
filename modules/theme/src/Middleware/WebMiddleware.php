<?php

namespace Inspire\Theme\Middleware;

use Closure;
use Inspire\Theme\Facades\Theme;

/**
 * Class WebMiddleware
 * @package Inspire\Theme\Middleware
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class WebMiddleware
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
        Theme::set(config('theme.theme.active'));

        return $next($request);
    }
}