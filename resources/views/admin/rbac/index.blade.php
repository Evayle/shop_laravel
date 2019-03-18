@extends('admin.layout.coupon_recording')
@section('content_coupon')



          <section class="wrapper">

            <h3><i class="fa fa-angle-right"></i> 权限管理</h3>
            <div id="tab" style="margin-left:20px;">
            <button class="btn btn-info" id="rolse_1">角色列表</button>
            <button class="btn btn-danger" id="node_1">权限节点列表</button>
            </div>
             <!-- 提示错误信息 -->
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>

              </button>


                <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                </ul>
            </div>
            @endif

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt mmmt" >
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>用户节点名称 </h4>

                            <div class="content">

                                <table id="tb" class="table">
                                    <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>节点描述</th>
                                            <th>节点控制器名称</th>
                                            <th>节点方法名称</th>

                                        </tr>
                                    </thead>
                                    <tbody id="show_tbody">
                                        @foreach($node_user as $key=>$val)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $val->ndesc}}</td>
                                            <td>{{ $val->cname}}</td>
                                            <td>{{ $val->aname}}</td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                </table>
                         </div>

                  </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->
             <div class="row mt mmmt" >
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> 用户权限</h4>

                            <div class="content">

                               <table id="tb" class="table">
                                    <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>角色名称</th>

                                            <th>操 作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_tbody">
                                    @foreach($date as $k=>$v)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $v->rname }}</td>
                                            <td>
                                                <a href="/admin/rbace/{{$v->id}}/edit" class="btn btn-info">权限节点</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                         </div>

                  </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->
            <script src="/table/js/mejs.js"></script>
        <script>
            $('.mmmt').hide()
            $('.mmmt:first').show()
            $('#rolse_1').click(function(){
                $('.mmmt').show()
            $('.mmmt:first').hide()
            });
             $('#node_1').click(function(){
                $('.mmmt').show()
            $('.mmmt:last').hide()
            });
        </script>

@endsection