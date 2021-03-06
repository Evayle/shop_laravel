@extends('home.layout.homepage')
@section('homepage')
<div class="pull-right">
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-积分平台</div>
                    <ul class="nav user-nav__title" role="tablist">
                        <li role="presentation" class="nav-item active"><a href="#useful" aria-controls="useful" role="tab" data-toggle="tab">未使用</a></li>
                        <li role="presentation" class="nav-item "><a href="#used" aria-controls="used" role="tab" data-toggle="tab">已使用</a></li>
                        <li role="presentation" class="nav-item "><a href="#overdue" aria-controls="overdue" role="tab" data-toggle="tab">已过期</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="useful">
                            <div class="coupon-list">

                                <div class="coupon">
                                    <div class="coupon-hd">
                                        <b><small class="fz16">¥</small>2.00</b>
                                        <div class="fz12">【使用期限】<br>2017.09.20至2017.12.5</div>
                                    </div>
                                    <div class="coupon-bd">
                                        <div class="fz12 c9">券号：70000503249136</div>
                                        <div class="fz12 c9">规则： 消费需满50元</div>
                                    </div>
                                    <a href="item_sale_page.html" class="coupon-ft">立即使用</a>
                                </div>

                            </div>
                            <div class="page text-right clearfix">
                                <a class="disabled">上一页</a>
                                <a class="select">1</a>
                                <a href="">2</a>
                                <a href="">3</a>
                                <a class="" href="">下一页</a>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="used">
                            <div class="coupon-list">
                                <div class="empty-msg">哇，居然没有优惠券了？</div>
                            </div>
                            <div class="page text-right clearfix">
                                <a class="disabled">上一页</a>
                                <a class="select">1</a>

                                <a class="" href="">下一页</a>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="overdue">
                            <div class="coupon-list">
                                <div class="coupon">
                                    <div class="coupon-hd">
                                    <b><small class="fz16">¥</small>2.00</b>
                                    <div class="fz12">【使用期限】
                                        <br>2017.09.20至2017.12.5
                                    </div>
                                    </div>
                                    <div class="coupon-bd"><div class="fz12 c9">券号：70000503249136</div>
                                        <div class="fz12 c9">规则： 消费需满50元</div>
                                    </div><a href="javascript:;" class="coupon-ft">已经过期</a>
                                </div>

                            </div>
                            <div class="page text-right clearfix">
                                <a class="disabled">上一页</a>
                                <a class="select">1</a>

                                <a class="" href="">下一页</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection