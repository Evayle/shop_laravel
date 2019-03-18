<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AvatrerComtroller extends Controller
{
    //文件上传

    public function index(Request $request)
    {
        echo 1;
    }




    // public function index(){
    // $flie = $_GET['avater'];
    // $pic['uavatr'] = basename($flie);
    // $id = session('user_login')[1];
    // dump($id);
    // $date = DB::table('home_users')->where(['uphon'=>$id])->update($pic);
    // dump($date);




}
