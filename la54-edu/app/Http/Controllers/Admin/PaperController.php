<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Paper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaperController extends Controller
{
    //
    public function index() {
        $data=Paper::get();
        return view('admin.paper.index',compact('data'));
    }
}
