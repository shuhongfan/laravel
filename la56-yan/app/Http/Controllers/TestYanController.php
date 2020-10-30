<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TestYanController extends Controller
{
    function fun1(Request $request){
        if ($request->isMethod('get')){
            return view('form1');
        } elseif ($request->isMethod('post')){
            $all=$request->all();
            $this->validate($request,[
                "user"=>"required|min:2|max:6",
                "age"=>"required|min:2|max:130"
            ],[
                "required"=>":attribute必须填写",
                "user.min"=>":attribute至少两个字符",
                "user.max"=>":attribute至多6个字符",
                "age.min"=>":attribute年龄至少1岁",
                "age.max"=>":attribute至多130个字符",
            ],[
                'user'=>'用户名',
                'age'=>'年龄'
            ]);
            echo "验证通过了";
        }
    }
    function fun2(Request $request){
        if ($request->isMethod('get')){
            return view('form2');
        } elseif ($request->isMethod('post')){
            $validator=Validator::make($request->all(),[
                "user"=>"required|min:2|max:6",
                "password"=>"required|min:2|max:6"
            ],[
                "required"=>":attribute必须填写",
                "min"=>":attribute至少两个字符",
                "max"=>":attribute至多6个字符"
            ],[
                'user'=>'用户名',
                'password'=>'密码'
            ]);
            if ($validator->fails()){
//                保留提交的错误信息errors
//                保留提交前的信息 old
                return redirect("/yan2")->withErrors($validator)->withInput();
            }
            echo "验证通过了";
        }
    }
}
