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
                                <h4 class="modal-title">添加</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <div>
                                <table>
                                   <td>
                                       <th>
                                           21323
                                       </th>
                                   </td>

                                        <th><strong>Twitter, Inc.</strong></th>
                                        <th>1</th>
                                        <th>1</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
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
                        <th>优惠券名称</th>
                        <th>使用</th>
                        <th>剩余数量</th>
                        <th>优惠券领取时间</th>
                        <th>优惠券发放时间</th>
                        <th>用户类型</th>
                        <th>状 态</th>
                    </tr>
                </thead>
                <tbody id="show_tbody">
                    <tr>
                        <td>刘晓晓</td>
                        <td>7652101</td>
                        <td>18086667777</td>
                        <td>------</td>
                        <td>一级</td>
                        <td>高级</td>
                        <td>
                            <a href="#" class="edit" id="new_add"  data-toggle="modal" data-target="#renyuan">查看详情</a>
                            <a href="#" class="del">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td>李磊</td>
                        <td>7652102</td>
                        <td>18086668888</td>
                        <td>------</td>
                        <td>三级</td>
                        <td>专家</td>
                        <td>
                            <a href="#" class="edit">编辑</a>
                            <a href="#" class="del">删除</a>
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