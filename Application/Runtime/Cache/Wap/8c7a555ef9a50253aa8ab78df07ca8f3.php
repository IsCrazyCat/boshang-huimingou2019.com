<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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

    <?php
 $this->_var['hide_back'] = 1; $this->_var['hide_footer'] = 0; ?>
<style> body{background-color: #f7f7f7;}</style>
<div class="page" id='{$data.act}'>

    <?php if( $hide_footer != 1): ?><nav class="bar bar-tab">
            <a class="tab-item  active" href="/wap" >
            <i class="icon iconfont">&#xe63f;</i>
            <span class="tab-label">首页</span>
            </a>

            <a class="tab-item " href="#" onclick="RouterURLWAP('/wap/Finance/chushiye/uId/<?php echo ($uId); ?>','',1)">
            <i class="icon iconfont">&#xe63b;</i>
            <span class="tab-label">数据区</span>
            </a>

            <a class="tab-item" href="#"  onClick="return confirm('正在开发、敬请期待！');">
            <i class="icon " style="background-image: url('http://huimingou.com/Uploads/mi/shangcheng2.svg');height: 25px;width: 30px;"></i>
            <span class="tab-label">商城</span>
            </a>

            <a class="tab-item"  href="#" onclick="RouterURLWAP('/wap/Users/chushiye/uId/<?php echo ($uId); ?>','',1)">
            <i class="icon iconfont">&#xe640;</i>
            <span class="tab-label">我的</span>
            </a>

            </nav><?php endif; ?>

    <div class="content pull-to-refresh-content">
		  <header class="bar bar-nav">
            <h1 class='title'>注册用户</h1>
        </header>
   		     <div class="content">
            <div class="content-block">
                <p><a href="#" class="button button-fill button-success" onclick="RouterURLWAP('/wap/Users/useradd/uId/<?php echo ($uId); ?>','',1)">平台注册下级</a></p>
                <p><a href="#" class="button button-fill button-danger" onclick="RouterURLWAP('/wap/Users/FenxiangZhuceEr/uId/<?php echo ($uId); ?>','',1)">分享链接注册</a></p>
                <p><a href="#" class="button button-fill button-warning" onclick="RouterURLWAP('/wap/Users/Erweima/uId/<?php echo ($uId); ?>','',1)">分享二维码注册</a></p>
                <p><a href="#" class="button button-fill button-warning" onclick="RouterURLWAP('/wap/Users/jihuohuiyuan/uId/<?php echo ($uId); ?>','',1)">激活下级注册会员</a></p>
            </div>
        </div>
     


 

        <script type="text/javascript" src="/Public/Default/wap/qiuqiuqiu/kefu/js/qq.js"></script>
        <link rel="stylesheet" type="text/css" href="/Public/Default/wap/qiuqiuqiu/kefu/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="/Public/Default/wap/qiuqiuqiu/kefu/css/htmleaf-demo.css">
        <link rel="stylesheet" type="text/css" href="/Public/Default/wap/qiuqiuqiu/kefu/css/style.css">      

		<link rel="stylesheet" type="text/css" href="/Public/Default/wap/css/msui/sm/sm.min.css";/>
        </div>
</div>
<?php if( $smarty.request.hasleftpanel != 1 ): ?><div class="panel-overlay"></div>
	<!-- Left Panel with Reveal effect -->
	<div class="panel panel-left panel-cover theme-fw " id='panel-left-box'>
		<div class="content-block">
			<img 	src="/Public/Default/wap/images/left_bg.png" class="bg_img"/>
			<?php if( $is_login == 1): ?><div class="rela_user">
					<div class="user_pic">
						<img src="{function name="wap_user_avatar" uid="$data.user_id"}" style="width:2.4rem;height:2.4rem;"/>
					</div>
					<div class="use_name tc">您好，{$data.user_name}</div>
					<div class="w_b user_but">
						<a href="#" onclick="RouterURL('{wap_url a="index" r="uc_center" p="epage=$data.act"}','#uc_center');" class="w_b_f_1 tc"><i class="icon iconfont">&#xe60b;</i>&nbsp;&nbsp;&nbsp;账户</a>
						<a href="#" data-url="{wap_url a="index" r="login_out" p="epage=$data.act"}" onclick="loginout();" id="login-out-btn"  class="w_b_f_1 tc"><i class="icon iconfont">&#xe60d;</i>&nbsp;&nbsp;&nbsp;退出</a>
					</div>
				</div>
				<else>
					<div class="rela_user">
						<div class="user_pic">
							<img src="/Public/Default/wap/images/login_out.png" width="100%"/>
						</div>
						<div class="use_name tc">您好，您还未登录</div>
						<div class="w_b user_but">
							<a  class="w_b_f_1  tc"  href="#" onclick="RouterURL('{wap_url a="index" r="login" p="epage=$data.act"}','#login' <if condition="  $is_weixin">,1<else>,2<?php endif; ?>);" ><i class="icon iconfont">&#xe60b;</i>&nbsp;&nbsp;&nbsp;登录</a>
							<a  class="w_b_f_1  tc"  href="#" onclick="RouterURL('{wap_url a="index" r="register" p="epage=$data.act"}','#register' <?php if( $is_weixin): ?>,1<else>,2<?php endif; ?>);" ><i class="icon iconfont">&#xe60f;</i>&nbsp;&nbsp;&nbsp;注册</a>
						</div>
					</div><?php endif; ?>
		</div>
		<div class="new_list_block">
			<dl>
				<dd >
					<a href="#" onclick="RouterURL('{wap_url a="index" r="init" p="epage=$data.act"}','#init');">
					<div class="i_father"><i class="icon iconfont">&#xe608;</i></div>
					<span>首页</span>
					</a>
				</dd>

			</dl>
		</div>

</if>


<?php if( $signPackage): ?><script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
      debug: false,
      appId: '{$signPackage.appId}',
      timestamp: {$signPackage.timestamp},
      nonceStr: '{$signPackage.nonceStr}',
      signature: '{$signPackage.signature}',
      jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
      ]
  });
  var shareData = {
		//title: '{$page_title}', // 分享标题
		link: '{$wx_url}', // 分享链接
	   	// imgUrl: '', // 分享图标
	   	
		success: function () { 
			// 用户确认分享后执行的回调函数
		},
		cancel: function () { 
			// 用户取消分享后执行的回调函数
		}
	}
   wx.ready(function () {
    // 在这里调用 API
		wx.onMenuShareTimeline(shareData);
		wx.onMenuShareAppMessage(shareData);
		wx.onMenuShareQQ({
		  title: '{$page_title}',
		  desc: '',
		  link: '{$wx_url}',
		  imgUrl: '',
		  trigger: function (res) {
			//$.alert('用户点击分享到QQ');
		  },
		  complete: function (res) {
			//$.alert(JSON.stringify(res));
		  },
		  success: function (res) {
			//$.alert('已分享');
		  },
		  cancel: function (res) {
			//$.alert('已取消');
		  },
		  fail: function (res) {
			//$.alert(JSON.stringify(res));
		  }
		});
		wx.onMenuShareWeibo(shareData);
  });
</script><?php endif; ?>

<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/suimobile/sm.min.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/suimobile/sm-extend.min.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/script.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/licai.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/deals.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/transfer.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/article.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/licai_uc_published_lc.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_learn.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_goods_order.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_voucher.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/integral_mall.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_address.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_carry_money_log.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_account_log.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/licai_uc_buyed_lc.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/licai_uc_redeem_lc.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/licai_uc_record_lc.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/licai_uc_expire_lc.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_borrowed.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/vip_buy.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_interestrate.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_bank.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_collect.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_transfer.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_invest.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/uc_incharge.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/public.js' ></script>
<script type='text/javascript' charset='utf-8' src='/Public/Default/wap/js/Plugin_unit/jscharts_cr.js' ></script>