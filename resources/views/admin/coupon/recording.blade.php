@extends('admin.layout.coupon_recording')
@section('content_coupon')

          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> 优惠券查询</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> 填写优惠活动信息</h4>

        <div class="content">
            <div class="container content_width">
                <div class="person_search">

                    <div class="search_input">
                        <div class="input-group mb-3">
                            <span>名称：</span>
                            <input id="Ktext" type="text" class="form-control" placeholder="请输入搜索的内容">
                        </div>
                    </div>
                    <div class="search_input">
                         <select name="count" class="form-control">
                        <option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                        <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                        <option value="25" @if(isset($request['count']) && $request['count'] == 25) selected @endif>25</option>
                        <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
                        <option value="100" @if(isset($request['count']) && $request['count'] == 100) selected @endif>100</option>
                        </select>
                    </div>

                    <div class="search_input">
                        <button class="btn btn-primary search_btn" type="button" >查询</button>
                        <button class="btn btn-primary search_btn" type="button" id="back_btn">重置</button>
                    </div>



                </div>

                <div class="line"></div>

            </div>
            <div class="export">

                <div class="modal fade" id="renyuan">
                    <div class="modal-dialog modal-lg modal_position">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title">优惠券</h4>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <div>

                                <table class="table table-hover">
                                   <tr>
                                        <th>
                                           <strong>优惠券名称</strong>
                                       </th>
                                        <th><strong>待核销数量</strong></th>
                                        <th><strong>用户领取数量</strong></th>
                                        <th><strong>用户使用数量</strong></th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>50</td>
                                        <td>1</td>
                                        <td>1</td>

                                    </tr>
                                </table>

                            </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">请关闭</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table id="tb" class="table">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>优惠券名称</th>
                        <th>优惠券类型</th>
                        <th>优惠券金额/折扣</th>
                        <th>优惠券使用期限</th>
                        <th>剩余库存</th>
                        <th>发放数量</th>
                        <th>状 态</th>
                    </tr>
                </thead>
                <tbody id="show_tbody">
                    <tr>
                        <td>1</td>
                        <td>刘晓晓</td>
                        <td>折扣</td>
                        <td>满100元7折</td>
                        <td>2019-2020</td>
                        <td>50</td>
                        <td>500</td>
                        <td>
                            <a href="#" class="edit" id="new_add"  data-toggle="modal" data-target="#renyuan">查看更多详情</a>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script src="/table/js/mejs.js"></script>
                  </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->





@endsection