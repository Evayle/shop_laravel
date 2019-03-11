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
    // Route::get('admin/friendship/setdata','Admin\FriendshipController@setdata');
    Route::resource('admin/friendship','Admin\FriendshipController');

    // 后台分类管理
    Route::get('admin/category/create/{id}','Admin\CategoryController@create');
    Route::get('admin/category/attr','Admin\CategoryController@attr');
    Route::get('admin/category/value','Admin\CategoryController@value');
    Route::resource('admin/category','Admin\CategoryController');

    // 后台商品管理
    Route::get('admin/goods/attr/{id}','Admin\GoodsController@attr');
    Route::post('admin/goods/attrStore','Admin\GoodsController@attrStore');
    Route::get('admin/goods/value/{id}','Admin\GoodsController@value');
    Route::post('admin/goods/valueStore','Admin\GoodsController@valueStore');
    Route::get('admin/goods/info/{id}','Admin\GoodsController@info');
    Route::resource('admin/goods','Admin\GoodsController');
});

//ajax验证后台登录路由
Route::any('admin/denglu','Admin\LoginController@login');

//ajax验证后台登录路由(测试)
Route::post('admin/deng','Admin\LoginController@deng');

// 前台首页
Route::get('home','Home\IndexController@index');
Route::resource('home/shopcart','Home\ShopcartController');

Route::any('home/login','Home\LoginController@login');






























































































