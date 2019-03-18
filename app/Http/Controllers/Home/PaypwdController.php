<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Model\Home\home_users;

class PaypwdController extends Controller
{
    /**

     * 修改用户支付密码
     *
     * @return 用电话验证
     */
    public function index()
    {
        //用session获取用的具体信息
        //判断用户是有没有支付密码
        $uphon = session("user_login")[1];
        $data = DB::table('home_users')->where('uphon',$uphon)->pluck('upay')[0];

        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();

        return view('home.homepage.upass',['date'=>$data,'data'=>$flight]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //利用session找到用户的修改方式
        $uphon = session("user_login")[1];

        //支付密码设置成hash格式
        $data['upay'] = Hash::make($request->input('upay'));
        $date = DB::table('home_users')->where('uphon',$uphon)->update($data);
        if($date == true){
            return redirect('/home/pay/1');
        }else{

            return back();
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


       return view('home.homepage.upass_ok');

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
