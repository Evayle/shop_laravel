@extends('home.layout.index')
@section('index')
    <!-- 内页导航栏 -->
    <div class="top-nav bg3">
        <div class="nav-box inner">
            <div class="all-cat">
                <div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
            </div>
            <ul class="nva-list">
                <a href="index.html"><li>首页</li></a>
                <a href="temp_article/udai_article10.html"><li>企业简介</li></a>
                <a href="temp_article/udai_article5.html"><li>新手上路</li></a>
                <a href="class_room.html"><li>U袋学堂</li></a>
                <a href="enterprise_id.html"><li>企业账号</li></a>
                <a href="udai_contract.html"><li>诚信合约</li></a>
                <a href="item_remove.html"><li>实时下架</li></a>
            </ul>
        </div>
    </div>

    <!-- 列表内容 -->
    <div class="content inner">
        <section class="filter-section clearfix">
            <ol class="breadcrumb">
                <li><a href="index.html">首页</a></li>
                <li class="active">商品筛选</li>
            </ol>
            <div class="filter-box">
                <div class="all-filter">
                    <div class="filter-value">
                        <div class="filter-title">选择商品分类 <i class="iconfont icon-down"></i></div>
                        <!-- 全部大分类 -->
                        <ul class="catelist-card">
                            <a href=""><li class="active">全部分类</li></a>
                            <a href=""><li>女装</li></a>
                            <a href=""><li>男装</li></a>
                            <a href=""><li>包包</li></a>
                            <a href=""><li>童装</li></a>
                            <a href=""><li>鞋靴</li></a>
                        </ul>
                        <a class="reset pull-right" href="item_category.html">重置</a>
                    </div>
                </div>
                <div class="filter-prop-item">
                    <span class="filter-prop-title">分类：</span>
                    <ul class="clearfix">
                        <a href=""><li class="active">全部</li></a>
                        <a href=""><li>上装</li></a>
                        <a href=""><li>下装</li></a>
                        <a href=""><li>裙装</li></a>
                        <a href=""><li>内衣</li></a>
                    </ul>
                </div>
                
                <div class="filter-prop-item">
                    <span class="filter-prop-title">价格：</span>
                    <ul class="clearfix">
                        <a href=""><li class="active">全部</li></a>
                        <a href=""><li>0-20</li></a>
                        <a href=""><li>20-40</li></a>
                        <a href=""><li>40-80</li></a>
                        <a href=""><li>80-100</li></a>
                        <a href=""><li>100-150</li></a>
                        <a href=""><li>150以上</li></a>
                        <form class="price-order">
                            <input type="text">
                            <span class="cc">-</span>
                            <input type="text">
                            <input type="button" value="确定">
                        </form>
                    </ul>
                </div>
            </div>
            <div class="sort-box bgf5">
                <div class="sort-text">排序：</div>
                <a href=""><div class="sort-text">销量 <i class="iconfont icon-sortDown"></i></div></a>
                <a href=""><div class="sort-text">评价 <i class="iconfont icon-sortUp"></i></div></a>
                <a href=""><div class="sort-text">价格 <i class="iconfont"></i></div></a>
                <div class="sort-total pull-right">共1688个商品</div>
            </div>
        </section>
        <section class="item-show__div clearfix">
            <div class="pull-left">
                <div class="item-list__area clearfix">
                    <!-- 商品遍历开始 -->
                    <div class="item-card">
                        <a href="item_show.html" class="photo">
                            <img src="images/temp/M-020.jpg" alt="白鹭行原创传统日常汉服男装绣花短褙子百搭外套单品春夏" class="cover">
                            <div class="name">白鹭行原创传统日常汉服男装绣花短褙子百搭外套单品春夏</div>
                        </a>
                        <div class="middle">
                            <div class="price"><small>￥</small>18.0</div>
                            <div class="sale"><a href="">加入购物车</a></div>
                        </div>
                        <div class="buttom">
                            <div>销量 <b>666</b></div>
                            <div>人气 <b>888</b></div>
                            <div>评论 <b>1688</b></div>
                        </div>
                    </div>
                    <!-- 商品遍历结束 -->
                </div>
                <!-- 分页 -->
                <div class="page text-right clearfix">
                    <a class="disabled">上一页</a>
                    <a class="select">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a href="">4</a>
                    <a href="">5</a>
                    <a class="" href="">下一页</a>
                    <a class="disabled">1/5页</a>
                    <form action="" class="page-order">
                        到第
                        <input type="text" name="page">
                        页
                        <input class="sub" type="submit" value="确定">
                    </form>
                </div>
            </div>
            <div class="pull-right">
                
                <div class="desc-segments__content">
                    <div class="lace-title">
                        <span class="c6">爆款推荐</span>
                    </div>
                    <div class="picked-box">
                        <!-- 爆款推荐遍历开始 -->
                        <a href="" class="picked-item"><img src="images/temp/S-001.jpg" alt="" class="cover"><span class="look_price">¥134.99</span></a>
                        <!-- 爆款推荐遍历结束 -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection