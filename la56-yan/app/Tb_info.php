<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_info extends Model
{
    //
    protected $table='tb_info';
//    默认id是主键
    protected $primaryKey='id';
//    允许写入字段
    protected $fillable=['name','sex','class','hobby'];
//    时间戳
    public $timestamps=false;
}
