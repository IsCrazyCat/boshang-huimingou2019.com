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
            <a class="tab-item  active" href="#" >
            <i class="icon iconfont">&#xe63f;</i>
            <span class="tab-label">首页</span>
            </a>

            <a class="tab-item " href="#" onclick="RouterURLWAP('/wap/Finance/chushiye/uId/<?php echo ($uId); ?>','',1)">
            <i class="icon iconfont">&#xe63b;</i>
            <span class="tab-label">数据区</span>
            </a>

            <a class="tab-item" href="#"  onClick="return confirm('正在开发、敬请期待！');">
            <i class="icon " style="background-image: url(../../Uploads/mi/shangcheng2.svg);height: 25px;width: 30px;"></i>
            <span class="tab-label">商城</span>
            </a>

            <a class="tab-item"  href="#" onclick="RouterURLWAP('/wap/Users/chushiye/uId/<?php echo ($uId); ?>','',1)">
            <i class="icon iconfont">&#xe640;</i>
            <span class="tab-label">我的</span>
            </a>

            </nav><?php endif; ?>

    <div class="content ">

        <!-- 这里是页面内容区 -->

      <!--  <div class="pull-to-refresh-layer">
            <div class="preloader"></div>
            <div class="pull-to-refresh-arrow"></div>
        </div>-->
        <!--网站主页-->
        <div class="swiper-container" data-space-between='10'>

            <marquee style="position:fixed; top:0px; font-size:0.8rem;z-index:999;width:100%; height:auto; color:#FFFFFF;" scrollamount="6" onmouseover="this.stop()" onmouseout="this.start()">
                温馨提示：最新公告
                <a style="color: #FFFFFF" href="#"><?php echo ($rs_announcement[0]['annTitle']); ?></a>
            </marquee>


            <div class="swiper-wrapper">
                <?php if(is_array($rs_focusmap)): foreach($rs_focusmap as $k=>$adv): ?><div class="swiper-slide">
                        <a href="#" onclick="">
                            <img src="/<?php echo ($adv["zfImages"]); ?>" style="width:100%;height:auto;"
                                 width="173px" height="80px" alt="焦点图2">
                        </a>
                    </div><?php endforeach; endif; ?>
            </div>

            <div class="swiper-pagination"></div>


        </div>

<style>
    .uc_img {
        width: 3.52rem;
        height: 3.52rem;
        overflow: hidden;
        border-radius: 50%;
        background: #fff;
        border: 2px solid lightgrey;
        margin: 0 auto;
    }
    .img-circle {
        border-radius: 50%;
    }
    img {
        vertical-align: middle;
    }
    img {
        border: 0;
    }

    .table_cell{
        color:#848484;
    }



