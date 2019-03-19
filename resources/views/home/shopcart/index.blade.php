@extends('home.layout.shopping')


@section('shopping')

<!-- 顶部标题 -->
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车</div>
						@if(!empty($info))
				

					<table class="table table-bordered"  >
						<thead>
							<tr style="text-align: center;">
								<th width="300">
									<label class="checked-label"><input type="checkbox" class="check-all"><i></i> 全选</label>
								</th>
								<th width="300">商品信息</th>
								<th width="150">单价</th>
								<th width="200">数量</th>
								<th width="200">金额(小计)</th>
								<th width="80">操作</th>
							</tr>
						</thead>
						<tbody id='goodtb'>
						<!-- 这里是遍历数组 有条件的双重foreach循环 -->
						@foreach($goods as $v)
						<form action="/home/shopcart/pay" class="shopcart-form__box" method="get">
					{{ csrf_field() }}
							@foreach($info as $iv)
							@if($v->id == $iv->goods_id)
								<tr id="onegs">
									<th scope="row">
										<label class="checked-label"><input class="checkedinput" id="{{$v->id}}" name="goods_id[]" type="checkbox"><i></i>
											<div class="img"><img src="/{{$v->goods_plot}}" alt="" class="cover" style="height: 50px"></div>
										</label>
									</th>
									<td>
										<div class="name ep3" style="text-align: center;">{{$v->goods_name}}</div>
										<!-- <div class="type c9">颜色分类：深棕色  尺码：均码</div> -->
									</td>
									<td>¥<span class="g_price">{{$v->goods_price}}</span></td>
									<td>
										<div class="cart-num__box">
											<input type="button" class="sub" value="-" title="点击按钮商品数量减一" id="{{ $iv->goods_id }}">
											<input type="text" name="snum[]" class="val" value="{{$iv->sc_num}}" maxlength="2">
											<input type="button" class="add" value="+" title="点击按钮商品数量加一" id="{{ $iv->goods_id }}">
										</div>
									</td>
									<td>¥<span id="{{$v->id}}" class="price" title="{{$iv->sc_num*$v->goods_price}}">{{$iv->sc_num*$v->goods_price}}</span></td>
									<td>
										<a href="/home/shopcart/del?id={{$iv->id}}" class="btn btn-danger" style="color: #fff">删除</a>
									</td>
								</tr>
							@endif
							@endforeach
						@endforeach
						</tbody>
					</table>
						<div class="user-form-group tags-box shopcart-submit pull-right">
							<button type="submit" class="btn">提交订单</button>
						</div>
						<div class="checkbox shopcart-total">
							<label><input type="checkbox" class="check-all"><i></i> 全选</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">删除</a>
							<div class="pull-right">
								已选商品 <span class="snum">0</span> 件
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费）
								<b class="cr">¥<span class="fz24">0</span></b>
							</div>
						</div>

					@else
						<!-- 这是检测购物车没有商品显示的页面 -->
						<div style="background-image: url(/homes/images/shopcart.gif);background-repeat: no-repeat; height: 495px; padding-left: 658px; color: #b0b0b0;">
							<!-- <img src="/homes/images/shopcart.gif" alt=""> -->
							<h2 style="font-size: 36px; padding-top: 100px;">您的购物车居然是空的!!!</h2>
							<a href="/home" class="shop_color" style="">马上去购物</a>
						</div>
					@endif

					<script>
						/*function tg(){
							//console.log($('#goodtb').find('tr'));
							var zongji = 0;
							$('#goodtb').find('tr').each(function(){
								//alert($(this).find('.price').html());
								var sn = $(this).find('.val').val();
								// $(this).find('.price').val(sn);
							});
							// console.log(zongji);
							// $('.fz24').text(zongji);
						}*/
						$('.sub').click(function(){
							// 获取id方法
							var id = $(this).attr('id');
							// console.log(id);
							$.get('/home/shopcart/on_off', {'sub':1, 'goods_id':$(this).attr('id')}, function(result){
								// $(this).parent().parent().parent().children('td').children('span').text('999');
								window.location.reload();

								// var zongji = 0;
								// $('#goodtb').find('tr').each(function(){

								// 	//alert($(this).find('.price').html());
								// 	//判断input是否是选中状态
								// 	var price = Number($(this).find('.g_price').html);
								// 	var s_num = $(this).find('.val').val();
								// 	//alert('选中啦');
								// 	// console.log(snum);
								// 	sums = price*s_num;
								// 	console.log(s_num);
								// 	// $(this).find('.price').html();
									
									
								// });
								// $('.fz24').text(zongji);

								// console.log(zongji);
							}, 'json');
						});
						$('.add').click(function(){
							// 获取id方法
							var id = $(this).attr('id');
							// console.log(id);
							$.get('/home/shopcart/on_off', {'add':1, 'goods_id':$(this).attr('id')}, function(result){
								// $('.val').val();
								window.location.reload();
							}, 'json');
						});
					</script>
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
				<script>
				//同级页面被选中的input总价是多少
				function tongji(){
					//console.log($('#goodtb').find('tr'));
					var zongji = 0;
					var snum = 0;
					$('#goodtb').find('tr').each(function(){

						//alert($(this).find('.price').html());
						//判断input是否是选中状态
						
						if($(this).find('.checkedinput').prop("checked")){
							//alert('选中啦');
							snum ++;
							// console.log(snum);
							zongji += Number($(this).find('.price').html());
						}
						
					});
					$('.snum').text(snum);
					$('.fz24').text(zongji);
				}
				$('.checkedinput').click(function(){
					//$(this).prop("checked,true");
					//console.log(a);
					//num = $('span').attr('title');
					//console.log(num);
					//var a = $(this).parents('tr').find('.price').html();
					tongji();
					
				});
				$('#firstinput').click(function(){
					tongji();
				})
				</script>
				<script>
					$('#')



				</script>
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