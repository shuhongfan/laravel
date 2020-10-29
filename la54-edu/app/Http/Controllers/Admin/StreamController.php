<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Stream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StreamController extends Controller
{
    //
    public function index(){
        $data=Stream::orderBy('sort','desc')->get();
        return view('admin.stream.index',compact('data'));
    }
    public function add(){
        if (Input::method()=='POST'){
            $data=Input::except('_token');
//            转化时间
            $data['permited_at']=strtotime($data['permited_at']);
            return Stream::insert($data) ? '1' : '0';
        } else{
            return view('admin.stream.add');
        }
    }
}
