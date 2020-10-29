<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    //
    protected $table='paper';

//    关联模型 关联课程 一对一
    public function course(){
        return $this->hasOne('App\Admin\Course','id','course_id');
    }
}
