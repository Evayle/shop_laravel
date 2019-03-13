<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\coupon_shop;
class CouponController extends Controller
{
    /**
     * 优惠券
     *
     *
     */
    public function index()
    {
        return view('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mun = mt_rand(99999,10000000).time();
        $data = $_POST;
        //优惠券状态
        $data['coupon_status'] = 0;
        $data['coupon_self'] = 0;
        $data['coupon_num'] =$mun;
        $date = new coupon_shop;
        $date->coupon = $data['coupon'];
        $date->coupon_send_type = $data['coupon_send_type'];
        $date->coupon_many  = $data['coupon_many'];
        $date->coupon_num  = $data['coupon_num'];
        $date->coupon_nums  = $data['coupon_nums'];
        $date->coupon_num  = $data['coupon_num'];
        $date->coupon_self  = $data['coupon_self'];
        $date->coupon_start_time  = $data['coupon_start_time'];
        $date->coupon_end_time  = $data['coupon_end_time'];
        $date->coupon_start_period  = $data['coupon_start_period'];
        $date->coupon_end_period  = $data['coupon_end_period'];
        $date->coupon_status  = $data['coupon_status'];
        $date->coupon_setting_type  = $data['coupon_setting_type'];
        $date->coupon_setting_type  = $data['coupon_setting_type'];
        $date->coupon_rule  = $data['coupon_rule'];
        $date->coupon_shop  = $data['coupon_shop'];
        $dadd = $date->save();
        dump($dadd);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        echo "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "destroy";
    }
}
