<?php
namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB; //use Illuminate\Support\Facades\DB;
use Session; //use Illuminate\Support\Facades\Session;
use App\Tb_info;
class TestController extends Controller
{
    function addd1(){
        $info = new Tb_info();
        $rst = $info->create(
            [
                'name'  =>  'liu1',
                'sex'   =>  'male',
                'class' =>  '一班',
                'hobby' => '足球'
        ]);
        dd($rst);
    }
    function login(){
        Session(['user'=>'liubei','pwd'=>'123456']);
    }
    function zeng(){
        echo "增加记录";
    }
    function shan(){
        echo "删除记录";
    }
    function gai(){
        echo "修改记录";
    }
    function cha(){
        echo "查询记录";
    }
    function session1(){
        //创建session
        Session::put('user','liubei');
        Session(['pwd'=>'123456','role'=>'admin']);
    }
    function session2(){
        echo Session::get('role');
        dd(Session::all());
    }
    function session3(){
        echo Session::get('xingming','zhangfei');
        if (Session::has('user'))
            echo Session::get('user');
    }
    function session4(){
        //Session::forget(['xingming','user']);
        Session::flush();  //删除全部session
    }



    function query1(){
        $user = DB::table('tb_user');
        //$data = $user->get();
        $data = $user->get()->toArray();
        //return view('view',compact('data'));
        foreach($data as $row){
            echo $row->user;
        }
    }
    function query2(){
        $user = DB::table('tb_user');
        //$rst = $user->where('user','>','a')->get();
        $rst = $user->where('user','>','a')->get(['password','id']);  //取两个字段
        dd($rst);
    }
    function query3(){
        $user = DB::table('tb_user');
        $rst = $user->where('user','>','aa')->get()->first();
        echo $rst->user;
        dd($rst);
    }
    function query4(){
        $user = DB::table('tb_user');
        $rst =  $user->where('user','aaa')->value('password');
        dd($rst);
    }
    function query5(){
        $user = DB::table('tb_user');
        $rst = $user->select("user as xm","password as mima")->where('user','aaa')->get();
        dd($rst);
    }
    function query6(){
        //$user = DB::select("select ......");
        $user = DB::table('tb_user')->orderby('user','asc')->orderby('password','desc')->get();
        //$user = DB::table('tb_user')->orderby('user')->orderby('password','desc')->get();
        $user = DB::table('tb_user')->limit(2)->offset(3)->get();
        dd($user);
    }

    function delete1(){
        $user = DB::table('tb_user');
        $x = $user->delete(4);  //删除记录
        dd($x);
    }
    function delete2(){
        $user = DB::table('tb_user');
        $rst = $user->where('user','guan')->delete();
        dd($rst);  //删除成功的记录数
    }
    function delete3(){
        $user = DB::table('tb_user');
        //$rst = $user->where('user','liu')->where('id','>',1)->delete();
        $rst = $user->where(['user'=>'xxx','id'=>3])->delete();
        dd($rst);  //删除成功的记录数
    }
    function delete4(){
        $rst = DB::delete("delete from tb_user WHERE id = 5");
        dd($rst);
    }
    function modify1(){
        $user = DB::table('tb_user');
        $rst = $user->where('user','yun')->update([
            'user' => 'yyy',
        ]);
        dd($rst);
    }
    function modify2(){
        $user = DB::update("update tb_user set user = 'aaa' where user = 'chao'");
    }
    function modify3(){
        $user = DB::statement("增删改查都可以");
    }


    function add1(){
        $user = DB::table('tb_user');
        $data = [
            'user'      =>   'liu',
            'password'  =>   '123456',
        ];
        $rst = $user->insert($data);
        dd($rst);
    }
    function add2(){
        $user = DB::table('tb_user');
        $rst = $user->insert([
            [
                'user'      =>   'guan',
                'password'  =>   '123456',
            ],[
                 'user'      =>   'fei',
                 'password'  =>   '654321',
            ]
            ]);
        dd($rst);
    }
    function add3(){
        $rst = $user = DB::insert("insert tb_user(user,password)values('chao','7777'),('zhong','888')");
        dd($rst);
    }


    function shuru1(Request $request){
        $all = $request->all();  //获得网址或者表单的内容
        dd($all);
        //http://local.fuxi34.com/shuru1?name=liubei&sex=male&age=18
    }
    function shuru2(){
        $all = Input::all();    //获得网址或者表单的内容
        dd($all);
        //http://local.fuxi34.com/shuru2?name=liubei&sex=male&age=18
    }
    function shuru3(Request $request){
        //$sex = Input::get('sex','female');
        $sex = $request->get('sex','female');
        //如果网址中没有sex,则把female赋值给$sex
        //http://local.fuxi34.com/shuru3?name=liubei&sex=male&age=18
        dd($sex);  //male
    }
    function shuru4(Request $request,$xx,$yy){
        echo $xx,$yy;
        echo $request->all()['yuwen'];
        echo Input::all()['yuwen'];
        //http://local.fuxi34.com/shuru4/sex/male/age/18?yuwen=99&shuxue=88
    }
    function shuru5(Request $request){
        $request->flash();  //把输入的人信息存入到session中
        //http://local.fuxi34.com/shuru5?yuwen=99&shuxue=88
    }
    function shuru6(Request $request){
        //一直都有。
        //$old = $request->old();
        $old = $request->old()['yuwen'];  //得到99
        dd($old);
         //return redirect('/aa')->withInput(); //提交前表单（网址）信息保存到old中
    }
















    function zi1(){
        return view('zi1');
    }
    function zi2(){
        return view('Aaa.zi2');
    }
//    function fuqin(){
//        return view('Aaa.fuqin');
//    }
    function toubu(){
        return view('Aaa.toubu');
        //return view('Aaa\toubu');
        //return view('Aaa/toubu');
    }

    function fun5(Request $request){
        if (Input::method() == 'GET') {
            //if ($request->isMethod('get')){
            return view('view1');
            //}elseif($request->isMethod('post')){
        }elseif(Input::method() == 'POST'){
            $all = $request->all();
            dd($all);
        }
    }

//    function fun5(Request $request){
//        if ($request->isMethod('get')){
//            return view('view1');
//        }
//    }
//    function fun6(Request $request){
//        if ($request->isMethod('post')){
//            $all = $request->all();
//            dd($all);
//        }
//    }

    function fun1(){
        echo "aaaaaa";
    }
    function fun2(){
        echo "bbbbbbbb";
    }
}
