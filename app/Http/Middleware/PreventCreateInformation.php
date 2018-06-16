<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Information;
class PreventCreateInformation
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
        return redirect("information/index");
      }else{
        return $next($request);
      }

    }
}
