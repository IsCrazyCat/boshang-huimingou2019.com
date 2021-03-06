<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我要提现</title>
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
                        <h5><a style="color:#00bb9c;margin-right:5px;" href="/Wap/Finance/withdrawals/uId/<?php echo ($rs_users["uId"]); ?>">我要提现</a> <small><a style="color:#ff0000;" href="/Wap/Finance/index/uId/<?php echo ($rs_users["uId"]); ?>">我的资产</a></small></h5>
                        <div class="ibox-tools">
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/Wap/Finance/WithdrawalsAction" class="form-horizontal" id="form-admin-add" >
                             <div class="form-group">
                                <label class="col-sm-2 control-label">当前利息</label>
                                    <div class="col-sm-10" style="margin-top:8px">
                                        <?php echo ($nowzonglixi); ?> 元   <span style="margin-left:10px; font-weight: bold; color:#07bfa3">可用 <?php echo ($lixi); ?> 元 </span>    <span style="margin-left:10px; font-weight: bold; color:#fb5e8a">冻结 <?php echo ($dongjielixi); ?> 元 </span>
                                    </div>
                                 </div>

                                  <div class="form-group">
                                <label class="col-sm-2 control-label">当前奖金</label>
                                    <div class="col-sm-10" style="margin-top:8px">
                                        <?php echo ($rs_users["uJiangjin"]); ?> 元
                                    </div>
                                 </div>
                                        <div class="form-group">
                                <label class="col-sm-2 control-label">同步钱包</label>
                                    <div class="col-sm-10" style="margin-top:8px">
                                        <?php echo ($rs_users["tongbuqianbao"]); ?> 元
                                    </div>
                                 </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">提现类型</label>

                                    <div class="col-sm-10">
                                        
                                            <label class="checkbox-inline">
                                            <input type="hidden" class="form-control" name="uId" value="<?php echo ($rs_users["uId"]); ?>">
                                                <input type="radio" value="1" name="moneytype" checked> 利息
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" value="2" name="moneytype"> 奖金
                                            </label>
                                              <label class="checkbox-inline">
                                                <input type="radio" value="3" name="moneytype">同步钱包
                                            </label>
                                    </div>
                                </div>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">请输入提现金额</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="uMoneys" id="uMoneys" placeholder="请输入提现金额" class="form-control">
                                    </div>
                                 </div>


                                 <div class="form-group">
                                <label class="col-sm-2 control-label">请输入安全密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="uZfPwd" id="uZfPwd" placeholder="请输入安全密码" class="form-control">
                                    </div>
                                 </div>
                               
                                    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">温馨提示：</label>
                                    <div class="col-sm-10" style="margin-top:8px;">
                                        <span style="color:#ff0000; font-weight:bold">本金提现请到 <span style="color:#0000ff">[接受援助] </span>处提取，或 <a style="color:#04caac; font-weight: bold" href="/Assistance/wantuninvest/uId/<?php echo ($rs_users["uId"]); ?>"> 点击这里</span>
                                    </div>
                                 </div>
                                
                            <div class="hr-line-dashed"></div>
                                    <!--
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                                <button class="btn btn-primary" type="submit">提交</button>
                                        </div>
                                    </div>
                                    -->
                                    
                              <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" value="提交">
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
           uZfPwd:{
                required:true,
                minlength:6,
                maxlength:6

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