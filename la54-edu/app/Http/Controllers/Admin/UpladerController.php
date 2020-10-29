<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UpladerController extends Controller
{
    // 上传文件处理
    public function webuploader (Request $request) {
//        判断是否有文件上传成功
        if ($request->hasFile('file')&& $request->file('file')->isValid()){
//            文件重命名
            $filename=sha1(time() .
                $request->file('file')->getClientOriginalName()) .'.'.
                $request->file('file')->getClientOriginalExtension();
//            dd($filename);
//            Storage门面通用文件保存方法
            Storage::disk('public')->put($filename,file_get_contents($request->file('file')->path()));
//            返回数据
            $result=[
                'errCode'=>'0',
                'errMsg'=>'',
                'succMsg'=>'文件上传成功!',
                'path'=>'/storage/'.$filename
            ];
        } else{
            $result=[
                'errCode'=>'000001',
                'errMsg'=>$request->file('file')->getErrorMessage()
            ];
        }
        return response()->json($result);
    }
    // 上传文件处理 七牛
    public function qiniu (Request $request) {
//        判断是否有文件上传成功
        if ($request->hasFile('file')&& $request->file('file')->isValid()){
//            文件重命名
            $filename=sha1(time() .
                    $request->file('file')->getClientOriginalName()) .'.'.
                $request->file('file')->getClientOriginalExtension();
//            dd($filename);
//            Storage门面通用文件保存方法
            Storage::disk('qiniu')->put($filename,file_get_contents($request->file('file')->path()));
//            返回数据
            $result=[
                'errCode'=>'0',
                'errMsg'=>'',
                'succMsg'=>'文件上传成功!',
                'path'=>Storage::disk('qiniu')->getDriver()->downloadUrl($filename)
            ];
        } else{
            $result=[
                'errCode'=>'000001',
                'errMsg'=>$request->file('file')->getErrorMessage()
            ];
        }
        return response()->json($result);
    }
}