</style>
<div class="uc_center" >
    <div class="uc_c_top" style="padding:0px; background-color: #f7f7f7;">


        <div class=" uc_c_top_conten  " >
            <div class="table_block " style="background-image: url(../../Uploads/mi/r95148.png);">

                <!--个人头像 lishibo-->
                <div class="table_cell " style="margin:0px;padding:0px;">
                       <div class="uc_img_bor_small" style=" border: 0px;padding:0.18rem 0;margin-left:-1.2rem;">

                                <?php if($rs_users["uImages"] == null): if($rs_users["uSex"] == 1): ?><span><img alt="image" class="img-circle" src="/Public/Default/img/defaultu_1.jpg" width="80" height="80" /></span>
                                        <?php else: ?>
                                        <span><img alt="image" class="img-circle" src="/Public/Default/img/defaultu_2.jpg" width="80" height="80" /></span><?php endif; ?>
                                    <?php else: ?>
                                    <span><img alt="image" class="img-circle" src="/<?php echo ($rs_users["uImages"]); ?>" width="80" height="80" /></span><?php endif; ?>


                        </div>
                </div>

                <!--昵称-->
                <a class="table_cell " style="text-align: left;width:2%;">
                  <div   style="float:left;">
                      <p class="icon_block" style="color:#000000;">ID:<?php echo ($rs_users["uUser"]); ?></p>
                      <p class="icon_block " style="color:#000000;">欢迎您：<?php echo ($rs_users["uName"]); ?></p>
                      <p class="icon_block " style="color:#000000;">当前在线人数：<?php echo ($online); ?></p>
                  </div>
              </a>

                <script>
                    function user_sign_wap(id) {
                        var ajaxurl = "/Wap/Index/UserSign/uId/"+id;
                        $.showIndicator();
                        $.ajax({
                            url: ajaxurl,
                            type: "Post",
                            dataType: "json",
                            success: function (data) {
                                $.hideIndicator();
                                if (data.status == 1) {
                                    $.alert(data.info, function () {
                                        window.location.href="/wap/Index/";
                                    });
                                }
                                else {
                                    $.alert(data.info);
                                }
                            }, error: function () {
                                $.toast("通信失败");
                                $.hideIndicator();
                            }
                        });

                    }

                    function fuck(){
                        alert("fucjk");
                    }

                </script>

                <!--签到-->
                <?php if($countlog == 0): ?><a class="table_cell " style="text-align: center;" onclick="user_sign_wap(1);" >

                        <div class="f_l show">
                            <p class="icon_block "><i class="icon" style="background-image: url(../../Uploads/mi/xingyunfudai2.svg);height: 53px;width: 55px;"></i></p>
                            <p class="text ff9785">幸运福袋</p>
                        </div>
                    </a>
                    <?php else: ?>
                    <a class="table_cell " style="text-align: center;" onclick="user_sign_wap(1);" >

                        <div class="f_l show">
                            <p class="icon_block "><i class="icon" style="background-image: url(../../Uploads/mi/xingyunfudai2.svg);height: 53px;width: 55px;"></i></p>
                            <p class="text ff9785">幸运福袋</p>
                        </div>
                    </a><?php endif; ?>

            </div>
        </div>

        <div class="blank039"></div>
        <ul class="w_b big_classification">

	<li class="w_b_f_1 tc">
		<a href="#" onclick="RouterURLWAP('/Assistance/wantinvest/uId/<?php echo ($uId); ?>','',1)">
			<p class="icon_parent"><i class="icon iconfont " style="background-image: url(../../Uploads/mi/legou.svg);height: 28px;width: 28px;"></i></p>
			<p class="font">乐购</p>

		<div class="my_bor"></div></a>
	</li>

	<li class="w_b_f_1 tc">
		<a href="#" onclick="RouterURLWAP('/wap/Assistance/wantuninvest/uId/<?php echo ($rs_users["uId"]); ?>','',1)" >
			<p class="icon_parent"><i class="icon iconfont" style="background-image: url(../../Uploads/mi/lexiao.svg);height: 25px;width: 25px;"></i></p>
			<p class="font">乐销</p>

			<div class="my_bor"></div></a>
	</li>

	<li class="w_b_f_1 tc">
		<a href="#" onclick="RouterURLWAP('/wap/Assistance/index/uId/<?php echo ($uId); ?>','',1)">
            <p class="icon_parent">
				<i class="icon iconfont " style="background-image: url(../../Uploads/mi/jiaoyiqu.svg);height: 25px;width: 25px;"></i>
			</p>
			<p class="font">交易区</p>

		<div class="my_bor"></div></a>
	</li>
	<li class="w_b_f_1 tc">
		<a href="#" onclick="RouterURL('/wap/Users/zhucechushi/uId/<?php echo ($uId); ?>','',1)">
				<p class="icon_parent"><i class="icon iconfont" style="background-image: url(../../Uploads/mi/zhuceyonghu.svg);height: 28px;width: 28px;"></i></p>
			<p class="font">注册用户</p>
		
		<div class="my_bor"></div></a>
	</li>
</ul>

<div class="blank012"></div>

