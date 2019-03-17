<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CouponController extends Controller
{
    /**
     * 用户优惠券
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.homepage.coupon');
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
        //
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
    public function addcoupon()
    {

        //接受过来的商品id;优惠券id;
        $uid = "5";
        $con_id = "7";
        $con_status = "0";
        $con_num = 1;
        //判断用户是不是有这个优惠券
        //如有的话及就+1;
        $dadd = DB::table('home_coupon')->where('uid',$uid)->where('con_id',$con_id
            );
        if ($dadd == true) {

        }

        $date['uid'] = $uid;
        $date['con_id'] = $con_id;
        $date['con_status'] = $con_status;
        $date['con_num'] = $con_num;

        $data = DB::table('home_coupon')->insert($date);
        dump($data);



    }

}
