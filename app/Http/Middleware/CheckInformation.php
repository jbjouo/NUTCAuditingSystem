<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;
class CheckInformation
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
      if(Auth::user()->IsNewMember==1){
        return redirect("information/create");
      }else{
        return $next($request);
      }
    }
}
