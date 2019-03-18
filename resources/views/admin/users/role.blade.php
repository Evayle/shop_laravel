@extends('admin.layout.index')
@section('content')

          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> 权限管理</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> 个人权限管理</h4>
                      <form class="form-horizontal style-form" action="/admin/users/updaterole/{{$user_1->id}}" method="post" >
                            {{ csrf_field() }}


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>姓名</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" disabled  " style='width:300px;' name="coupon_many" value="{{$user_1->admin_name}}">
                              </div>
                          </div>

                          <div class="form-group" ">
                              <label class="col-sm-2 col-sm-2 control-label"><strong style="color:red">*</strong>角色名称</label>
                                    @foreach($rose as $key=>$val)
                                  <input type="checkbox" name="rids[]" @if (in_array($val->id,$rid)) checked  @endif value="{{$val->id}}"><strong id="man">{{$val->rname}}</strong>
                                    @endforeach
                          </div>
                          <div id="divs">
                          </div>
                            <center>
                              <button type="submit" class="btn btn-info " id="tijiao">提交</button>.
                              </center>
                          </div>
                      </form>
                  </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->

@endsection