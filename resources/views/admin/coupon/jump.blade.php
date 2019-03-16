<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="http://libs.baidu.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/jq/css/jq22-demo.css">
    <link rel="stylesheet" href="/jq/demo/libs/default.min.css">
    <link rel="stylesheet" href="/jq/demo/demo.min.css">
    <link rel="stylesheet" type="text/css" href="/jq/css/jquery-confirm.css" />
    <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/jq/js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="http://libs.baidu.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="/jq/js/jquery.sticky.min.js"></script>
    <script src="/jq/demo/libs/pretty.js"></script>
    <script type="text/javascript" src="/jq/js/jquery-confirm.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<script>
    $(window).ready( function () {
    $.confirm({
        title: '添加成功',
        content: '你可以选择继续添加,也可以选择返回优惠券列表页查看您当前添加的优惠券。',
        autoClose: 'cancel|10000',
        confirmButtonClass: 'btn-danger',
        confirmButton: '点击继续添加',
        cancelButton: '取消返回列表页',
        confirm: function () {
           window.location.replace("/admin/coupon/create");
        },
        cancel: function () {
            window.location.replace("/admin/coupon");
        }
    });
});
</script>
</body>
</html>