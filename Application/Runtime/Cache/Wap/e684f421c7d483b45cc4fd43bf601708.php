<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>转手续费</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">

    <link href="/Public/Default/dist/wan-spinner.css" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><a style="color:#00bb9c;margin-right:5px;" href="#">转手续费</a> <small><a style="color:#ff0000" href="#"></a></small></h5>
                    <div class="ibox-tools">

                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="/Wap/RegCode/ApplipaidanbinRegCodeAction" class="form-horizontal" id="form-admin-add" enctype="multipart/form-data">


                        <div class="form-group">
                            <label class="col-sm-2 control-label">目标账号</label>
                            <div class="col-sm-10">
                                <input type="text" value="" class="form-control" name="zizhanghu" >
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label">个数</label>
                            <div class="col-sm-10 wan-spinner-1">
                                <input type="number" name="paycodenum"  id="paycodenum" value="">

                            </div>
                        </div>



                        <div class="hr-line-dashed"></div>
                        <div class="form-group" style="margin-top:-30px;">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <span style="color:#ff0000; font-weight:bold">温馨提示:请仔细填写。</span>
                            </div>
                        </div>

                        <div class="hr-line-dashed" style="margin-top:-10px;"></div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input class="btn btn-primary" type="submit" value="确定转？">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/Public/Default/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Default/js/bootstrap.min.js?v=3.3.6"></script>
<!--<script src="/Public/Default/js/content.min.js?v=1.0.0"></script>-->
<script src="/Public/Default/js/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="/Public/Default/check/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="/Public/Default/check/js/messages_zh.min.js"></script>

<script>
    var $parentNode = window.parent.document;
    if ($(".tooltip-demo").tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    }), $(".modal").appendTo("body"), $("[data-toggle=popover]").popover(), $(".collapse-link").click(function() {
        var o = $(this).closest("div.ibox"),
            e = $(this).find("i"),
            i = o.find("div.ibox-content");
        i.slideToggle(200),
            e.toggleClass("fa-chevron-up").toggleClass("fa-chevron-down"),
            o.toggleClass("").toggleClass("border-bottom"),
            setTimeout(function() {
                    o.resize(),
                        o.find("[id^=map-]").resize()
                },
                50)
    }), $(".close-link").click(function() {
        var o = $(this).closest("div.ibox");
        o.remove()
    }), top == this) {
        //update lishibo by 20190308
        var gohome = '<div class="gohome"><a class="animated bounceInUp" href="http://huimingou.com/wap/index" title="返回首页"><i class="fa fa-home"></i></a></div>';
        $("body").append(gohome)
    }
</script>


<script type="text/javascript" src="/Public/Default/check/js/validate-methods.js"></script>




<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>

<script type="text/javascript">
    $(function(){
        $("#form-admin-add").validate({
            rules:{
                uarZhifuUser:{
                    required:true,
                },
                fukuanyesno:{
                    required:true,

                },
                paycodenum:{
                    required:true,
                },
                uarPayPrice:{
                    required:true,
                },
                uarFiles:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit();
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });
</script>

<script src="/Public/Default/dist/wan-spinner.js"></script>
<script>
    $(document).ready(function() {
        var options = {
                maxValue: <?php echo ($rs_parameters["upRegCodeNum"]); ?>,
            minValue: 1,
            step: 1,
            inputWidth: 150,
            start: 0,
            plusClick: function(val) {
            console.log(val);
        },
        minusClick: function(val) {
            console.log(val);
        },
        exceptionFun: function(val) {
            console.log("excep: " + val);
        },
        valueChanged: function(val) {
            console.log('change: ' + val);
        }
    }
        $(".wan-spinner-1").WanSpinner(options);

    });
</script>


</body>

</html>