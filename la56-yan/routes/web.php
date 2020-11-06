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
use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/yan','TestYanController@fun1');
Route::any('/yan2','TestYanController@fun2');

//路由群组
Route::group(['prefix'=>'admin'],function (){
    Route::get('/r1','Admin\testController@fun1');
    Route::get('/r2','Admin\testController@fun2');
});
Route::group(['prefix'=>'home'],function (){
    Route::get('/r3','Home\testController@fun1');
    Route::get('/r4','Home\testController@fun2');
});


Route::get('/r5','home\testController@fun5');
Route::post('/r6','home\testController@fun6');

Route::match(['get','post'],'r7','home\testController@fun7');
Route::any('r8','home\testController@fun7');

//模板继承
Route::get('/toubu','home\testController@toubu');
Route::get('/zi1','home\testController@zi1');
Route::get('/zi2','home\testController@zi2');

Route::get('/shuru1','home\testController@shuru1');
Route::get('/shuru2','home\testController@shuru2');
Route::get('/shuru3','home\testController@shuru3');
Route::get('/shuru4','home\testController@shuru4');
Route::get('/shuru5/sex/{a}/age/{b}','home\testController@shuru5');
Route::get('/shuru6','home\testController@shuru6');
Route::get('/shuru7','home\testController@shuru7');

Route::get('/add1','home\testController@add1');
Route::get('/add2','home\testController@add2');
Route::get('/del1','home\testController@del1');
Route::get('/del2','home\testController@del2');
Route::get('/del3','home\testController@del3');
Route::get('/del4','home\testController@del4');
Route::get('/mod1','home\testController@mod1');
Route::get('/query1','home\testController@query1');
Route::get('/query2','home\testController@query2');
Route::get('/query3','home\testController@query3');
Route::get('/query4','home\testController@query4');
Route::get('/query5','home\testController@query5');
Route::get('/query6','home\testController@query6');

//session
Route::get('/session1','home\testController@session1');
Route::get('/session2','home\testController@session2');
Route::get('/session3','home\testController@session3');
Route::get('/session4','home\testController@session4');


Route::get('/login','home\testController@login');
Route::group(['middleware'=>'testmid'],function (){
    Route::get('/zeng','home\testController@zeng');
    Route::get('/san','home\testController@san');
    Route::get('/gai','home\testController@gai');
    Route::get('/cha','home\testController@cha');
});


