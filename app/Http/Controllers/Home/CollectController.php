<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\tp_collect;
use DB;
/**
 * 这是前台用户收藏的控制器
 */
class CollectController extends Controller
{
    // 显示商品详情页
    public function index()
    {
    	return view('home.goods_info.index');

    }

    public function create()
    {
        // 执行添加收藏操作
    	$tp_collect = new tp_collect;
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');

        $tp_collect->home_users_id = $uid[0];
        $tp_collect->goods_id = $_GET['goods_id'];
        $bool = $tp_collect->save();
        if ($bool == true) {
            echo 1;
        }else{
            echo 0;
        }

    }

    public function new_data()
    {
        // 这是查询用户是否添加了收藏商品的 如果未添加 则返回1 前台button按钮显示为'收藏',如果已添加 则返回0 前台button代码显示为'已收藏'
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');
        // return $uid;
        $res['home_users_id'] = $uid[0];
        $res['goods_id'] = $_GET['goods_id'];
        $bool = DB::table('tp_collects')->where($res)->get();
        if (empty($bool[0])) {
            return 1;
        }else{
            return 0;
        }
    }

    public function destroy()
    {
        // 执行删除收藏操作
        $res['goods_id'] = $_GET['goods_id'];

        $phon = session()->get('user_login.1');
        $res['home_users_id'] = DB::table('home_users')->where('uphon',$phon)->pluck('id');
        $data = DB::table('tp_collects')->where($res)->delete();
        return $data;

    }
}
