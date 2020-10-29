<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
//    return view('welcome');
    echo 'hello world';
});

Route::get('/home',function (){
    echo 'hello home';
});

Route::any('/test1',function  (){
    echo 'test1';
});

Route::match(['get','post'],'/test2',function (){
   echo 'match';
});

Route::any('/test3/{id}',function ($id){
    echo $id;
});

Route::any('/test4/{id?}',function ($id=''){
    echo $id;
});

Route::any('/test5',function (){
    echo $_GET['id'];
});

//路由别名
Route::any('/test6/fsdfds/fds/sd/gsdsd',function () {
   echo $_GET['id'];
})->name('zhangsan');

//路由群组
Route::group(['prefix'=>'admin'],function (){
    Route::get('test1',function (){
        echo 'test1';
    });
    Route::get('test2',function (){
        echo 'test2';
    });
    Route::get('test3',function (){
        echo 'test3';
    });
});

//控制器路由方法
Route::any('/home/test/test1',"TestController@test1");
Route::any('/home/test/test4',"TestController@test2");

Route::any('/home/test/test2', "Admin\IndexController@index");
Route::any('/home/test/test3', "Home\IndexController@index");
