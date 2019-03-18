@extends('home.layout.shopping')
@section('shopping')
	<!-- 内页导航栏 -->
	<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
			</div>
			<ul class="nva-list">
				<a href="/home"><li>首页</li></a>
				<a href="#"><li>企业简介</li></a>
				<a href="#"><li>新手上路</li></a>
				<a href="#"><li>U袋学堂</li></a>
				<a href="#"><li>企业账号</li></a>
				<a href="#"><li>诚信合约</li></a>
				<a href="#"><li>实时下架</li></a>
			</ul>
		</div>
	</div>



	<!-- 这是商品详情页 -->

	<div class="content inner">
		<section class="item-show__div item-show__head clearfix">
			<div class="pull-left">
				<ol class="breadcrumb">
					<li><a href="/home">首页</a></li>
					<li class="active">{{ $goods->goods_name }}</li>
				</ol>
				<div class="item-pic__box" id="magnifier">
					<div class="small-box">
						<img class="cover" src="/{{ $pic[0]->pics_url }}" alt="重回汉唐 旧忆 原创设计日常汉服女款绣花长褙子吊带改良宋裤春夏">

						<span class="hover"></span>
					</div>
					<div class="thumbnail-box">
						<a href="javascript:;" class="btn btn-default btn-prev"></a>
						<div class="thumb-list">
							<ul class="wrapper clearfix">

					<!-- 缩略图遍历开始 -->

								@foreach ($pic as $v)
								<li class="item active" data-src="/{{ $v->pics_url }}"><img class="cover" src="/{{ $v->pics_url }}" alt="商品预览图"></li>
								@endforeach
								<!-- 缩略图遍历结束 -->

							</ul>
						</div>
						<a href="javascript:;" class="btn btn-default btn-next"></a>
					</div>
					<div class="big-box"><img src="/{{ $pic[0]->pics_url }}" alt="重回汉唐 旧忆 原创设计日常汉服女款绣花长褙子吊带改良宋裤春夏"></div>
				</div>
				<script src="/homes/js/jquery.magnifier.js"></script>
				<script>
					$(function () {
						$('#magnifier').magnifier();
					});
				</script>
				<div class="item-info__box">
					<div class="item-title">
						<div class="name ep2">{{ $goods->goods_name }}</div>
						<div class="sale cr">@if ($goods->goods_fsp == 0 ) 该商品可包邮 @endif</div>
						<div class="sale cr">@if ($goods->goods_preferential == 0 ) 优惠活动：该商品参与满减 @endif</div>
						<div class="sale cr">@if ($goods->goods_hot == 0 ) 优惠活动：该商品可积分兑换 @endif</div>
						<div class="sale cr">@if ($goods->goods_discount == 0 ) 优惠活动：该商品享受8折优惠 @endif</div>
					</div>
					<div class="item-price bgf5">
						<div class="price-box clearfix">
							<div class="price-panel pull-left">


								售价：<span class="price">￥{{ $goods->goods_price * 0.8 }} <s class="fz16 c9">￥{{ $goods->goods_price }}</s></span>
							</div>
							<script>
								// 会员价格折叠展开
								$(function () {
									$('.vip-price-panel').click(function() {
										if ($(this).hasClass('active')) {
											$('.all-price__box').stop().slideUp('normal',function() {
												$('.vip-price-panel').removeClass('active').find('.iconfont').removeClass('icon-up').addClass('icon-down');
											});
										} else {
											$(this).addClass('active').find('.iconfont').removeClass('icon-down').addClass('icon-up');
											$('.all-price__box').stop().slideDown('normal');
										}
									});
								});
							</script>
						</div>
					</div>
					<ul class="item-ind-panel clearfix">
						<li class="item-ind-item">
							<span class="ind-label c9">累计销量</span>
							<span class="ind-count cr">{{ $goods->goods_sales }}</span>
						</li>
						<li class="item-ind-item">
							<span class="ind-label c9">累计评论</span>
							<span class="ind-count cr">{{ $count }}</span>
						</li>
						<li class="item-ind-item">
							<span class="ind-label c9">赠送积分</span>
							<span class="ind-count cg">{{ floor($goods->goods_price * 0.02) }}</span>
						</li>
					</ul>
					<div class="item-key">
						<div class="item-sku">


						</div>
						<div class="item-amount clearfix bgf5">
							<div class="item-metatit">数量：</div>
							<div class="amount-box">
								<div class="amount-widget">
									<input class="amount-input shop" value="1" maxlength="8" title="请输入购买量" type="text">
									<div class="amount-btn">
										<a class="amount-but add"></a>
										<a class="amount-but sub"></a>
									</div>
								</div>
								<!-- 引入阿里矢量库文件 之前的没用 -->
								<script src="/homes/font_u9bb8x660y/iconfont.js"></script>
								<style>

								.icon {
								  width: 1em;
								  height: 1em;
								  vertical-align: -0.15em;
								  fill: currentColor;
								  overflow: hidden;
								}
								.icon:hover{
									cursor: pointer;
								}
								</style>
								<div class="item-stock"><span style="margin-left: 10px;">库存 <b id="Stock">{{ $goods->goods_store }}</b> 件</span>
								<!-- 点赞按钮 勿删-->
								<a class="zan" style="float: right; margin-right: 70px; font-size: 30px; color:#ccc;" title="点赞此商品">
									<svg class="icon" aria-hidden="true">
									  <use xlink:href="#icon-unie60b"></use>
									</svg>
									<span class="sp" style="font-size: 16px;text-decoration: none;cursor: pointer;">{{ $laud }}</span>
								</a>
								<script>
									// 这是点赞之后刷新要显示的已点赞效果 勿删
									$(document).ready(function(){
										$.ajaxSetup({
										    headers: {
										        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										    }
										});
										$.ajax({
							                url:"/home/laud/create", //处理页面的路径
							                data:{'goods_id': {{$goods->id}} }, //要提交的数据是一个JSON
							                type:"GET", //提交方式
							                dataType:"json", //返回数据的类型
							                //TEXT字符串 JSON返回JSON XML返回XML
							                success:function(data){ //回调函数 ,成功时返回的数据存在形参data里
							                	// console.log(data);
							                	if (data == 4) {
							                		$('.zan').css('color','red').attr('title','已点赞');
							                	}
						                    }
										});
									});
									// 这是点赞的jq代码
									$('.zan').click(function(){
										$('.zan').css('color','red').attr('title','已点赞');
										$.ajaxSetup({
										    headers: {
										        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										    }
										});
										// ajax传值
										$.ajax({
								                url:"/home/laud", //处理页面的路径
								                data:{'goods_id': {{$goods->id}} }, //要提交的数据是一个JSON
								                type:"POST", //提交方式
								                dataType:"json", //返回数据的类型
								                //TEXT字符串 JSON返回JSON XML返回XML
								                success:function(data){ //回调函数 ,成功时返回的数据存在形参data里
							                        if (data == 0) {
							                        	alert('对8起!点赞失败了呀!请重新点赞!');
							                        }
								                	if (data == 1) {
								                		alert('点赞成功!谢谢您的赞!');
								                		$('.sp').text({{ $laud }});
								                	}
							                        if (data == 2)  //trim()方法会去掉页面中的冗余空格
							                        {
							                            alert('您已经点过赞啦!不用再点了!');
							                        }
							                 		if (data == 3) {
							                 			alert('点赞成功!这是该商品的第一个赞哦!');
							                 			$('.sp').text({{ $laud }});
							                 		}
							                    }
											});
									});
								</script>
								<label style="float: right;" class="lab" title="点击收藏此商品">
									<button type="button" class="btn btn-default coll" style="float: right;margin-right: 70px; background: pink;" id="clt">收藏</button>
									<a href="javascript:;"  style="font-size: 30px; margin-top: 1px;cursor: pointer;">
									<svg class="icon shou" aria-hidden="true">
									  <use xlink:href="#icon-shoucang1"></use>
									</svg>
									</a>
								</label>
								</div>
								<script>
									// 这个script脚本是实现收藏相关功能的 勿删
									$(document).ready(function(){
										$.ajaxSetup({
										    headers: {
										        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										    }
										});
										$.ajax({
							                url:"/home/collect/new_data", //处理页面的路径
							                data:{'goods_id': {{$goods->id}} }, //要提交的数据是一个JSON
							                type:"GET", //提交方式
							                dataType:"json", //返回数据的类型
							                //TEXT字符串 JSON返回JSON XML返回XML
							                success:function(data){ //回调函数 ,成功时返回的数据存在形参data里
							                	// console.log(data);
						                        if(data == 1)  //trim()方法会去掉页面中的冗余空格
						                        {
						                            $('#clt').text('收藏');
						                            // console.log(data);
						                            $('.shou').css('color','none');
						                        }else{
						                        	$('#clt').text('已收藏');
						                        	// console.log(data);
						                        	$('.shou').css('color','red');
							                        $('.lab').attr('title','已收藏');
						                        }

						                    }
										});
									});
									$('.lab').click(function(){
										var a = $('#clt').text();
										if( a=="收藏" ){
											$.ajaxSetup({
											    headers: {
											        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
											    }
											});
											$.ajax({
								                url:"/home/collect/create", //处理页面的路径
								                data:{'goods_id': {{$goods->id}} }, //要提交的数据是一个JSON
								                type:"GET", //提交方式
								                dataType:"json", //返回数据的类型
								                //TEXT字符串 JSON返回JSON XML返回XML
								                success:function(data){ //回调函数 ,成功时返回的数据存在形参data里
							                        if(data == 1)  //trim()方法会去掉页面中的冗余空格
							                        {
							                            $('#clt').text('已收藏');
							                            $('.shou').css('color','red');
							                            $('.lab').attr('title','已收藏');
							                        }else{
							                        	alert('收藏失败');
							                        }

							                    }
											});
										}else{
											$.ajaxSetup({
											    headers: {
											        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
											    }
											});
											$.ajax({
								                url:"/home/collect/destroy", //处理页面的路径
								                data:{'goods_id': {{$goods->id}} }, //要提交的数据是一个JSON
								                type:"GET", //提交方式
								                dataType:"json", //返回数据的类型
								                //TEXT字符串 JSON返回JSON XML返回XML
								                success:function(data){ //回调函数 ,成功时返回的数据存在形参data里
								                	// console.log(data);
							                        if(data == 1)  //trim()方法会去掉页面中的冗余空格
							                        {
							                            $('#clt').text('收藏');
							                            $('.shou').css('color','none');
							                            $('.lab').attr('title','点击收藏此商品');
							                        }else{
							                        	alert('取消收藏失败');
							                        }
							                    }
											});
										}
									});
								</script>
								<script>
									$(function () {
										$('.amount-input').onlyReg({reg: /[^0-9]/g});
										var stock = parseInt($('#Stock').html());
										$('.amount-widget').on('click','.amount-but',function() {
											var num = parseInt($('.amount-input').val());
											if (!num) num = 0;
											if ($(this).hasClass('add')) {
												if (num > stock - 1){
													return DJMask.open({
													　　width:"300px",
													　　height:"100px",
													　　content:"您输入的数量超过库存上限"
												　　});
												}
												$('.amount-input').val(num + 1);
											} else if ($(this).hasClass('sub')) {
												if (num == 1){
													return DJMask.open({
													　　width:"300px",
													　　height:"100px",
													　　content:"您输入的数量有误"
												　　});
												}
												$('.amount-input').val(num - 1);
											}
										});
									});
								</script>

							</div>
						</div>
						<div class="item-action clearfix bgf5">
							<a href="/home/shopcart/create?id={{ $goods->id }}" rel="nofollow" data-addfastbuy="true" title="点击此按钮，到下一步确认购买信息。" role="button" class="item-action__buy">立即购买</a>

							<a href="javascript:;" rel="nofollow" data-addfastbuy="true" role="button" class="item-action__basket" title="点击此按钮,把商品添加到购物车">
								<i class="iconfont icon-shopcart"></i> 加入购物车
							</a>
						</div>
					</div>
				</div>
			</div>

			<script>
				$('.cart').click(function(){
					$.get('/home/shopcart/add', {'goods_id':{{$goods->id}}, 'sc_num':($('.shop').val())}, function(result){
						console.log(result);
					}, 'json');
				});
			</script>
			<div class="pull-right picked-div">
				<div class="lace-title">
					<span class="c6">爆款推荐</span>
				</div>
				<div class="swiper-container picked-swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
						@foreach ($hot as $v)
							<a class="picked-item" href="/home/collect/{{ $v->id }}">
								<img src="/{{ $v->goods_plot }}" alt="" class="cover">
								<div class="look_price">¥{{ $v->goods_price }}</div>
							</a>
						@endforeach
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function(){
						// 顶部banner轮播
						var picked_swiper = new Swiper('.picked-swiper', {
							loop : true,
							direction: 'vertical',
							prevButton:'.picked-button-prev',
							nextButton:'.picked-button-next',
						});
					});
				</script>
			</div>
		</section>
		<section class="item-show__div item-show__body posr clearfix">
			<div class="item-nav-tabs">
				<ul class="nav-tabs nav-pills clearfix" role="tablist" id="item-tabs">
					<li role="presentation" class="active"><a href="#detail" role="tab" data-toggle="tab" aria-controls="detail" aria-expanded="true">商品详情</a></li>
					<li role="presentation"><a href="#evaluate" role="tab" data-toggle="tab" aria-controls="evaluate">累计评价 <span class="badge">{{ $count }}</span></a></li>
					<li role="presentation"><a href="#service" role="tab" data-toggle="tab" aria-controls="service">售后服务</a></li>
				</ul>
			</div>
			<div class="pull-left">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="detail" aria-labelledby="detail-tab">
						<div class="item-detail__info clearfix">
							<div class="record">上架时间：{{ $goods->updated_at }}</div>
							<div class="record">商品库存：{{ $goods->goods_store }}</div>
						</div>
						<div class="rich-text">
							<p style="text-align: center;">
								@foreach ($img as $v)
								<img src="/{{ $v->imgs_url }}" alt="" width="790">
								@endforeach
							</p>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="evaluate" aria-labelledby="evaluate-tab">
						<div class="evaluate-tabs bgf5">
							<ul class="nav-tabs nav-pills clearfix" role="tablist">
								<li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab" aria-controls="all" aria-expanded="true">全部评价 <span class="badge">1314</span></a></li>
								<li role="presentation"><a href="#good" role="tab" data-toggle="tab" aria-controls="good">好评 <span class="badge">1000</span></a></li>
								<li role="presentation"><a href="#normal" role="tab" data-toggle="tab" aria-controls="normal">中评 <span class="badge">314</span></a></li>
								<li role="presentation"><a href="#bad" role="tab" data-toggle="tab" aria-controls="bad">差评 <span class="badge">0</span></a></li>
							</ul>
						</div>
						<div class="evaluate-content">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="all" aria-labelledby="all-tab">

									<div class="eval-box">
										<div class="eval-author">
											<div class="port">
												<img src="/homes/images/icons/default_avt.png" alt="欢迎来到U袋网" class="cover b-r50">
											</div>
											<div class="name">高***恒</div>
										</div>
										<div class="eval-content">
											<div class="eval-text">
												真是特别美_回头穿了晒图
											</div>
											<div class="eval-imgs">
												<div class="img-temp"><img src="/homes/images/temp/S-001-1_s.jpg" data-src="/homes/images/temp/S-001-1_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-2_s.jpg" data-src="/homes/images/temp/S-001-2_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-3_s.jpg" data-src="/homes/images/temp/S-001-3_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-4_s.jpg" data-src="/homes/images/temp/S-001-4_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-5_s.jpg" data-src="/homes/images/temp/S-001-5_b.jpg" data-action="zoom" class="cover"></div>
											</div>
											<div class="eval-time">
												2017年08月11日 20:31 颜色分类：深棕色 尺码：均码
											</div>
										</div>
									</div>




									<!-- 分页 -->
									<div class="page text-center clearfix">
										<a class="disabled">上一页</a>
										<a class="select">1</a>
										<a href="">2</a>
										<a href="">3</a>
										<a href="">4</a>
										<a href="">5</a>
										<a class="" href="">下一页</a>
										<a class="disabled">1/5页</a>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="bad" aria-labelledby="bad-tab">

									<div class="eval-box">
										<div class="eval-author">
											<div class="port">
												<img src="/homes/images/icons/default_avt.png" alt="欢迎来到U袋网" class="cover b-r50">
											</div>
											<div class="name">高***恒</div>
										</div>
										<div class="eval-content">
											<div class="eval-text">
												真是特别美_回头穿了晒图
											</div>
											<div class="eval-imgs">
												<div class="img-temp"><img src="/homes/images/temp/S-001-1_s.jpg" data-src="/homes/images/temp/S-001-1_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-2_s.jpg" data-src="/homes/images/temp/S-001-2_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-3_s.jpg" data-src="/homes/images/temp/S-001-3_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-4_s.jpg" data-src="/homes/images/temp/S-001-4_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-5_s.jpg" data-src="/homes/images/temp/S-001-5_b.jpg" data-action="zoom" class="cover"></div>
											</div>
											<div class="eval-time">
												2017年08月11日 20:31 颜色分类：深棕色 尺码：均码
											</div>
										</div>
									</div>

									<div class="eval-box">
										<div class="eval-author">
											<div class="port">
												<img src="/homes/images/icons/default_avt.png" alt="欢迎来到U袋网" class="cover b-r50">
											</div>
											<div class="name">高***恒</div>
										</div>
										<div class="eval-content">
											<div class="eval-text">
												真是特别美_回头穿了晒图
											</div>
											<div class="eval-imgs">
												<div class="img-temp"><img src="/homes/images/temp/S-001-1_s.jpg" data-src="/homes/images/temp/S-001-1_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-2_s.jpg" data-src="/homes/images/temp/S-001-2_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-3_s.jpg" data-src="/homes/images/temp/S-001-3_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-4_s.jpg" data-src="/homes/images/temp/S-001-4_b.jpg" data-action="zoom" class="cover"></div>
												<div class="img-temp"><img src="/homes/images/temp/S-001-5_s.jpg" data-src="/homes/images/temp/S-001-5_b.jpg" data-action="zoom" class="cover"></div>
											</div>
											<div class="eval-time">
												2017年08月11日 20:31 颜色分类：深棕色 尺码：均码
											</div>
										</div>
									</div>
									<!-- 分页 -->
									<div class="page text-center clearfix">
									</div>
								</div>
							</div>
							<script src="/homes/js/jquery.zoom.js"></script>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="service" aria-labelledby="service-tab">
						<!-- 富文本 -->
						<div class="service-content rich-text">
							<img title="" alt="" src="http://img.aocmonitor.com.cn/image/2014-06/86575417.gif" width="240" height="160" border="0" align="left"><p>承蒙惠购 AOC 产品，谨致谢意！为了让您更好地使用本产品，武汉艾德蒙科技股份有限公司通过该产品随机附带的保修证向您做出下述维修服务承诺，并按照该服务的承诺向您提供维修服务。</p><p>这些服务承诺仅适用于2016年6月1日（含）之后销售的AOC品牌显示器标准品。</p><p>如果您选择购买了 AOC 显示器扩展功能模块或其它厂家电脑主机，其保修承诺请参见相应产品的保修卡。</p><p>所有承诺内容以产品附件的保修卡为准。</p><p><br></p><h3>一、全国联保</h3><p style="text-indent:2em">AOC 显示器实施全国范围联保，国家标准三包服务。无论您是在中国大陆 ( 不含香港、澳门、台湾地区) 何处购买并在大陆地区使用的显示器，出现三包范围内的故障时，可凭显示器的保修证正本和购机发票到 AOC 显示器维修网点或授权网点进行维修同时，也欢迎您关注官方微信服务号“AOC用户俱乐部”(微信号：aocdisplay)进行查询。</p><div style="text-align:center"><img src="http://img.aocmonitor.com.cn/image/2017-05/89154415.jpg" alt=""></div><p><br></p><p>三包服务如下：</p><ol><li>商品自售出之日起 7 日内，出现《微型计算机商品性能故障表》中所列故障时，消费者可选择退货、换货或修理。</li><li>商品自售出之日起 15 日内，出现《微型计算机商品性能故障表》中所列故障时，消费者可选择换货或修理。</li><li>商品自售出之日起 1 年内，出现《微型计算机商品性能故障表》中所列故障时，消费者可选择修理。</li></ol><p>以下情况不在三包范围内：</p><ol><li>超过三包有效期。</li><li>无有效的三包凭证及发票。</li><li>发票上内容与商品实物标识不符或者涂改的。</li><li>未按产品使用说明书要求使用、维护、保养而造成损坏的（人为损坏）。</li><li>非 AOC 授权的修理者拆动造成损坏的（私自拆修）。</li><li>非 AOC 在中国大陆（不含香港、澳门、台湾地区）销售的商品。</li></ol><h3>二、显示器专享服务</h3><p><strong>1、LUVIA视界头等舱，VIP专享服务</strong></p><p style="text-indent:2em">AOC针对各省市地区采取指定商品销售，消费者购买指定销往该区域的LUVIA卢瓦尔显示器标准品，从发票开具之日起1年内，注册成为官方微信服务号“AOC用户俱乐部”(微信号：aocdisplay)产品会员，即可在当地享“LUVIA视界头等舱，VIP专享服务”。</p><div style="text-align:center"><img src="http://img.aocmonitor.com.cn/image/2017-05/25352146.jpg" alt=""></div><p><br></p><p style="text-indent:2em">* 如客户未在发票开具之日起1年内注册AOC微信会员，则只享受国家三包服务。</p><p style="text-indent:2em">注册会员方式：1、关注“AOC用户俱乐部”微信公众号。2、点击“会员”→“注册会员”。3、填写个人真实信息并注册产品信息，即可成为AOC产品会员。</p><p style="text-indent:2em"><strong>3年免费上门更换</strong>：从发票开具之日起3年内，产品若发生《微型计算机商品性能故障表》所列性能故障，可免费更换不低于同型号同规格产品。（服务网点无法覆盖区域，全国区域免费邮寄，双向运费由AOC负担）</p><p style="text-indent:2em"><strong>一键快捷掌上服务：</strong>从注册成为“AOC用户俱乐部”会员之日起，可享在线贴身技术顾问有问必答、售后服务在线预约、服务网点在线查询等一键快捷掌上服务。（人工客服咨询在线时间：8:00-22:00）</p><p style="text-indent:2em"><strong>增值豪礼尊享服务：</strong>可参加“AOC用户俱乐部”有奖互动赢取豪礼。</p><p>注：<br>(1)如不能及时提供购机发票或发票记载不清、涂改、商品实物标示和发票内容不符，将以您上传“AOC用户俱乐部”的发票信息为准计算保修时间；如果发票信息并未上传，将以该显示器制造日期(制造日期见显示器后壳条形码标签)加一个月为准计算保修时间。<br>(2)非“AOC用户俱乐部”产品会员，不享受“LUVIA视界头等舱，VIP专享服务”。</p>
						</div>
					</div>
			    </div>
				<div class="recommends">
					<div class="lace-title type-2">
						<span class="cr">爆款推荐</span>
					</div>
					<div class="swiper-container recommends-swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								@foreach ($hot as $v)
								<a class="picked-item" href="/home/collect/{{ $v->id }}">
									<img src="/{{ $v->goods_plot }}" alt="" class="cover">
									<div class="look_price">¥{{ $v->goods_price }}</div>
								</a>
								@endforeach
							</div>
						</div>
					</div>
					<script>
						$(document).ready(function(){
							var recommends = new Swiper('.recommends-swiper', {
								spaceBetween : 40,
								autoplay : 5000,
							});
						});
					</script>
				</div>
			</div>
			<div class="pull-right">
				<div class="tab-content" id="descCate">
					<div role="tabpanel" class="tab-pane fade in active" id="detail-tab" aria-labelledby="detail-tab">
						<div class="descCate-content bgf5"></div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="evaluate-tab" aria-labelledby="evaluate-tab">
						<div class="descCate-content posr bgf5">

						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="service-tab" aria-labelledby="service-tab">
						<div class="descCate-content posr bgf5">
						</div>
					</div>
				</div>
			</div>
			<script>
				$(document).ready(function(){
					$('#descCate').smartFloat(0);
					$('.dc-idsItem').click(function() {
						$(this).addClass('selected').siblings().removeClass('selected');
					});
					$('#item-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
						$('#descCate #' + $(e.target).attr('aria-controls') + '-tab')
						.addClass('in').addClass('active').siblings()
						.removeClass('in').removeClass('active');
					});
				});
			</script>
		</section>
	</div>
@endsection