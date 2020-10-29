<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LessonController extends Controller
{
    // 列表方法
    public function index(){
        $data=Lesson::orderBy('sort','desc')->get();
        return view('admin.lesson.index',compact('data'));
    }
//    播放方法
    public function play(){
        $id=Input::get('id');
//        根据id查询地址
        $addr=Lesson::where('id',$id)->value('video_addr');
//        播放视频
        return "<video src='$addr' controls loop width='100%' height='100%'></video>";
    }
}
