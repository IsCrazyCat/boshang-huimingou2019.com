<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>后台主页</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- Morris -->
    <link href="/Public/Default/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/Public/Default/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">

                    <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">截止今日</span>
                        <h5>提供援助金额</h5>
                    </div>
                    <div class="ibox-content">
                    <?php if($invest_sum_uiUJiner == null): ?><h1 class="no-margins">&yen; 0 元</h1>

                    <?php else: ?>
                    <h1 class="no-margins">&yen; <?php echo ($invest_sum_uiUJiner); ?> 元</h1><?php endif; ?>
                        
                        <div class="stat-percent font-bold text-danger"><?php echo ($nowdate); ?> <i class="fa fa-bolt"></i>
                        </div>
                        <small>交易中</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">截止今日</span>
                        <h5>接受援助金额</h5>
                    </div>
                    <div class="ibox-content">
                    <?php if($uninvest_sum_uuniJiner == null): ?><h1 class="no-margins">&yen; 0 元</h1>
                    <?php else: ?>
                        <h1 class="no-margins">&yen; <?php echo ($uninvest_sum_uuniJiner); ?> 元</h1><?php endif; ?>
                        <div class="stat-percent font-bold text-success"><?php echo ($nowdate); ?> <i class="fa fa-level-up"></i>
                        </div>
                        <small>交易中</small>
                    </div>
                </div>
            </div>
           

            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-error pull-right" style="background:#f061d0; color:#ffffff">截止今日</span>
                        <h5>手续费收入</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">&yen; <?php echo ($rs_mregcodes); ?> 元</h1>
                        <div class="stat-percent font-bold" style=" color:#f061d0"><?php echo ($nowdate); ?> <i class="fa fa-level-up"></i>
                        </div>
                        <small>持续中</small>
                    </div>
                </div>
            </div>

         <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">截止今日</span>
                        <h5>总利息</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">&yen; <?php echo ($all_lixi); ?> 元</h1>
                        <div class="stat-percent font-bold text-navy"><?php echo ($nowdate); ?> <i class="fa fa-level-up"></i>
                        </div>
                        <small>储蓄中</small>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right" style="background: #08a20b; color: #ffffff" >今日发放</span>
                        <h5>今日利息</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">&yen; <?php echo ($todaylixi); ?> 元</h1>
                        <div class="stat-percent font-bold text-navy" style="color: #08a20b"><?php echo ($nowdate); ?> <i class="fa fa-level-up"></i>
                        </div>
                        <small>持续中</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">截止今日</span>
                        <h5>总奖金</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">&yen; <?php echo ($all_jiangjin); ?> 元</h1>
                        <div class="stat-percent font-bold text-info"><?php echo ($nowdate); ?> <i class="fa fa-level-up"></i>
                        </div>
                        <small>储蓄中</small>
                    </div>
                </div>
            </div>




        </div>
        
        

        <div class="row">
            

            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>提供援助待匹配列表</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover no-margins">
                                    <thead>
                                        <tr>
                                            <th>提供援助账户</th>
                                            <th>提交时间</th>
                                            <th>援助金额</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($weipipeitgjy)): $i = 0; $__LIST__ = $weipipeitgjy;if( count($__LIST__)==0 ) : echo "$inempty" ;else: foreach($__LIST__ as $key=>$val_weipipeitgjy): $mod = ($i % 2 );++$i; $uId=$val_weipipeitgjy["uiUid"]; $users=M("users"); $rs_users=$users->where("uId={$uId}")->field("uId,uUser")->find(); ?>
                                        <tr>
                                            <td><small><?php echo ($rs_users["uUser"]); ?></small>
                                            </td>
                                            <td><?php echo ($val_weipipeitgjy["uiDate"]); ?></td>
                                            <td><?php echo ($val_weipipeitgjy["uiUJiner"]); ?></td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> <a style="color:#20a9a2" href="/Assistance/wantinvestlistsselect/uiId/<?php echo ($val_weipipeitgjy["uiId"]); ?>/uId/<?php echo ($rs_users["uId"]); ?>">智能匹配</a></td>
                                        </tr><?php endforeach; endif; else: echo "$inempty" ;endif; ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-sm-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>接受援助待匹配列表</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover no-margins">
                                    <thead>
                                        <tr>
                                            <th>接受援助账户</th>
                                            <th>申请时间</th>
                                            <th>接受援助金额</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($weipipeijsjy)): $i = 0; $__LIST__ = $weipipeijsjy;if( count($__LIST__)==0 ) : echo "$uninempty" ;else: foreach($__LIST__ as $key=>$val_weipipeijsjy): $mod = ($i % 2 );++$i; $uunId=$val_weipipeijsjy["uuniUid"]; $unusers=M("users"); $rs_use=$unusers->where("uId={$uunId}")->field("uUser")->find(); ?>
                                        <tr>
                                            <td><small><?php echo ($rs_use["uUser"]); ?></small>
                                            </td>
                                            <td><?php echo ($val_weipipeijsjy["uuniDate"]); ?></td>
                                            <td><?php echo ($val_weipipeijsjy["uuniJiner"]); ?></td>
                                           
                                        </tr><?php endforeach; endif; else: echo "$uninempty" ;endif; ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户留言消息</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="ibox-content">
                        <div class="feed-activity-list">
                        <?php if(is_array($rs_books)): $i = 0; $__LIST__ = array_slice($rs_books,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_books): $mod = ($i % 2 );++$i;?><div class="feed-element">
                                <div>
                                    
                                    <strong><?php echo ($val_books["bUser"]); ?></strong>
                                    <div><?php echo ($val_books["bContent"]); ?></div>
                                    <small class="text-muted"><?php echo ($val_books["bDate"]); ?></small>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>

                </div>
               

            </div>
        </div>
    </div>

    <script src="/Public/Default/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Default/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Default/js/plugins/flot/jquery.flot.js"></script>
    <script src="/Public/Default/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/Public/Default/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/Public/Default/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/Public/Default/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="/Public/Default/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="/Public/Default/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/Public/Default/js/demo/peity-demo.min.js"></script>
    <script src="/Public/Default/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/Default/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/Public/Default/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/Public/Default/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/Public/Default/js/plugins/easypiechart/jquery.easypiechart.js"></script>
    <script src="/Public/Default/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/Public/Default/js/demo/sparkline-demo.min.js"></script>
    
</body>

</html>