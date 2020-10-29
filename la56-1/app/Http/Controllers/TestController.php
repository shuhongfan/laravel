<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//命名空间的三元素：常量、方法、类
use Input;
//引入DB门面
use DB;

class TestController extends Controller
{
    //测试控制器路由的使用
    public function test1(){
    	//输出任意信息
    	phpinfo();
    }

    //test2测试Input获取数据
    public function test2(){
    	//获取一个值，如果没有则使用第二个参数当默认值
    	echo Input::get('id','10086') . '<br/>';
    	//获取全部的值（数组形式返回）
    	$all = Input::all();
    	//dd($all);
    	//获取指定的信息（字符串形式）
    	dd(Input::get('name'));
    	//获取指定的几个值（数组形式）
    	dd(Input::only(['id','name']));
    	//获取除了指定的值，之外的值
    	dd(Input::except(['name']));
    	//判断某个值存在与否（布尔值）
    	dd(Input::has('gender'));
    }

    //添加方法
    public function add(){
    	//定义关联操作的表
    	$db = DB::table('member');
    	//使用insert增加记录
    	$result = $db -> insert([
    		[
    			'name'	=>	'马冬梅',
    			'age'	=>	'18',
    			'email' =>	'madongmei@qq.com'
    		],
    		[
    			'name'	=>	'马春梅',
    			'age'	=>	'19',
    			'email' =>	'machunmei@qq.com'
    		],
    	]);
    	// 插入一条记录方法insertGetid
    	$result = $db -> insertGetId([
    				'name'	=>	'马秋梅',
	    			'age'	=>	'21',
	    			'email' =>	'maqiumei@qq.com'
    	]);
    	dd($result);
    }

    //修改方法
    public function update(){
    	//定义需要操作的数据表
    	$db = DB::table('member');
    	//修改id为1的用户的名称为张三疯
    	$ressult = $db -> where('id','<','4') -> update([
    		//需修改字段的键值对
    		'name'		=>	'张三疯',
    	]);
    	dd($ressult);
    }

    //查询方法
    public function select(){
    	$db = DB::table('member');
    	// //查询全部的数据
    	// $data = $db -> get();
    	// //尝试循环下数据
    	// foreach ($data as $key => $value) {
    	// 	echo "id是：{$value -> id}，名字是：{$value -> name}，邮箱是：{$value -> email}<br/>";
    	// }

    	// //查询id>3的数据
    	// $data = $db -> where('id','>','3') -> get();
    	//查询id大于2并且年龄小于21的数据
    	//$data = $db -> where('id','>','2') -> where('age','<','21') -> get();


    	//取出单行记录
    	//$data = $db -> first();

    	//取出指定字段的值
    	// $data = DB::table('member')->where('id','1')->value('email');
    	
    	//查询指定的一些字段的值
    	// $data = DB::table('member')->select('name', 'email')->get();
    	// 
    	//按照指定的字段进行特定规则的排序
    	$data = DB::table('member')->orderBy('age','desc')->get();

    	//分页操作
    	$data = DB::table('member')->offset(1)->limit(2)->get();
    	dd($data);
    }

    //删除操作
    public function del(){
    	//指定需要操作的数据表
    	$db = DB::table('member');
    	//删除id为1的记录
    	$result = $db->where('id','<','3')->delete();
    	dd($result);
    }

}
