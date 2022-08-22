<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsEmployer
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
         if (Auth::user() &&  Auth::user()->user_type == 'employer') {

                return $next($request);
         }

        return redirect('/employer_listing');
    }
}
