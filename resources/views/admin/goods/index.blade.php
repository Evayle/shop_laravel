@extends('admin.layout.index')
@section('content')
    <section class="wrapper">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <h3><i class="fa fa-angle-right"></i> 分类管理</h3>
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
          	  	  <h4><i class="fa fa-angle-right"></i> 分类列表
                    <form action="/admin/category" method="get">
                      <label style="float:right;">
                        关键字:  <input type="text" name="search" value="{{ $request['search'] or '' }}">
                        <input type="submit" class="btn btn-info" value="搜索">
                      </label>
                    </form>
                  </h4>
          	  	  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> 分类名称</th>
                        <th><i class="fa fa-bullhorn"></i> 父级ID</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>分类路径</th>
                        <th><i class="fa fa-bookmark"></i>是否推荐为热门显示</th>
                        <th><i class=" fa fa-edit"></i>是否显示</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($goods as $k => $v)
                    <tr>
                        <td><a href="basic_table.html#">{{ $v->categorys_name }}</a></td>
                        <td class="hidden-phone">{{ $v->categorys_pid }}</td>
                        <td>{{ $v->categorys_path }} </td>
                        <td><span class="label label-info label-mini">{{ $v->categorys_hot == 0 ? '非热门' : '热门' }}</span></td>
                        <td><span class="label label-info label-mini">{{ $v->categorys_display == 0 ? '显示' : '隐藏' }}</span></td>
                        <td>
                            <a href="/admin/category/create/{{ $v->id }}"><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right;">
                    {{ $categorys->appends($request)->links() }}
                </div>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    </section>
@endsection