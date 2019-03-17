@extends('home.layout.login')
@section('login')
<div style="background:url(/homes/images/login_bg.jpg) no-repeat center center; ">
        <div class="login-layout container">
            <div class="form-box login">
                <div class="tabs-nav">
                    <h2>欢迎登录富潮里商城</h2>
                </div>
                <div class="tabs_container">

                    <!-- 登录页面 -->
                    <form action="/home/enpty" method="post" >
                    {{csrf_field()}}

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                                </div>
                                <input class="form-control phone" name="phone" id="login_phone" required placeholder="手机号" maxlength="11" autocomplete="off" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </div>
                                <input class="form-control password" name="password" id="login_pwd" placeholder="请输入密码" autocomplete="off" type="password">
                                <div class="input-group-addon pwd-toggle" title="显示密码"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input checked="" id="login_checkbox" type="checkbox"><i></i> 30天内免登录
                            </label>
                            <a href="javascript:;" class="pull-right" id="resetpwd">忘记密码？</a>
                        </div>
                        <!-- 错误信息 -->
                        <div class="form-group">
                            <div class="error_msg" id="login_error">


                            </div>
                        </div>

                        <input type="submit" class="btn btn-large btn-primary btn-lg btn-block " value="登 录"><br>

                        <p class="text-center">没有账号？<a href="javascript:;" id="register">免费注册</a></p>
                    </form>
                    <!-- 登录页面截止 -->

                    <div class="tabs_div">
                        <div class="success-box">
                            <div class="success-msg">`
                                <i class="success-icon"></i>
                                <p class="success-text">登录成功</p>
                            </div>
                        </div>
                        <div class="option-box">
                            <div class="buts-title">
                                现在您可以
                            </div>
                            <div class="buts-box">
                                <a role="button" href="index.html" class="btn btn-block btn-lg btn-default">继续访问商城</a>
                                <a role="button" href="udai_welcome.html" class="btn btn-block btn-lg btn-info">登录会员中心</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-box register">
                <div class="tabs-nav">
                    <h2>欢迎注册<a href="javascript:;" class="pull-right fz16" id="reglogin">返回登录</a></h2>
                </div>
                <div class="tabs_container">





                    <form class="tabs_form" action="/home/test" method="post" >
                   {{ csrf_field() }}


                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                                </div>


                                <input class="form-control phone" name="phone" id="register_phone" required placeholder="手机号" maxlength="11" autocomplete="off" type="text" value="{{ old('phone') }}">

                            </div>
                            <span style="color:red;" id="tel"></span>

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="smscode" id="register_sms" placeholder="输入验证码" type="text">
                                <span class="input-group-btn">


                                    <button class="btn btn-primary getsms" type="button" id="send">发送短信验证码</button>

                                </span>

                            </div>
                            <span id="test" style="color:red"></span>
                         </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </div>


                                <input class="form-control password" name="password" id="register_pwd" placeholder="请输入密码" autocomplete="off" type="password" value="{{ old('password') }}">

                                <div class="input-group-addon pwd-toggle" title="显示密码"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input checked="" id="register_checkbox" type="checkbox"><i></i> 同意<a href="temp_article/udai_article3.html">U袋网用户协议</a>
                            </label>
                        </div>
                        <!-- 错误信息 -->
                        <div class="form-group">
                            <div class="error_msg" id="register_error"></div>
                        </div>

                        <!-- 注册 -->
                        <button class="btn btn-large btn-primary btn-lg btn-block " id="zhc" type="submit">注册</button>
                        <!-- <input type="submit"  value="注册" > -->
                    </form>
                    <script  type="text/javascript">
                        $('#register_phone').click(function(){
                            $('#tel').text('');
                        });
                        $('#register_phone').blur(function(){
                                var tel =  $('#register_phone').val();
                                //alert(tel);
                             $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: 'GET',
                                    url: '/home/datection',
                                    data: {'tel':tel},
                                    dataType: 'json',
                                    async : 'false',    //同步
                                    success: function(data){

                                      if(data == "ok"){
                                        $('#tel').text('电话号码已存在');
                                        //$('#register_sms').atrr('disabled','disabled');
                                        $("#register_sms").attr("disabled","disabled");
                                        $("#send").attr("disabled","disabled");

                                        $("#register_pwd").attr("disabled","disabled");//禁止输入密码

                                        $("#zhc").attr("disabled","disabled"); //禁止注册

                                      }else{
                                            $('#tel').text('此号码可以使用');
                                            $("#register_sms").removeAttr("disabled");
                                            $("#send").removeAttr("disabled");

                                            $("#register_pwd").removeAttr("disabled");//禁止输入密码

                                            $("#zhc").removeAttr("disabled");//禁止注册
                                      }
                                    },
                            });
                        });
                    </script>


                </div>
            </div>

            <div class="form-box resetpwd">
                <div class="tabs-nav clearfix">
                    <h2>找回密码<a href="javascript:;" class="pull-right fz16" id="pwdlogin">返回登录</a></h2>
                </div>
                <div class="tabs_container">
                    <form class="tabs_form" action="/home/login_mod" method="post" >
                     {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                                </div>

                                <input type="text" name="uphonsess" class="form-control phone" placeholder="请输入手机号码" id="telphon" maxlength="11">

                            </div>
                            <span id="so" style="color:red"></span>
                            <span id="soo"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="sms" id="sms_pass" placeholder="输入验证码" type="text">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary getsms" type="button" id="ssmm">发送短信验证码</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </div>

                                <input class="form-control password" name="password" id="sspwd" placeholder="新的密码" autocomplete="off" type="password">
                                <div class="input-group-addon pwd-toggle" title="显示密码"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></div>
                            </div>
                        </div>
                        <!-- 错误信息 -->
                        <div class="form-group">
                            <div class="error_msg" id="resetpwd_error"></div>
                        </div>

                        <button class="btn btn-large btn-primary btn-lg btn-block" id="ppsss" type="submit">重置密码</button>
                    </form>
                    <script  type="text/javascript">
                    $('#telphon').blur(function(){
                        var phon = $('#telphon').val();
                        $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'GET',
                        url: '/home/login_mod/1',
                        data: {'phon':phon},
                        dataType: 'json',
                        async : 'false',    //同步
                        success: function(data){
                            if(data == 1){
                                $('#soo').text('此用户已注册,可以提交申请');
                                $('#so').text('');
                                $("#ssmm").removeAttr("disabled");
                                $("#ppsss").removeAttr("disabled");
                                $("#sms_pass").removeAttr("disabled");
                                $("#sspwd").removeAttr("disabled");

                            }else{
                                $('#so').text('此用户未注册,不可以提交申请');
                                $('#soo').text('');
                                $("#ssmm").attr("disabled","disabled");
                                $("#ppsss").attr("disabled","disabled");
                                $("#sms_pass").attr("disabled","disabled");
                                $("#sspwd").attr("disabled","disabled");
                            }
                            },
                        error:function(data){
                        console.log(data);
                        }
                        });
                    });
                    </script>
                    <script type="text/javascript">
                    $('#ssmm').click(function(){
                        var phon = $('#telphon').val();
                        $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'GET',
                        url: '/home/login_edit',
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
                    });
                    </script>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    // 判断直接进入哪个页面 例如 login.php?p=register
                    switch($.getUrlParam('p')) {
                        case 'register': $('.register').show(); break;
                        case 'resetpwd': $('.resetpwd').show(); break;
                        default: $('.login').show();
                    };
                    // 发送验证码事件
                    $('.getsms').click(function() {
                        var phone = $(this).parents('form').find('input.phone');
                        var error = $(this).parents('form').find('.error_msg');
                        switch(phone.validatemobile()) {
                            case 0:
                                // 短信验证码的php请求
                                error.html(msgtemp('验证码 <strong>已发送</strong>','alert-success'));
                                $(this).rewire(60);
                            break;
                            case 1: error.html(msgtemp('<strong>手机号码为空</strong> 请输入手机号码',    'alert-warning')); break;
                            case 2: error.html(msgtemp('<strong>手机号码错误</strong> 请输入11位数的号码','alert-warning')); break;
                            case 3: error.html(msgtemp('<strong>手机号码错误</strong> 请输入正确的号码',  'alert-warning')); break;
                        }
                    });
                    // 以下确定按钮仅供参考
                    $('.submit').click(function() {
                        var form = $(this).parents('form')
                        var phone = form.find('input.phone');
                        var pwd = form.find('input.password');
                        var error = form.find('.error_msg');
                        var success = form.siblings('.tabs_div');
                        var options = {
                            beforeSubmit: function () {
                                console.log('喵喵喵')

                            },
                            success: function (data) {
                                console.log(data)
                            }
                        }
                        // 验证手机号参考这个
                        switch(phone.validatemobile()) {
                            case 1: error.html(msgtemp('<strong>手机号码为空</strong> 请输入手机号码',    'alert-warning')); return; break;
                            case 2: error.html(msgtemp('<strong>手机号码错误</strong> 请输入11位数的号码','alert-warning')); return; break;
                            case 3: error.html(msgtemp('<strong>手机号码错误</strong> 请输入正确的号码',  'alert-warning')); return; break;
                        }
                        // 验证密码复杂度参考这个
                        switch(pwd.validatepwd()) {
                            case 1: error.html(msgtemp('<strong>密码不能为空</strong> 请输入密码',    'alert-warning')); return; break;
                            case 2: error.html(msgtemp('<strong>密码过短</strong> 请输入6位以上的密码','alert-warning')); return; break;
                        }
                        form.ajaxForm(options);
                        // 请求成功执行类似这样的事件
                        // form.fadeOut(150,function() {
                        //  success.fadeIn(150);
                        // });
                    })
                });
            </script>
            <script type="text/javascript">
                $(function () {
            //利用返回来的url地址进行判断
            var url = (window.location.href);
            var a = (window.location.pathname);
            var b = (window.location.host);
            var d = (window.location.protocol);
            console.log(url);
            var urls = d+"//"+b+a;
            console.log(urls);
            if(url =='http://mhn.com/home/login?error=123&p=register'){
             $('#test').text("验证码在本次登录5分钟内有效,请输入正确验证码");

             }else{

             }
          });
         </script>
        </div>
    </div>

    <


@endsection

