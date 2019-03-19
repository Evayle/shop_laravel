@extends('home.layout.shopping')

@section('shopping')
<!-- 顶部标题 -->
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车-确认支付 </div>
				<div class="shop-title">收货地址</div>
				<form action="/home/orders/add" class="shopcart-form__box">
					<div class="addr-radio">
						@if(!empty($ads))
						<div class="radio-line radio-box active">
							<label class="radio-label ep" title="{{$ads['address'] or ''}}  {{$ads['address_info'] or ''}}  {{$ads['phone'] or ''}}">
								<input name="addr" checked value="{{$ads['id']}}" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								{{$ads['address'] or ''}}  {{$ads['address_info'] or ''}}  {{$ads['phone'] or ''}}
							</label>
							<a class="default" style="color: green;"><b>默认地址</b></a>
							<a href="/home/address/{{$ads['id']}}/edit" class="edit"><b>修改</b></a>
						</div>
						@endif
						<!-- 这是其他地址 -->
						@if(!empty($ads2))
						@foreach($ads2 as $v)
						<div class="radio-line radio-box">
							<label class="radio-label ep" title="{{$v->address or ''}}  {{$v->address_info or ''}}  {{$v->phone or ''}}">
								<input name="addr"  value="{{$v->id}}" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								{{$v->address or ''}}  {{$v->address_info or ''}}  {{$v->phone or ''}}
							</label>
							<a href="/home/address/upd/{{$v->id}}" class="default" style="color: red;"><b>设为默认地址</b></a>
							<a href="/home/address/{{$v->id}}/edit" class="edit"><b>修改</b></a>
						</div>
						@endforeach
						@else
						<span style="font-size: 1.2em">暂时没有其他地址 请点击下方的去添加</span>
						@endif
					</div>
					<div class="add_addr"><a href="/home/address">添加新地址</a></div>
					<div class="shop-title">确认订单</div>
					<div class="shop-order__detail">
						<table class="table">
							<thead>
								<tr>
									<th width="" ></th>
									<th width="300">商品信息</th>
									<th width="150">单价</th>
									<th width="200">数量</th>
									<th width="200">运费</th>
									<th width="80">总价</th>
								</tr>
							</thead>
							<tbody id="gtb">
								@foreach($cart as $val)
								@foreach($goods as $v)
								@if($val->goods_id == $v->id)
								<tr>
									<th scope="row" height="60"><a><div class="img"><img src="/{{$v->goods_plot or ''}}" alt="" class="cover" style="height: 50px"></div></a></th>
									<td>
										<div class="name ep3">{{$v->goods_name or ''}} </div>
										<!-- <div class="type c9">颜色分类：深棕色  尺码：均码</div> -->
									</td>
									<td>￥{{$v->goods_price or ''}}</td>
									<td>{{$val->sc_num}}</td>
									<td>
										@if(!empty($goods))
											@if($v->goods_fsp == 0)

											<span>包邮</span>
											@else
											<span>￥10.0</span>
											@endif
										@endif
									</td>

									<td class="price_num">￥{{$v->goods_price * $val->sc_num}}</td>
								</tr>
								@endif
								@endforeach
								@endforeach
							</tbody>

						</table>
					</div>
					<div class="shop-cart__info clearfix">
						<div class="pull-left text-left">
							<div class="info-line text-nowrap">购买时间：<span class="c6">{{$date_new}}</span></div>
							<div class="info-line text-nowrap">交易类型：<span class="c6">担保交易</span></div>
							<div class="info-line text-nowrap">交易号：<span class="c6">{{$sn}}</span></div>
							<input type="hidden" name="order_sn" value="{{$sn}}">
						</div>
						<div class="pull-right text-right">
							<div class="form-group">
								<label for="coupon" class="control-label">优惠券使用：</label>
								<select id="coupon" >
									<option value="-1" selected>- 请选择可使用的优惠券 -</option>
									<option value="1">【满￥20.0元减￥2.0】</option>
									<option value="2">【满￥30.0元减￥2.0】</option>
									<option value="3">【满￥25.0元减￥1.0】</option>
									<option value="4">【满￥10.0元减￥1.5】</option>
									<option value="5">【满￥15.0元减￥1.5】</option>
									<option value="6">【满￥20.0元减￥1.0】</option>
								</select>
							</div>
							<script>
								$('#coupon').bind('change',function() {
									console.log($(this).val());
								})
							</script>
							<div class="info-line">优惠活动：<span class="c6">无</span></div>
							<div class="info-line">运费：<span class="c6">¥0.00</span></div>
							<div class="info-line"><span class="favour-value">已优惠 ¥2.0</span>合计：<b class="fz18 cr">{{$ssnum}}</b></div>
							<div class="info-line fz12 c9">（可获 <span class="c6">20</span> 积分）</div>
						</div>
					</div>
					<div class="shop-title">确认订单</div>
					<div class="pay-mode__box">
<!-- 						<div class="radio-line radio-box">
	<label class="radio-label ep">
		<input name="pay-mode" value="1" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
		<span class="fz16">余额支付</span><span class="fz14">（可用余额：¥88.0）</span>
	</label>
	<div class="pay-value">支付<b class="fz16 cr">18.00</b>元</div>
</div> -->
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/homes/images/icons/alipay.png" alt="支付宝支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{$ssnum}}</b>元</div>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="3" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/homes/images/icons/paywechat.png" alt="微信支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{$ssnum}}</b>元</div>
						</div>
					</div>
					<div class="user-form-group shopcart-submit">
						<button type="submit" class="btn">继续支付</button>
					</div>
					<script>
						$(document).ready(function(){
							$(this).on('change','input',function() {
								$(this).parents('.radio-box').addClass('active').siblings().removeClass('active');
							})

						});
					</script>
				</form>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="udai_welcome.html" class="r-item-hd">
					<i class="iconfont icon-user" data-badge="0"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_shopcart.html" class="r-item-hd">
					<i class="iconfont icon-cart"></i>
					<div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_collection.html" class="r-item-hd">
					<i class="iconfont icon-aixin"></i>
					<div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="" class="r-item-hd">
					<i class="iconfont icon-liaotian"></i>
					<div class="r-tip__box"><span class="r-tip-text">联系客服</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="issues.html" class="r-item-hd">
					<i class="iconfont icon-liuyan"></i>
					<div class="r-tip__box"><span class="r-tip-text">留言反馈</span></div>
				</a>
			</li>
			<li class="r-toolbar-item to-top">
				<i class="iconfont icon-top"></i>
				<div class="r-tip__box"><span class="r-tip-text">返回顶部</span></div>
			</li>
		</ul>
		<script>
			$(document).ready(function(){ $('.to-top').toTop({position:false}) });
		</script>
	</div>
@endsection()