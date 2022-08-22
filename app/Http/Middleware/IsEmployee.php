<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsEmployee
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
         if (Auth::user() &&  Auth::user()->user_type == 'employee') {

                return $next($request);
         }

        return redirect('/employee_listing');
    }
}
