<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>财务中心-首页</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-3">
                <div class="widget style1 red-bg">
                    <div class="row">
                    
                        <div class="col-xs-4" style="height: 40px">
                            <i ><img src="/Public/Default/ico/xianjin.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:16px;">本 金</strong> </span>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($benjin); ?> 元</h3>
                        </div>
                        
                    </div>
                </div>
            </div>

              <div class="col-sm-3">
                <div class="widget style1 red-bg">
                    <div class="row">
                    
                        <div class="col-xs-4" style="height: 40px">
                            <i ><img src="/Public/Default/ico/xianjin.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:16px;">动态钱包</strong> </span>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($rs_shouru["dongtaiqianbao"]); ?> 元</h3>
                        </div>
                        
                    </div>
                </div>
            </div>
              <div class="col-sm-3">
                <div class="widget style1 red-bg">
                    <div class="row">
                    
                        <div class="col-xs-4" style="height: 40px">
                            <i ><img src="/Public/Default/ico/xianjin.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:16px;">同步钱包</strong> </span>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($rs_shouru["tongbuqianbao"]); ?> 元</h3>
                        </div>
                        
                    </div>
                </div>
            </div>
              <div class="col-sm-3">
                <div class="widget style1 red-bg">
                    <div class="row">
                    
                        <div class="col-xs-4" style="height: 40px">
                            <i ><img src="/Public/Default/ico/xianjin.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:16px;">商城积分</strong> </span>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($rs_shouru["shangchengjifen"]); ?> 元</h3>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/jiangjin.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 奖 金</strong> </span>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($zongjiangjin); ?> 元</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/lixi.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 利 息 </strong></span>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($zonglixi); ?> 元</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4"  style="height: 40px">
                            <i><img src="/Public/Default/ico/daylixi.png"  width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 今 日 利 息 </strong></span>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($daylixi); ?> 元</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/maytixian.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 可 提 本 金 </strong></span>
                            <?php if($rs_tixianbenjin == null): ?><h3 class="font-bold" style="font-size:20px;">&yen; 0 元</h3>
                            <?php else: ?>
                            <h3 class="font-bold" style="font-size:20px;">&yen; <?php echo ($rs_tixianbenjin); ?> 元</h3><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="widget style1 " style="background-color:#f14696; color:#ffffff">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/lilv.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 投 资 次 数 </strong></span>
                            <h3 class="font-bold" style="font-size:20px;"><?php echo ($rs_shouru["uTouziNum"]); ?> 次</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="widget style1 " style="background-color:#07a712; color:#ffffff">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/tixian.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 提 现 次 数 </strong></span>
                            <h3 class="font-bold" style="font-size:20px;"><?php echo ($rs_tixiannum); ?> 次</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="widget style1 blue-bg">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/vip.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 当 前 等 级 </strong></span>
                            <?php if($vipName == ''): ?><h3  class="font-bold" style="font-size:20px;">注册会员</h3>
                            <?php else: ?>
                            <h3  class="font-bold" style="font-size:20px;"><?php echo ($vipName); ?></h3><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="widget style1 " style="background-color:#32EE89; color:#ffffff">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/tixian.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;">&nbsp;排&nbsp;单&nbsp;币&nbsp; </strong></span>
                            <h3 class="font-bold" style="font-size:20px;"><?php echo ($rs_shouru["paiDanBi"]); ?> 个</h3>
                        </div>
                    </div>
                </div>
            </div>
     <div class="col-sm-3">
                <div class="widget style1" style="background-color:#ABABAB; color:#ffffff">
                    <div class="row">
                        <div class="col-xs-4" style="height: 40px">
                            <i><img src="/Public/Default/ico/vip.png" width="48" height="48"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><strong style="font-size:18px;"> 当 前 星 级 </strong></span>
                            <h3  class="font-bold" style="font-size:20px;"><?php echo ($rs_shouru["xingji"]); ?></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="/Public/Default/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Default/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/Public/Default/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Default/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/Default/js/plugins/iCheck/icheck.min.js"></script>

    
</body>

</html>