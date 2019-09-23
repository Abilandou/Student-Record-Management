<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class Principal
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
        // if($request->user() && $request->user()->admin == 1){
        //     return redirect('/admin/dashboard');
        // }
        if(empty(Session::has('adminSession'))){
            return redirect('/admin');
        }
        else {
            return $next($request);
        }

    }
}
