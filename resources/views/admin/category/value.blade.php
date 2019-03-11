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
          	  	  <h4><i class="fa fa-angle-right"></i> 属性值列表
                    <form action="/admin/category/value" method="get">
                      <label style="float:right;">
                        关键字:  <input type="text" name="search" value="{{ $request['search'] or '' }}">
                        <input type="submit" class="btn btn-info" value="搜索">
                      </label>
                    </form>
                  </h4>
          	  	  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> 属性值名称</th>
                        <th><i class="fa fa-bullhorn"></i> 属性名ID</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($values as $k => $v)
                    <tr>
                        <td><a href="basic_table.html#">{{ $v->values_name }}</a></td>
                        <td class="hidden-phone">{{ $v->goods_attrs_id }}</td>
                        <td>
                            <a href="/admin/category/create/{{ $v->id }}"><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right;">
                    {{ $values->appends($request)->links() }}
                </div>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    </section>
@endsection