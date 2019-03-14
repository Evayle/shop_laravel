<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>富潮里后台管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="/bg/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/bg/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/bg/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/bg/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/bg/assets/lineicons/style.css">
    <link rel="stylesheet" type="text/css" href="/bg/css/user_add.css">

    <!-- Custom styles for this template -->
    <link href="/bg/assets/css/style.css" rel="stylesheet">
    <link href="/bg/assets/css/style-responsive.css" rel="stylesheet">
    <script src="/bg/assets/js/chart-master/Chart.js"></script>
    <!-- <script src="jquery-3.3.1.min.js"></script> -->
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>


  </head>

  <body>

  <section id="container" >

      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="点击收起还原"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>富潮里管理系统</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="/bg/assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="/bg/assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="/bg/assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="/bg/assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/admin/loutgin">退出登录</a></li>
              </ul>
            </div>
        </header>


      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profile.html"><img src="/bg/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered" id="h5">{{session('admin_login.2')}}</h5>

                  <li class="mt">
                      <a class="active" href="/admin">
                          <i class="fa fa-dashboard"></i>
                          <span>主页信息</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>用户管理</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/user">用户列表</a></li>
                          <li><a  href="/admin/user/create">用户添加</a></li>
                          <li><a  href="panels.html">回收站</a></li>
                      </ul>
                  </li>
                 <!-- 商品分类开始 -->
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-align-left"></i>
                          <span>分类管理</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/category">分类列表</a></li>
                          <li><a  href="/admin/category/create">分类添加</a></li>
                      </ul>
                  </li>
                  <!-- 商品分类结束 -->

                  <!-- 商品管理开始 -->
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <span>商品管理</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/goods">商品列表</a></li>
                          <li><a  href="/admin/goods/create">商品添加</a></li>
                      </ul>
                  </li>

                  <!-- 友情链接 -->
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <span>友情链接</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/friendship">链接列表</a></li>
                          <li><a  href="/admin/friendship/create">添加链接</a></li>
                      </ul>
                  </li>
                  <!-- 友情链接结束 -->
                  <!-- 前台轮播图 -->
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <span>轮播图管理</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/slide">图片列表</a></li>
                          <li><a  href="/admin/slide/create">添加图片</a></li>
                          <li><a  href="/admin/slide/delete">回收站</a></li>
                      </ul>
                  </li>
                  <!-- 轮播图结束 -->
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-tags"></i>
                          <span>优惠券管理</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/goods">优惠券列表</a></li>
                          <li><a  href="/admin/goods/create">优惠券添加</a></li>
                          <li><a  href="/admin/goods/delete">回收站</a></li>


                      </ul>
                  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!-- 内容的开始 -->
<section id="main-content">
      @section('content')

 


      @show



      <!-- 内容的结束 -->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 - HAINING  <a href="#" target="_blank">富潮里</a>
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/bg/assets/js/jquery.js"></script>
    <script src="/bg/assets/js/jquery-1.8.3.min.js"></script>
    <script src="/bg/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/bg/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/bg/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/bg/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/bg/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="/bg/assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="/bg/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/bg/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="/bg/assets/js/sparkline-chart.js"></script>
  <script src="/bg/assets/js/zabuto_calendar.js"></script>

  <script type="text/javascript">
        $(document).ready(function () {
          var a =  $("#h5").text();

        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: a,
            // (string | mandatory) the text inside the notification
            text: "欢迎您本次登录",
            // (string | optional) the image to display on the left
            image: '/bg/assets/img/ui-sam.jpg',//这里要和后台管理的用户头像关联起来
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
  </script>

  <script>
  // xu:不要删这个js脚本 这是实现友情链接的图片预览功能的
    $(function(){
            $("#pic").change(function(){
                if($.browser.msie){
                    $("#img0").attr("src",$(this).val())
                    $("#info").text("当前选择的文件:"+$(this).val())
                }else{
                    $("#info").text("当前选择的文件:"+$(this).val())
                    var objUrl=getObjectURL(this.files[0]);
                    // console.log("objUrl="+objUrl);
                    if(objUrl){
                        $("#img0").attr("src",objUrl);
                    }
                }
            })
            //建立一個可存取到該file的url
            function getObjectURL(file) {
                var url = null ;
                if (window.createObjectURL!=undefined) {
                    url = window.createObjectURL(file);
                } else if (window.URL!=undefined) {
                    url = window.URL.createObjectURL(file);
                } else if (window.webkitURL!=undefined) {
                    url = window.webkitURL.createObjectURL(file);
                }
                return url ;
            }
        })
  </script>
  <style>
  /*请勿删除这个样式 这是后台轮播图点击查看大图的样式*/
    .eqr{
      display: none;
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      background: rgba(0,0,0,0.55);
      z-index: 990;
    }
    .eqr:hover{
      cursor: pointer;
    }
    .eq{
      height: auto;
      margin: auto;
      margin-top: 20px;
      text-align: center;
      z-index: 991;
    }
    .img2{
      border: 2px black solid;
    }
    .click:hover{
      cursor: pointer;
    }
    .icon {
      width: 1em;
      height: 1em;
      vertical-align: -0.15em;
      fill: currentColor;
      overflow: hidden;
    }
  </style>
  <script>
  // 这是后台轮播图的单击显示效果
  $('.click').live('click',function(){
    var id = $(this).attr('id');
    var obj = document.getElementById(id);
    var src = obj.src;
    $('.eqr').css('display','block');
    $('.img2').attr('src',src);
  });
  $('.eqr').click(function(){
    $(this).css('display','none');
  });
</script>




</body>

</html>
