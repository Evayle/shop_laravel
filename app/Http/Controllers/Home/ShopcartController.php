<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\tp_address;
use DB;
use App\Model\Home\home_users;
use App\Model\Home\home_integrals;

/**
 * 这是购物车的控制器
 */

class shopcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //判断用户的信息
         //利用session查询用户的登录账号
        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();

        return view('home.shopcart.index',['data'=>$flight]);
    }

    /**

     * 这是添加商品进购物车方法 勿删
     */
    public function add(Request $request)
    {
        $data = $request->all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd($_GET);
        $tp_address = new tp_address;
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');
        // dump($uid[0]); 获取用户id 通过用户id获取用户默认地址
        $res['user_id'] = $uid[0];
        $res['status'] = 1;
        $address = DB::table('tp_address')->where($res)->get();
        // dump($address);
        foreach ($address as $v) {
          $ads['id'] = $v->id;
          $ads['user_id'] = $v->user_id;
          $ads['name'] = $v->name;
          $ads['address'] = $v->address;
          $ads['address_info'] = $v->address_info;
          $ads['phone'] = $v->phone;
          $ads['code'] = $v->code;
          $ads['status'] = $v->status;
        }
        // dump($ads);

        $goods = DB::table('tp_goods')->where('id', $_GET['id'])->first();

        // dd($goods);

        return view('home.shopcart.pay',['ads'=>$ads, 'goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dump($request->all());
        return view('home.shopcart.pay');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        echo "edit";
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


    }

}
