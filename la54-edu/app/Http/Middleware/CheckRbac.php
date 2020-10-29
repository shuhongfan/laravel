<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckRbac
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
        if (Auth::guard('admin')->user()->role_id!='1'){
            //        RBAC鉴权
//        获取当前路由
            $route=Route::currentRouteAction();
//        获取当前角色已经具备的权限
            $ac=Auth::guard('admin')->user()->role->auth_ac;
            $ac=strtolower($ac.'indexcontroller@index,indexcontroller@welcome');
            $routeArr=explode('\\',$route);
            if (strpos($ac,strtolower(end($routeArr)))===false){
                exit('<h1>您没有访问权限</h1>');
            }
        }
//        继续后续的请求
        return $next($request);
    }
}
