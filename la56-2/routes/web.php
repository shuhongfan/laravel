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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/index','ShfController@index');
Route::any('/add','ShfController@add');
Route::any('/del/{id}','ShfController@del');
Route::any('/update/{id}','ShfController@update');
