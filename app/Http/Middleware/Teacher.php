<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Teacher
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
        if(empty(Session::has('teacherSession')))
        {
            return redirect('/teacher-login');
        }else{
            return $next($request);
        }

    }
}
