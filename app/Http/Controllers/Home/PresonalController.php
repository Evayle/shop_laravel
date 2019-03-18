<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\home_users;
use DB;

class PresonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //个人资料首页
        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();
        return view('home.homepage.personal_information',['data'=>$flight]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uphon = session('user_login')[1];
        $re = $request->except(['_token','file']);
       $date = DB::table('home_users')->where(['uphon'=>$uphon])->update($re);
      if ($request->hasFile('file')) {
           $file = $request->file('file');//创建文件上传对象
             //设置文件路径
             $path_file = 'public/home/avatr';
        //     //获取文件的后缀名
             $ext = $file->extension();
             //验证是不是图片
            $images = array("jpg","jpeg","gif","png");
     if (in_array($ext, $images))
          {
            //上传指定文件
            $res = $file->store($path_file);
            $res1 = substr($res, 6);
             $user_img['uavatr'] = 'storage'.$res1;
            $data = DB::table('home_users')->where('uphon',$uphon)->update($user_img);
         }
         return redirect('/home/presonal');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unme['uname']=$_GET['tel'];
        $date = DB::table('home_users')->where($unme)->first();
        if ($date) {

            echo 2;

        }else{
            echo 1;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 22;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
