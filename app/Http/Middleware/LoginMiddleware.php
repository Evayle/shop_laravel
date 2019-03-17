<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
       // 登录首先要检测session是否存在
        if (session()->exists('admin_login')) {




            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
