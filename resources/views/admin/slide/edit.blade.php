@extends('admin.layout.index')
@section('content')
<section class="wrapper">
	<h2 class="text-center">修改轮播图</h2>
	<center>
	<div class="row mt text-center" style="width:1200px;">
		<div class="col-lg-12" >
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
	<form class="form-horizontal" action="/admin/slide/{{ $id }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
		<div class="form-group">
	        <label class="col-sm-2 "><span class="user_add">轮　播　图　名</span></label>
	        <div class="col-sm-10">
	            <input type="text" class="form-control" name="slide_name" value="{{ $data['slide_name'] }}">
	        </div>
	    </div>

	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><span class="user_add">详　细　描　述</span></label>
	    <div class="col-sm-offset-2 col-sm-10">
	      <textarea name="slide_note" id="" cols="50" rows="6" placeholder="填写图片的详细描述">{{ $data['slide_note'] }}</textarea>
	    </div>
	  </div>

	  <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">对　应　商　品</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_id">
                     @foreach ($goods as $v)
                        <option value="{{ $v->id }}" @if ($v->id == $data['goods_id']) selected @endif>{{ $v->goods_name }}</option>
                     @endforeach
                    </select>
                </div>
            </div>

	  <div class="form-group">
	  <label for="inputEmail3" class="col-sm-2 control-label"><span class="user_add">选　择　图　片</span></label>
	    <div class="col-sm-offset-2 col-sm-10">
	    <img src="/{{ $data['slide_pic'] }}" alt="" id="img0" width="100" /><br>

          <span id="info"></span><br>
	      <input type="file" name="slide_pic" id="pic" class="file0">
	    </div>
	  </div>
		<center>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-success">修改</button>
	    </div>
	  </div>
</center>
	</form>
	</div>
	</div>
	</div>
	</center>
</section>
@endsection()