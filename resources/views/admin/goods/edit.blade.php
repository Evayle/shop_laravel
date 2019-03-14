@extends('admin.layout.index')
@section('content')
  <section class="wrapper">
	<h3 class=" text-center"><i class=" "></i> 商 品 修 改</h3>
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
          <form action="/admin/goods/{{ $goods->id }}" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 "><span class="user_add">商品名称</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="goods_name" value="{{ $goods->goods_name }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 "><span class="user_add">商品库存</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="goods_store" value="{{ $goods->goods_store }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 "><span class="user_add">商品价格</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="goods_price" value="{{ $goods->goods_price }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品描述</span></label>
                <div class="col-sm-10">
                    <textarea name="goods_describe" class="self">{{ $goods->goods_describe }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品分类</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_categorys_id">
                      @foreach ($cats as $k=>$v)
                        <option value="{{ $v->id }}" @if($goods->goods_categorys_id == $v->id) selected @endif>{{ $v->categorys_name }}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否会员折扣</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_vip">
                       <option value="0" @if($goods->goods_vip == 0) selected @endif>是</option>
                       <option value="1" @if($goods->goods_vip == 1) selected @endif>否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否打折</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_discount">
                       <option value="0" @if($goods->goods_discount == 0) selected @endif>是</option>
                       <option value="1" @if($goods->goods_discount == 1) selected @endif>否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否参与优惠</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_preferential">
                       <option value="0" @if($goods->goods_preferential == 0) selected @endif>是</option>
                       <option value="1" @if($goods->goods_preferential == 1) selected @endif>否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否包邮</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_fsp">
                       <option value="0" @if($goods->goods_fsp == 0) selected @endif>是</option>
                       <option value="1" @if($goods->goods_fsp == 1) selected @endif>否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否推荐</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_recommend">
                       <option value="0" @if($goods->goods_recommend == 0) selected @endif>是</option>
                       <option value="1" @if($goods->goods_recommend == 1) selected @endif>否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">是否可积分兑换</span></label>
                <div class="col-sm-10">
                    <select class="form-control input-sm" name="goods_hot">
                       <option value="0" @if($goods->goods_hot == 0) selected @endif>是</option>
                       <option value="1" @if($goods->goods_hot == 1) selected @endif>否</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品封面图</span></label>
                <div class="col-sm-10">
                  <input type="file" id="file" name="goods_plot">
                </div>
                <img src="{{ asset($goods->goods_plot) }}" width="50">
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品缩略图</span></label>
                <div class="col-sm-10">
                  <input type="file" id="file" name="pics_url[]" multiple>
                </div>
                @foreach ($goodspic as $v)
                  <img src="{{ asset($v->pics_url) }}" width="50">
                @endforeach
            </div>

            <!-- <img src="{{ asset('$res1') }}" alt=""> -->

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"><span class="user_add">商品详情图</span></label>
                <div class="col-sm-10">
                  <input type="file" id="file" name="imgs_url[]" multiple>
                </div>
                @foreach ($goodsimg as $v)
                  <img src="{{ asset($v->imgs_url) }}" width="50">
                @endforeach
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