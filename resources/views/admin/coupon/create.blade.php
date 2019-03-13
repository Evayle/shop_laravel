@extends('admin.layout.index')
@section('content')

          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> 优惠券添加</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> 填写优惠活动信息</h4>
                      <form class="form-horizontal style-form" action="/admin/coupon" method="post" id="forms">
                            {{ csrf_field() }}
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong><strong>*</strong></strong>优惠券名称</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" placeholder="请填写优惠券的名称" id="youhuiquan" name="coupon" >
                                  <span id="ss" style="color:red"></span>
                              </div>
                          </div>
                          <script type="text/javascript" >
                          $('#youhuiquan').mouseover(function(){
                            var vale = $("#youhuiquan").val();
                            if(vale == ""){
                              $("#ss").text('请输入内容');
                            }else{
                              $("#ss").text('');
                            }

                          });

                          </script>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong><strong>*</strong></strong>优惠券发放时间</label>
                              <div class="col-sm-10">
                                  <input type="text" class="demo-input" placeholder="请选择日期" id="time" name="coupon_start_time">
                                   至
                                   <input type="text" class="demo-input" placeholder="请选择日期" id="time1" name="coupon_end_time">
                                   <span id="time_span"  style="color:red"></span><br />
                                  <strong>请选择优惠券的发放时间</strong>
                              </div>
                          </div>
                            <script>
                            lay('#version').html('-v'+ laydate.v);

                            //执行一个laydate实例
                            laydate.render({
                              elem: '#time' //指定元素
                            });
                            </script>
                            <script>
                            lay('#version').html('-v'+ laydate.v);

                            //执行一个laydate实例
                            laydate.render({
                              elem: '#time1' //指定元素
                            });
                            </script>

                            <br>
                            <br>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong><strong>*</strong></strong>活动时间</label>
                              <div class="col-sm-10">
                                  <input type="text" class="demo-input" placeholder="请选择日期" id="time2" name="coupon_start_period">
                                   至
                                   <input type="text" class="demo-input" placeholder="请选择日期" id="time3" name="coupon_end_period">
                                   <span id="time_span1"  style="color:red"> </span><br />
                                  <strong>请选择优惠券活动开始的时间</strong>
                              </div>
                          </div><script>
                            lay('#version').html('-v'+ laydate.v);

                            //执行一个laydate实例
                            laydate.render({
                              elem: '#time2' //指定元素
                            });
                            </script>
                            <script>
                            lay('#version').html('-v'+ laydate.v);

                            //执行一个laydate实例
                            laydate.render({
                              elem: '#time3' //指定元素
                            });
                            </script>
                                 <script type="text/javascript">
                               $('#time2').click(function(){
                                var time = $('#time').val();
                                var time1 = $('#time1').val();
                                var now = new Date();
                                //当前日期
                                var time11 = now.getFullYear() + "-" +((now.getMonth()+1)<10?"0":"")+(now.getMonth()+1)+"-"+(now.getDate()<10?"0":"")+now.getDate();

                                if(time>time1){

                                    $('#time_span').text("发放时间不可以小于截止时间");
                                    return false
                                }
                                if(time<time11){
                                    $('#time_span').text("日期格式不对,请仔细检查");
                                    return false;
                                }
                                if(time-time>100){
                                     $('#time_span').text("发放时间过长");
                                     return false;
                                }
                                if(time<time1){
                                    $('#time_span').text(" ");
                                    return false;
                                }
                                });
                            </script>
                        <hr>

                        <label class="col-sm-2 col-sm-2 control-label"><strong>*</strong>优惠券发放类型</label>
                        <label class="checkbox-inline" id="inlineCheckbox1">
                          <input type="radio"  name="coupon_send_type" value="1" ">商品添加
                        </label>
                        <label class="checkbox-inline" id="inlineCheckbox2">
                          <input type="radio"  name="coupon_send_type" value="2"> 分享链接添加
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="coupon_send_type" id="inlineCheckbox3" value="2" disabled >其他方式(开发中,不建议选择)
                        </label>

                        <hr>

                            <!--  需要和商品表链接起来 -->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong>*</strong>绑定商品</label>
                              <div class="col-sm-10">
                                 <select class="form-control input-sm" name="coupon_shop" id="sel">
                                    <option value="0">顶级分类</option>
                                    <option value="1">123</option>
                                    <option value="2">|----123132</option>
                                </select>
                              </div>
                          </div>
                                    <script type="text/javascript">
                        $('#sel').click(function(){
                                //活动开始时间
                                var time = $('#time2').val();
                                //活动结束时间
                                var time1 = $('#time3').val();
                                //发放开始时间
                                var time3 = $('#time').val();
                                //发放截止时间
                                var time4 = $('#time1').val();
                                var now = new Date();
                                //当前日期
                                var time11 = now.getFullYear() + "-" +((now.getMonth()+1)<10?"0":"")+(now.getMonth()+1)+"-"+(now.getDate()<10?"0":"")+now.getDate();

                                if (time3>time) {
                                    $('#time_span1').text("活动时间不可以小于发放时间");
                                    return false;
                                };
                                if(time4>=time1){
                                     $('#time_span1').text("活动时间必须大于发放截止时间");
                                    return false;
                                }
                                if(time>time1){

                                    $('#time_span1').text("活动截止时间不可以小于活动开始时间");
                                    return false;
                                }

                                if(time-time>100){
                                     $('#time_span1').text("发放时间过长");
                                     return false;
                                }
                                if(time<time1){
                                    $('#time_span1').text(" ");
                                    return false;
                                }
                                });
                        </script>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong>*</strong>优惠券面额</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="输入金额" style='width:300px;' name="coupon_many" id="many">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong>*</strong>发行张数</label>
                              <div class="col-sm-10">
                                 <input type="text"  class="form-control" placeholder="填写数量" style='width: 100px;' name="coupon_nums">
                              </div>
                          </div>
                          <div class="form-group" ">
                              <label class="col-sm-2 col-sm-2 control-label"><strong>*</strong>结算类型</label>
                                  <input type="radio" name="coupon_setting_type" value="1" id="le"><strong id="man">满减</strong>
                                  <input type="radio" name="coupon_setting_type"  value="2" id="lei"><strong id="zhe">折扣</strong>
                          </div>
                          <div id="divs">
                          </div>
                          <script  type="text/javascript" >
                            $('#le').click(function(){
                                var a = $('#man').text();
                                var many = $('#many').val();
                                if(a == "满减"){
                                  $('#diss').val(" ");
                                  $('#diss').attr("disabled", true);
                                  $('#dis').attr("disabled", false);
                                    $('#manjian').show();
                                    $('#manyman').val(many);
                                    $('#zhekou').hide();
                                }
                            });
                            $('#lei').click(function(){
                                var b = $('#zhe').text();
                                var many = $('#many').val();
                                if(b == "折扣"){
                                    $('#zhekou').show();
                                    $('#dis').val("");
                                    $('#dis').attr("disabled", true);
                                    $('#diss').attr("disabled", false);
                                    $('#manyzhe').val(many);
                                    $('#manjian').hide();
                                }
                            });
                          </script>
                           <div class="form-group" hidden="hidden" id="zhekou" >
                              <label class="col-sm-2 col-sm-2 control-label"><strong>*</strong>优惠券折扣规则</label>
                              <div class="col-sm-10">
                               <strong>满:</strong> <input style="width:80px;type="text" display:block;  id="manyzhe"><strong>折:</strong><input style="width:80px;type="text" display:block; name="coupon_rule" id="diss"><strong>%(请输入小数例:0.75 即是7.5折)</strong>
                              </div>
                          </div>
                          <div class="form-group" hidden="hidden" id="manjian" >
                              <label class="col-sm-2 col-sm-2 control-label"><strong>*</strong>优惠券折扣规则</label>
                              <div class="col-sm-10">
                               <strong>满:</strong> <input style="width:80px;type="text" display:block; id="manyman"><strong>减:</strong><input style="width:80px;type="text" display:block; name="coupon_rule" id="dis" ><strong>元</strong>
                              </div>
                          </div>
                          <div>
                              <center>
                              <button type="submit" class="btn btn-info " id="tijiao">提交</button>.
                              </center>
                              <script>
                              $(function() {
                                  $("#tijiao").click(function() {
                                     var r= window.confirm('您确定要提交吗?确定提交之后则无法修改');
                                      if (r){
                                        window.location.href = "${pageContext.request.contextPath}/login.action";
                                      }else {
                                      return false;
                                      }
                                  });
                              });
                          </script>
                          </div>
                      </form>
                  </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->

@endsection