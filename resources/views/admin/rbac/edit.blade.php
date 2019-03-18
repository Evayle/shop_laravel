
@extends('admin.layout.index')
@section('content')


          <section class="wrapper">
            <h3 class=" text-center"><i class=" "></i> 角 色 权 限</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <center>
            <div class="row mt text-center" style="width:1200px;">
                <div class="col-lg-12">
                  <div class="form-panel">

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
                      <form action="/admin/rbace/{{$role->id}}" class="form-horizontal style-form" method="post" >
                       {{ csrf_field() }}
                       {{ method_field('PUT') }}
                          <div class="form-group">
                              <label class="col-sm-2 "><span class="user_add">角色名称</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="rname" value="{{$role->rname}}" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 "><span class="user_add">权限节点</span></label>
                              <div class="col-sm-10">
                                @foreach($nodes as $k=>$v)
                                <input type="checkbox"  name="nids[]" value="{{$v->id}}" @if(in_array($v->id,$role_date)) checked    @endif ><label >{{$v->ndesc}}</label>&nbsp;&nbsp;
                                @endforeach
                              </div>
                          </div>
                          <div class="form-group">
                            <input type="submit"  class=" center-block btn btn-success" value="提  交">
                          </div>
                      </form>
                  </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->
            </center>





@endsection