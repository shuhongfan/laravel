<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TestController extends Controller
{
    //
    public function test1 () {
        return phpinfo();
    }
    public function test2 () {
        echo Input::get('id','10086');
    }
}
