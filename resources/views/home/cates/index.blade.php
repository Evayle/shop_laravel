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

                <li><a href="/">首页</a></li>
                <li class="active">商品筛选</li>
            </ol>
            <div class="filter-box">
                <div class="all-filter">
                </div>
                <div class="filter-prop-item">
                    <span class="filter-prop-title"><b>分类：</b></span>
                    <ul class="clearfix">
                        <a href="/home/cates"><li class="active">全部</li></a>

                        <!-- 二级分类遍历开始 -->
                        @foreach($common_cates_data as $k => $v)
                            @foreach($v['sub'] as $kk => $vv)

                                @foreach($vv['sub'] as $kkk => $vvv)
                                    <a href="/home/cates?id={{ $vvv->id }}"><li>{{ $vvv->categorys_name }}</li></a>
                                @endforeach
                            @endforeach
                        @endforeach
                        <!-- 二级分类遍历开始 -->
                    </ul>
                </div>


            </div>
            <div class="sort-box bgf5">
                <div class="sort-text">排序：</div>
                @if ($j == 1)
                    <a href="/home/cates?j=2&id={{ $request['id'] or '' }}&search={{ $request['search'] or '' }}"><div class="sort-text">销量 <i class="iconfont icon-sortDown"></i></div></a>
                @else
                    <a href="/home/cates?j=1&id={{ $request['id'] or '' }}&search={{ $request['search'] or '' }}"><div class="sort-text">销量 <i class="iconfont icon-sortUp"></i></div></a>
                @endif


                @if ($i == 1)
                    <a href="/home/cates?i=2&id={{ $request['id'] or '' }}&search={{ $request['search'] or '' }}"><div class="sort-text">价格 <i class="iconfont icon-sortDown"></i></div></a>
                @else
                    <a href="/home/cates?i=1&id={{ $request['id'] or '' }}&search={{ $request['search'] or '' }}"><div class="sort-text">价格 <i class="iconfont icon-sortUp"></i></div></a>
                @endif

            </div>
        </section>
        <section class="item-show__div clearfix">
            <div class="pull-left">
                <div class="item-list__area clearfix">
                    <!-- 商品遍历开始 -->
                    @foreach ($cats as $v)
                        <div class="item-card">
                            <a href="/home/collect/{{ $v->id }}" class="photo">
                                <img src="/{{ $v->goods_plot }}" alt="{{ $v->goods_name }}" class="cover">
                                <div class="name">{{ $v->goods_name }}</div>
                            </a>
                            <div class="middle">
                                <div class="price"><small>￥</small>{{ $v->goods_price }}</div>
                                <div class="sale"><a href="">加入购物车</a></div>
                            </div>
                            <div class="buttom">
                            </div>
                        </div>
                    @endforeach
                    <!-- 商品遍历结束 -->
                </div>
                <!-- 分页 -->
                <div class="page text-right clearfix" id="page_page">
                {{ $cats->appends($request)->links() }}
                </div>
            </div>
            <div class="pull-right">

                <div class="desc-segments__content">
                    <div class="lace-title">
                        <span class="c6">爆款推荐</span>
                    </div>
                    <div class="picked-box">
                        <!-- 爆款推荐遍历开始 -->
                        @foreach ($hot as $v)
                            <a href="/home/collect/{{ $v->id }}" class="picked-item"><img src="/{{ $v->goods_plot }}" alt="" class="cover"><span class="look_price">¥{{ $v->goods_price }}</span></a>
                        @endforeach
                        <!-- 爆款推荐遍历结束 -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection