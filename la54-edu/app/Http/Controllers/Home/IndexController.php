<?php

namespace App\Http\Controllers\Home;

use App\Admin\Live;
use App\Admin\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){
        $live=Live::orderBy('sort','desc')->where('status','1')->get();
        foreach ($live as $key => $value) {
//            处理最近直播开始时间
            $value->start=date('Y/m/d h:i',$value->begin_at);
//            判断当前直播状态
            if (time()>$value->end_at){
                $value->liveStatus='已结束';
            } elseif (time()<$value->end_at){
                $value->liveStatus='未开始';
            } else{
                $value->liveStatus='直播中';
            }
        }
//        查询专业数据
        $profession=Profession::orderBy('sort','desc')->get();
        return view('home.index.index',compact('live','profession'));
    }
}
