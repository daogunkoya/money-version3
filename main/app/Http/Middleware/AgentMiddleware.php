<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AgentMiddleware
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
            if(Auth::user()->isAgent()){
                 return $next($request);
            }
        }

        return redirect('/');
    }
}
