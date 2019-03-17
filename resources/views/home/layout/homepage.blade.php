
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="/homes/css/iconfont.css">
    <link rel="stylesheet" href="/homes/css/global.css">
    <link rel="stylesheet" href="/homes/css/bootstrap.min.css">
    <link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/homes/css/swiper.min.css">
    <link rel="stylesheet" href="/homes/css/styles.css">
    <script src="/homes/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
    <script src="/homes/js/bootstrap.min.js" charset="UTF-8"></script>
    <script src="/homes/js/swiper.min.js" charset="UTF-8"></script>
    <script src="/homes/js/global.js" charset="UTF-8"></script>
    <script src="/homes/js/jquery.DJMask.2.1.1.js" charset="UTF-8"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/address/jquery.min.js"></script>
    <title>U袋网</title>
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

                <a href="home/page">个人中心</a>
                <a href="udai_order.html">我的订单</a>
                <a href="udai_integral.html">积分平台</a>
            </div>
        </div>
    </div>
    <!-- 顶部标题 -->
    <div class="bgf5 clearfix">
        <div class="top-user">
            <div class="inner">
                <a class="logo" href="/home"><img src="/homes/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
                <div class="title">个人中心</div>
            </div>
        </div>
    </div>
    <div class="content clearfix bgf5">
        <section class="user-center inner clearfix">
            <div class="pull-left bgf">
                <a href="udai_welcome.html" class="title">U袋欢迎页</a>
                <dl class="user-center__nav">
                    <dt>帐户信息</dt>
                    <a href="/home/presonal"><dd>个人资料</dd></a>
                    <a href="## "><dd>资金管理</dd></a>
                    <a href="/home/inteqral"><dd>积分平台</dd></a>
                    <a href="/home/address"><dd>收货地址</dd></a>
                    <a href="/home/coupon"><dd>我的优惠券</dd></a>
                    <a href="/home\pay"><dd>修改支付密码</dd></a>
                    <a href="/home/login_pass"><dd>修改登录密码</dd></a>
                </dl>
                <dl class="user-center__nav">
                    <dt>订单中心</dt>
                    <a href="/home/orders"><dd>我的订单</dd></a>
                    <a href="/home/collection"><dd>我的收藏</dd></a>
                    <a href="/home/refund"><dd>退款/退货</dd></a>
                </dl>
                <dl class="user-center__nav">
                    <dt>服务中心</dt>
                    <a href="udai_mail_query.html"><dd>物流查询</dd></a>
                    <a href=""><dd>数据自助下载</dd></a>
                    <a href="temp_article/udai_article1.html"><dd>售后服务</dd></a>
                    <a href="temp_article/udai_article2.html"><dd>配送服务</dd></a>
                    <a href="temp_article/udai_article3.html"><dd>用户协议</dd></a>
                    <a href="temp_article/udai_article4.html"><dd>常见问题</dd></a>
                </dl>
                <dl class="user-center__nav">
                    <dt>新手上路</dt>
                    <a href="temp_article/udai_article5.html"><dd>如何成为代理商</dd></a>
                    <a href="temp_article/udai_article6.html"><dd>代销商上架教程</dd></a>
                    <a href="temp_article/udai_article7.html"><dd>分销商常见问题</dd></a>
                    <a href="temp_article/udai_article8.html"><dd>付款账户</dd></a>
                </dl>
                <dl class="user-center__nav">
                    <dt>U袋网</dt>
                    <a href="temp_article/udai_article10.html"><dd>企业简介</dd></a>
                    <a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a>
                    <a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a>
                </dl>
            </div>

            @section('homepage')


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
            <dl>

                <dt>富潮里</dt>
                <a href="temp_article/udai_article10.html"><dd>企业简介</dd></a>
                <a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a>
                <a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a>
            </dl>
            <dl>
                <dt>服务中心</dt>
                <a href="temp_article/udai_article1.html"><dd>售后服务</dd></a>
                <a href="temp_article/udai_article2.html"><dd>配送服务</dd></a>
                <a href="temp_article/udai_article3.html"><dd>用户协议</dd></a>
                <a href="temp_article/udai_article4.html"><dd>常见问题</dd></a>
            </dl>
            <dl>
                <dt>新手上路</dt>
                <a href="temp_article/udai_article5.html"><dd>如何成为代理商</dd></a>
                <a href="temp_article/udai_article6.html"><dd>代销商上架教程</dd></a>
                <a href="temp_article/udai_article7.html"><dd>分销商常见问题</dd></a>
                <a href="temp_article/udai_article8.html"><dd>付款账户</dd></a>
            </dl>
        </div>
        <div class="copy-box clearfix">
            <ul class="copy-links">
                <a href="agent_level.html"><li>网店代销</li></a>
                <a href="class_room.html"><li>U袋学堂</li></a>
                <a href="udai_about.html"><li>联系我们</li></a>
                <a href="temp_article/udai_article10.html"><li>企业简介</li></a>
                <a href="temp_article/udai_article5.html"><li>新手上路</li></a>
            </ul>
            <!-- 版权 -->
            <p class="copyright">


                © 2005-2017 富潮里 版权所有，并保留所有权利<br>


                ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com
            </p>
        </div>
    </div>
</body>
</html>