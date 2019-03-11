@extends('admin.layout.index')
@section('content')
      <section id="main-content">
          <section class="wrapper">
            <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right" style="float: left;margin-top: 5px;"> 链接表格　</i>
                        <form action="/admin/friendship" method="get">
                          <label>显示
                            <select size="1" name="count" aria-controls="DataTables_Table_1">
                              <option value="5"  @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                              <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                              <option value="20" @if(isset($request['count']) && $request['count'] == 20) selected @endif>20</option>
                              <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
                            </select>条
                          </label>
                          <div class="dataTables_filter" style="float: right;" id="DataTables_Table_1_filter">
                            <label>关键字:
                              <input type="text" name="search" aria-controls="DataTables_Table_1" value="{{ $request['search'] or '' }}">
                            </label>
                            <input type="submit" value="搜索" class="btn btn-info">
                          </div>
                        </form>
                      </h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>序号</th>
                                  <th>名称</th>
                                  <th class="numeric">网址</th>
                                  <th class="numeric">logo</th>
                                  <th class="numeric">公司</th>
                                  <th class="numeric">是否显示</th>
                                  <th class="numeric">添加时间</th>
                                  <th class="numeric">最后修改时间</th>
                                  <th class="numeric">操作</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($data as $k => $v)
                                <tr style="text-align: center;">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $v->fs_name }}</td>
                                    <td class="numeric">{{ $v->fs_link }}</td>
                                    <td class="numeric"><img src="/storage/{{ $v->fs_logo }}" alt=""height="26px"></td>
                                    <td class="numeric">{{ $v->fs_note }}</td>
                                    @if( $v->fs_status == 'true' )
                                      <td class="numeric"><a href=""><img src="/bg/img/对.jpg" alt="" width="26"></a></td>
                                    @else()
                                      <td class="numeric"><a href=""><img src="/bg/img/错.jpg" alt="" width="26"></a></td>
                                    @endif
                                    <td class="numeric">{{ $v->created_at }}</td>
                                    <td class="numeric">{{ $v->updated_at }}</td>
                                    <td>
                                      <a href="/admin/friendship/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                                      <form action="/admin/friendship/{{ $v->id }}" method="post" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="删除" class="btn btn-danger">
                                      </form>
                                    </td>
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <div class="text-right">
                          {{ $data->appends($request)->links() }}
                          </div>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->
          </section>
      </section>
      <script>
        
      </script>


@endsection