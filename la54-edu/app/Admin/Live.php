<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    //
    protected $table='live';

//    关联模型 关联专业 一对一
    public function profession(){
        return $this->hasOne('App\Admin\Live','id','profession_id');
    }
    //    关联模型 关联直播流 一对一
    public function stream(){
        return $this->hasOne('App\Admin\Stream','id','stream_id');
    }
}
