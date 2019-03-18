<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\home_users;
use App\Model\Home\home_integrals;

class HomepageController extends Controller
{
    /**
     * 用户首页
     */

    public function index(){


        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();

        //查询用户详情表的数据
        $uid  = $flight['id'];
        $home_integrals = home_integrals::where('uid',$uid)->first();






        return view('home.homepage.index',['data'=>$flight,'date'=>$home_integrals]);


    }





}
