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

//后台路由部分 不需要权限判断
Route::group(['prefix'=>'admin'],function (){
//    登录页面展示
    Route::get('public/login','Admin\PublicController@login')->name('login');
//    登录处理页面
    Route::post('public/check','Admin\PublicController@check');
//    退出地址
    Route::get('public/logout','Admin\PublicController@logout');
});

//后台路由部分 需要权限判断 auth中间件
Route::group(['prefix'=>'admin','middleware'=>['auth:admin','checkrbac']],function (){
    //   后台首页路由
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');

//    管理员列表展示
    Route::get('manager/index','Admin\ManagerController@index');

//    权限管理模块
    Route::get('auth/index','Admin\AuthController@index');
    Route::any('auth/add','Admin\AuthController@add');

//    角色管理模块
    Route::get('role/index','Admin\RoleController@index');
    Route::any('role/assign','Admin\RoleController@assign');

//    会员管理模块
    Route::get('member/index','Admin\MemberController@index');
    Route::any('member/add','Admin\MemberController@add');//添加

//    异步头像上传
    Route::post('uploader/webuploader','Admin\UpladerController@webuploader');
    Route::post('uploader/qiniu','Admin\UpladerController@qiniu');//七牛上传
//    ajax异步四级联动
    Route::get('member/getareabyid','Admin\MemberController@getAreaById');

//    专业分类\专业管理模块
    Route::get('protype/index','Admin\ProtypeController@index');
    Route::get('profession/index','Admin\ProfessionController@index');

    //    课程模块
    Route::get('course/index','Admin\CourseController@index');
    Route::get('lesson/index','Admin\LessonController@index');
    Route::get('lesson/play','Admin\LessonController@play');//播放页面

//    试卷模块
    Route::get('paper/index','Admin\PaperController@index');// 试卷列表
    Route::get('question/index','Admin\QuestionController@index');// 试题导出
    Route::get('question/export','Admin\QuestionController@export');// 试题导出
    Route::any('question/import','Admin\QuestionController@import');// 试卷导入

//    直播模块
    Route::get('live/index','Admin\LiveController@index');//直播管理
    Route::get('stream/index','Admin\StreamController@index');//流管理
    Route::any('stream/add','Admin\StreamController@add');
});

//前台路由

//首页路由
Route::get('/','Home\IndexController@index');

//直播视频播放
Route::get('/home/live/player','Home\LiveController@player');

//专业详情页面
Route::get('/home/profession/detail','Home\ProfessionController@detail');
//专业购买确认页面
Route::get('/home/profession/makeOrder','Home\ProfessionController@makeOrder');
Route::get('/home/profession/pay','Home\ProfessionController@pay');
