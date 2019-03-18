@extends('home.layout.homepage')
@section('homepage')
<!-- 个人中心 -->
            <div class="pull-right">
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-个人资料</div>

                    <form action="/home/presonal" class="user-setting__form" role="form" method="post" id="form_1" enctype="multipart/form-data">
                     {{ csrf_field() }}
                    <div class="" id="crop-avatar">

                        <div class="img">
                         <img id="pic" style="width:100px;height:100px;border-radius:50%;" src="/{{$data->uavatr}}" onerror='this.src="/homes/images/avate/1.png"'  class="cover b-r50">
                        <input id="upload" name="file" accept="image/*" type="file" style="display: none">
                        <br>
                        <span id="span_2"></span>
                        </div>
                    </div>

                        <div class="user-form-group">
                            <label for="user-id">用户名：</label>

                            <input type="text" id="user-id" value="{{$data->uname}}" name="uname" placeholder="请输入您的昵称">

                            <br>
                            <span id="span_1"></span>
                            <span id="span1" style="color:red"></span>
                        </div>
                        <div class="user-form-group">
                            <label>性别：</label>
                            <label><input type="radio" name="usex" value="M"@if($data->usex == 1) checked @endif
                            ><i class="iconfont icon-radio"></i> 男士</label>
                            <label><input type="radio" name="usex" value="W"@if($data->usex == 0) checked @endif><i class="iconfont icon-radio"></i> 女士</label>
                            <label><input type="radio" name="usex" value="S"@if($data->usex == 2) checked @endif><i class="iconfont icon-radio"></i> 保密</label>
                        </div>
                        <div class="user-form-group">
                            <label>生日：</label>
                            <label><input type="text" class="datepicker" name="ubirthday" value="1995-1-18" placeholder="请选择您的出生日期"></label>
                        </div>
                        <div class="user-form-group">
                            <label>邮箱：</label>
                            <label><input type="email" class="datepicker1" name="uemail" value="{{$data->uemail}}" placeholder="请添加您的邮箱" id="emil"></label>
                            <br>
                            <span style="color:red" id="span_3"></span>
                        </div>
                        <div class="user-form-group">
                            <button type="submit" class="btn" id="mod_1">确认修改</button>
                        </div>
                    </form>
                    <script type="text/javascript" >
                    $("#emil").blur(function() {
                      var emil = $("#emil").val();
                      //邮箱的正则表单达式
                      var aa = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
                      if(emil == null || emil == "") {
                        $('#span_3').text('邮箱输入不正确');
                        flas8 = false;
                        return;
                      } else {
                         $('#span_3').text('');
                        flas8 = true;
                      }

                      if(!aa.test(emil)) {
                         $('#span_3').text('邮箱要验证是否带有@，必须以.com结尾');

                        flas8 = false;
                        return;
                      } else {
                        ('#span_3').text('');
                        flas8 = true;
                      }

                    });

                    </script>
                    <script type="text/javascript" >
                                  $('#user-id').blur(function(){
                                      var name = $('#user-id').val()
                                       $.ajax({
                                              headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                              },
                                              type: 'GET',
                                              url: '/home/presonal/11',
                                              data: {'tel':name},
                                              dataType: 'json',
                                              async : 'false',    //同步
                                              success: function(data){

                                                  if(data == 1){
                                                      $('#span_1').text('此用户名可以注册');
                                                      $('#span1').text('');
                                                      $("#mod_1").removeAttr("disabled");
                                                  }
                                                  if(data==2){
                                                      $('#span1').text('此用户名不可以注册');
                                                      $('#span_1').text('');
                                                      $("#mod_1").attr("disabled","disabled");
                                                  }
                                              },
                                      });
                                  });
                              </script>
                              <script src="/homes/js/zebra.datepicker.min.js"></script>
                              <link rel="stylesheet" href="/homes/css/zebra.datepicker.css">
                              <script>
                                  $('input.datepicker').Zebra_DatePicker({
                                      default_position: 'below',
                                      show_clear_date: false,
                                      show_select_today: false,
                                  });
                              </script>
                          </script>
                          <script>
                          $(function() {
                            $("#pic").click(function() {
                                $("#upload").click(); //隐藏了input:file样式后，点击头像就可以本地上传
                                $("#upload").on("change", function() {
                                    var objUrl = getObjectURL(this.files[0]); //获取图片的路径，该路径不是图片在本地的路径
                                    if (objUrl) {
                                        $("#pic").attr("src", objUrl); //将图片路径存入src中，显示出图片
                                        upimg();
                                    }
                                });
                                        });
                        });

                        //建立一?可存取到?file的url
            function getObjectURL(file) {
                var url = null;
                if (window.createObjectURL != undefined) { // basic
                    url = window.createObjectURL(file);
                } else if (window.URL != undefined) { // mozilla(firefox)
                    url = window.URL.createObjectURL(file);
                } else if (window.webkitURL != undefined) { // webkit or chrome
                    url = window.webkitURL.createObjectURL(file);
                }
                return url;
            }
            //上传头像到服务器
            function upimg() {
                console.log(344)
                $.ajax({
                  headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/home/avater",
                    type: "post",
                    data: new FormData($('#form_1')[0]),
                    dataType:'json',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                          $('#span_2').text('图片只是预览效果,请保存修改');
                        };

                    }
                });
            }
          </script>





                </div>
            </div>
        </section>
    </div>


    <!-- 右侧菜单 -->
@endsection