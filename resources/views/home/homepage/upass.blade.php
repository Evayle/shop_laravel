@extends('home.layout.homepage')
@section('homepage')
    <div class="pull-right">
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改支付密码</div>
                    <div class="modify_div">
                        <div class="clearfix">
                            <a href="udai_modifypay_step1.html" role="button" class="but">修改支付密码</a>
                            <a href="udai_modifypay_step1.html" role="button" class="but">忘记支付密码</a>
                        </div>
                        <div class="help-block">随时都能更改密码，保障您账户余额支付的安全</div>
                    </div>
                </div>


                <hr>
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改支付密码</div>
                    <div class="step-flow-box">
                        <div class="step-flow__bd">
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">验证身份</p>
                            </div>
                            <div class="step-flow__line step-flow__line_ing">
                              <div class="step-flow__process"></div>
                            </div>
                            <div class="step-flow__li">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p  class="step-flow__title-top">重置支付密码</p>
                            </div>
                            <div class="step-flow__line">
                              <div class="step-flow__process"></div>
                            </div>
                            <div class="step-flow__li">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">完成</p>
                            </div>
                        </div>
                    </div>
                    <form action="udai_modifypay_step2.html" class="user-setting__form" role="form">
                        <div class="form-group">
                            <input class="form-control phone" name="phone" required="" maxlength="11" autocomplete="off" type="text">
                            <span class="tip-text">手机号</span>
                            <span class="error_tip"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="sms" type="text">
                                <span class="tip-text">输入验证码</span>
                                <span class="input-group-btn">
                                    <button class="btn btn-pink" id="getsms" type="button">发送验证码</button>
                                </span>
                            </div>
                        </div>
                        <div class="user-form-group tags-box">
                            <button type="submit" class="btn ">提交</button>
                        </div>
                        <script src="js/login.js"></script>
                        <script>
                            $(document).ready(function(){
                                $('.form-control').on('blur focus',function() {
                                    $(this).addClass('focus');
                                    $('.error_tip').empty();
                                    if ($(this).val() == ''){$(this).removeClass('focus')}
                                });
                                $('#getsms').click(function() {
                                    var phone = $(this).parents('form').find('input.phone');
                                    var error = $(this).parents('form').find('.error_tip');
                                    switch(phone.validatemobile()) {
                                        case 0:
                                            // 短信验证码的php请求
                                            error.html('验证码 <strong>已发送</strong>');
                                            $(this).rewire(60);
                                        break;
                                        case 1: error.html('<strong>手机号码为空</strong> 请输入手机号码'); break;
                                        case 2: error.html('<strong>手机号码错误</strong> 请输入11位数的号码'); break;
                                        case 3: error.html('<strong>手机号码错误</strong> 请输入正确的号码'); break;
                                    }
                                });
                            });
                        </script>
                    </form>
                </div>
        <hr>




                <div class="user-content__box clearfix bgf">
                <div class="title">账户信息-修改支付密码</div>
                    <div class="step-flow-box">
                        <div class="step-flow__bd">
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">验证身份</p>
                            </div>
                            <div class="step-flow__line step-flow__li_done">
                              <div class="step-flow__process"></div>
                            </div>
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p  class="step-flow__title-top">重置支付密码</p>
                            </div>
                            <div class="step-flow__line step-flow__line_ing">
                              <div class="step-flow__process"></div>
                            </div>
                            <div class="step-flow__li">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">完成</p>
                            </div>
                        </div>
                    </div>
                    <form action="udai_modifypay_step3.html" class="user-setting__form" role="form">
                        <div class="form-group">
                            <input class="form-control" name="phone" required="" maxlength="11" autocomplete="off" type="password">
                            <span class="tip-text">新的密码</span>
                            <span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <span class="error_tip"></span>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <input class="form-control" name="phone" required="" maxlength="11" autocomplete="off" type="password">
                            <span class="tip-text">再次确认新的密码</span>
                            <span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <span class="error_tip"></span>
                        </div>
                        </div>
                        <div class="user-form-group tags-box">
                            <button type="submit" class="btn ">提交</button>
                        </div>
                        <script src="js/login.js"></script>
                        <script>
                            $(document).ready(function(){
                                $('.form-control').on('blur focus',function() {
                                    $(this).addClass('focus')
                                    if ($(this).val() == ''){$(this).removeClass('focus')}
                                });
                            });
                        </script>
                    </form>
                </div>

        <hr>


                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改支付密码</div>
                    <div class="step-flow-box">
                        <div class="step-flow__bd">
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">验证身份</p>
                            </div>
                            <div class="step-flow__line step-flow__li_done">
                              <div class="step-flow__process"></div>
                            </div>
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p  class="step-flow__title-top">重置支付密码</p>
                            </div>
                            <div class="step-flow__line step-flow__li_done">
                              <div class="step-flow__process"></div>
                            </div>
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">完成</p>
                            </div>
                        </div>
                    </div>
                    <div class="modify-success__box text-center">
                        <div class="icon b-r50"><i class="iconfont icon-checked cf fz24"></i></div>
                        <div class="text c6">支付密码设置成功！</div>
                        <a href="item_category.html" class="btn">赶紧去购物，试试新的支付密码吧</a>
                    </div>
                </div>


        <hr>


            </div>
        </section>
    </div>





@endsection