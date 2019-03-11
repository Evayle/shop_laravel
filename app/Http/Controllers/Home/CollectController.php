<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\tp_collect;

/**
 * 这是前台用户收藏的控制器
 */
class CollectController extends Controller
{
    //
    public function index()
    {
    	return view('home.goods_info.index');

    }

    public function create()
    {
    	$tp_collect = new tp_collect;
    	
    	// 这里要做验证,验证用户id和商品id,都通过就添加进收藏表,不通过就返回错误
    	// 目前没有前台用户模块
    	$tp_collect->home_users_id = $_GET['users_id'];
    	$tp_collect->goods_id = $_GET['goods_id'];
    	$bool = $tp_collect->save();
    	// dump($bool);exit;
    	if ($bool == true) {
    		echo 1;
    	}else{
    		echo 0;
    	}

    }

    public function destroy()
    {

    }
}
