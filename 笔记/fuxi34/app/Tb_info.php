<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_info extends Model
{
    protected $table = 'tb_info';
    //模型Tb_info 关联表 tb_info
    //如果不定义这句话 则模型Tb_info关联的表是 tb_infos
    protected $primaryKey = 'id';
    //默认id是主键
    protected $fillable = ['name','sex','class'];
    //哪些字段允许改写  create
    public $timestamps = false;
    //updated_at  created_at

}
