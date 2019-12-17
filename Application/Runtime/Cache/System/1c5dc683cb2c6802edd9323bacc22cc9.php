<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改会员</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改会员 <small><a href="/System/Users/userslists">会员列表</a></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/System/Users/UpdateUserAction/uId/<?php echo ($rs_users["uId"]); ?>" class="form-horizontal" id="form-admin-add">
                                
                                <?php if($rs_users["uId"] == 1): ?><div class="form-group">
                                        <label class="col-sm-2 control-label">会员账户</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="uUser" id="uUser" value="<?php echo ($rs_users["uUser"]); ?>" placeholder="控制在10个汉字或20个字符内" class="form-control">
                                        </div>
                                    </div>
                                 <?php else: ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">会员账户</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="uUser" id="uUser" value="<?php echo ($rs_users["uUser"]); ?>" placeholder="控制在10个汉字或20个字符内" class="form-control" disabled>
                                        </div>
                                    </div><?php endif; ?>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">手机号码</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uTel" value="<?php echo ($rs_users["uTel"]); ?>" id="uTel" placeholder="请输入你的身份证号码" class="form-control">
                                    </div>
                                 </div>

                                <div class="form-group">
                                <label class="col-sm-2 control-label">登陆密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="uPwd" id="uPwd" placeholder="6-16位，不修改请留空" class="form-control">
                                    </div>
                                 </div>

                                <div class="form-group">
                                <label class="col-sm-2 control-label">安全密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="uZfPwd" id="uZfPwd" placeholder="6位数字，不修改请留空" class="form-control">
                                    </div>
                                 </div>


                                 <div class="form-group">
                                <label class="col-sm-2 control-label">真实姓名</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uName" value="<?php echo ($rs_users["uName"]); ?>" id="uName" placeholder="请输入你的真实姓名" class="form-control">
                                    </div>
                                 </div>

                                <div class="form-group">
                                <label class="col-sm-2 control-label">身份证号码</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uSfId" value="<?php echo ($rs_users["uSfId"]); ?>" id="uSfId" placeholder="请输入你的身份证号码" class="form-control">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">微信号码</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uWeixin" value="<?php echo ($rs_users["uWeixin"]); ?>" id="uWeixin" placeholder="请输入你的微信号码" class="form-control">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">支付宝账户</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uZhifubao" value="<?php echo ($rs_users["uZhifubao"]); ?>" id="uZhifubao" placeholder="请输入你的支付宝账户" class="form-control">
                                    </div>
                                 </div>

                                <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>

                                    <div class="col-sm-10">
                                        <?php if($rs_users["uSex"] == 1): ?><label class="checkbox-inline">
                                                <input type="radio" value="1" name="uSex" checked> 男
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" value="2" name="uSex"> 女
                                            </label>
                                        <?php else: ?>
                                            <label class="checkbox-inline">
                                                <input type="radio" value="1" name="uSex"> 男
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" value="2" name="uSex" checked> 女
                                            </label><?php endif; ?>     
                                    </div>
                                </div>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">电子邮箱</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="uEmail" value="<?php echo ($rs_users["uEmail"]); ?>" id="uEmail" placeholder="非必填项，可留空" class="form-control">
                                    </div>
                                 </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">银行名称</label>
                                <div class="col-sm-10">
                                    <input type="text" name="yinhangName" value="<?php echo ($rs_users["yinhangName"]); ?>" id="yinhangName" placeholder="银行卡名称及开户行、请您务必填写准确！" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">银行卡号</label>
                                <div class="col-sm-10">
                                    <input type="text" name="yinhangNubmer" value="<?php echo ($rs_users["yinhangNubmer"]); ?>" id="yinhangNubmer" placeholder="请问务必填写准确!" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                	<!--
                                    <button class="btn btn-primary" type="submit">修改会员</button>
                                    -->
                                    <input class="btn btn-primary" type="submit" value="修改会员">
                                   
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
			uUser:{
				required:true,
                minlength:2,
                maxlength:20
			},
			uPwd:{
                minlength:6,
                maxlength:16

			},
            uPwd2:{
                equalTo: "#uPwd"
            },
			uZfPwd:{
                minlength:6,
                maxlength:6,
                isNumber:true,

			},
            uZfPwd2:{
                equalTo: "#uZfPwd"

            },
            uName:{
                required:true,
                minlength:2,
                maxlength:8

            },
            uSfId:{
                required:true,
                minlength:15,
                maxlength:18

            },
            uTel:{
                required:true,
                isPhone:true,

            },
            uWeixin:{
                required:true,

            },
            uZhifubao:{
                required:true,

            },
            uTuiUser:{
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
    
    
</body>

</html>