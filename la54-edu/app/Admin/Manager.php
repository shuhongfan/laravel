<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    // 定义当前模型关联数据表
    protected $table = 'manager';
    public function role () {
        return $this->hasOne('App\Admin\Role','id','role_id');
    }
}
