@extends('admin.layout.index')
@section('content')
    <section class="wrapper">
            <h2 class="text-center">用户展示</h2>

                <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4>
                            <form action="/admin/user" method="get">

                              <div class="dropdown">
                                每页显示
                                  <select name="count">
                                    <option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                                    <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                                    <option value="25" @if(isset($request['count']) && $request['count'] == 25) selected @endif>25</option>
                                    <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
                                    <option value="100" @if(isset($request['count']) && $request['count'] == 100) selected @endif>100</option>
                                  </select>
                              <div class="form-group" style=" position: absolute;
                              left: 80%;
                              top: -5px;">
                                <label class="sr-only" for="exampleInputAmount">输入用户名进行搜索</label>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                                  <input type="text" class="form-control"  placeholder="输入用户名" style="width:200px;" name="user" value="{{$request['user']}}">
                                  &nbsp;&nbsp;&nbsp;
                                  <input type="submit" class="btn btn-primary" value="搜索">
                                    </div>
                                  </form>
                                </div>
                              </h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th>序号</th>
                                  <th><i class="glyphicon glyphicon-user"></i>&nbsp;用 户</th>
                                  <th class="hidden-phone"><i class="glyphicon glyphicon-phone-alt"></i>&nbsp;电话</th>
                                  <th><i class="fa fa-bookmark"></i>&nbsp;所属部门</th>
                                  <th><i class="glyphicon glyphicon-envelope"></i>&nbsp;邮箱</th>
                                  <th><i class=" fa fa-edit"></i>&nbsp;创建时间</th>
                                  <th> &nbsp;&nbsp;修改 删除</th>
                              </tr>
                              </thead>
                              <tbody>

                              @foreach($data as $key=>$value)
                              <tr>
                                  <td>{{$value->id}}</td>
                                  <td>{{$value->admin_name}}</td>
                                  <td>{{$value->admin_phon}}</td>
                                  <td>
                                    @if ($value->admin_level == 1)
                                      超级管理员
                                    @elseif ($value->admin_level == 2)
                                      管理员
                                    @elseif ($value->admin_level == 3)
                                      普通员工
                                    @else
                                      财务人员
                                    @endif
                                  </td>
                                  <td>{{$value->admin_email}}</td>
                                  <td>{{$value->created_at}}</td>
                                  <td>

                                      <a href="/admin/user/{{$value->id}}/edit" class="btn btn-primary" role="button"><i class="fa fa-pencil"></i></a>

                                      <form action="/admin/user/{{$value->id}}" method="post" style="display: inline-block;">
                                         {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <input type="submit"  value="删除"  class="btn btn-danger">
                                      </form>

                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                              <div>
                              <!-- 分页 -->
                                <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination pagination-lg">
                                {{$data->appends($request)->links()}}
                                </ul>
                                </nav>
                              </div>


                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->


@endsection