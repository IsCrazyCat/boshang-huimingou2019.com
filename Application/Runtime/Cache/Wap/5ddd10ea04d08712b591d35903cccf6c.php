<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>用户登录通用模板</title>
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
	<meta content="yes" name="apple-mobile-web-app-capable"/>
	<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
	<meta content="telephone=no" name="format-detection"/>
	<link href="/Public/Default/css/qiu/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>


<section class="aui-flexView">
	<?php if($rs_systemName["sONOFF"] == 1): ?><section class="aui-scrollView">
		<div class="aui-jop-chang">
			<p></p>
		</div>
		<div class="aui-jop-top">
			<div class="aui-jop-top-box">
				<form  action="/Wap/Login/CheckLogin/" method="post">
					<div class="aui-flex b-line">
						<div class="aui-form-item">
							<img src="/Public/Default/img/s1.png" alt="">
						</div>
						<div class="aui-flex-box">
							<input id="email"  name="uUser" type="text" placeholder="请输入账号">
						</div>
					</div>
					<div class="aui-flex b-line">
						<div class="aui-form-item">
							<img src="/Public/Default/img/s2.png" alt="">
						</div>
						<div class="aui-flex-box">
							<input type="password" id="pwd" name="uPwd"  placeholder="请输入密码">
						</div>
						<div class="aui-psd">
							<!--<a href="javascript:;">忘记密码</a>-->
						</div>
					</div>
					<div class="aui-flex b-line">
					<?php if($rs_systemName["sUCheckCodeSwitch"] == 1): ?><input type="text" class="form-control code" name="code" placeholder="验证码" required style="width:48%;float:left; margin-top: 0px; ">
						<img  alt="点击更换" title="点击更换" src="/Verify/Verify/" onclick="this.src='/Verify/Verify/random/'+Math.random();" width="100px"><?php endif; ?>
					</div>
					<div class="aui-form-button">
						<button>登录</button>
						<!--<input class="ui-button_login r_l_but" type="submit" value="登录账户"/>-->
					</div>
					<div class="aui-register aui-register-a">
						<!--<a href="javascript:;">动态密码登录</a>-->
					</div>
				</form>
			</div>
		</div>
		<div class="aui-register">
			<!--<a href="javascript:;">注册账号</a>-->
		</div>

	</section>
	<footer class="aui-footer-link">
		<a href="javascript:;" class="aui-tabBar-item aui-tabBar-item-active">登录即代表阅读并同意 <em>用户协议</em></a>
	</footer><?php endif; ?>
	<?php if($rs_systemName["sONOFF"] == 0): ?><div class="box1">
			<p class="pps">
				<?php echo ($sONOFFInfo); ?>
			</p>
		</div><?php endif; ?>
</section>
<style>
	.pps{
		font-size: 30px;
		color: #a4ce1c;
	}
	.box1{
		margin-top: 80%;

	display: table-cell;
	vertical-align: middle;
	text-align: center;
}
</style>
</body>
</html>