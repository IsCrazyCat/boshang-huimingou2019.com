<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo ($rs_systemName["sName"]); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0,minimum-scale=0.5">
	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">


	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/js/suimobile/sm.min.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/js/suimobile/sm-extend.min.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/public.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/init.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/deal.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/css3-3d-circle-progress.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/datepicker.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/lynn.css";    />
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/doexchange.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/integral_mall.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/goods_exchange.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/goods_information.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_learn.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/licai_deal_detail.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/datepicker.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/lynn.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/Log_recharge.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/deal_mobile.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/Repayment.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/Statistics.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/cart_index.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/youhui_comment_list.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/user_addr_list.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/pay_order_index.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/search.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_add_bank.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_bank.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_to_transfer.css	";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_carry_money_log.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_save_carry.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_center.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_collect.css	";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_incharge.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_voucher.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_money_log.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_quick_refund.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_account_log.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/login.css";	/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_collect.css";/>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/uc_transfer.css";/>


	<script type='text/javascript' src='/Public/Default/wap/js/suimobile/zepto.min.js' charset='utf-8'></script>
	<script type='text/javascript' src='/Public/Default/wap/js/fastclick.js' charset='utf-8'></script>
	<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/font-awesome-4.2.0/css/font-awesome.min.css" />

	<script type="text/javascript">
        var APP_ROOT = '<?php echo ($APP_ROOT); ?>';
        var WAP_PATH = '<?php echo ($WAP_ROOT); ?>';
        var APP_ROOT_ORA = '<?php echo ($PC_URL); ?>';
        var SITE_DOMAIN = "<?php echo ($data["site_domain"]); ?>";
        //var isapp = "<{function name="intval" f="$smarty.request.app"}>";
        var isapp = "1";
        //var __HASH_KEY__ = "<{insert name="get_hash_key"}>";
        $.config = {
            swipePanelOnlyClose: true
        }

        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function() {
                FastClick.attach(document.body);
            }, false);
        }
	</script>
</head>

<body>

<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/??sm.min.js,sm-extend.min.js' charset='utf-8'></script>
    <header class="bar bar-nav">
        <a class="icon  pull-left" id="zuo" href="/wap">返回</a>
        <a class="icon  pull-right" id="you" href="">刷新</a>
        <h1 class="title">交易区</h1>
    </header>
<style>
#zuo {
    color: #00FF00;
    font-size: 15px;
}
#you {
    color: #00FF00;
    font-size: 15px;
}
</style>
<div class="content">
    <div class="buttons-tab">
        <a href="/Wap/Assistance/index/uId/<?php echo ($uIdjs); ?>" class=" active button">优选区</a>
        <a href="/Wap/Assistance/SuiJiQu/uId/<?php echo ($uIdjs); ?>" class=" button">随机区</a>
        <a href="/Wap/Assistance/ZiXuanQu/uId/<?php echo ($uIdjs); ?>" class=" button">自选区</a>
    </div>
    <div class="content-block">
        <div class="tabs">
            <div class=" ">
                <div class="content-block" style=" margin: 1.25rem 0;background-color: #f2f2f2;">

                        <!--优选区 start-->
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr style="background-color: white;height:1.5rem;">
                                    <th>编号</th>
                                    <th>账号</th>
                                    <th>星级</th>
                                    <th>电话</th>
                                    <th>金额</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($rs_invest)): $i = 0; $__LIST__ = $rs_invest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_invest_yx): $mod = ($i % 2 );++$i; $uId=$val_invest_yx["uiUid"]; $users=M("users"); $rs_users=$users->where("uId={$uId}")->find(); ?>
                                    <tr class="gradeX">
                                        <td><?php echo ($val_invest_yx["uiId"]); ?></td>
                                        <td><?php echo ($rs_users["uUser"]); ?></td>
                                        <td><?php echo ($rs_users["xingji"]); ?></td>
                                        <td><?php echo ($rs_users["uTel"]); ?></td>
                                        <td><?php echo ($val_invest_yx["uiUJiner"]); ?></td>
                                        <td style="font-weight:bold"><a href="/Wap/Assistance/jiaoGe/uiUid/<?php echo ($val_invest_yx["uiUid"]); ?>/uiId/<?php echo ($val_invest_yx["uiId"]); ?>/uIdjs/<?php echo ($uIdjs); ?>">交割</a></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    <!--优选区 end-->

                </div>
            </div>




        </div>
    </div>
</div>