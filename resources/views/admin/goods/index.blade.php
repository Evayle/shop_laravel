@extends('admin.layout.index')
@section('content')
    <section class="wrapper">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif


    <h3><i class="fa fa-angle-right"></i> 商品管理</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">


          	  	  <h4><i class="fa fa-angle-right"></i> 商品列表
                    <form action="/admin/goods" method="get">
                      <label style="float:right;">
                        关键字:  <input type="text" name="search" value="{{ $request['search'] or '' }}">
                        <input type="submit" class="btn btn-info" value="搜索">
                      </label>
                    </form>
                  </h4>
          	  	  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> 商品名称</th>
                        <th><i class="fa fa-bullhorn"></i> 封面图</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>分类名称</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>描述</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>是否包邮</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>是否会员打折</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>是否推荐</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>是否打折</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>是否参与优惠</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>是否可积分兑换</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>点击数</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>销量</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>评论数</th>
                        <th><i class="fa fa-bookmark"></i>库存</th>
                        <th><i class="fa fa-bookmark"></i>价格</th>
                        <th><i class=" fa fa-edit"></i>上下架</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($goods as $k => $v)
                    <tr>
                        <td>{{ $v->goods_name }}</td>
                        <td class="hidden-phone"><img src="{{ asset($v->goods_plot) }}" width="50"></td>
                        <td>{{ $ctegs->where("id", $v->goods_categorys_id)->first()->categorys_name }}</td>
                        <td>
                            <abbr title="{{ $v->goods_describe }}">
                                <p style="width: 120px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">
                                    {{ $v->goods_describe }}
                                </p>
                            </abbr>
                        </td>
                        <td><span class="label label-info label-mini">{{ $v->goods_fsp == 0 ? '包邮' : '不包邮' }}</span></td>
                        <td><span class="label label-info label-mini">{{ $v->goods_vip == 0 ? '打折' : '不打折' }}</span></td>
                        <td><span class="label label-info label-mini">{{ $v->goods_recommend == 0 ? '推荐' : '不推荐' }}</span></td>
                        <td><span class="label label-info label-mini">{{ $v->goods_discount == 0 ? '打折' : '不打折' }}</span></td>
                        <td><span class="label label-info label-mini">{{ $v->goods_preferential == 0 ? '优惠' : '不优惠' }}</span></td>
                        <td><span class="label label-info label-mini">{{ $v->goods_hot == 0 ? '兑换' : '不兑换' }}</span></td>
                        <td>{{ $v->goods_click }} </td>
                        <td>{{ $v->goods_sales }} </td>
                        <td>{{ $v->goods_comments }} </td>
                        <td>{{ $v->goods_store }} </td>
                        <td>{{ $v->goods_price }} </td>
                        <td><span class="label label-info label-mini"><a href="/admin/goods/{{ $v->id }}">{{ $v->goods_status == 0 ? '未上架' : '上架' }}</a></span></td>
                        <td>
                            <a href="/admin/goods/{{ $v->id }}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            <form action="/admin/goods/{{ $v->id }}" method="post" style="display: inline-block;">
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
                    {{ $goods->appends($request)->links() }}
                </div>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    </section>
@endsection