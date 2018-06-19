<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Information;
use app\User;
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
      
      if(Information::where('id',Auth::user()->id)->exists()){
        return $next($request);

      }else{
        return redirect("information/create");
      }
    }
}
