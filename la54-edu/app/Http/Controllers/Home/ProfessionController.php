<?php

namespace App\Http\Controllers\Home;

use App\Admin\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProfessionController extends Controller
{
    //
    public function detail () {
        $data=Profession::find(Input::get('id'));
        return view('home.profession.detail',compact('data'));
    }
    public function makeOrder () {
        $data=Profession::find(Input::get('id'));
        return view('home.profession.makeOrder',compact('data'));
    }
    public function pay () {
        $info=Profession::find(Input::get('id'));
        require_once "http://la54-edu.com/statics/wx/lib/WxPay.Api.php";
        require_once "http://la54-edu.com/statics/wx/lib/WxPay.NativePay.php";
        require_once "http://la54-edu.com/statics/wx/lib/log.php";
    }
}
