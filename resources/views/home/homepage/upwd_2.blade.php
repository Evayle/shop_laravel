@extends('home.layout.homepage')
@section('homepage')
   <div class="pull-right" id="class_2"  >
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
                    <form action="/home/login_pass/213" class="user-setting__form" role="form" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                        <div class="form-group">
                            <input class="form-control" name="upass" required=""  autocomplete="off" type="password" id="c1_pass">
                            <span class="tip-text">新的密码</span>
                            <span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <span class="error_tip"></span>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <input class="form-control" name="reupass" required="" autocomplete="off" type="password" id="c2_pass">
                            <span class="tip-text">再次确认新的密码</span>
                            <span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <span class="error_tip" id="c10"></span>
                        </div>
                        </div>
                        <div class="user-form-group tags-box">
                            <button type="submit" class="btn" disabled="disabled" id="c11">提交</button>
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
                        <script>

                        $('#c2_pass').blur(function(){
                            var pas = $('#c1_pass').val();
                            var pas1 = $('#c2_pass').val();
                            if(pas  ==  pas1){
                                $('#c10').text('密码一致,可以重置密码');
                                $('#c11').removeAttr("disabled");

                            }else{
                                $('#c10').text('密码不一致,请重新输入');
                                $('#c2_pass').val('');
                                $('#c1_pass').val('');
                                $('#c11').attr("disabled","disabled");
                            }
                        });





                        </script>
                    </form>

                </div>

 </section>
</div>



@endsection