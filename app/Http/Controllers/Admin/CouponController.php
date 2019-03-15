<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\coupon_shop;
use DB;
use App\Model\Admin\tp_goods;
class CouponController extends Controller
{
    /**
     * 优惠券
     *
     *
     */
    public function index(Request $request)
    {
        //接收表单传值过来的数量,默认是5
        $count = $request->input('count',5);
        //接收搜索的内容
        $name = $request->input('coupon_search','');
       $date = coupon_shop::where('coupon','like','%'.$name.'%')
        ->orderBy('id','desc')
        ->paginate($count);
        $i = 1;
        return view('admin.coupon.index',['date'=>$date,'i'=>$i,'request'=>$request->all() or ""]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $date = tp_goods::all();

        return view('admin.coupon.create',['date'=>$date]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $mun = mt_rand(99999,10000000).time();
        $out = 0;
        //$date = BD::table('tp_goods')->where('')
        $data = $_POST;
        //优惠券状态
        $sku = $data['coupon_nums'];
        $data['coupon_status'] = 0;
        $data['coupon_self'] = 0;
        $data['coupon_out'] =$out;
        $data['coupon_sku'] =$sku;
        $data['coupon_num'] =$mun;
        $gid = $data['coupon_shop'];
        $data['coupon_end_period'] = $data['coupon_end_period'].'-'.$data['end_period'];
        $data['coupon_start_period'] = $data['coupon_start_period'].'-'.$data['start_period'];
        $date = new coupon_shop;
        $date->coupon = $data['coupon'];
        $date->coupon_send_type = $data['coupon_send_type'];
        $date->coupon_many  = $data['coupon_many'];
        $date->coupon_nums  = $data['coupon_nums'];
        $date->coupon_num  = $data['coupon_num'];
        $date->coupon_self  = $data['coupon_self'];
        $date->coupon_out  = $data['coupon_out'];
        $date->coupon_sku  = $data['coupon_sku'];
        $date->coupon_start_period  = $data['coupon_start_period'];
        $date->coupon_end_period  = $data['coupon_end_period'];
        $date->coupon_status  = $data['coupon_status'];
        $date->coupon_rule  = $data['coupon_rule'];
        $date->coupon_shop  = $data['coupon_shop'];
        $date->coupon_setting_type  = $data['coupon_setting_type'];
        $dadd = $date->save();

        //修改商品属性对应的值
        $coupon_id =['coupon_id'=>$date->id];
        $tp_goods = DB::table('tp_goods')->where('id',$gid)->update($coupon_id);
        //提交成功以后
        if($dadd && $tp_goods == true){
            DB::commit();
            return redirect('admin/coupon/{success}')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
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
        return view('admin.coupon.jump');
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
    public function recording(){
        return view('admin.coupon.recording');
    }

    public function cou($id)
    {

        $data = Db::table('coupon_shop')->where('id',$id)->pluck('coupon_out');
        if($data[0]==0){
            $coupon_out = ['coupon_out'=>1];
            $date = Db::table('coupon_shop')->where('id',$id)->update($coupon_out);
        }
        return back();
    }

}
