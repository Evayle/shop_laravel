@extends('admin.layout.index')
@section('content')
<!-- 添加角色 -->

          <section class="wrapper">
            <h3 class=" text-center"><i class=" "></i> 角 色 添 加</h3>

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
                      <form action="/admin/rbace" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                          <div class="form-group">
                              <label class="col-sm-2 "><span class="user_add">角色名称</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="rname" value="">
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