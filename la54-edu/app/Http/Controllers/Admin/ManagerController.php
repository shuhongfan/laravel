<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    //
    public function index() {
        $data=Manager::get();
        return view('admin.manager.index',compact('data'));
    }
}
