<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class home_users extends Model
{

    public function home_users()
    {
        //一对一,用户对积分
        return $this->hasOne('App\Model\Home\homne_users','uid');
    }
}
