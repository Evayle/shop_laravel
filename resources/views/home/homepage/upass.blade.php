@extends('home.layout.homepage')
@section('homepage')
    <div class="pull-right">

                @if($date== true)
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改支付密码</div>
                    <div class="modify_div">
                        <div class="clearfix">
                            <a href="/home/payupss" role="button" class="but">修改支付密码</a>
                            <a href="/home/payupss" role="button" class="but">忘记支付密码</a>
                        </div>

                        <div class="help-block">随时都能更改密码，保障您账户余额支付的安全</div>
                    </div>
                </div>
                @else
                <!-- 这个,没有 密码的时候提交的 -->
                <form action="/home/pay" method="post">
                 {{ csrf_field() }}
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改支付密码</div>
                    <div class="modify_div">
                        <span>您还没有设置支付密码(6-8位的数字)</span>
                        <br>
                        <br>
                        <input type="password" placeholder="请直接输入您的密码" class="form-control phone1" style="width:250px;display:block;" name="upay" id="upay">
                        <span id="sapn1"></span>
                        <span id="sapn2" style="color:red"></span>

                        <br>
                        <input type="password" placeholder="请再次输入您的密码" class="form-control phone" style="width:250px;display:block;" name="upaypass" id="upaypass">
                        <span style="color: red;" id="sapn"></span>
                        <span " id="sapn4"></span>
                        <br>
                        <div class="user-form-group tags-box">
                            <button type="submit" class="btn" id="sub">提交</button>
                        </div>
                        <div class="help-block">随时都能更改密码，保障您账户余额支付的安全</div>
                    </div>
                </div>
                </form>
                <script type="text/javascript" >
                //判断是否是(6-8的数字);
                $('#upay').blur(function(){
                    var ze =  /^[0-9]{6,8}$/;
                    var pass = $('#upay').val();
                    if(pass.match(ze)){
                       $('#sapn1').text('密码格式正确');
                       $('#sapn2').text(' ');
                       $('#sapn').text(' ');
                       $('#sapn4').text(' ');
                    }else{
                        $('#upay').text('');
                        $('#sapn2').text('密码格式正确密码格式设置有问题,请重新输入');
                        $('#sapn1').text(' ');
                        $('#sapn').text(' ');
                        $('#sapn4').text(' ');
                    }
                });
                </script>
                <script  type="text/javascript" >
                $('#upaypass').blur(function(){
                    var one = $('#upay').val();
                    var ones = $('#upaypass').val();

                    if(one == ones){
                        $('#sapn4').text('两次密码输入正确,请点击提交');
                        $('#sapn1').text('');
                        $('#sapn2').text('');
                        $('#sapn').text('');
                    }else{
                        $('#sapn').text('两次密码输入不正确');
                        $('#sapn1').text('');
                        $('#sapn2').text('');
                        $('#sapn4').text('');
                    }
                });
                </script>
                <script  type="text/javascript">
                     $('#sub').click(function(){
                    var one = $('#upay').val();
                    var ones = $('#upaypass').val();

                    if(one == ones){
                        alert('提交成功');
                    }else{
                        $('#sapn').text('两次密码输入不正确');
                        alert('请输入正确的密码');
                        $('#upay').val('');
                        $('#upaypass').val('');
                        return false;
                    }
                });
                </script>
                @endif
            </div>
        </section>
    </div>
@endsection