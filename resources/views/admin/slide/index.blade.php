@extends('admin.layout.index')
@section('content')
    <section class="wrapper">
            <h2 class="text-center">轮播图展示</h2>
				
                <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
							<div class="eqr">
								<div class="eq">
									<img src="" alt="" height="450" class="img2">
								</div>
							</div>
                              <h4>
                            <form action="/admin/slide" method="get">

                              <div class="dropdown">
                                每页显示
                                  <select name="count">
                                    <option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                                    <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                                    <option value="25" @if(isset($request['count']) && $request['count'] == 25) selected @endif>25</option>
                                    <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
                                    <option value="100" @if(isset($request['count']) && $request['count'] == 100) selected @endif>100</option>
                                  </select>
                              <div class="form-group" style="position: absolute;left: 70%;top: -5px;">
                                <label class="sr-only" for="exampleInputAmount"></label>
                                <div class="input-group clo-md-2">
                                  <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                                  <input type="text" class="form-control"  placeholder="输入要查找的图片名" style="width:200px;" name="search" value="">
                                  
                                  <input type="submit" class="btn btn-primary" value="搜索">
                                    </div>
                                  </form>
                                </div>
                              </h4>
                              <hr>
                              <thead>
                              <tr class="row">
                                  <th class="col-md-1">序号</th>
                                  <th class="col-md-1">图片名</th>
                                  <th class="col-md-3">图片(移动鼠标查看大图)</th>
                                  <th class="col-md-2">图片描述</th>
                                  <th class="col-md-1">是否显示</th>
                                  <th class="col-md-2">添加时间</th>
                                  <th class="col-md-2">操作</th>
                              </tr>
                              </thead>
                              <tbody>
							@foreach($data as $k=>$v)
                              <tr class="row">
                                  <td class="col-md-1">{{ ++$i }}</td>
                                  <td class="col-md-1">{{ $v->slide_name }}</td>
                                  <td class="col-md-3"><img src="/storage/{{ $v->slide_pic }}" alt="" height="26" class="click" id="{{ $j++ }}"></td>
                                  <td class="col-md-2">{{ $v->slide_note }}</td>
                                  @if( $v->slide_status == 'true' )
                                      <td class="col-md-1"><a href="">显示</a></td>
                                    @else()
                                      <td class="col-md-1"><a href="">隐藏</a></td>
                                    @endif
                                  <td class="col-md-2">{{ $v->created_at }}</td>
                                  <td class="col-md-2">
                                      <a href="/admin/slide/{{ $v->id }}/edit" class="btn btn-primary" role="button"><i class="fa fa-pencil"></i>修改</a>

                                      <form action="/admin/slide/{{ $v->id }}" method="post" style="display: inline-block;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
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

                                </ul>
                                </nav>
                              </div>


                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->
@endsection()