<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }


    public function handle($request, $next, ...$guards)
    {

      foreach ($guards as $guard) {
        if (Auth::guard($guard)->guest())
        {
            if ($request->ajax() || $request->wantsJson())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                if($guard == "admin")
                {
                    return redirect()->guest('admin/admin/login');
                } else {
                    return redirect()->guest('user/user/login');
                }
            }
        }
        return $next($request);
      }

    }

　　
