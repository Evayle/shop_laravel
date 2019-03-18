@extends('home.layout.homepage')
@section('homepage')

            <div class="pull-right" id="class_one">

                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改登陆密码</div>
                    <div class="modify_div">
                        <div class="clearfix">

                            <a href="##" role="button" class="but" id="class_0">修改登陆密码</a>

                            <a href="/home/login" role="button" class="but">忘记登陆密码</a>
                        </div>
                        <div class="help-block">随时都能更改密码，保障您账户的安全</div>
                    </div>
                </div>
            </div>

             <div class="pull-right" id="class_1"  hidden="hidden">
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改登陆密码</div>
                    <div class="step-flow-box">
                        <div class="step-flow__bd">
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">输入旧密码</p>
                            </div>
                            <div class="step-flow__line step-flow__line_ing">
                              <div class="step-flow__process"></div>
                            </div>
                            <div class="step-flow__li">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p  class="step-flow__title-top">重置登陆密码</p>
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
                    <form action="/home/login_pass" class="user-setting__form" role="form" method="post">
                     {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" name="phone" required="" id="upass" autocomplete="off" type="password">
                            <span class="tip-text">请输入原密码</span>
                            <span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <span class="error_tip"></span>
                        </div>
                        <div class="user-form-group tags-box">
                            <button type="submit" class="btn " id="class_5" disabled>提交</button>
                        </div>
                        <script src="/homes/js/login.js"></script>
                        <script>
                            $(document).ready(function(){
                                $('.form-control').on('blur focus',function() {
                                    $(this).addClass('focus');
                                    $('.error_tip').empty();
                                    if ($(this).val() == ''){$(this).removeClass('focus')}
                                });
                            });
                        </script>
                    </form>
                </div>
            </div>
            </section>
    </div>

    <script type="text/javascript">
        $("#class_0").click(function(){
        $("#class_1").show();
        $("#class_one").hide();
        });

        $('#upass').blur(function(){
            var upss = $('#upass').val();
             $.ajax({
                  headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/home/login_pass/create",
                    type: "get",
                    data: {'upass':upss},
                    dataType:'json',
                    success: function(data) {
                        if(data ==1){
                            $("#class_5").removeAttr("disabled");

                        }else{

                            alert('密码错误');
                            $('#upass').val('');

                        }
                    }
                });
        });
    </script>






@endsection