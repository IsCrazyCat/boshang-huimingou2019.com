<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php echo ($rs_systemName["sName"]); ?> - 会员登录中心</title>
   
    <link href="/Public/Default/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css" rel="stylesheet">
    <?php if($rs_systemName["sONOFF"] == 1): ?><link href="/Public/Default/css/login.min.css" rel="stylesheet">
    <?php else: ?>
    <link href="/Public/Default/css/loginweihu.min.css" rel="stylesheet"><?php endif; ?>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin" style="font-family:'微软雅黑'">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    
                    <?php if($rs_systemName["sONOFF"] == 0): ?><div class="logopanel m-b" style="margin-top: 50px;">
                        <h1>您好！</h1>
                    </div>
                    <div class="m-b"></div>

                    <h4 style="color: #0f0ff0"> <?php echo ($rs_systemName["sTitle"]); ?></h4>
                    
                    <span style="font-size: 14px; color:#000000"><?php echo ($rs_systemName["sONOFFInfo"]); ?></span>
                    
                    <?php else: ?>
                    <div class="logopanel m-b">
                        <h1 style="text-align:center"><img src="/<?php echo ($rs_systemName["sLogo"]); ?>" width="285" height="95"></h1>
                    </div>
                    <div class="m-b"></div>
                    <h3 style="text-align:center; font-family:'黑体'"><?php echo ($rs_systemName["sTitle"]); ?>
                    </h3><?php endif; ?>
                    <!--
                    <strong>还没有账号？ <a href="#">立即注册&raquo;</a></strong>
                    -->
                </div>
            </div>
            <?php if($rs_systemName["sONOFF"] == 1): ?><div class="col-sm-5">
                <form  action="/Member/Login/CheckLogin/" method="post">
                    <h4 class="no-margins" style="text-align:center; font-size:16px;">会员登录中心</h4>
                    <p class="m-t-md"></p>
                    <input type="text" class="form-control uname" name="uUser" placeholder="用户名" required />
                    <input type="password" class="form-control pword m-b" name="uPwd" placeholder="密码" required />
                    <!--
                    <a href="">忘记密码了？</a>
                    -->
                    <?php if($rs_systemName["sUCheckCodeSwitch"] == 1): ?><input type="text" class="form-control code" name="code" placeholder="验证码" required style="width:48%;float:left; margin-top: 0px; margin-right: 4%">
                        <img  alt="点击更换" title="点击更换" src="/Verify/Verify/" onclick="this.src='/Verify/Verify/random/'+Math.random();" width="100px"><?php endif; ?>
                    <button class="btn btn-block" style="background:#ef4300;font-family:'微软雅黑'; font-size:16px;">登录</button>
                </form>
            </div><?php endif; ?>


        </div>
        <div class="signup-footer" style="text-align:center">
            <div >
                &copy; <?php echo ($year); ?> <?php echo ($rs_systemName["sCopyrightName"]); ?>
            </div>
        </div>
    </div>
</body>

</html>