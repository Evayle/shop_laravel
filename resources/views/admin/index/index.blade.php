@extends('admin.layout.index')
@section('content')
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">

                    <div class="row mtbox">
                      <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                  <span class="li_heart"></span>
                  <h3>933</h3>
                        </div>
                  <p>今日的网址访问量</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_cloud"></span>
                  <h3>+48</h3>
                        </div>
                  <p>今日共有多少人收藏了</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_stack"></span>
                  <h3>998</h3>
                        </div>
                  <p>总共有多少访问量</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_news"></span>
                  <h3>+10</h3>
                        </div>
                  <p>有多少人正在浏览我们的商城.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_data"></span>
                  <h3>OK!</h3>
                        </div>
                  <p>服务器正常,请您放心使用!</p>
                      </div>

                    </div><!-- /row mt -->


                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                        <div class="col-md-4 col-sm-4 mb">
                          <div class="white-panel pn donut-chart">
                            <div class="white-header">
                    <h5>数据库使用情况</h5>
                            </div>
                <div class="row">
                  <div class="col-sm-6 col-xs-6 goleft">
                    <p id="shujv"><i class="fa fa-database"></i> 40%</p><!--数据库取出的字段值 -->
                  </div>
                            </div>
                <canvas id="serverstatus01" height="120" width="120"></canvas>
                <script>
                  var doughnutData = [
                      {
                        value: 40,//直接数据库取出的字段放这里

                        color:"#68dff0"
                      },
                      {
                        value : 60,//用100减去数据库取出的字段
                        color : "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                </script>
                          </div><! --/grey-panel -->
                        </div><!-- /col-md-4-->


                        <div class="col-md-4 col-sm-4 mb">
                          <div class="white-panel pn">
                            <div class="white-header">
                              <h5>TOP PRODUCT</h5>
                            </div>
                            <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                              <p><i class="fa fa-heart"></i> 122</p>
                             </div>
                          <div class="col-sm-6 col-xs-6"></div>
                            </div>
                            <div class="centered">
                    <img src="/bg/assets/img/product.png" width="120">
                            </div>
                          </div>
                        </div><!-- /col-md-4 -->

            <div class="col-md-4 mb">
              <!-- WHITE PANEL - TOP USER -->
              <div class="white-panel pn">
                <div class="white-header">
                  <h5>当前登录用户</h5>
                </div>
                <p><img src="/bg/assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
                <p><b>11用户名11</b></p>
                <div class="row">
                  <div class="col-md-6">
                    <p class="small mt">11登录时间11</p>
                    <p>112019 2-2211</p>
                  </div>
                  <div class="col-md-6">
                    <p class="small mt">11上次登录的地址11</p>
                    <p>11IP地址11 </p>
                  </div>
                </div>
              </div>
            </div><!-- /col-md-4 -->


                    </div><!-- /row -->


          <div class="row">
            <!-- TWITTER PANEL -->
            <div class="col-md-4 mb">
                          <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                    <h5>数据库内存使用情况</h5>
                            </div>
                <canvas id="serverstatus02" height="120" width="120"></canvas>
                <script>
                  var doughnutData = [
                      {
                        value: 60,
                        color:"#68dff0"
                      },
                      {
                        value : 40,
                        color : "#444c57"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                </script>
                <p>SQL 3, 2019</p>
                <footer>
                  <div class="pull-left">
                    <h5><i class="fa fa-hdd-o"></i> 剩余内存17 GB</h5>
                  </div>
                  <div class="pull-right">
                    <h5>60% Used</h5>
                  </div>
                </footer>
                          </div><! -- /darkblue panel -->
            </div><!-- /col-md-4 -->


            <div class="col-md-4 mb">
              <!-- INSTAGRAM PANEL -->
              <div class="instagram-panel pn">
                <i class="fa fa-instagram fa-4x"></i>
                <p>@THISISYOU<br/>
                  5 min. ago
                </p>
                <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
              </div>
            </div><!-- /col-md-4 -->

            <div class="col-md-4 col-sm-4 mb">
              <!-- REVENUE PANEL -->
              <div class="darkblue-panel pn">
                <div class="darkblue-header">
                  <h5>REVENUE</h5>
                </div>
                <div class="chart mt">
                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[0,0,0,333,526,996,564,123,890,464,655]"></div>
                </div>
                <p class="mt"><b>$ 17,980</b><br/>Month Income</p>
              </div>
            </div><!-- /col-md-4 -->

          </div><!-- /row -->

          <div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="border-head">
                          <h3>一周销售额</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10.000</span></li>
                              <li><span>8.000</span></li>
                              <li><span>6.000</span></li>
                              <li><span>4.000</span></li>
                              <li><span>2.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">周一</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">周二</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">周三</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">70%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">周四</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar">
                              <div class="title">周五</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">周六</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">周末</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
          </div><!-- /row -->

                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
            <h3>处理投诉</h3>

                      <!-- First Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>问题一</muted><br/>
                             <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Second Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>问题一</muted><br/>
                             <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>问题一</muted><br/>
                             <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Fourth Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>问题一</muted><br/>
                             <a href="#">Mark Twain</a> commented your post.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Fifth Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>问题一</muted><br/>
                             <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
                          </p>
                        </div>
                      </div>
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>问题一</muted><br/>
                             <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
                          </p>
                        </div>
                      </div>
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>问题一</muted><br/>
                             <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
                          </p>
                        </div>
                      </div>
                       <!-- USERS ONLINE SECTION -->
            <h3>团队成员</h3><!--这里到时候白遍历出来-->
                      <!-- First Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="/bg/assets/img/ui-divya.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">用户名</a><br/>
                             <muted>大家好,我是来自....</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Second Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="/bg/assets/img/ui-sherman.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">用户名</a><br/>
                             <muted>大家好,我是来自....</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Third Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="/bg/assets/img/ui-danro.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">用户名</a><br/>
                             <muted>大家好,我是来自....</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Fourth Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="/bg/assets/img/ui-zac.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">用户名</a><br/>
                             <muted>大家好,我是来自....</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Fifth Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="/bg/assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">11Marcel Newman11</a><br/>
                             <muted>大家好....</muted>
                          </p>
                        </div>
                      </div>

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->

                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>



@endsection