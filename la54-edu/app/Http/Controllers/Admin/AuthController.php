<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    // 列表
    public function index(){
//        查询数据
//        select t1.*,t2.auth_name as parent_name  from auth as t1 left join auth as t2 on t1.pid=t2.id;
        $data=DB::table('auth as t1')
            ->select('t1.*','t2.auth_name as parent_name')
            ->leftJoin('auth as t2','t1.pid','=','t2.id')
            ->get();
        return view('admin.auth.index',compact('data'));
    }
//    添加
    public function add(){
        if (Input::method()=='POST'){
            $data=Input::except('_token');
            $result=Auth::insert($data);
            return $result ? '1' : '0';
        } else{
//            查询父级权限
            $parents=Auth::where('pid','=','0')->get();
            return view('admin.auth.add',compact('parents'));
        }
    }
}
