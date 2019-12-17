<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我想要援助</title>
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
                        <h5><a style="color:#00bb9c; margin-right:5px;" href="/Member/Assistance/wantinvest/uId/<?php echo ($rs_users["uId"]); ?>">我想要提供援助</a> <small><a style="color:#ff0000" href="/Member/Assistance/wantinvestlists/uId/<?php echo ($rs_users["uId"]); ?>">援助列表</a></small></h5>
                        <div class="ibox-tools">
                        
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/Member/Assistance/WantInvestAction" class="form-horizontal" id="form-admin-add" >
                         <div class="form-group">
                                <label class="col-sm-2 control-label">撞单</label>
                                <div class="col-sm-10">
                                       <label class="checkbox-inline">
                                            <input type="radio" value="1" name="zhuangDan" checked>&nbsp;同意撞单</label>
                                        <label class="checkbox-inline">
                                            <input type="radio" value="2" name="zhuangDan">&nbsp;拒绝撞单</label>
                                </div>
                            </div>
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
                                <label class="col-sm-2 control-label">我的支付宝账户</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_users["uZhifubao"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">我的微信号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_users["uWeixin"]); ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">我的姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_users["uName"]); ?>" disabled>
                                </div>
                            </div>
                            
                            <?php if($paramenters["upPDLXONorOFF"] == 1): ?><div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">排单天数</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($paramenters["upPDLXDay"]); ?> 天，排单期间也享有利息" disabled>
                                </div>
                            </div><?php endif; ?>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">援助天数</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="uiUid" value="<?php echo ($rs_users["uId"]); ?>">
                                    <input type="text" class="form-control" value="<?php echo ($paramenters["upTermOfInvestment"]); ?> 天" disabled>
                                </div>
                            </div>
							<?php if($rs_reggrades["rgName"] != null): ?><div class="form-group">
                                <label class="col-sm-2 control-label">当前等级</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($rs_reggrades["rgName"]); ?> " disabled>
									
                                </div>
                            </div><?php endif; ?>
                            <?php if($paramenters["upTypeInvestment"] == 0): ?><div class="form-group">
                                <label class="col-sm-2 control-label">您享受的日利率</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($lilv); ?> %" disabled>
                                </div>
                            </div><?php endif; ?>
                                <!-- 投资金额类型  upTypeInvestment -->
                               <?php if($paramenters["upTypeInvestment"] == 0): ?><div class="form-group">
                                <label class="col-sm-2 control-label">提供援助金额（元）</label>
                                    <div class="col-sm-10 wan-spinner-1">
                                   
                                        
    <input style="width: 100%;height: 32px; margin-left:0px; margin-right:10px; text-align: left; border:1px solid #469987; padding-left:14px;" type="number" name="uiUJiner" step="<?php echo ($paramenters["upTZMultiples"]); ?>" max="<?php echo ($max); ?>" min="<?php echo ($min); ?>" placeholder="<?php echo ($tishijiange); ?>" id="uiUJiner" >
                                    </div>
                            	</div>
                                <?php else: ?>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">请选择提供援助金额</label>
                                <div class="col-sm-10">
                                    <!--<span>在 <?php echo ($paramenters["jixiaoshinei"]); ?> 小时内完成打款 <?php echo ($paramenters["jingshou"]); ?>% 利息，<?php echo ($paramenters["dakuanjifen"]); ?>% 商城积分收益；</span>
                                    <span>在 <?php echo ($paramenters["jixiaoshinei"]); ?> 小时 至 <?php echo ($paramenters["upPaymentPeriod"]); ?> 小时，内完成打款 <?php echo ($paramenters["waijingshou"]); ?>% 利息，<?php echo ($paramenters["waidakuanjifen"]); ?>% 商城积分收益</span>-->
                                   
                                <select data-placeholder="请选择援助金额" name="uiUJiner" id="uiUJiner" class="chosen-select form-control" required>
                                    <option value="">请选择提供援助金额</option>
                                    <?php if(is_array($touzidata)): $i = 0; $__LIST__ = $touzidata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valtouzidata): $mod = ($i % 2 );++$i;?><option value="<?php echo ($valtouzidata["utBenJin"]); ?>" hassubinfo="true"><?php echo ($valtouzidata["utBenJin"]); ?> 元</option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                </div>
                                </div><?php endif; ?>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">请输入安全密码</label>
                                    <div class="col-sm-10">
                                        <input  type="password" name="uZfPwd" id="uZfPwd" placeholder="请输入安全密码" class="form-control">
                                    </div>
                                 </div>

                                 <div class="hr-line-dashed"></div>
                            <div class="form-group" style="margin-top:-30px;">
                                <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <span style="color:#ff0000; font-weight:bold">温馨提示：投资有风险,理财需谨慎<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*每排<?php echo ($paramenters["paiduoshaoyuan"]); ?>元,消耗<?php echo ($paramenters["xiaohaopaidanbi"]); ?>个手续费</span>
                                    </div>
                                 </div>
                                
                            <div class="hr-line-dashed" style="margin-top:-10px;"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">提交排单</button>
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
  
  <script src="/Public/Default/dist/wan-spinner.js"></script> 
  <script>
  $(document).ready(function() {
    var options = {
      maxValue: <?php echo ($paramenters["upMaxMoney"]); ?>,
      minValue: <?php echo ($paramenters["upTZMultiples"]); ?>,
      step: <?php echo ($paramenters["upTZMultiples"]); ?>,
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