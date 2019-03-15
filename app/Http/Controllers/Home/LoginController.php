<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;


class LoginController extends Controller
{

    public function login(){

        return view('home.login.index');
    }




    public function updata(){


    }

    /**
     * 退出登录
     * 这个是跳转页面
     */
    public function exit(){

        //删除判断用户登录session
        session()->forget('user_login');
        //跳转到的登录页面
        return redirect()->route('test');
    }

    /**
     * 登录页面
     * 判断数据库是有该数据
     */

    public function entry(Request $request){

       $date =  $request->except(['_token']);

        //接受过来的值来判断用户是否存在
        $data = DB::table('home_users')->where('uphon',$date['phone'])->first();

        //如果可以通过用户查询到数数据库,那么久
        if (!$data == true) {

            //直接跳转到登录页面
            return redirect()->route('test',['404'=>4]);
        }

        // 密码对比
        if (!Hash::check($date['password'],$data->upass)) {

            //直接跳转到登录页面
            return redirect()->route('test',['404'=>4]);
        }

        //将前台判断session的值,添加到session
        session(['user_login.'.'1' => $data->uphon]);

        //跳转页面
        return redirect()->route('home');

    }

    public function test(){
        echo "验证";
    }




}
