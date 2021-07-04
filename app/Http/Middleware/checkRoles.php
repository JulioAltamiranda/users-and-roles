<?php

namespace App\Http\Middleware;

use Closure;

class checkRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         
        $roles = array_slice(func_get_args(), 2);
        if (!auth()->user()->hasRoles($roles)) {
            return abort(403);
        }
        return $next($request);
    }
}
