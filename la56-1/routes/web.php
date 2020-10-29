<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//根路由
Route::get('/', function () {
    //return view('welcome');
    echo 'hello kitty';
});

//例如访问/home地址则路由可以写成
//Route::请求方式（'请求的URL', 匿名函数或控制响应的方法）
Route::get('/home',function(){
	echo '当前访问的地址是/home';
});

//any语法
//Route::请求方式（'请求的URL', 匿名函数或控制响应的方法）
Route::any('/test1',function(){
	echo '当前访问的地址是/test1';
});

//match语法
//Route::请求方式（[请求类型],请求的URL', 匿名函数或控制响应的方法）
Route::match(['get','post'],'/test2',function(){
	echo '当前访问的地址是/test2';
});

//必选参数
Route::any('/test3/{id}',function($id){
	echo "当前的用户id是" . $id;
});

//可选参数
Route::any('/test4/{id?}',function($id = ''){
	echo "当前的用户id是" . $id;
});

//通过?形式传递get参数
Route::any('/test5',function(){
	echo "当前的用户id是" . $_GET['id'];
});

//路由别名
Route::any('/test5/adsasdasd/wrwerwefsdc/adasdasd',function(){
	echo "当前的用户id是" . $_GET['id'];
}) -> name('zhangsan');

//路由群组
Route::group(['prefix' => 'admin'], function () {
    Route::get('test1', function ()    {
        // 匹配 "/admin/test1" URL
    });
    Route::get('test2', function ()    {
        // 匹配 "/admin/test2" URL
    });
    Route::get('test3', function ()    {
        // 匹配 "/admin/test3" URL
    });
});


//控制器路由写法
Route::get('/home/test/test1','TestController@test1');

//分目录管理
Route::get('/home/index/index','Home\IndexController@index');
Route::get('/admin/index/index','Admin\IndexController@index');


Route::get('/home/test/test2','TestController@test2');

//DB门面的增删改查
Route::group(['prefix' => 'home/test'],function(){
	Route::get('add','TestController@add');
	Route::get('del','TestController@del');
	Route::get('update','TestController@update');
	Route::get('select','TestController@select');
});


Route::get('/shf1','TestController1@test1');
Route::group(['prefix'=>'/shf2'],function (){
    Route::get('add','TestController1@add');
    Route::get('del','TestController1@del');
    Route::get('update','TestController1@update');
    Route::get('select','TestController1@select');
});
Route::get('/shf3','TestController1@test3');
Route::get('/shf4','TestController1@test4');
Route::get('/shf5','TestController1@test5');


//csrf验证
Route::get('shf6','TestController1@test6');
Route::post('shf7','TestController1@test7')->name('test7');

//模型增删改查
Route::any('/shf8','TestController1@test8');
Route::get('/shf9','TestController1@test9');
Route::get('/shf10','TestController1@test10');
Route::get('/shf11','TestController1@test11');
Route::get('/shf12','TestController1@test12');

//自动验证 自己提交给自己
Route::any('/shf13','TestController1@test13');

//文件上传
Route::any('/shf14','TestController1@test14');

//分页操作
Route::any('/shf15','TestController1@test15');

//响应方式
Route::any('/shf16','TestController1@test16');
Route::any('/shf17','TestController1@test17');

//会话控制
Route::any('/shf18','TestController1@test18');

//缓存操作
Route::any('/shf19','TestController1@test19');

//连表查询
Route::any('/shf20','TestController1@test20');

//关联模型
Route::any('/shf21','TestController1@test21');//一对一
Route::any('/shf22','TestController1@test22');//一对多
Route::any('/shf23','TestController1@test23');//多对多