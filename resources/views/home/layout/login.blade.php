<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/homes/favicon.ico">
    <link rel="stylesheet" href="/homes/css/iconfont.css">
    <link rel="stylesheet" href="/homes/css/global.css">
    <link rel="stylesheet" href="/homes/css/bootstrap.min.css">
    <link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/homes/css/login.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.slim.js"></script>
    <script src="/homes/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
    <script src="/homes/js/bootstrap.min.js" charset="UTF-8"></script>
    <script src="/homes/js/jquery.form.js" charset="UTF-8"></script>
    <script src="/homes/js/global.js" charset="UTF-8"></script>
    <script src="/homes/js/login.js" charset="UTF-8"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>富潮里商城 - 登录 / 注册</title>
</head>
<body>
    <div class="public-head-layout container">
        <a class="logo" href="/homes/index.html"><img src="/homes/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
    </div>
    @section('login')


    @show()
    <div class="footer-login container clearfix">
        <ul class="links">
            <a href="/homes/"><li>网店代销</li></a>
            <a href="/homes/"><li>U袋学堂</li></a>
            <a href="/homes/"><li>联系我们</li></a>
            <a href="/homes/"><li>企业简介</li></a>
            <a href="/homes/"><li>新手上路</li></a>
        </ul>
        <!-- 版权 -->
        <p class="copyright">
            © 2005-2017 U袋网 版权所有，并保留所有权利<br>
            ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com
        </p>
    </div>
</body>

</html>
<script type="text/javascript">

$("#send").click(function(){
    var phon = $('#register_phone').val();
     var sends = $("#send").text();
    //console.log(phon);
    //console.log(sends);
    if(sends == "发送短信验证码"){


 $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'GET',
    url: '/home/send',
    data: {'phon':phon},
    dataType: 'json',
    async : 'false',    //同步
    success: function(data){
        console.log(data);
        },
    error:function(data){
    console.log(data);
    }
});
 }
});
</script>

