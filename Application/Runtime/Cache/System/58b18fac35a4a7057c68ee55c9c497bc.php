<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
    <title><?php echo ($rs_systemName["sName"]); ?> - 后台登录中心</title>
    -->
    <title>CFht</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg" style="background:#608180">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h2 class="logo-name" style="color:#ffffff">CF</h2>

            </div>
            <!--
            <h3 style="color:#ffffff">欢迎登录</h3>
            -->

            <form class="m-t" role="form" action="/System/Login/CheckLogin/" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="用户名/手机号" name="aUser" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" name="aPwd" required>
                </div>
                <?php if($rs_systemName["sCheckCodeSwitch"] == 1): ?><div class="form-group">
                    <input type="text" class="form-control" name="code" placeholder="验证码" required style="width:50%;float:left;"> <div class="form-group" style="float:left; width:47%; margin-left:3%"> <img  alt="点击更换" title="点击更换" src="/Verify/Verify/" onclick="this.src='/Verify/Verify/random/'+Math.random();" ></div>
                </div><?php endif; ?>

                <button type="submit" class="btn block full-width m-b" style="background:#34afb4; color:#ffffff" ><b>登 录</b></button>

				<!--
                <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>
                </p>
                -->

            </form>
        </div>
    </div>
    <script src="/Public/Default/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Default/js/bootstrap.min.js?v=3.3.6"></script>
</body>

</html>