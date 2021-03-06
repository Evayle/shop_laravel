@extends('home.layout.index')
@section('index')
	<!-- 首页导航栏 -->
	<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
				<div class="cat-list__box">

					@foreach($common_cates_data as $k => $v)
					<div class="cat-box">
						<div class="title">
							<i class="glyphicon glyphicon-chevron-right"> {{ $v->categorys_name }}</i>
						</div>
						<ul class="cat-list clearfix">
						</ul>
						<div class="cat-list__deploy">
							@foreach($v['sub'] as $kk => $vv)
							<div class="deploy-box">
								<div class="genre-box clearfix">
									<span class="title">{{ $cats = $vv->categorys_name }}：</span>
									@foreach($vv['sub'] as $kkk => $vvv)
									<div class="genre-list">
										<a href="/home/cates?id={{ $vvv->id }}">{{ $vvv->categorys_name }}</a>
									</div>
									@endforeach
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endforeach

				</div>
			</div>
			<ul class="nva-list">
				<a href="index.html"><li class="active">首页</li></a>
				<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
				<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
				<a href="class_room.html"><li>U袋学堂</li></a>
				<a href="enterprise_id.html"><li>企业账号</li></a>
				<a href="udai_contract.html"><li>诚信合约</li></a>
				<a href="item_remove.html"><li>实时下架</li></a>
			</ul>
			<div class="user-info__box">
				<div class="login-box">
					<div class="avt-port">
						<img src="/homes/images/icons/default_avt.png" alt="欢迎来到U袋网" class="cover b-r50">
					</div>
					<!-- 已登录 -->



				<div class="name c6">Hi~ <span class="cr">{{ $data->uname or ''}} </span></div>
					<div class="point c6">积分:{{ $date->integral_num or '0'}}</div>
				<!-- 未登录 -->
					<!-- <div class="name c6">Hi~ 你好</div>
					<div class="point c6"><a href="">点此登录</a>，发现更多精彩</div> -->
					<div class="report-box">
						<span class="badge">+30</span>


						<!-- 判断是否登录 -->
						@if(isset($date->integral_num))
						<a class="btn btn-info btn-block " href="#" role="button">签到获取积分 额</a>
						@else
						<a class="btn btn-info btn-block disabled" href="#" role="button">已连续签到0天</a>
						@endif
						<!-- <a class="btn btn-primary btn-block" href="#" role="button">签到领积分</a> -->
					</div>
				</div>

				<div class="verify-qq">
					<form class="input-group">
						<input class="form-control" placeholder="输入客服QQ号码" type="text">
						<span class="input-group-btn">
							<button class="btn btn-primary submit" id="verifyqq" type="button">验证</button>
						</span>
					</form>
					<script>
						$(function() {
							$('#verifyqq').click(function() {
								DJMask.open({
								　　width:"400px",
								　　height:"150px",
								　　title:"U袋网提示您：",
								　　content:"<b>该QQ不是客服-谨防受骗！</b>"
							　　});
							});
						});
					</script>
				</div>
				<div class="tags">
					<div class="tag"><i class="iconfont icon-real fz16"></i> 品牌正品</div>
					<div class="tag"><i class="iconfont icon-credit fz16"></i> 信誉认证</div>
					<div class="tag"><i class="iconfont icon-speed fz16"></i> 当天发货</div>
					<div class="tag"><i class="iconfont icon-tick fz16"></i> 人工质检</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 顶部轮播 -->
    <div class="swiper-container banner-box">
        <div class="swiper-wrapper">

        @foreach ($slides as $v)
            <div class="swiper-slide"><a href="/home/collect/{{ $v->goods_id }}"><img src="/{{ $v->slide_pic }}" class="cover"></a></div>

        @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- 首页楼层导航 -->
	<nav class="floor-nav visible-lg-block">
		<span class="scroll-nav active">爆款推荐</span>
		<span class="scroll-nav">女装</span>
		<span class="scroll-nav">男装</span>
		<span class="scroll-nav">活力童装</span>
		<span class="scroll-nav">时尚包包</span>
		<span class="scroll-nav">鞋靴</span>
	</nav>
	<!-- 楼层内容 -->
	<div class="content inner" style="margin-bottom: 40px;">
		<section class="scroll-floor floor-1 clearfix">
			<div class="pull-left">
				<div class="floor-title">
					<i class="iconfont icon-tuijian fz16"></i> 爆款推荐


					<a href="javascript:;" class="more"><i class="iconfont icon-more"></i></a>
				</div>
				<div class="con-box">
					<a class="left-img hot-img" href="javascript:;">
						<img src="/homes/images/floor_1.jpg" alt="" class="cover">
					</a>
					<div class="right-box hot-box">
					@foreach ($hot as $v)
						<a href="/home/collect/{{ $v->id }}" class="floor-item">
							<div class="item-img hot-img">
								<img src="/{{ $v->goods_plot }}" alt="{{ $v->goods_name }}" class="cover">
							</div>
							<div class="price clearfix">
								<span class="pull-left cr fz16">￥{{ $v->goods_price }}</span>
								<span class="pull-right c6">进货价</span>
							</div>
							<div class="name ep" title="{{ $v->goods_name }}">{{ $v->goods_name }}</div>
						</a>
					@endforeach

					</div>
				</div>
			</div>
			<div class="pull-right">
				<div class="floor-title">
					<i class="iconfont icon-horn fz16"></i> 平台公告
					<a href="javascript:;" class="more"><i class="iconfont icon-more"></i></a>

				</div>
				<div class="con-box">
					<div class="notice-box bgf5">
						<div class="swiper-container">
							<div class="swiper-wrapper">

								<a class="swiper-slide ep" href="javascript:;">【公告】U袋网平台已上线，您还在等什么呢？是吧~</a>
								<a class="swiper-slide ep" href="javascript:;">【资讯】P站服务器爆炸啦。国内86%地区IP被限制~</a>
								<a class="swiper-slide ep" href="javascript:;">【公告】六趣公司9月底将彻底关闭66RPG论坛~</a>
								<a class="swiper-slide ep" href="javascript:;">【资讯】Project1站将接盘66RPG，新域名rpg.blue</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】央行决定对普惠金融实施定向降准政策 最高下调1.5个百分点</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】那些年看的剧里十大虐心情节，谁戳中了你的泪点？</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】惨遭魔改？派拉蒙将拍真人版《你的名字。》</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】外媒称中国限制日本跟团游?旅行社:仍正常发团</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】广电总局：电台电视台应在重要法定节日播放国歌</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】高校性教育课成"爆款" 老师都讲哪些"大尺度"内容?</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】vivo X20全面屏手机首销火爆 陈赫欧豪现身助力</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】“拒绝妻子手术”现场医生：病人丈夫被冤枉了</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】游客们注意了！国庆你要避开十大坑</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】他卖了1.5万双假货，现在面临10年牢狱！</a>
								<a class="swiper-slide ep" href="javascript:;">【新闻】10月1日起国家再次提高部分优抚对象抚恤补助标准 烈属抚恤每年23130元</a>
							</div>
						</div>
					</div>
					<div class="buts-box bgf5">
						<div class="but-div">
							<a href="">
								<i class="but-icon"></i>
								<p>物流查询</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>热卖专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>满减专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>折扣专区</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="scroll-floor floor-2">
			<div class="floor-title">
				<i class="iconfont icon-skirt fz16"></i> 女装

			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="javascript:;">
					<img src="/homes/images/floor_2.jpg" alt="" class="cover">
				</a>
				<div class="right-box">

					@if ($nv != false)

					@foreach ($nv as $v)
					<a href="/home/collect/{{ $v->id }}" class="floor-item">
						<div class="item-img hot-img">
							<img src="/{{ $v->goods_plot }}" alt="{{ $v->goods_name }}" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">￥{{ $v->goods_price }}</span>
							<span class="pull-right c6">进货价</span>
						</div>
						<div class="name ep" title="{{ $v->goods_name }}">{{ $v->goods_name }}</div>
					</a>
					@endforeach
					@else
					<a href="javascript:;" class="floor-item">
						<div class="item-img hot-img">
							<img src="" alt="" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">暂无商品哦!</span>
							<span class="pull-right c6"></span>
						</div>
						<div class="name ep" title=""></div>
					</a>
					@endif

				</div>
			</div>
		</section>
		<section class="scroll-floor floor-3">
			<div class="floor-title">
				<i class="iconfont icon-fushi fz16"></i> 男装

			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="javascript:;">
					<img src="/homes/images/floor_3.jpg" alt="" class="cover">
				</a>
				<div class="right-box">


					@if ($nan != false)

					@foreach ($nan as $v)
					<a href="/home/collect/{{ $v->id }}" class="floor-item">
						<div class="item-img hot-img">
							<img src="/{{ $v->goods_plot }}" alt="{{ $v->goods_name }}" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">￥{{ $v->goods_price }}</span>
							<span class="pull-right c6">进货价</span>
						</div>
						<div class="name ep" title="{{ $v->goods_name }}">{{ $v->goods_name }}</div>
					</a>
					@endforeach


					@else
					<a href="javascript:;" class="floor-item">
						<div class="item-img hot-img">
							<img src="" alt="" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">暂无商品哦!</span>
							<span class="pull-right c6"></span>
						</div>
						<div class="name ep" title=""></div>
					</a>
					@endif
				</div>
			</div>
		</section>
		<section class="scroll-floor floor-4">
			<div class="floor-title">
				<i class="iconfont icon-kid fz16"></i> 活力童装
			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="javascript:;">
					<img src="/homes/images/floor_4.jpg" alt="" class="cover">
				</a>
				<div class="right-box">

					@if ($tong != false)

					@foreach ($tong as $v)
					<a href="/home/collect/{{ $v->id }}" class="floor-item">
						<div class="item-img hot-img">
							<img src="/{{ $v->goods_plot }}" alt="{{ $v->goods_name }}" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">￥{{ $v->goods_price }}</span>
							<span class="pull-right c6">进货价</span>
						</div>
						<div class="name ep" title="{{ $v->goods_name }}">{{ $v->goods_name }}</div>
					</a>
					@endforeach

					@else
					<a href="javascript:;" class="floor-item">
						<div class="item-img hot-img">
							<img src="" alt="" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">暂无商品哦!</span>
							<span class="pull-right c6"></span>
						</div>
						<div class="name ep" title=""></div>
					</a>
					@endif
				</div>
			</div>
		</section>
		<section class="scroll-floor floor-5">
			<div class="floor-title">
				<i class="iconfont icon-bao fz16"></i> 时尚包包

			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="javascript:;">
					<img src="/homes/images/floor_5.jpg" alt="" class="cover">
				</a>
				<div class="right-box">

					@if ($bao != false)

					@foreach ($bao as $v)
					<a href="/home/collect/{{ $v->id }}" class="floor-item">
						<div class="item-img hot-img">
							<img src="/{{ $v->goods_plot }}" alt="{{ $v->goods_name }}" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">￥{{ $v->goods_price }}</span>
							<span class="pull-right c6">进货价</span>
						</div>
						<div class="name ep" title="{{ $v->goods_name }}">{{ $v->goods_name }}</div>
					</a>
					@endforeach

					@else
					<a href="javascript:;" class="floor-item">
						<div class="item-img hot-img">
							<img src="" alt="" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">暂无商品哦!</span>
							<span class="pull-right c6"></span>
						</div>
						<div class="name ep" title=""></div>
					</a>
					@endif
				</div>
			</div>
		</section>
		<section class="scroll-floor floor-6">
			<div class="floor-title">
				<i class="iconfont icon-shoes fz16"></i> 鞋靴
			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="javascript:;">
					<img src="/homes/images/floor_6.jpg" alt="" class="cover">
				</a>
				<div class="right-box">
					@if ($xie != false)

					@foreach ($xie as $v)
					<a href="/home/collect/{{ $v->id }}" class="floor-item">
						<div class="item-img hot-img">
							<img src="/{{ $v->goods_plot }}" alt="{{ $v->goods_name }}" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">￥{{ $v->goods_price }}</span>
							<span class="pull-right c6">进货价</span>
						</div>
						<div class="name ep" title="{{ $v->goods_name }}">{{ $v->goods_name }}</div>
					</a>
					@endforeach


					@else
					<a href="javascript:;" class="floor-item">
						<div class="item-img hot-img">
							<img src="" alt="" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">暂无商品哦!</span>
							<span class="pull-right c6"></span>
						</div>
						<div class="name ep" title=""></div>
					</a>
					@endif
				</div>
			</div>
		</section>
	</div>
	<script>
		$(document).ready(function(){
			// 顶部banner轮播
			var banner_swiper = new Swiper('.banner-box', {
				autoplayDisableOnInteraction : false,
				pagination: '.banner-box .swiper-pagination',
				paginationClickable: true,
				autoplay : 5000,
			});
			// 新闻列表滚动
			var notice_swiper = new Swiper('.notice-box .swiper-container', {
				paginationClickable: true,
				mousewheelControl : true,
				direction : 'vertical',
				slidesPerView : 10,
				autoplay : 2e3,
			});
			// 楼层导航自动 active
			$.scrollFloor();
			// 页面下拉固定楼层导航
			$('.floor-nav').smartFloat();
			$('.to-top').toTop({position:false});
		});
	</script>
	@endsection
