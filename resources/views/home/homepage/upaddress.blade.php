@extends('home.layout.homepage')
@section('homepage')
<div class="pull-right">
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-修改收货地址</div>
                    <form action="/home/address/{{ $data['id'] }}" class="user-addr__form form-horizontal form" role="form" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <p class="fz18 cr">修改收货地址<span class="c6" style="margin-left: 20px">电话号码、手机号码选填一项，其余均为必填项</span></p>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">收货人姓名：</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="name" placeholder="请输入姓名" type="text" name="name" value="{{ $data['name'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details" class="col-sm-2 control-label">收货地址：</label>
                            <div class="col-sm-10">
                                <div class="addr-linkage">
                                    <select class="province">
                                        <option value="" class="ss">--请选择--</option>
                                    </select>
                                    <span class="sps" style="font-size: 14px"></span>
                                </div>
                                <input type="hidden" name="address">
                                <input class="form-control" id="details" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码等信息" maxlength="30" type="text" name="address_info" value="{{ $data['address_info'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="code" class="col-sm-2 control-label">地区编码：</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="code" placeholder="请输入邮政编码" type="text" name="code" value="{{ $data['code'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">手机号码：</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="mobile" placeholder="请输入手机号码" type="text" name="phone" value="{{ $data['phone'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        @if($data['status'] == 0)
                                        <input type="checkbox" name="status"><i></i> 设为默认收货地址
                                        @else()
                                        <input type="checkbox" name="status" checked><i></i> 设为默认收货地址
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <button type="submit" class="but" >保存</button>
                            </div>
                        </div>
                        <script src="/homes/js/jquery.citys.js"></script>

                        <!-- 这是get传输的请求地址 用以获取地址表数据-->
                        <script>
                            $.get('/home/address/address',{'upid':0},function(result){
                                // console.log(result);
                                // 得到数据的数组遍历选择得到其中一个对象
                                for (var i = 0; i < result.length; i++) {
                                    // 将得到的地址名写入到option中
                                    var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                                    // 将得到的option标签放到select中
                                    $('.province').append(info);
                                }
                                // 禁止请选择被选中
                                $('.ss').attr('disabled',true);
                            },'json');
                            // live  事件 委派    它可以帮助我们将动态生成的内容 只要选择 器相同就可以有相应的事件
                            $('select').live('change',function(){
                                // 将当前的对象储存起来
                                obj = $(this);
                                // 通过id查找下一个地址
                                id = $(this).val();
                                // 清除其他select标签
                                obj.nextAll('select').remove();
                                $.getJSON('/home/address/address',{'upid':id},function(result){
                                    if (result != '') {
                                        var select = $('<select></select>');
                                        var op = $('<option class="city">--请选择--</option>');
                                        select.append(op);
                                        for (var i = 0; i < result.length; i++) {
                                            var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                                            select.append(info);
                                        }
                                        // 将select标签添加到当前标签后
                                        obj.after(select);
                                    }
                                    $('.city').attr('disabled','true');
                                });
                            });
                            // 获取选中的数据提交到操作页面
                            $(':submit').click(function(){
                                // console.log($('select'));
                                arr =[];
                                $('select').each(function(){
                                    
                                    opdata=$(this).find('option:selected').html();
                                    
                                //  console.log(opdata);
                                    //将我们得到的每个值放置到数组中
                                    arr.push(opdata);
                                })
                                // console.log(arr);
                                /*if (arr == '--请选择--') {
                                    console.log(00000);
                                }*/
                                for (var i = 0; i < arr.length; i++) {
                                    if (arr[i] == '--请选择--'){
                                        $('.sps').text('请选择完整地址').css('color','red');
                                        return false;
                                    }
                                    
                                }
                                //将 得到的数组直接赋值给隐藏域的value即可
                                $('input[name=address]').val(arr);
                            })
                        </script>
                    </form>                   
                    
                </div>
            </div>
        </section>
    </div>


@endsection


