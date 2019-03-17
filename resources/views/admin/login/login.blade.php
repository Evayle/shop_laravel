<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>后台登录</title>

    <!-- Bootstrap core CSS -->
    <link href="/bg/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/bg/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/bg/assets/css/style.css" rel="stylesheet">
    <link href="/bg/assets/css/style-responsive.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

  <body>

      <!-- 后台登录显示页面-->

      <div id="login-page">
        <div class="container">
              <form  action="/admin/denglu" method="post" class="form-login">
                   {{ csrf_field()}}
                <h2 class="form-login-heading">登录</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="用户名/电话号码/邮箱" autofocus name="uname" id="us">

                    <samp id="p" style="color:red;"></samp>
                    <br>
                    <br>
                    <input type="password" class="form-control" placeholder="请输入您的密码" name="password" id="pas">
                    <label class="checkbox">
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal"> 忘记密码</a>
                        </span>
                    </label>

                    <input type="submit"  value="登 &nbsp;&nbsp;&nbsp;录"  class="btn btn-theme btn-block" id="login">
                  </form>
                    <hr>
                    <div class="login-social-link centered">
                </div>
                  <form>
                  <!-- Modal -->
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">忘记密码?</h4>
                              </div>
                              <div class="modal-body">
                                  <p>在下方输入你的电子邮件地址提交给系统管理员以重设密码。</p>
                                  <input type="text" name="resemail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                                  <button class="btn btn-theme" type="button">提交</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- modal -->

              </form>

        </div>
      </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/bg/assets/js/jquery.js"></script>
    <script src="/bg/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/bg/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/bg/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
  <script type="text/javascript">
  $(function () {
    //利用返回来的url地址进行判断
    var url = (window.location.href);
    var a = (window.location.pathname);
    var b = (window.location.host);
    var d = (window.location.protocol);
    console.log(url);
    var urls = d+"//"+b+a;
    console.log(urls);
    if(url !== urls){
    $('#p').text("请输入正确的用户名和密码");

    }
  });
  // $("#login-page").mouseover(function(){
  //   alert('dong');
  // });
  </script>

  <!-- <script type="text/javascript">

    $('#us').blur(function(){
      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


      // $.post('/admin/deng',function(msg){
      //     alert(msg);
      // });

     $.ajax({
        type:"POST",
        url:"/admin/deng",
        dataType:"json",
        success:function(data){
           alert(data);
        },
        error:function(jqXHR){
           aler("发生错误："+ jqXHR.status);
        }
});


   });

    // });
  </script> -->
</html>
