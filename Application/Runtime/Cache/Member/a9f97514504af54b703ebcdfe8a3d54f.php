<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>确认付款</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">
    <!--这里是新上传组件的样式表-->
    <link href="/Public/Default/static/plupload/upfiless.css" rel="stylesheet" type="text/css" />

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>确认付款 <small></small></h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/Member/Assistance/YesPayInvestAction/uiId/<?php echo ($uiId); ?>/uId/<?php echo ($rs_users["uId"]); ?>" class="form-horizontal" id="form-admin-add" enctype="multipart/form-data" >

                        <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label">我的账户</label>
                                <div class="col-sm-10">
                                    
                                    <input type="text" class="form-control" value="<?php echo ($rs_users["uUser"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">我的手机号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_users["uTel"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">我的付款账户</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_users["uZhifubao"]); ?>" disabled>
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">对方账户</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="uiUid" value="<?php echo ($rs_users["uId"]); ?>">
                                    <input type="text" class="form-control" value="<?php echo ($rs_use["uUser"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">对方姓名</label>
                                <div class="col-sm-10">
                                    
                                    <input type="text" class="form-control" value="<?php echo ($rs_use["uName"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">对方手机号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_use["uTel"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">对方收款账户（支付宝）</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_use["uZhifubao"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">对方微信号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_use["uWeixin"]); ?>" disabled>
                                </div>
                            </div>

                                <div class="form-group">
                                <label class="col-sm-2 control-label">付款金额（元）</label>
                                    <div class="col-sm-10">
                                    <input type="number"  value="<?php echo ($jiner); ?>" class="form-control" disabled>
                                    </div>
                            	</div>
                                <!--

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">上传付款截图</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="uiImages" id="uiImages" class="form-control">
                                    </div>
                                 </div>
                                 -->

                                <div class="form-group">
                                <label class="col-sm-2 control-label"><a class="upimgs" id="btn" style="background-color:#0391db; width:100px; ">上传付款截图</a></label>
                                    <div class="col-sm-10">
                                        <dl  style="margin-bottom:5px;" id="ul_pics" class="ul_pics clearfix" ></dl>
                                        <input type="hidden" class="form-control upload-url" name="uiImages" id="pPic" required>
                                    </div>
                                </div>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">请输入安全密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="uZfPwd" id="uZfPwd" placeholder="请输入安全密码" class="form-control" required>
                                    </div>
                                 </div>
                                
                            <div class="hr-line-dashed"></div>
                            <!--
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">确认已经付款</button>
                                   
                                </div>
                            </div>
                            -->
                            
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" value="确认已经付款">
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
    <script src="/Public/Default/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/Default/js/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="/Public/Default/check/js/jquery.validate.min.js"></script> 
    <script type="text/javascript" src="/Public/Default/check/js/messages_zh.min.js"></script> 
    <script type="text/javascript" src="/Public/Default/check/js/validate-methods.js"></script>
   
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    
    <script type="text/javascript">
	$(function(){
	$("#form-admin-add").validate({
		rules:{
            uZfPwd:{
                required:true,

            },
           pPic:{
                required:true,
            }
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
<!--这里是新上传组件的类库-->
<script type="text/javascript" src="/Public/Default/static/plupload/plupload.full.min.js"></script>
<script type="text/javascript">
            var uploader = new plupload.Uploader(
                  {
                    runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                    browse_button: 'btn', // 上传按钮
                    url: "/Member/Assistance/up", //远程上传地址
                    flash_swf_url: '/Public/plupload/Moxie.swf', //flash文件地址
                    silverlight_xap_url: '/Public/plupload/Moxie.xap', //silverlight文件地址
                    filters: {
                        max_file_size: '2mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                        mime_types: [//允许文件上传类型
                            {title: "files", extensions: "jpg,png,gif"}
                        ]
                 },
                multi_selection: false, //true:ctrl多文件上传, false 单文件上传
                init: {
                    FilesAdded: function(up, files) { //文件上传前
                        if ($("#ul_pics").children("li").length >1) {
                            alert("您上传的图片太多了！");
                            uploader.destroy();
                        } else {
                            var dd = '';
                            plupload.each(files, function(file) { //遍历文件
                                dd += "<dd id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></dd>";
                            });
                            $("#ul_pics").append(dd);
                            uploader.start();
                        }
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条
                 var percent = file.percent;
                        $("#ul_pics" + file.id).find('.bar').css({"width": percent + "%"});
                        $("#ul_pics" + file.id).find(".percent").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                       var data = eval("(" + info.response + ")");
                        $("#" + file.id).html("<img src='/" + data.pic + "'/>");
                        var old=$("#pPic").val();
                         $("#pPic").val(old + data.pic+' ');
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                    }
                }
            });
            uploader.init();
        </script>  
    
    
</body>

</html>