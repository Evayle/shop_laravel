<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home\home_users;
use Hash;


class UpassController extends Controller
{
    /**
     *修改用户登密码
     *
     */
    public function index()
    {

         $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();
        return view('home.homepage.upwd',['data'=>$flight]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //ajax验证密码
        $date = $_GET['upass'];
         $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();
        $upss = $flight->upass;
     if (Hash::check($date,$upss)) {
            echo 1;
        }else{
            echo 2;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();
        return view('home.homepage.upwd_2',['data'=>$flight]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();
        return view('home.homepage.upwd_3',['data'=>$flight]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
