<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class tp_admin_users extends Model
{
    public function tp_admin_user_infos()
    {
        // 一对一的关系
        return $this->hasOne('App\Model\Admin\tp_admin_user_infos','uid');
    }
}
