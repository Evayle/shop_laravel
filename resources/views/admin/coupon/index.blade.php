@extends('admin.layout.index')
@section('content')
     <section class="wrapper">
            <h2 class="text-center">优惠券列表</h2>
                <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4>
                            <form action="/admin/coupon" method="get">
                              <div class="dropdown">
                                每页显示
                                  <select name="count">
                                    <option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                                    <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                                    <option value="25" @if(isset($request['count']) && $request['count'] == 25) selected @endif>25</option>
                                    <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
                                    <option value="100" @if(isset($request['count']) && $request['count'] == 100) selected @endif>100</option>
                                  </select>
                            </div>
                              <div class="form-group" style=" position: absolute;
                              left: 80%;
                              top: -5px;">
                                <label class="sr-only" for="exampleInputAmount">进行搜索</label>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                                  <input type="text" class="form-control"  placeholder="输入用户名" style="width:200px;" name="coupon_search" >
                                  &nbsp;&nbsp;&nbsp;
                                  <input type="submit" class="btn btn-primary" value="搜索">
                                    </div>
                                  </form>
                                </div>
                              </h4>
                              <hr>
                              <thead id = "coupon_thead">
                              <tr >
                                  <th>序号</th>
                                  <th>优惠券名称</th>
                                  <th>获得方式</th>
                                  <th>使用条件</th>
                                  <th>优惠券金额</th>
                                  <th>活动时间</th>
                                  <th>总数量</th>
                                  <th>库存</th>
                                  <th>状态</th>
                              </tr>
                              </thead>
                              <tbody id = "coupon_tr">
                              <tr>
                                @foreach($date as $key=>$val)
                                    <td>{{$i++}}</td>
                                    <td>{{$val->coupon}}</td>
                                    <td>
                                    @if($val->coupon_send_type == 1)
                                        购买商品后获得
                                    @elseif($val->coupon_send_type == 2)
                                        转发商品链接获得
                                    @else
                                        其他方式获得
                                    @endif
                                    </td>
                                    <td>
                                    @if($val->coupon_setting_type == 1)
                                        购买时(参与优惠的商品)
                                    @elseif($val->coupon_setting_type == 2)
                                        打折券(所有商品通用)
                                    @else
                                        其他(所有商品通用)
                                    @endif

                                    </td>
                                    <td>{{$val->coupon_many}}</td>
                                        <td>{{$val->coupon_start_period }} <br>{{$val->coupon_end_period}} </td>
                                    <td>{{$val->coupon_nums}}</td>
                                    <td>{{$val->coupon_sku}}</td>

                                  <td>


                                      <a href="/admin/coupon/cou/{{$val->id}}" class="btn btn-primary" >
                                     @if ($val->coupon_out === 1)
                                         发放中
                                      @elseif ($val->coupon_out === 0)
                                         未发放
                                      @elseif ($val->coupon_out === 2)
                                        发放完毕
                                      @else
                                          出错!
                                      @endif
                                      </a>
                                  </td>

                              </tr>@endforeach
                              </tbody>
                          </table>
                              <div>
                              <!-- 分页 -->
                                <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination pagination-lg">
                                 {{$date->appends($request)->links()}}
                                </ul>
                                </nav>
                              </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->


@endsection