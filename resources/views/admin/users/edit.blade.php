@extends('admin.layout.index')
@section('content')

          <section class="wrapper">
            <h3 class=" text-center"><i class=" "></i>用户修改</h3>


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
                  <form action="/admin/user/{{ $data->id}}" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                       {{ csrf_field() }}
                          <div class="form-group">
                              <label class="col-sm-2 "><span class="user_add">用户名</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="admin_name" value="{{ $data['admin_name'] }}"  placeholder="请在这里输入用户名/以字母开头" raeadonly>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">邮 箱</span></label>
                              <div class="col-sm-10">
                                  <input type="email"  class="form-control" placeholder="请输入邮箱的正确的格式" name="admin_email" value="{{ $data['admin_email'] }}" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">手机号</span></label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="请输入正确的手机格式" name="admin_phon" value="{{ $data['admin_phon'] }}" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">个人介绍</span></label>
                              <div class="col-sm-10">
                                  <textarea name="admin_itn" class="self">{{ $date['admin_text'] }}</textarea>
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
            <section>
@endsection