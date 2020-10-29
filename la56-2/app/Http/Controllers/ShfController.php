<?php

namespace App\Http\Controllers;

use App\Shf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ShfController extends Controller
{
    public function index(){
        $data=Shf::get();
        return view('index',compact('data'));
    }
    public function add(Request $request){
        $this->validate($request,[
            'user'=>'required|min:2|max:20',
            'password'=>'required|min:2|max:20',
            'sex'=>'required',
        ]);
        $user=$request->get('user');
        $password=$request->get('password');
        $sex=$request->get('sex');
        $hobby=implode(',',$request->get('hobby'));
//        $date=$request->all();
        $result=Shf::create([
            'user'=>$user,
            'password'=>$password,
            'sex'=>$sex,
            'hobby'=>$hobby
        ]);
        if ($result){
            echo '添加成功！！！';
            echo redirect('/index');
        }else{
            echo '添加失败！！！';
        }
    }
    public function del(Request $request,$id){
        $result=Shf::destroy($id);
        if ($result){
            echo '删除成功！！！';
            echo redirect('/index');
        }else{
            echo '删除失败！！！';
        }
    }
    public function update(Request $request,$id){
        if ($request->method()=='POST'){
            $this->validate($request,[
                'user'=>'required|min:2|max:20',
                'password'=>'required|min:2|max:20',
                'sex'=>'required',
            ]);
            $result=Shf::find($id);
            $result->user=$request->user;
            $result->password=$request->password;
            $result->sex=$request->sex;
            $result->hobby=implode(',',$request->get('hobby'));
            $result->save();
            if ($result){
                echo '修改成功！！！';
                echo redirect('/index');
            }else{
                echo '修改失败！！！';
            }
        }else{
            $data=Shf::find($id);
            return view('update',compact('data'));
        }
    }
}
