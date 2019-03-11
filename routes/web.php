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
    Route::resource('admin/friendship','Admin\FriendshipController');

    // 后台分类管理
    Route::get('admin/category/create/{id}','Admin\CategoryController@create');
    Route::resource('admin/category','Admin\CategoryController');

    // 后台商品管理
    Route::resource('admin/goods','Admin\GoodsController');

    // 轮播图管理
    Route::resource('admin/slide','Admin\SlideController');

});

//ajax验证后台登录路由
Route::any('admin/denglu','Admin\LoginController@login');

//ajax验证后台登录路由(测试)
Route::post('admin/deng','Admin\LoginController@deng');

// 前台首页
Route::get('home','Home\IndexController@index');
// 购物车
Route::resource('home/shopcart','Home\ShopcartController');

Route::any('home/login','Home\LoginController@login');












































































































































// 徐俊伟的代码
// 前台用户收藏的路由
Route::get('home/collect','Home\CollectController@index');
Route::get('home/collect/create','Home\CollectController@create');