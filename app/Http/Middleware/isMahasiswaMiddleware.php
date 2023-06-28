<?php

namespace App\Http\Middleware;

use Closure;

class isMahasiswaMiddleware
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
        if(!auth()->check() || auth()->user()->id_role != 3){
            return abort(403);
        }
        return $next($request);
    }
}
