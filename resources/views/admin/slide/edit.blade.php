@extends('admin.layout.index')
@section('content')
<section class="wrapper">
	<h2 class="text-center">修改轮播图</h2>
	<form class="form-horizontal" action="/admin/slide/{{ $data['id']}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><span class="user_add">图　　片　　名</span></label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" placeholder="填写图片名字" name="slide_name" value="{{ $data['slide_name'] }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><span class="user_add">详　细　描　述</span></label>
	    <div class="col-sm-offset-2 col-sm-10">
	      <textarea name="slide_note" id="" cols="50" rows="6" placeholder="填写图片的详细描述(不超过255个字)">{{ $data['slide_note'] }}</textarea>
	    </div>
	  </div>
	  <div class="form-group">
	  <label for="inputEmail3" class="col-sm-2 control-label"><span class="user_add">选　择　图　片</span></label>
	    <div class="col-sm-offset-2 col-sm-10">
	    <img src="/storage/{{ $data['slide_pic'] }}" alt="" id="img0" width="100" /><br>
          <span id="info"></span><br>
	      <input type="file" name="slide_pic" id="pic" class="file0">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-success">添加</button>
	    </div>
	  </div>
	</form>
</section>
@endsection()