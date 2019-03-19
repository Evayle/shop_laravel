@extends('admin.layout.index')
@section('content')
      <section id="main-content">
          <section class="wrapper">
          	<h3 class=" text-center"><i class=" "></i> 修 改 链 接</h3>
             
          	
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
                      <form action="/admin/friendship/{{ $data['id'] }}" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                       {{ csrf_field() }}
                          <div class="form-group">
                              <label class="col-sm-2 "><span class="user_add">链接名称</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="fs_name" value="{{ $data['fs_name'] }}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">链接网址</span></label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="" name="fs_link" value="{{ $data['fs_link'] }}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">公司名称</span></label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="" name="fs_note" value="{{ $data['fs_note'] }}">
                              </div>
                          </div>
                          <div class="form-group">
                              <!-- <h5 style="text-align: center;">注意:暂不支持修改图片</h5> -->
                                
                              <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">链接图片</span></label>
                              <div class="col-sm-10">
                                <img src="/storage/{{ $data['fs_logo'] }}" alt="" id="img0" width="100" /><br>
                                <span id="info"></span><br>
                                <input type="file" name="fs_logo" id="pic" class="file0" value="{{ $data['fs_logo'] }}"/>
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