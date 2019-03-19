<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Home\home_users;
use App\Model\Home\home_integrals;
use App\Model\Home\order;

class UorderController extends Controller
{
    /**
     * 用户订单
     *
     */
    public function index()
    {
        
        return view('home.homepage.orders');
    }

    /**
     * 新增的路由 用于在购物车添加数据到订单
     */
    public function add(Request $request)
    {
        /*开启事务   DB::beginTransaction();
        提交事务   DB::commit()
        回滚事务   DB::rollBack()*/

        DB::beginTransaction();
        $list = $request->all();
        // dd($list);
        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();

        // 获取用户id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');
        
        $cart = DB::table('tp_shopcarts')->where('home_users_id',$uid[0])->get();
        // dump($cart);
        /*$order = new order;
        
        $order->user_id = $uid[0];
        $order->order_sn = $list['order_sn'];
        $order->address_id = $list['addr'];
        $order->home_coupen_id = 0;// 这是用户优惠券的id 目前没有 
        $order->status = 0;
        $bool = $order->save();*/
        $res['order_sn'] = $list['order_sn'];
        $res['user_id'] = $uid[0];
        $res['address_id'] = $list['addr'];
        $res['home_coupen_id'] = 0;
        $res['status'] = 0;
        $res['addtime'] = date('Y-m-d H:i:s',time());
        // dd($res);
        $id=DB::table('tp_orders')->insertGetId($res);
        // $bool = DB::table('tp_orders')->insert($res);
        // dd($id);
        if ($id) {
            foreach ($cart as $v) {
                $rer['orders_id'] = $id;
                $rer['goods_id'] = $v->goods_id;
                $bool = DB::table('tp_orders_infos')->insert($rer);
            }
            if ($bool == true) {
               DB::commit();
               $yn = DB::table('tp_shopcarts')->where('home_users_id', $uid[0])->delete();
               if ($yn) {
                    return view('home.homepage.orders');
               }
            }
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }

    public function ads(Request $request)
    {
        // dd($_GET);
        DB::beginTransaction();
        $list = $request->all();
        // dd($list);
        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();

        // 获取用户id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');
        
        // $cart = DB::table('tp_shopcarts')->where('home_users_id',$uid[0])->get();
        // dump($cart);
        /*$order = new order;
        
        $order->user_id = $uid[0];
        $order->order_sn = $list['order_sn'];
        $order->address_id = $list['addr'];
        $order->home_coupen_id = 0;// 这是用户优惠券的id 目前没有 
        $order->status = 0;
        $bool = $order->save();*/
        $res['order_sn'] = $list['order_sn'];
        $res['user_id'] = $uid[0];
        $res['address_id'] = $list['addr'];
        $res['home_coupen_id'] = 0;
        $res['status'] = 0;
        $res['addtime'] = date('Y-m-d H:i:s',time());
        // dd($res);
        $id=DB::table('tp_orders')->insertGetId($res);
        // $bool = DB::table('tp_orders')->insert($res);
        // dd($id);
        if ($id) {
            // foreach ($cart as $v) {
                $rer['orders_id'] = $id;
                $rer['goods_id'] = $list['id'];
                $bool = DB::table('tp_orders_infos')->insert($rer);
            // }
            if ($bool == true) {
               DB::commit();
               // $yn = DB::table('tp_shopcarts')->where('home_users_id', $uid[0])->delete();
               // if ($yn) {
                    return view('home.homepage.orders');
               // }
            }
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
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
}
