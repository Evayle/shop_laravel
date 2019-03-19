<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="/homes/favicon.ico">
	<link rel="stylesheet" href="/homes/css/iconfont.css">
	<link rel="stylesheet" href="/homes/css/global.css">
	<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
	<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/homes/css/swiper.min.css">
	<link rel="stylesheet" href="/homes/css/styles.css">
	<link rel="stylesheet" href="/homes/css/page.css">
	<script src="/homes/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
	<script src="/homes/js/bootstrap.min.js" charset="UTF-8"></script>
	<script src="/homes/js/swiper.min.js" charset="UTF-8"></script>
	<script src="/homes/js/global.js" charset="UTF-8"></script>
	<script src="/homes/js/jquery.DJMask.2.1.1.js" charset="UTF-8"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>富潮里</title>


</head>
<body>
	<!-- 顶部tab -->
	<div class="tab-header">

		<div class="inner">
			<div class="pull-left">

				<div class="pull-left">嗨，欢迎来到<span class="cr">富潮里</span></div>


				<a href="agent_level.html">网店代销</a>
				<a href="temp_article/udai_article4.html">帮助中心</a>
			</div>
			<div class="pull-right">


				<!-- 判断是否是在登录状态 -->
				@if(isset(($data->uname)))

				<a href="##"><span class="cr">{{ $data->uname}}</span></a>
				<a href="/home/exit/?id={{$data->id}}"><span class="cr">退出登录</span></a>
				@else
				<a href="/home/login"><span class="cr">登录</span></a>
				<a href="/home/login?p=register">注册</a>
				@endif
				<a href="/home/page">个人中心</a>
				<a href="/home/orders">我的订单</a>
				<a href="/home/inteqral">积分平台</a>

			</div>
		</div>
	</div>
	<!-- 搜索栏 -->
	<div class="top-search">
		<div class="inner">
		<a class="logo" href="/home"><img src="/homes/images/icons/logo.jpg" alt="U袋网" class="cover"></a>



			<!-- 搜索开始 -->
			<div class="search-box">
				<form class="input-group" action="/home/cates">
					<input placeholder="Ta们都在搜富潮里" type="text" name="search" value="{{ $request['search'] or '' }}">

					<span class="input-group-btn">
						<button type="submit">

							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</form>
			</div>
			<!-- 搜索结束 -->
			<div class="cart-box">
				<!-- 此处有改动 shopping不要了 改成shopcart -->
				<a href="/home/shopcart" class="cart-but">

					<i class="iconfont icon-shopcart cr fz16"></i> 购物车 0 件
				</a>
			</div>
		</div>
	</div>
	@section('index')


	@show()
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="udai_welcome.html" class="r-item-hd">
					<i class="iconfont icon-user"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<!-- 这里同上 已有则可删除 -->
				<a href="/home/shopcart" class="r-item-hd">

					<i class="iconfont icon-cart" data-badge="10"></i>
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
	</div>



	<!-- 底部信息 -->
	<div class="footer">
		<div class="footer-tags">
			<div class="tags-box inner">
				<div class="tag-div">
					<img src="/homes/images/icons/footer_1.gif" alt="厂家直供">
				</div>
				<div class="tag-div">
					<img src="/homes/images/icons/footer_2.gif" alt="一件代发">
				</div>
				<div class="tag-div">
					<img src="/homes/images/icons/footer_3.gif" alt="美工活动支持">
				</div>
				<div class="tag-div">
					<img src="/homes/images/icons/footer_4.gif" alt="信誉认证">
				</div>
			</div>
		</div>
		<div class="footer-links inner">


		</div>
		<div class="copy-box clearfix">
			<ul class="copy-links">
				@if (!empty($fs))
					@foreach ($fs as $v)
						<a href="http://{{ $v->fs_link }}"><li><dd>{{ $v->fs_name }}</dd></li></a>
					@endforeach
				@endif
			</ul>
			<!-- 版权 -->
			<p class="copyright">


				© 2005-2017 富潮里 版权所有，并保留所有权利<br>


				ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;广东省兄弟连IT教育中心&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com
			</p>
		</div>
	</div>
</body>
</html>