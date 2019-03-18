// 手机号验证
$('#mobile').blur(function(){
    // 获取输入框数据
    var phone = $('#mobile').val();
    // 设置验证手机号
    var mobile = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;
    if (mobile.test(phone)) {
        var img = $('<img src="/homes/images/对.jpg" width="20px"></img>');
        $('.mobile_s').empty();
        $('.mobile_s').append(img);
    }else{
        var img = $('<img src="/homes/images/错.jpg" width="20px"></img><span style="color:red;">手机号码格式不对哦</span style="color:red;">');
        $('.mobile_s').empty();
        $('.mobile_s').append(img);
        return false;
    }
});

// 邮政编码验证
$('#code').blur(function(){
    var code = $('#code').val();
    // var codeyz = /[1-9]\d{5}(?!\d)/;
    var codeyz = /^[0-9][0-9]{5}$/;
    if (codeyz.test(code)) {
        var img = $('<img src="/homes/images/对.jpg" width="20px"></img>');
        $('.code_s').empty();
        $('.code_s').append(img);
    }else{
        var img = $('<img src="/homes/images/错.jpg" width="20px"></img>');
        $('.code_s').empty();
        $('.code_s').append(img);
        return false;
    }
});

// 验证用户名3-16位
// ^[\u4E00-\u9FA5A-Za-z0-9_]+$
$('#name').blur(function(){
    var name = $('#name').val();
    // console.log(name);
    var nameyz = /^[\u4E00-\u9FA5A-Za-z0-9_]{3,32}$/;
    if (nameyz.test(name)) {
        var img = $('<img src="/homes/images/对.jpg" width="20px"></img>');
        $('.name_s').empty();
        $('.name_s').append(img);
    }else{
        var img = $('<img src="/homes/images/错.jpg" width="20px"></img><span>用户名不符合要求</span>');
        $('.name_s').empty();
        $('.name_s').append(img);
        return false;
    }
});

// get请求获取地址表内容 用于用户选择地址
$.get('/home/address/address',{'upid':0},function(result){
    // conssole.log(result);
    // 得到数据的数组遍历选择得到其中一个对象
    for (var i = 0; i < result.length; i++) {
        // 将得到的地址名写入到option中
        var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
        // 将得到的option标签放到select中
        $('select').append(info);
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
    var img = $('<img src="/homes/images/对.jpg" width="20px"></img>');
    $('.sps').text('');
    $('.sps').append(img);
})

// 验证表单提交
$('#submit').click(function(){
    // 验证名字
    var name = $('#name').val();
    // console.log(name);
    var nameyz = /^[\u4E00-\u9FA5A-Za-z0-9_]{3,32}$/;
    if (nameyz.test(name)) {
        var img = $('<img src="/homes/images/对.jpg" width="20px"></img>');
        $('.name_s').empty();
        $('.name_s').append(img);
    }else{
        var img = $('<img src="/homes/images/错.jpg" width="20px"></img><span>用户名不符合要求</span>');
        $('.name_s').empty();
        $('.name_s').append(img);
        // console.log('name');
        return false;
    }
    // 验证邮编
    var code = $('#code').val();
    // var codeyz = /[1-9]\d{5}(?!\d)/;
    var codeyz = /^[0-9][0-9]{5}$/;
    if (codeyz.test(code)) {
        var img = $('<img src="/homes/images/对.jpg" width="20px"></img>');
        $('.code_s').empty();
        $('.code_s').append(img);
    }else{
        var img = $('<img src="/homes/images/错.jpg" width="20px"></img>');
        $('.code_s').empty();
        $('.code_s').append(img);
        // console.log('code');
        return false;
    }

    // 设置验证手机号
    var phone = $('#mobile').val();
    var mobile = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;
    if (mobile.test(phone)) {
        var img = $('<img src="/homes/images/对.jpg" width="20px"></img>');
        $('.mobile_s').empty();
        $('.mobile_s').append(img);
    }else{
        var img = $('<img src="/homes/images/错.jpg" width="20px"></img><span style="color:red;">手机号码格式不对哦</span style="color:red;">');
        $('.mobile_s').empty();
        $('.mobile_s').append(img);
        // console.log('phone');
        return false;
    }
});
