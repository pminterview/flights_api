<?php

namespace App\Http\Middleware;

use Closure;

class ApiVersion
{
    public function handle($request, Closure $next, $guard)
    {
        config(['app.api_version' => $guard]);
        return $next($request);
    }
}
