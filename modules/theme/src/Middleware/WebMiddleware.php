<?php

namespace Inspire\Theme\Middleware;

use Closure;
use Inspire\Theme\Facades\Theme;

class WebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Theme::set(config('theme.active'));

        return $next($request);
    }
}