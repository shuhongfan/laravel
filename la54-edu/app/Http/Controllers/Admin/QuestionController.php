<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Paper;
use App\Admin\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use Illuminate\Support\Facades\Input;

class QuestionController extends Controller
{
    // 列表
    public function index() {
        $data=Question::get();
        return view('admin.question.index',compact('data'));
    }

//    导出方法
    public function export(){
//        excel表格数据
        $cellData = [
            ['序号','题干','所属试卷','分值','选项','正确答案','添加时间']
        ];
//        查询数据
        $data=Question::all();
        foreach ($data as $key=>$val){
            $cellData[]=[
                $val->id,
                $val->question,
                $val->paper->paper_name,
                $val->score,
                $val->options,
                $val->answer,
                $val->created_at
            ];
        }
//        使用excel类
        Excel::create(sha1(time().rand(1000,9999)),function($excel) use ($cellData){
            //在此处可以使用celldata
            $excel->sheet('题库', function($sheet) use ($cellData){
                //写入行数据
                $sheet->rows($cellData);
            });
        })->export('xls');//导出
    }

//    导入
    public function import(){
//        判断请求类型
        if (Input::method()=='POST'){
//            数据导入操作
            $filePath = Input::get('excelpath');//文件的路径
            Excel::load($filePath, function($reader) {
                $data = $reader -> getSheet(0) -> toArray();
                //读取全部的数据
                $temp = [];
                foreach ($data as $key => $value) {
                    //排除表头
                    if($key == '0'){
                        continue;
                    }
                    //此时value是数组
                    $temp[] = [
                        'question'		=>		$value[0],//题干
                        'paper_id'		=>		Input::get('paper_id'),//试卷id
                        'score'			=>		$value[3],//分值
                        'options'		=>		$value[1],//选项
                        'answer'		=>		$value[2],//答案
                        'created_at'	=>		date('Y-m-d H:i:s'),//创建时间
                    ];

                }
                //写入数据
                $result = Question::insert($temp);
                echo $result ? '1' : '0';
            });
        } else {
            //        查询试卷列表
            $list=Paper::get();
            return view('admin.question.import',compact('list'));
        }
    }
}
