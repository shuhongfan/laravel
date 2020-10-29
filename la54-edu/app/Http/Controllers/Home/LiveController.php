<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveController extends Controller
{
    //
    public function player () {
        return view('home.live.player');
    }
}
