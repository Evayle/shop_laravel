@extends('admin.layout.index')
@section('content')
  <section class="wrapper">
	<h3 class=" text-center"><i class=" "></i> 商 品 添 加</h3>
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
          <form action="/admin/goods" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 "><span class="user_add">商品名称</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="goods_name" value="{{ old('goods_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 "><span class="user_add">商品关键词</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="goods_keywords" value="{{ old('goods_keywords') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品描述</span></label>
                <div class="col-sm-10">
                    <textarea name="goods_describe" class="self">{{ old('goods_describe') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品分类</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_categorys_id">
                      @foreach ($cats as $k=>$v)
                        <option value="{{ $v->id }}">{{ $v->categorys_name }}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否会员折扣</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_vip">
                       <option value="0">是</option>
                       <option value="1">否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否打折</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_discount">
                       <option value="0">是</option>
                       <option value="1">否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否参与优惠</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_preferential">
                       <option value="0">是</option>
                       <option value="1">否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否包邮</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_fsp">
                       <option value="0">是</option>
                       <option value="1">否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否推荐</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_recommend">
                       <option value="0">是</option>
                       <option value="1">否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品封面图</span></label>
                <div class="col-sm-10">
                  <input type="file" id="file" name="goods_plot">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品缩略图</span></label>
                <div class="col-sm-10">
                  <input type="file" id="file" name="pics_url[]" multiple>
                </div>
            </div>

            <!-- <img src="{{ asset('$res1') }}" alt=""> -->

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品详情图</span></label>
                <div class="col-sm-10">
                  <input type="file" id="file" name="imgs_url[]" multiple>
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