@extends('admin.layout.index')
@section('content')
    <section class="wrapper">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif


    <h3><i class="fa fa-angle-right"></i> 轮播图管理</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">


                  <h4><i class="fa fa-angle-right"></i> 轮播图列表
                    <form action="/admin/slide" method="get">
                      <label style="float:right;">
                        关键字:  <input type="text" name="search" value="{{ $request['search'] or '' }}">
                        <input type="submit" class="btn btn-info" value="搜索">
                      </label>
                    </form>
                  </h4>
                  <hr>
                    <thead>
                    <tr>

                        <th><i class="fa fa-bullhorn"></i> 轮播图名称</th>
                        <th><i class="fa fa-bullhorn"></i> 轮播图片</th>
                        <th><i class="fa fa-bookmark"></i>描述</th>
                        <th><i class="fa fa-bookmark"></i>对应商品</th>
                        <th><i class=" fa fa-edit"></i>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($slides as $k => $v)
                    <tr>
                        <td>
                            <abbr title="{{ $v->slide_name }}">
                                <p style="width: 200px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">
                                    {{ $v->slide_name }}
                                </p>
                            </abbr>
                        </td>
                        <td class="hidden-phone"><img src="{{ asset($v->slide_pic) }}" width="50"></td>
                        <td>
                            <abbr title="{{ $v->slide_note }}">
                                <p style="width: 200px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">
                                    {{ $v->slide_note }}
                                </p>
                            </abbr>
                        </td>
                        
                        <td>{{ $goods->where("id", $v->goods_id)->first()->goods_name or '' }}</td>

                        <td><span class="label label-info label-mini"><a href="/admin/slide/{{ $v->id }}">{{ $v->slide_status == 0 ? '显示' : '隐藏' }}</a></span></td>
                        <td>
                            <a href="/admin/slide/{{ $v->id }}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            <form action="/admin/slide/{{ $v->id }}" method="post" style="display: inline-block;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right;">
                    {{ $slides->appends($request)->links() }}
                </div>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    </section>
@endsection