<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class AuthCodeCheck
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
      $user = User::where('id',Auth::user()->id)->get();
      if(empty($user[0]->AuthCode)){
        return $next($request);
      }else{
        return redirect("resend");
      }
    }
}
