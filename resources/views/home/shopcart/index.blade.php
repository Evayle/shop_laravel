@extends('home.layout.shopping')


@section('shopping')

<!-- 顶部标题 -->
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车</div>
				<form action="/home/shopcart" class="shopcart-form__box" method="post">
					{{ csrf_field() }}
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="150">
									<label class="checked-label"><input type="checkbox" class="check-all"><i></i> 全选</label>
								</th>
								<th width="300">商品信息</th>
								<th width="150">单价</th>
								<th width="200">数量</th>
								<th width="200">金额</th>
								<th width="80">操作</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">
									<label class="checked-label"><input type="checkbox"><i></i>
										<div class="img"><img src="/homes/images/temp/S-005.jpg" alt="" class="cover"></div>
									</label>
								</th>
								<td>
									<div class="name ep3">霜天月明 原创传统日常汉服男绣花交领衣裳cp春装单品</div>
									<div class="type c9">颜色分类：深棕色  尺码：均码</div>
								</td>
								<td>¥20.0</td>
								<td>
									<div class="cart-num__box">
										<input type="button" class="sub" value="-">
										<input type="text" class="val" value="1" maxlength="2">
										<input type="button" class="add" value="+">
									</div>
								</td>
								<td>¥20.0</td>
								<td><a href="">删除</a></td>
							</tr>
						</tbody>
					</table>
					<div class="user-form-group tags-box shopcart-submit pull-right">
						<button type="submit" class="btn">提交订单</button>
					</div>
					<div class="checkbox shopcart-total">
						<label><input type="checkbox" class="check-all"><i></i> 全选</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">删除</a>
						<div class="pull-right">
							已选商品 <span>2</span> 件
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费）
							<b class="cr">¥<span class="fz24">40.00</span></b>
						</div>
					</div>
					<script>
						$(document).ready(function(){
							var $item_checkboxs = $('.shopcart-form__box tbody input[type="checkbox"]'),
								$check_all = $('.check-all');
							// 全选
							$check_all.on('change', function() {
								$check_all.prop('checked', $(this).prop('checked'));
								$item_checkboxs.prop('checked', $(this).prop('checked'));
							});
							// 点击选择
							$item_checkboxs.on('change', function() {
								var flag = true;
								$item_checkboxs.each(function() {
									if (!$(this).prop('checked')) { flag = false }
								});
								$check_all.prop('checked', flag);
							});
							// 个数限制输入数字
							$('input.val').onlyReg({reg: /[^0-9.]/g});
							// 加减个数
							$('.cart-num__box').on('click', '.sub,.add', function() {
								var value = parseInt($(this).siblings('.val').val());
								if ($(this).hasClass('add')) {
									$(this).siblings('.val').val(Math.min((value += 1),99));
								} else {
									$(this).siblings('.val').val(Math.max((value -= 1),1));
								}
							});
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