@extends('admin.layout.index')
@section('content')
     <section class="wrapper">
            <h2 class="text-center">优惠券列表</h2>

                <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4>
                            <form action="/admin/user" method="get">

                              <div class="dropdown">
                                每页显示
                                  <select name="count">
                                    <option value="1">10</option>
                                    <option value="2">20</option>
                                    <option value="3">30</option>
                                    <option value="4">40</option>
                                    <option value="5">100</option>
                                  </select>
                              <div class="form-group" style=" position: absolute;
                              left: 80%;
                              top: -5px;">
                                <label class="sr-only" for="exampleInputAmount">进行搜索</label>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                                  <input type="text" class="form-control"  placeholder="输入用户名" style="width:200px;" name="user" value="输入关键字">
                                  &nbsp;&nbsp;&nbsp;
                                  <input type="submit" class="btn btn-primary" value="搜索">
                                    </div>
                                  </form>
                                </div>
                              </h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th>优惠券名称</th>
                                  <th>获得方式</th>
                                  <th>使用条件</th>
                                  <th>优惠券金额</th>
                                  <th>发放时间</th>
                                  <th><活动时间</th>
                                  <th>总数量</th>
                                  <th>库存</th>
                                  <th>操作</th>
                              </tr>
                              </thead>
                              <tbody>


                              <tr>
                                    <td></td>
                                  <td>

                                      <a href="/admin/user/$value->id/edit" class="btn btn-primary" role="button"><i class="fa fa-pencil">紧急冻结</i></a>

                                      <form action="/admin/user/$value->id" method="post" style="display: inline-block;">

                                        <input type="submit"  value="删除"  class="btn btn-danger">
                                      </form>

                                  </td>
                              </tr>

                              </tbody>
                          </table>
                              <div>
                              <!-- 分页 -->
                                <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination pagination-lg">

                                </ul>
                                </nav>
                              </div>


                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->


@endsection