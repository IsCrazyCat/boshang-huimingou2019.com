<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加提供援助</title>
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
                        <h5>添加提供援助 <small></small></h5>
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
                        <form method="post" action="/System/Assistance/AddInvestAction" class="form-horizontal" id="form-admin-add" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">提供援助账户</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="uUser" id="uUser" value="<?php echo ($rs_users["uUser"]); ?>">
                                </div>
                            </div>
                                
                               <?php if($paramenters["upTypeInvestment"] == 0): ?><div class="form-group">
                                <label class="col-sm-2 control-label">提供援助金额（元）</label>
                                    <div class="col-sm-10">
                                    <input type="number" name="uiUJiner" id="uiUJiner" step="<?php echo ($paramenters["upTZMultiples"]); ?>" class="form-control">
                                    </div>
                            	</div>
                                <?php else: ?>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">请选择提供援助金额</label>
                                <div class="col-sm-10">
                                <select data-placeholder="请选择提供援助金额" name="uiUJiner" id="uiUJiner" class="chosen-select form-control" required>
                                    <option value="">请选择提供援助金额</option>
                                    <?php if(is_array($touzidata)): $i = 0; $__LIST__ = $touzidata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valtouzidata): $mod = ($i % 2 );++$i;?><option value="<?php echo ($valtouzidata["utBenJin"]); ?>" hassubinfo="true"><?php echo ($valtouzidata["utBenJin"]); ?> 元</option><?php endforeach; endif; else: echo "" ;endif; ?>

                                </select>
                                </div>
                                </div><?php endif; ?>

                                
                            <div class="hr-line-dashed"></div>
                            <!--
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">添加提供援助</button>
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" value="添加提供援助">
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
			uiUJiner:{
				required:true,
			},
           uUser:{
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