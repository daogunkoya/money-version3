<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CustomerMiddleware
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

        if(Auth::check()){
            if(Auth::user()->isCustomer()){
                 return $next($request);
            }
        }

        return redirect('/');
 
    }
}
