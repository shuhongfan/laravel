<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shf extends Model
{
    //
    protected $table="user";
    protected $primaryKey='id';
    public $timestamps= false;
    protected $fillable=['user','password','sex','hobby'];
}
