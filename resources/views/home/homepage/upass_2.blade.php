
@extends('home.layout.homepage')
@section('homepage')
<!-- 优秀该用户 -->
<div class="pull-right">
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
                    <form action="/home/payupss/send2" class="user-setting__form" role="form" method="post">
                        {{ csrf_field()}}

                        <div class="form-group">
                            <input class="form-control" name="phone" required="" maxlength="11" autocomplete="off" type="password" id="ups">
                            <span class="tip-text">新的密码请输入(6-8的数字)</span>
                            <span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <span class="error_tip" id="span"></span>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <input class="form-control" name="phone" required="" maxlength="11" autocomplete="off" type="password" id="ups1">
                            <span class="tip-text">再次确认新的密码</span>
                            <span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <span class="error_tip" id="span1"></span>
                        </div>
                        </div>
                        <div class="user-form-group tags-box">
                            <button type="submit" class="btn " id="subb">提交</button>
                        </div>
                        <script src="/homes/js/login.js"></script>
                        <script>
                            $(document).ready(function(){
                                $('.form-control').on('blur focus',function() {
                                    $(this).addClass('focus')
                                    if ($(this).val() == ''){$(this).removeClass('focus')}
                                });
                            });
                        </script>
                        <script  type="text/javascript" >
                        $('#ups').blur(function(){
                            $('#span').text('');
                            var ze =  /^[0-9]{6,8}$/;
                            var a = $('#ups').val();
                            var b = $('#ups1').val();
                            console.log(a);
                            console.log(b);
                            if(a.match(ze)){
                                $('#span').text('密码格式正确');
                            }else{
                                $('#span').text('密码格式不正确');
                                $('#ups').val('');
                            }
                        });
                        </script>
                        <script  type="text/javascript" >
                             $('#ups1').blur(function(){
                            var a = $('#ups').val();
                            var b = $('#ups1').val();
                            if(a == b){
                                $('#span1').text('密码输入一致,请提交');
                            }else{
                                $('#span').text('两次秘密码输入不一致,请重新输入');
                                $('#ups1').val('');
                            }
                        });

                        </script>
                        <script type="text/javascript" >
                        $('#subb').click(function(){
                            var a = $('#ups').val();
                            var b = $('#ups1').val();
                            if (a == b) {
                                alert('输入成功,请提交');
                            }else{
                                return false;
                            }
                        });

                        </script>
                    </form>
                </div>
            </div>
        </section>
    </div>




@endsection
