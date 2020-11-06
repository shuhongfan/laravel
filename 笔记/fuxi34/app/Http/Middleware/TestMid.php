<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class TestMid
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('user')){
            dd('请先登录');
        }
        return $next($request);
    }
}

