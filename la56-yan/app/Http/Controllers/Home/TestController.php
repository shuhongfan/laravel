<?php

namespace App\Http\Controllers\Home;

use App\Tb_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    //
    function fun1(){
        echo 'aaaa';
    }
    function fun2(){
        echo 'bbbb';
    }

    function fun5(Request $request){
        if ($request->isMethod('get')){
            return view('r5');
        }
    }
    function fun6(Request $request){
        if ($request->isMethod('post')){
            $all=$request->all();
            dd($all);
        }
    }

    function fun7(Request $request){
//        if ($request->isMethod('get')){
//            return view('r5');
//        } else{
//            $all=$request->all();
//            dd($all);
//        }
        if (Input::method()=='GET'){
            return view('r5');
        } else if (Input::method()=='POST'){
            $all=$request->all();
            dd($all);
        }
    }

    function toubu(){
        return view('toubu.toubu');
    }
    function zi1(){
        return view('zi1');
    }
    function zi2(){
        return view('zi2');
    }


    function shuru1(Request $request){
//        获得网址或者表单内容
        $all=$request->all();
        dd($all);
    }
    function shuru2(){
//        获得网址或者表单内容
        $all=Input::all();
        dd($all);
    }
    function shuru3(){
//        如果网址没有sex则把female赋值给$sex
        $sex=Input::get('sex','female');
        dd($sex);
    }
    function shuru4(Request $request){
        $sex=$request->get('sex','male');
        dd($sex);
    }
    function shuru5(Request $request,$xx,$yy){
        echo $request->get('yuwen');
        echo $request->all()['yuwen'];
        echo Input::get('yuwen');
        echo Input::all()['yuwen'];
        dd($xx,$yy);
    }
    function shuru6(Request $request){
//        把输入的信息存入session中
        $request->flash();
    }
    function shuru7(Request $request){
//        从session中读取数据
        $old=$request->old();
        dd($old);
    }

    function add1(){
        $user=DB::table('usernew');
        $data=[
            'name'=>'liu',
            'pwd'=>'123456'
        ];
        $rst=$user->insert($data);
        dd($rst);
    }
    function add2(){
        $user=DB::table('usernew');
        $data=[
            [
                'name'=>'zhangsan',
                'pwd'=>'123456'
            ],[
                'name'=>'lisi',
                'pwd'=>'123456'
            ]
        ];
        $rst=$user->insert($data);
        dd($rst);
    }

    function del1(){
        $user=DB::table('usernew');
        $x=$user->delete(4);
        dd($x);
    }
    function del2(){
        $user=DB::table('usernew');
        $rst=$user->where('name','zhangsan')->delete();
        dd($rst);
    }
    function del3(){
        $user=DB::table('usernew');
        $rst=$user->where(['name'=>'lisi','id'=>8])->delete();
        dd($rst);
    }
    function del4(){
        $ret=DB::delete("delete from usernew where id=5");
        dd($ret);
    }
    function mod1(){
        $user=DB::table('usernew');
        $rst=$user->where('name','bbb')->update([
            'name'=>'zhangsan'
        ]);
        dd($rst);
    }
    function query1(){
        $user=DB::table('usernew');
        $data=$user->get()->toArray();
        var_dump($data);
        foreach ($data as $row){
            echo $row->name.'<br/>';
        }
    }
    function query2(){
        $user=DB::table('usernew');
        $rst=$user->where('id','>','5')->get(['pwd','id']);
        dd($rst);
    }
    function query3(){
        $user=DB::table('usernew');
        $rst=$user->where('id','>','a')->get()->first();
        dd($rst);
    }
    function query4(){
        $user=DB::table('usernew');
        $rst=$user->where('name','zhangsan')->value('pwd');
        dd($rst);
    }
    function query5(){
        $user=DB::table('usernew');
        $rst=$user->select("name as xm","pwd as mima")->where('name','zhangsan')->get();
        dd($rst);
    }
    function query6(){
        $user=DB::table('usernew')->limit(2)->offset(3)->get();
        $user=DB::table('usernew')->orderBy('name','asc')->orderBy('pwd','desc')->get();
        dd($user);
    }
    function session1(){
        Session::put('user','liubei');
        Session(['pwd'=>'123456','role'=>'admin']);
    }
    function session2(){
        echo Session::get('role');
        dd(Session::all());
    }
    function session3(){
        echo Session::get('xingming','zhangfei');
        if (Session::has('user')){
            echo Session::get('user');
        }
    }
    function session4(){
        Session::flush();
    }

    function login(){
        Session(['user'=>'liubei','pwd'=>'123456']);
    }
    function zeng(){
        echo "增加记录";
    }
    function san(){
        echo "删除记录";
    }
    function gai(){
        echo "修改记录";
    }
    function cha(){
        echo "查询记录";
    }

    function modAdd1(){
        $info=new Tb_info();
        $rst=$info->create([
            'name'=>'liubei',
            'sex'=>'male',
            'class'=>'一班',
            'hobby'=>'足球'
        ]);
        dd($rst);
    }
}


