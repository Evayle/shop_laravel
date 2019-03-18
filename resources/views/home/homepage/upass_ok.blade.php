
@extends('home.layout.homepage')
@section('homepage')
    <div class="pull-right">

                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改支付密码</div>
                    <div class="step-flow-box">
                        <div class="step-flow__bd">
                            <div class="step-flow__li step-flow__li_done">
                              <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
                              <p class="step-flow__title-top">重设密码</p>
                            </div>
                            <div class="step-flow__line step-flow__li_done">
                              <div class="step-flow__process"></div>
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
                        <a href="/home" class="btn">赶紧去购物，试试新的支付密码吧</a>
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection
