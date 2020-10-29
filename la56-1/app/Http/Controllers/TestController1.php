<?php

namespace App\Http\Controllers;

use App\Home\Article;
use App\Home\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;

class TestController1 extends Controller
{
    //
    public function test1() {
        echo Input::get('id','10086');
//        获取全部的值
        $all = Input::all();
//        dd($all);
//        获取指定的信息
//        dd(Input::get(['name']));
//        dd(Input::only(['id','name']));
//        dd(Input::except(['name']));
        dd(Input::has('name'));
    }

    public function add () {
        $db = DB::table('member');
//        $reuslt = $db -> insert([
//            [
//                'name'=>'马春梅',
//                'age'=>'18',
//                'email'=>'madongmei@126.com'
//            ],
//            [
//                'name'=>'马夏梅',
//                'age'=>'18',
//                'email'=>'madongmei@126.com'
//            ],
//            [
//                'name'=>'马冬梅',
//                'age'=>'18',
//                'email'=>'madongmei@126.com'
//            ],
//        ]);
//        dd($reuslt);
        $result=$db->insertGetId([
            'name'=>'aa',
            'age'=>'55',
            'email'=>'dsss'
        ]);
        dd($result);
    }

    public function update() {
//        定义需要修改的数据表
        $db = DB::table('member');
        $res=$db->where('id','=','3')->update([
            'name'=> '张三疯'
        ]);
        dd($res);
    }

    public function select() {
        $db=DB::table('member');
        $data=$db->get();
//        dd($data);
        foreach ($data as $key=>$value){
            echo "id是 {$value->id} ,名字是: {$value->name} ,邮箱是:{$value->email} <br>";
        }
        $data2=$db->where('id','>','3')->get();
//        dd($data2);
        $data3=$db->where('id','>','2')->orWhere('age','<','20')->get()->first();
//        dd($data3);
        $data4=$db->limit(2)->offset(2)->get();
//        dd($data4);
        $data5=$db->orderBy('id','desc')->get();
        dd($data5);
    }

    public function del() {
        $db = DB::table('member');
        $result=$db->where('id','1')->delete();
        dd($result);
    }

    public function test3 () {
        $date=date('Y-M-D H:i:s',time());
        $day='日';
//        $time=time();
        $time=strtotime('+1 year');
//        return view('/home/test/test3',['date'=>$date,'day'=>$day]);
        var_dump(compact('date','day'));
        return view('/home/test/test3',compact('date','day','time'));
    }

    public function test4() {
        $data=DB::table('member')->get();
        $day=date('N');
//        dd($day);
        return view('home.test.test4',compact('data','day'));
    }

    public function test5() {
        return view('home.test.test5');
    }

    public function test6(){
        return view('home.test.test6');
    }
    public function test7(){
        return '请求提交成功';
    }

//    添加操作
    public function test8(Request $request){
//        实例化模型 将表和类映射起来
//        添加方法1
//        $model=new Member();
//        $model->name='fdsfs';
//        $model->age='28';
//        $model->email='sfdsf@11.com';
//        $result=$model->save();
//        dd($result);

//        添加方法2
        $model=new Member();
        $result=$model->create($request->all());
        dd($result);
    }
    public function test12() {
        return view('home.test.test12');
    }
//    查询操作
    public function test9(){
//        查询指定组件的记录
//        $data=Member::find(4);
        $data=Member::find(4)->toArray();
//        dd($data);

//        查询符合条件的第1条记录
        $data=Member::where('id','>','3')->first();
//        dd($data);

//        查询多行并指定字段
        $data=Member::all();
        $data=Member::where('id','>','')->get();
        dd($data);
    }
//    修改操作
    public function test10(){
//        ar模式的修改操作
        $data=Member::find(4);
//        赋值属性 需要修改的字段进行赋值
        $data->email='admin@qq.com';
//        具体操作
        $data->save();
//        dd($data);

//        使用update方法进行更新
        $result=Member::where('id','5')->update([
            'name'=>'fdsfds'
        ]);
        dd($result);
    }
//    删除操作
    public function test11() {
        $data=Member::find(3);
        dd($data->delete());
    }

    public function test13(Request $request){
        echo Input::method();
        if (Input::method()=='POST'){
            $this->validate($request,[
//                具体规则
                'name'=>'required|min:2|max:20',
                'age'=>'required|integer|min:1|max:100',
                'email'=>'required|email',
                'captcha'=>'required|captcha'
            ]);
        }else{
            return view('home.test.test13');
        }
    }

//    文件上传操作
    public function test14(Request $request){
//        判断请求类型
        if (Input::method()=='POST'){
//            上传
//            判断文件是否正常
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()){
//                获取文件的原始 名称
//                dd($request->file('avatar')->getClientOriginalName());
//                获取文件的大小
//                dd($request->file('avatar')->getClientSize());
                $path=md5(time().rand(100000,9999999)).'.'.$request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')->move('./uploads/',$path);
//                获取全部的数据
                $data=$request->all();
//                将路径添加到数组中
                $data['avatar']='./uploads/'.$path;
                $result=Member::create($data);
                return redirect('/');
            }
        }else{
            return view('home.test.test14');
        }
    }

    public function test15(){
        $data=Member::paginate(1);
        return view('home.test.test15',compact('data'));
    }

    public function test16() {
        return view('home.test.test16');
    }
    public function test17() {
        $data=Member::all();
        return response()->json($data);
    }

    public function test18(){
        Session::put('name','三年高考五年模拟');
        echo Session::get('name');
        echo Session::get('gender','保密');
        echo Session::get('age',function (){
            return '男';
        });
        var_dump(Session::all());
        echo Session::has('user_id');
        Session::forget('name');
        Session::flush();
    }

    public function test19(){
//        存在同名覆盖
        Cache::put('class','shf19',10);
//        Cache::put('count','1',10);
        Cache::add('add','sssss',20);
        Cache::forever('username','666');
        echo Cache::get('username');
        echo Cache::get('sign','这个家伙很懒,什么都没有留下');
        echo Cache::get('time',function (){
            return date('Y-m-d H:i:s',time());
        });
        echo Cache::has('time');
//        获取并删除
        var_dump(Cache::pull('username'));
//        直接删除
//        Cache::forget('time');
//        Cache::flush();
        Cache::increment('count');
//        Cache::decrement('count',10);
        echo Cache::get('count');
        $time=Cache::remember('time',100,function (){
            return date('Y-m-d H:i:s',time());
        });
        var_dump(Cache::has('time'));
        var_dump($time);
    }

    public function test20(){
        $data=DB::table('article as t1')
            ->select('t1.id','t1.article_name','t2.author_name')
            ->leftJoin('author as t2','t1.author_id','=','t2.id')
            ->get();
        dd($data);
    }

    public function test21() {
        $data=Article::get();
        foreach ($data as $key=>$value){
            echo $value->id.'----'.$value->article_name.'----'.$value->author->author_name.'<br>';
        }
    }
    public function test22(){
        $data=Article::get();
        foreach ($data as $key=>$val){
            echo '当前文章名称为 '.$val->article_name.' 其下评论为 '.'<br>';
            foreach ($val -> comment as $k=>$value) {
                echo $value->comment.'<br>';
            }
        }
    }
    public function test23(){
        $data=Article::get();
        foreach ($data as $key=>$value){
            echo '当前文档名称为  '.$value->article_name.' , 其所使用的关键词是 <br>';
            foreach ($value->keyword as $k=>$val){
                echo '&emsp;'.$val->keyword.'<br>';
            }
        }
    }
}