<ul class="w_b big_classification">
	<li class="w_b_f_1 tc">
		<a href="#" onclick="RouterURL('/wap/Assistance/wantinvestlists/uId/<?php echo ($uId); ?>','',1)">
		<p class="icon_parent"><i class="icon iconfont " style="background-image: url(../../Uploads/mi/wodedingdan.svg);height: 25px;width: 25px;"></i></p>
		<p class="font">我的订单</p>

		<div class="my_bor"></div></a>
	</li>
	<li class="w_b_f_1 tc">
		<a href="#" onclick="RouterURL('/wap/Users/userslists/uId/<?php echo ($uId); ?>/stId/0','',1)">
		<p class="icon_parent"><i class="icon iconfont "  style="background-image: url(../../Uploads/mi/tuanduiguanli.svg);height: 25px;width: 25px;"></i></p>
		<p class="font">团队管理</p>

		<div class="my_bor"></div></a>
	</li>
	<li class="w_b_f_1 tc">
		<a href="#"  onClick="return confirm('正在开发、敬请期待！');">
		<p class="icon_parent"><i class="icon iconfont " style="background-image: url(../../Uploads/mi/VBT.svg);height: 26px;width: 33px;"></i></p>
		<p class="font">VBT</p>

		<div class="my_bor"></div>
		</a>
	</li>
	<li class="w_b_f_1 tc">
		<a href="#" onClick="return confirm('正在开发、敬请期待！');">
		<p class="icon_parent"><i class="icon iconfont " style="background-image: url(../../Uploads/mi/youxizhongxin.svg);height: 26px;width: 27px;"></i></p>
		<p class="font">霸屏手游</p>

		<div class="my_bor"></div></a>
	</li>
