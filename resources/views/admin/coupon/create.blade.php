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
                              <label class="col-sm-2 col-sm-2 control-label"><strong><strong style="color:red">*</strong></strong>优惠券名称</label>
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
                            <br>
                            <br>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong><strong style="color:red">*</strong></strong>优惠券使用时间区间</label>
                              <div class="col-sm-10">
                                  <input type="text" class="demo-input" placeholder="请选择日期" id="time" name="coupon_start_period">
                                   &nbsp; &nbsp;
                                   <input type="time" class="demo-input" name="start_period" id="time_stra">
                                   <span id="time_span"  style="color:red"> </span>
                                    <br>
                                   <strong>优惠券活动开始时间</strong>
                                   <br>
                                   <br>
                                   <input type="text" class="demo-input" placeholder="请选择日期" id="time2" name="coupon_end_period">
                                   &nbsp; &nbsp;
                                   <input type="time" class="demo-input" name="end_period" id="time_end">
                                   <span id="time_span1"  style="color:red"> </span><br />
                                  <strong>优惠券活动开始结束时间</strong>
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


                              elem: '#time' //指定元素
                            });
                            </script>

                        <hr>

                        <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>优惠券发放类型</label>
                        <label class="checkbox-inline" id="inlineCheckbox1">
                          <input type="radio"  name="coupon_send_type" value="1">商品添加
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
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>绑定商品</label>
                              <div class="col-sm-10">
                                 <select class="form-control input-sm" name="coupon_shop" id="sel">
                                    @foreach($date as $k=>$v)
                                     <option value="{{$v->id}}">{{$v->goods_name}}</option>
                                    @endforeach

                                  </select>
                              </div>
                          </div>
                                    <script type="text/javascript">
                                $('#sel').click(function(){
                                //发放开始时间
                                var time = $('#time').val();
                                //发放截止时间
                                var time2 = $('#time2').val();

                                //具体分钟
                                var star = $('#time_stra').val();
                                var end = $('#time_end').val();

                                console.log(star);
                                console.log(end);
                                var now = new Date();
                                //当前日期
                                var time11 = now.getFullYear() + "-" +((now.getMonth()+1)<10?"0":"")+(now.getMonth()+1)+"-"+(now.getDate()<10?"0":"")+now.getDate();
                                 $('#time_span').text(" ");
                                 $('#time_span1').text(" ")


                                if (time>time2) {
                                    $('#time_span').text("开始时间不可以大于结束时间");
                                    return false;
                                }
                                if(time11>time){
                                     $('#time_span').text("开始使用时间不可以少于当前时间");
                                    return false;
                                }

                                 if(star ==""){
                                      $('#time_span').text("请填写完整的时间");
                                      return false;
                                 }
                                 if(end ==""){
                                     $('#time_span1').text("请填写完整的时间");
                                    return false;
                                 }

                                });
                        </script>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>优惠券面额</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="输入金额" style='width:300px;' name="coupon_many" id="many">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>发行张数</label>
                              <div class="col-sm-10">
                                 <input type="text"  class="form-control" placeholder="填写数量" style='width: 100px;' name="coupon_nums">
                              </div>
                          </div>
                          <div class="form-group" ">
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>结算类型</label>
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
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>优惠券折扣规则</label>
                              <div class="col-sm-10">
                               <strong>满:</strong> <input style="width:80px;type="text" display:block;  id="manyzhe"><strong>折:</strong><input style="width:80px;type="text" display:block; name="coupon_rule" id="diss"><strong>%(请输入小数例:0.75 即是7.5折)</strong>
                              </div>
                          </div>
                          <div class="form-group" hidden="hidden" id="manjian" >
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>优惠券折扣规则</label>
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