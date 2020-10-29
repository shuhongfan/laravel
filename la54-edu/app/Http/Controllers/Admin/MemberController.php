<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MemberController extends Controller
{
    // 列表方法
    public function index(){
        $data=Member::get();
        return view('admin.member.index',compact('data'));
    }
//    添加方法
    public function add(){
//        判断请求类型
        if (Input::method()=='POST'){
            $result=Member::insert([
                'username'=>Input::get('username'),
                'password'=>bcrypt('password'),
                'gender'=>Input::get('gender'),
                'mobile'=>Input::get('mobile'),
                'email'=>Input::get('email'),
                'avatar'=>Input::get('avatar'),
                'country_id'=>Input::get('country_id'),
                'province_id'=>Input::get('province_id'),
                'city_id'=>Input::get('city_id'),
                'county_id'=>Input::get('county_id'),
                'type'=>Input::get('type'),
                'status'=>Input::get('status'),
                'created_at'=>date('Y-m-d H:i:s'),
            ]);
            return $result ? '1' : '0';
        } else{
            $county=DB::table('area')->where('pid','0')->get();
            return view('admin.member.add',compact('county'));
        }
    }
//    ajax四级联动下属地区
    public function getAreaById(){
//        接收id
        $id=Input::get('id');
//        根据id查询下属地区
        $data=DB::table('area')->where('pid',$id)->get();
//        返回json数据
        return response()->json($data);
    }
}
