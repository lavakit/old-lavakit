<?php

namespace Lavakit\Theme\Middleware;

use Closure;
use ThemeBackend;

/**
 * Class WebBackendMiddleware
 * @package Lavakit\Theme\Middleware
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class WebBackendMiddleware
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
        ThemeBackend::set(config('theme.theme.active_backend'));

        return $next($request);
    }
}
