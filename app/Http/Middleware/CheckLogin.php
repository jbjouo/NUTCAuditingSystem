<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $inout)
    {
        if($inout == 'in'){
            if(Auth::check())
            {
                return $next($request);
            }else{
                return redirect('login');
            }
        }else if($inout =='out'){
            if(Auth::check())
            {
                return redirect('NUTCAuditing');
            }else{
                return $next($request);
            }
        }
        return $next($request);
    }
}