</ul>
			
			

    </div>






    <div class="uc_c_middle">





        <!---->
        <style>
            .row{
                line-height: 1.2rem;
                color: #858585;
                font-size: 0.6rem;
                text-align: center;
            }

            row .col-50 {
                width: 46%;
                margin-left: 4%;
                text-align: center;
            }

            .data {
               padding-top:0.7rem;
            }
            .row i {
                position: relative;
                top: 3px;
            }

            .cashicon {
                background: url(/Public/Default/wap/images/s2.png) no-repeat;
                background-size: 100% 100%;
                display: inline-block;
                line-height: 2.5rem;
                width: 18px;
                height: 18px;
            }

            .totalicon {
                background: url(/Public/Default/wap/images/s1.png) no-repeat;
                background-size: 100% 100%;
                display: inline-block;
                width: 18px;
                height: 18px;
            }

            .dongjieicon {
                background: url(/Public/Default/wap/images/s3.png) no-repeat;
                background-size: 100% 100%;
                display: inline-block;
                width: 18px;
                height: 18px;
            }

            .numcolor {
                color: #ddbf52;
                font-size: 18px;
            }


        </style>
        <div class="content-padded grid" style="background-color: white;margin:0;padding:0;display:block;">
            <div class="row data" >
                <div class="col-50 numcolor"><?php echo ($rs_shouru["xingji"]); ?></div>
                <div class="col-50 numcolor"><?php echo ($zonglixi); ?></div>
            </div>
            <div class="row">
                <div class="col-50"><i class="dongjieicon"></i>&nbsp;星级： </div>
                <div class="col-50"><i class="cashicon"></i>&nbsp;利息余额： </div>
            </div>
            <div class="row data">
                <div class="col-50 numcolor"><?php echo ($rs_shouru["paiDanBi"]); ?></div>
                <div class="col-50 numcolor"><?php echo ($rs_shouru["dongtaiqianbao"]); ?></div>
            </div>
            <div class="row">
                <div class="col-50"><i class="cashicon"></i>&nbsp;手续费： </div>
                <div class="col-50"><i class="cashicon"></i>&nbsp;动态钱包： </div>
            </div>
            <div class="row data">
                <div class="col-50 numcolor"><?php echo ($rs_shouru["jiHuoMa"]); ?></div>
                <div class="col-50 numcolor"><?php echo ($rs_shouru["tongbuqianbao"]); ?></div>
            </div>
            <div class="row" style="  padding-bottom:0.7rem;">
                <div class="col-50"><i class="dongjieicon"></i>&nbsp;激活码： </div>
                <div class="col-50"><i class="totalicon"></i>&nbsp;同步钱包： </div>
            </div>

        </div>

        <div class="blank039"></div>
        <style>
            .icobox  img {
                margin-top:-0.2rem;
                width: 1rem;
                height: 1rem;
                border: none;
                display: inline-block;
                vertical-align: middle;
            }
            .w_b_f_1 {
              //  text-indent: 0.5rem;
                color: #848484;
                font-size:1rem;
            }
            .uc_c_middle_content_list li{
                vertical-align: middle;
                line-height: 2rem;
            }
        </style>

        <ul class="uc_c_middle_content_list">
            <li>
                <a href="#" class="href_first w_b" onclick="RouterURL('wap/RegCode/ApplicatpaidanbiCode/uId/<?php echo ($uId); ?>','',1);">
                    <span class="th">
                        <i class="ico icobox">
                            <img src="/Public/Default/wap/images/xiaoxi.png" width="100%">
                        </i>
                    </span>
                    <p class="w_b_f_1">手续费转账</p>
                    <i class="icon iconfont icon_rigth"></i>
                </a>

            </li>
            <li>
                <a href="#" class="href_first w_b" onclick="RouterURL('RegCode/applicationregcode/uId/<?php echo ($uId); ?>','',1);">
                    <span class="th">
                        <i class="ico icobox">
                            <img src="/Public/Default/wap/images/xiaoxi.png" width="100%">
                        </i>
                    </span>
                    <p class="w_b_f_1">激活码转账</p>
                    <i class="icon iconfont icon_rigth"></i>
                </a>
            </li>
          <li>
                <a href="#" class="href_first w_b" onclick="RouterURL('Books/add','',1);">
                   <span class="th">
                        <i class="ico icobox">
                            <img src="/Public/Default/wap/images/liuyan.png" width="100%">
                        </i>
                    </span>
                    <p class="w_b_f_1">在线留言</p>
                    <i class="icon iconfont icon_rigth"></i>
                </a>
            </li>
            <li>
                <a href="#" class="href_first w_b" onclick="RouterURL('LoginTrue/ExitLogin','',1);">
                   <span class="th">
                        <i class="ico icobox">
                            <img src="/Public/Default/wap/images/tuichu.png" width="100%">
                        </i>
                    </span>
                    <p class="w_b_f_1">退出登录</p>
                    <i class="icon iconfont icon_rigth"></i>
                </a>
            </li>


        </ul>
    </div>

</div>

  <!--浮动客服-->
        <div class="scrollsidebar" id="scrollsidebar">
            <div class="show_btn" id="show_btn"><span>客服微信</span></div>
            <div class="side_content" id="side_content">
                <div class="side_list">
                    <div class="side_title"><a title="隐藏" class="close_btn" ><span>关闭</span></a></div>
                    <div class="side_center">
                        <div class="custom_service">
                            <p> <a title="点击这里给我发消息" href="#" target="_blank">客服微信二维码</a> </p>
                        </div>
                        <div class="other">
                            <p><img src="/<?php echo ($rs_systemName["sErweima"]); ?>" width="120"/></p>
                            <p>客服微信号</p>
                            <p><?php echo ($rs_systemName["sWeixin"]); ?></p>
                        </div>
                        <div class="msgserver">
                            <p><a href="###" >联系我们</a></p>
                        </div>
                    </div>
                    <div class="side_bottom"></div>
                </div>
            </div>

        </div>
       

        <script type="text/javascript" src="/Public/Default/wap/qiuqiuqiu/kefu/js/qq.js"></script>
        <link rel="stylesheet" type="text/css" href="/Public/Default/wap/qiuqiuqiu/kefu/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="/Public/Default/wap/qiuqiuqiu/kefu/css/htmleaf-demo.css">
        <link rel="stylesheet" type="text/css" href="/Public/Default/wap/qiuqiuqiu/kefu/css/style.css">      

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