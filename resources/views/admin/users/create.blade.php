@extends('admin.layout.index')
@section('content')



          <section class="wrapper">
          	<h3 class=" text-center"><i class=" "></i> 用 户 添 加</h3>



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
                      <form action="/admin/user" class="form-horizontal style-form" method="post" enctype="multipart/form-data">





                       {{ csrf_field() }}
                          <div class="form-group">
                              <label class="col-sm-2 "><span class="user_add">用户名</span></label>
                              <div class="col-sm-10">

                                  <input type="text" class="form-control" name="admin_name" value="{{ old('admin_name') }}"  placeholder="请在这里输入用户名/以字母开头">


                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">密 码</span></label>
                              <div class="col-sm-10">
                                  <input type="password"  class="form-control" placeholder="" name="admin_password" ">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">确认密码</span></label>
                              <div class="col-sm-10">
                                  <input type="password"  class="form-control" placeholder="" name="admin_repassword">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">邮 箱</span></label>
                              <div class="col-sm-10">

                                  <input type="email"  class="form-control" placeholder="请输入邮箱的正确的格式" name="admin_email" value="{{ old('admin_email') }}" >
                    </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">手机号</span></label>
                              <div class="col-sm-10">

                                  <input type="text"  class="form-control" placeholder="请输入正确的手机格式" name="admin_phon" value="{{ old('admin_phon') }}" >

                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">个人介绍</span></label>
                              <div class="col-sm-10">
                                  <textarea name="admin_itn" class="self">{{ old('admin_introduction') }}</textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">权限管理</span></label>
                              <div class="col-sm-10">
                                  <select class="form-control input-sm" name="admin_permission">

                                     <option value="0">--请选择--</option>
                                     <option value="1">超级管理员</option>
                                     <option value="2">管理员</option>
                                     <option value="3">员  工</option>
                                     <option value="4">财务人员</option>
                                  </select>


                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">上传头像</span></label>
                              <div class="col-sm-10">
                                <input type="file" id="file" name="admin_avatar">
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