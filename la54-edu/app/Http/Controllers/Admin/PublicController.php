<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    // 登录页面的展示
    public function login () {
        return view('admin.public.login');
    }
//    后台登录处理
    public function check (Request $request) {
//        开始自动验证
        $this->validate($request,[
            'username'=>'required|min:2|max:20',
            'password'=>'required|min:6',
            'captcha'=>'required|size:4|captcha'
        ]);
//        获取信息 只取username和password
        $data=$request->only(['username','password']);
//        1 禁用 2启用
        $data['status']='2';
        $result=Auth::guard('admin')->attempt($data,$request->get('online'));
        if ($result){
//            跳转到后台首页
            return redirect('/admin/index/index');
        } else{
            return redirect('/admin/public/login')->withErrors([
                'loginError'=>'用户名或密码错误'
            ]);
        }
    }
//    退出登录
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/public/login');
    }
}
