<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginpassController extends Controller
{
    /**
     * 手机注密码丢失时验证
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "index";
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
        //获取session的验证码
        $session = session('phon_code')[1];
        $phon= $request->input('uphonsess');//用户的电话号码
        $ress['upass']= Hash::make($request->input('password'));//用户的设置的密码
        $sms = $request->input('sms');//用户的验证码
        if(!$session == $sms){
            return back();
        }
        $date = DB::table('home_users')->where('uphon',$phon)->update($ress);
        if( $date== true){
             Session::forget('phon_code');
              return redirect()->route('test' ,['error'=>404]);
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
        //判断用户是否存在
       $phon = $_GET['phon'];
       $date = DB::table('home_users')->where('uphon',$phon)->first();
       if($date==true){
        echo 1;
       }else{
        echo 2;
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
        //
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
