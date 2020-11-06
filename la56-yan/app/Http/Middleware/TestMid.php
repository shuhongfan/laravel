<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class TestMid
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
        if (!Session::has('user')){
            dd('请登录！！！');
        }
        return $next($request);
    }
}
