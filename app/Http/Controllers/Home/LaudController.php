<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\tp_laud;
use App\Model\Home\tp_lauds_info;
use DB;
/**
 * 这是点赞的控制器
 */
class LaudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return false;
    }

    /**
     * Show the form for creating a new resource.
     * 这里是页面加载后根据是否已点赞进行前台按钮的修改的 勿删
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $tp_lauds_info = new tp_lauds_info;
        // 获取用户id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');// 注意:这里返回的是一个数组

        $res = $request->only('goods_id');
        $res['home_users_id'] = $uid[0];
        // return $res;

        $infos = DB::table('tp_lauds_infos')->where($res)->limit(5)->get();
        if (!empty($infos[0])) {
            return 4;
        }
    }

    /**
     * Store a newly created resource in storage.
     * 这是点赞的控制器 勿删
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tp_laud = new tp_laud;
         $tp_lauds_info = new tp_lauds_info;

        //获取用户id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');// 注意:这里返回的是一个数组

        // // 获取商品id
        $data = $request->only('goods_id');
        $res['goods_id'] = $data['goods_id'];
        $res['home_users_id'] = $uid['0'];

        $infos = DB::table('tp_lauds_infos')->where($res)->get();
        // return $infos;
        // 这里判断用户点赞表是否有该用户的id和该商品的id
        if(empty($infos[0])){
            // 这里判断有没有值 有值走1 没值走0添加
            // 这里是添加
            $lauds_infos_add = DB::table('tp_lauds_infos')->insert($res);

            // 这里判断添加是否成功 成功进行点赞+1操作 失败返回重新操作
            if($lauds_infos_add){
                // 查询点赞表是否有该商品的数据 有的进行修改 点赞数加1 没有就添加商品到点赞表
                $tp_lauds_sel = Db::table('tp_lauds')->where('goods_id',$res['goods_id'])->get();
                // return $tp_lauds_sel;
                if(empty($tp_lauds_sel)){
                    // 进行修改 点赞数加1 increment是递增 默认1 可后加递增参数 递减是decrement
                    $tp_laud_up = DB::table('tp_lauds')->increment('laud',2);
                    if ($tp_laud_up) {
                        return 1;
                    }else{
                        return 0;
                    }
                }else{
                    // 没有走假 添加商品到点赞表
                    $lauds_data['goods_id'] = $res['goods_id'];
                    $lauds_data['laud'] = 1;
                    $lauds_add = DB::table('tp_lauds')->insert($lauds_data);
                    if ($lauds_add) {
                        return 3;
                    }else{
                        return 0;
                    }
                }
            }else{
                return 0;
            }
        }else{
            // 有值说明已经点过赞了直接返回
            return 2;
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
