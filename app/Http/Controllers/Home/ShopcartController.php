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
     * 这是购物车主页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //判断用户的信息
         //利用session查询用户的登录账号
        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();

        // 获取用户id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');

        // 获取本用户购物车所有内容 遍历出来
        $info = DB::table('tp_shopcarts')->where('home_users_id', $uid[0])->get();
        if (!empty($info[0])) {
            // 注意 购物车字段不多 商品的详细信息要再次查询商品表
            $j = 0;
            $sum = 0;
            foreach ($info as $v) {
                // 把用户购物车的商品详细信息查出来放到数据表
                $gid = $v->goods_id;
                $goods[$j] = DB::table('tp_goods')->where('id', $gid)->first();
                // dump($goods);
                foreach ($info as $val) {
                    if ($goods[$j]->id == $val->goods_id) {
                        // 获取购物车所有价格内容
                        $sum += $goods[$j]->goods_price*$val->sc_num;
                    }
                }
                $j++;
            }
            // dump($sum);
            return view('home.shopcart.index',['data'=>$flight, 'info'=>$info, 'goods'=>$goods, 'sum'=>$sum]);
        }
        return view('home.shopcart.index', ['data'=>$flight]);
    }

    /**
     * 这是添加商品进购物车方法 勿删
     */
    public function add(Request $request)
    {
        $data = $request->all();
        // 获取用户的id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');// 注意:这里返回的是一个对象

        // 这里做个判断 如果同一个用户添加同样的商品 则在原商品的基础上添加即可
        $ves['home_users_id'] = $uid[0];
        $ves['goods_id'] = $data['goods_id'];
        $user_goods = DB::table('tp_shopcarts')->where($ves)->get();
        if (!empty($user_goods[0])) {
            // return $user_goods;
            // 如果有商品则添加新的数量就可以了
            $new_goods = DB::table('tp_shopcarts')->where($ves)->increment('sc_num',$data['sc_num']);
            // 无论成功失败都返回受影响的行数
            return $new_goods;// 成功返回1失败返回0
        }
        // 本可以使用上面的$ves 怕报错所以整合数据到一个新数组 添加到购物车表
        $res['home_users_id'] = $uid[0];
        $res['goods_id'] = $data['goods_id'];
        $res['sc_num'] = $data['sc_num'];
        // $tp_shopcart = new tp_shopcart;
        // return $res;
        $bool = DB::table('tp_shopcarts')->insert($res);
        if ($bool) {
            // 为真返回1
            return 1;
        }else{
            // 为假返回0
            return 0;
        }
    }

    /**
     * 这是购物车页面的加减按钮处理
     */
    public function on_off(Request $request)
    {
        $data = $request->all();

        // 获取用户的id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');// 注意:这里返回的是一个对象
        $res['home_users_id'] = $uid[0];
        $res['goods_id'] = $data['goods_id'];
        // return $res;
        if (!empty($data['sub'])) {

            $list = DB::table('tp_shopcarts')->where($res)->decrement('sc_num');
            return $list;
        }else{
            $list = DB::table('tp_shopcarts')->where($res)->increment('sc_num');
            return $list;
        }
        
        // return $data;
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
        // 把用户默认地址写到一个新数组里
        $ads = [];
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
        $date_new = date('Y年m月d日 H:i:s', time());
        // 订单号
        $sn = date('Ymd').rand(100000,999999);
        $goods = DB::table('tp_goods')->where('id', $_GET['id'])->first();

        // dd($goods);
        $ads2 = DB::table('tp_address')->where('user_id', $uid[0])->take(3)->get();
        return view('home.shopcart.pay',['ads'=>$ads, 'goods'=>$goods, 'ads2'=>$ads2, 'date_new'=>$date_new, 'sn'=>$sn]);
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
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');
        // dump($uid[0]); 获取用户id 通过用户id获取用户默认地址
        $res['user_id'] = $uid[0];
        $res['status'] = 1;
        $address = DB::table('tp_address')->where($res)->get();
        // dump($address);
        // 把用户默认地址写到一个新数组里
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
        $ads2 = DB::table('tp_address')->where('user_id', $uid[0])->take(3)->get();
        // dump($ads2);
        return view('home.shopcart.pay2', ['ads'=>$ads, 'ads2'=>$ads2]);
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
     * 这是订单结算页
     */
    public function pay(Request $request)
    {
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');
        $info = DB::table('tp_shopcarts')->where('home_users_id',$uid[0])->get();
        // dump($info);
        // dump($request->all());
        $res['user_id'] = $uid[0];
        $res['status'] = 1;
        $address = DB::table('tp_address')->where($res)->get();
        // dd($address);
        
        // dump($ads);
        // 技术有限 目前是默认全选购物车所有内容
        $cart = DB::table('tp_shopcarts')->where('home_users_id', $uid[0])->get();
        // dd($cart);
        $s = 0;
        $ssnum = '0';
        foreach($cart as $v){
            $goods[] = DB::table('tp_goods')->where('id', $v->goods_id)->first();
        }
        // dump($goods);
        // dd($cart);
        // 获取用户商品所有价格  技术太菜 写不了jq代码只能写php
        foreach ($goods as $v) {
            // dump(#v);
            foreach ($cart as $val) {
                if ($v->id == $val->goods_id) {
                
                    $ssnum += $v->goods_price*$val->sc_num;
                    // dump($ssnum);
                }
            }
        }
        // 订单添加时间
        $date_new = date('Y年m月d日 H:i:s', time());
        // dump($date_new);
        $sn = date('Ymd').rand(100000,999999);
        // dd($sn);
        // 把用户默认地址写到一个新数组里
        if (!empty($address[0])) {
            // 有值就遍历三个非默认值的地址
            $ads2 = DB::table('tp_address')->where('user_id', $uid[0])->take(3)->get();
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
        
            return view('home.shopcart.pay2', ['ads'=>$ads, 'ads2'=>$ads2, 'cart'=>$cart, 'goods'=>$goods, 'date_new'=>$date_new, 'sn'=>$sn, 'ssnum'=>$ssnum]);
        }
        return view('home.shopcart.pay2', ['cart'=>$cart, 'goods'=>$goods, 'date_new'=>$date_new, 'sn'=>$sn, 'ssnum'=>$ssnum]);
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

    /**
     * 一个新的删除方法 原来的资源路由删除出了个小bug
     */

    public function del(Request $request)
    {
        $id = $request->all();
        $bool = DB::table('tp_shopcarts')->delete($id);
        // dump($bool);
        return back();
    }
}
