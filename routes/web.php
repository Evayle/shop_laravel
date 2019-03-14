<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',function(){

return view('home.index.index');
});


//后台登录页面
Route::get('admin/login','Admin\LoginController@index')->name('login');

Route::group(['middleware'=>'login'],function(){

    Route::get('admin','Admin\IndexController@index');

    //后台添加页面
    Route::resource('admin/user','Admin\UserController');

    //退出登录
    Route::any('admin/loutgin','Admin\LoginController@session');
    // 友情链接

    Route::get('admin/friendship/setdata','Admin\FriendshipController@setdata');


    Route::resource('admin/friendship','Admin\FriendshipController');

    // 后台分类管理(huang)
    Route::get('admin/category/create/{id}','Admin\CategoryController@create');
    Route::resource('admin/category','Admin\CategoryController');

    // 后台商品管理(huang)
    Route::resource('admin/goods','Admin\GoodsController');

    // 轮播图管理
    Route::resource('admin/slide','Admin\SlideController');

});

//ajax验证后台登录路由
Route::any('admin/denglu','Admin\LoginController@login');

//ajax验证后台登录路由(测试)
Route::post('admin/deng','Admin\LoginController@deng');

// 购物车
Route::resource('home/shopcart','Home\ShopcartController');


// 前台首页

Route::get('home','Home\IndexController@index')->name('home');

//前台 登录页面
Route::any('home/login','Home\LoginController@login')->name('test');

//前台注册验证页面
Route::any('home/test','Home\TestController@test');

Route::get('home/datection','Home\TestController@detetion');

//前台首页退出登录
Route::get('home/exit','Home\LoginController@exit');



//登录页面提交
Route::post('home/enpty','Home\LoginController@entry');



//注册之后存入数据库,然后直接直接跳转到首页



//短信验证码接口
Route::get('home/send','Home\TestController@updata');


//测试查看session的代码
Route::any('123',function(){
    dump(session()->all());
});


// 徐俊伟的代码
// 前台用户收藏的路由
Route::get('home/collect','Home\CollectController@index');
Route::get('home/collect/create','Home\CollectController@create');

//前台用户跳转模块
//前台点击购物车跳转模块(徐也做了,到时候用他的)
Route::resource('home/shopping','Home\ShoppingController');





//前台的个人中心
//个人中心首页
Route::get('home/page','Home\HomepageController@index');

//个人资料
Route::resource('home/presonal','Home\PresonalController');

//个人积分
Route::resource('home/inteqral','Home\InteqralController');

//用户个人地址
Route::resource('home/address','Home\AddresController');

//用户优惠券
Route::resource('home/coupon','Home\CouponController');

//用户paypwd
//用户修改密码
Route::resource('home/pay','Home\PaypwdController');


//用户修改登录
Route::resource('home/login_pass','Home\UpassController');


//用户订单
Route::resource('home/orders','Home\UorderController');


//用户收藏
Route::resource('home/collection','Home\CollectionController');

//退换货
Route::resource('home/refund','Home\refundController');


//立即付款
Route::resource('home/Receipt','Home\ReceiptController');   


//确认收货




