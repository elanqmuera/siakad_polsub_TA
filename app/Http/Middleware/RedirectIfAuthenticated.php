<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::check()) {
            if(auth()->user()->id_role == 1){
                return redirect('/admin');
            }elseif(auth()->user()->id_role == 2){
                return redirect('/dosen');
            }
            elseif(auth()->user()->id_role == 3){
                return redirect('/mahasiswa');
            }
        }

        return $next($request);
    }
}
