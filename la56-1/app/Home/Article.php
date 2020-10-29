<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table='article';
    public $timestamps=false;
//    模型的关联操作 一对一
    //关联作者模型
    public function author(){
        return $this->hasOne('App\Home\Author','id','author_id');
    }
//    关联评论模型 一对多
    public function comment(){
        return $this->hasMany('App\Home\Comment','article_id','id');
    }
//    关联关键词模型 多对多
    public function keyword(){
        return $this->belongsToMany('App\Home\keyword','relation','article_id','key_id');
    }
}
