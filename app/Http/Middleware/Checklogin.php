<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Checklogin
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
    //   if (Auth::check()) {
    // // ユーザーはログインしている
    //
    //    $log = 0;
    //
    //    return $next($request, ["log" => $log]);
    //
    //   }
    //
    //   else{
    //
    //     $log = 1;
    //     return $next($request, ["log" => $log]);
    //
    //     // return redirect(route("user_get_user_login"));
      // }
    }
}
