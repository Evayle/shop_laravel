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


return redirect('/home');
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



    // 轮播图管理
    Route::resource('admin/slide','Admin\SlideController');
    //后台优惠券管理


    Route::get('admin/coupon/cou/{id}','Admin\CouponController@cou');
    Route::resource('admin/coupon','Admin\CouponController');
    Route::any('admin/coupon_recording','Admin\CouponController@recording');

    // 后台分类管理(huang)
    Route::get('admin/category/create/{id}','Admin\CategoryController@create');
    Route::resource('admin/category','Admin\CategoryController');

    // 后台商品管理(huang)
    Route::resource('admin/goods','Admin\GoodsController');

    // 轮播图管理
    Route::resource('admin/slide','Admin\SlideController');


});




//前台不用登陆就跳转的页面

// 前台首页

Route::get('home','Home\IndexController@index')->name('home');







//前台 登录页面
Route::any('home/login','Home\LoginController@login')->name('test');


//用户忘记密码
Route::any('home/login_edit','Home\Login_passController@upedit');
Route::resource('home/login_mod','Home\LoginpassController');


//用户修改登录密码
Route::resource('home/login_pass','Home\UpassController');


//登录页面提交
Route::post('home/enpty','Home\LoginController@entry');

Route::group(['middleware'=>'test'],function(){



//前台注册验证页面
Route::any('home/test','Home\TestController@test');
Route::get('home/datection','Home\TestController@detetion');



//用户paypwd
//用户修改支付密码
Route::resource('home/pay','Home\PaypwdController');
Route::get('home/payupss/send','Home\PaypwdsController@send');
Route::get('home/payupss/send1','Home\PaypwdsController@send1');
Route::post('home/payupss/send2','Home\PaypwdsController@send2');
Route::any('home/payupss/send3','Home\PaypwdsController@send3');
Route::resource('home/payupss','Home\PaypwdsController');


// 购物车

// 添加一条新的路由 用于添加商品进购物车
Route::get('home/shopcart/add','Home\ShopcartController@add');
Route::resource('home/shopcart','Home\ShopcartController');

//短信验证码接口
Route::get('home/send','Home\TestController@updata');


//前台首页退出登录
Route::get('home/exit','Home\LoginController@exit');



// 徐俊伟的代码
// 前台用户收藏的路由
Route::get('home/collect/{id}','Home\CollectController@index');
Route::get('home/collect/create','Home\CollectController@create');
Route::get('home/collect/new_data','Home\CollectController@new_data');
Route::get('home/collect/destroy','Home\CollectController@destroy');


//前台用户跳转模块
//前台点击购物车跳转模块(徐也做了,到时候用他的)
Route::resource('home/shopping','Home\ShoppingController');


//前台的个人中心
//个人中心首页
Route::get('home/page','Home\HomepageController@index');

//个人资料
Route::resource('home/presonal','Home\PresonalController');
//头像无刷新上传
Route::any('home/avater','Home\AvatrerComtroller@index');

//个人积分
Route::resource('home/inteqral','Home\InteqralController');

//用户个人地址  注意:这里的控制器是"addres Controller"  没有s
Route::get('home/address/address','Home\AddresController@address');// 新增的个人地址方法
Route::get('home/address/upd/{id}','Home\AddresController@add');

Route::resource('home/address','Home\AddresController');

//用户优惠券

//领取得到优惠券
Route::get('home/coupon/add','Home\CouponController@addcoupon');
Route::resource('home/coupon','Home\CouponController');





//用户订单
Route::resource('home/orders','Home\UorderController');


//用户收藏
Route::resource('home/collection','Home\CollectionController');


// 这里有改动 这是点赞的路由 勿删
//用户点赞路由
Route::resource('home/laud','Home\LaudController');


//退换货
Route::resource('home/refund','Home\refundController');


//立即付款
Route::resource('home/Receipt','Home\ReceiptController');

//用户评论
Route::resource('home/evaluation','Home\EvaluationController');


// 前台分类详情列表
Route::get('home/cates/{id}','Home\CatesController@index');
Route::resource('home/cates','Home\CatesController');


//ajax验证后台登录路由
Route::any('admin/denglu','Admin\LoginController@login');

//ajax验证后台登录路由(测试)
Route::post('admin/deng','Admin\LoginController@deng');

});
//测试查看session的代码
Route::any('123',function(){
    dump(session()->all());
});






