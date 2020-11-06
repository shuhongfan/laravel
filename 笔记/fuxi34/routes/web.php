<?php
Route::get('addd1','Home\TestController@addd1');

Route::get('/login','Home\TestController@login');
//Route::get('/zeng','Home\TestController@zeng')->middleware('testmid');
//Route::get('/shan','Home\TestController@shan')->middleware('testmid');
//Route::get('/gai','Home\TestController@gai')->middleware('testmid');
//Route::get('/cha','Home\TestController@cha')->middleware('testmid');

Route::group(['middleware'=>'testmid'],function(){
    Route::get('/zeng','Home\TestController@zeng');
    Route::get('/shan','Home\TestController@shan');
    Route::get('/gai','Home\TestController@gai');
    Route::get('ha','Home\TestController@cha');
});

Route::get('/session1','Home\TestController@session1');
Route::get('/session2','Home\TestController@session2');
Route::get('/session3','Home\TestController@session3');
Route::get('/session4','Home\TestController@session4');


Route::get('/add1','Home\TestController@add1');
Route::get('/add2','Home\TestController@add2');
Route::get('/add3','Home\TestController@add3');

Route::get('delete1','Home\TestController@delete1');
Route::get('delete2','Home\TestController@delete2');
Route::get('delete3','Home\TestController@delete3');
Route::get('delete4','Home\TestController@delete4');

Route::get('/modify1','Home\TestController@modify1');
Route::get('/modify2','Home\TestController@modify2');
Route::get('/modify3','Home\TestController@modify3');

Route::get('/query1','Home\TestController@query1');
Route::get('/query2','Home\TestController@query2');
Route::get('/query3','Home\TestController@query3');
Route::get('/query4','Home\TestController@query4');
Route::get('/query5','Home\TestController@query5');
Route::get('/query6','Home\TestController@query6');

Route::get('shuru1','Home\TestController@shuru1');
Route::get('shuru2','Home\TestController@shuru2');
Route::get('shuru3','Home\TestController@shuru3');
Route::get('shuru4/sex/{s}/age/{a}','Home\TestController@shuru4');
Route::get('shuru5','Home\TestController@shuru5');
Route::get('shuru6','Home\TestController@shuru6');

Route::get('/tuobu','Home\TestController@toubu');
//Route::get('fuqin','Home\TestController@fuqin');
Route::get('/zi1','Home\TestController@zi1');
Route::get('/zi2','Home\TestController@zi2');

Route::group(['prefix'=>'Admin'],function(){
    Route::get('r1','Admin\TestController@fun1');
    Route::get('r2','Admin\TestController@fun2');
});

Route::group(['prefix'=>'Home'],function(){
    Route::get('r3','Home\TestController@fun1');
    Route::get('r4','Home\TestController@fun2');
});

//Route::get('/r5','Home\TestController@fun5');
//Route::post('/r6','Home\TestController@fun6');

//Route::match(['get','post'],'/r5','Home\TestController@fun5');
Route::any('/r5','Home\TestController@fun5');

