<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title><?php echo ($rs_systemName["sName"]); ?>-会员中心</title>

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style1.min.css?v=4.1.0" rel="stylesheet">
</head>

<!-- <body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden" onload="aaa()">
    <script>
        function aaa(){
var a;
if(getCookie("a")!=2){
    var a=2;
      setCookie("a", a);
      // window.location.reload();
      // window.location.assign("http://huimingou.com/Index.html");
      window.location.href = window.location.href;
}     
            
        }
            function setCookie(name,value){
        // var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + 3600*3);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }
    
    function getCookie(name){
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
        else
        return null;

}
    </script> -->
    <body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden" >
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation" style="background-color:#a6b08e;border-right: 1px solid #dadada">
            <div class="nav-close" ><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element" style="margin-left:40px;">
                        <?php if($rs_users["uImages"] == null): if($rs_users["uSex"] == 1): ?><span><img alt="image" class="img-circle" src="/Public/Default/img/defaultu_1.jpg" width="80" height="80" /></span>
                            <?php else: ?>
                            <span><img alt="image" class="img-circle" src="/Public/Default/img/defaultu_2.jpg" width="80" height="80" /></span><?php endif; ?>
                            <?php else: ?>
                            <span><img alt="image" class="img-circle" src="/<?php echo ($rs_users["uImages"]); ?>" width="80" height="80" /></span><?php endif; ?>
                            
                          <!--
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold" style="color: #ffffff;font-weight: bold;"><?php echo ($uUser); ?></strong></span>
                                <span class="block"> <span style="color: #eaf78f; font-weight: bold;"><?php echo ($vipName); ?></span> <a style="color: #97fabf; margin-right:-110px; font-weight: bold;" href="/LoginTrue/ExitLogin">退出</a></span>
                                </span>
                            -->
                        </div>
                        <div>
                        <span style="margin-left:50px;color: #ffffff;font-weight: bold; text-align: center;"><?php echo ($uUser); ?></span>
                           <br><span style="color: #f3fb97;font-weight: bold; margin-left:20px"><?php echo ($vipName); ?></span><a style="color: #ffffff; font-weight: bold; margin-left:15px;" href="/LoginTrue/ExitLogin">退出登陆</a>
                           </div>
                        <div class="logo-element">栏目
                        </div>
                    </li>
                      <?php if($uState != 0): ?><li>
                        <a href="#">
                            <i class="glyphicon"><img src="/Public/Default/menu/ico/my.png" width="24px" height="24px"></i>
                            <span class="nav-label">我的资料</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/Users/updateuser/uId/<?php echo ($rs_users["uId"]); ?>" data-index="0">修改资料</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/Users/updateuserloginpassword/uId/<?php echo ($rs_users["uId"]); ?>" data-index="0">修改登陆密码</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/Users/updateusersafepassword/uId/<?php echo ($rs_users["uId"]); ?>" data-index="0">修改安全密码</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon"><img src="/Public/Default/menu/ico/tuiguangdt.png" width="24px" height="24px"></i>
                            <span class="nav-label">推广大厅</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">

                        <li>
                                <a class="J_menuItem" href="/Users/useradd/uId/<?php echo ($rs_users["uId"]); ?>">我要推广</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/Users/userslists/uId/<?php echo ($rs_users["uId"]); ?>/stId/0">我的团队</a>
                            </li>
                            <div class="hr-line-dashed"></div>
                             <li><a class="J_menuItem" href="/RegCode/applicationregcode/uId/<?php echo ($rs_users["uId"]); ?>">购买手续费</a></li>
                            <li><a class="J_menuItem" href="/RegCode/reviewcode/at/1">购买记录</a></li>
                            <li><a class="J_menuItem" href="/RegCode/regcodelists/st/2">手续费列表</a></li>
                            
                            <li>
                                <a class="J_menuItem" href="/Users/userslists/uId/<?php echo ($rs_users["uId"]); ?>/stId/2">还未激活的会员</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/Users/userslists/uId/<?php echo ($rs_users["uId"]); ?>/stId/4">还未投资的会员</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/Users/userslists/uId/<?php echo ($rs_users["uId"]); ?>/stId/6">已经投资过的会员</a>
                            </li>
                             <div class="hr-line-dashed"></div>
                     <li><a class="J_menuItem" href="/RegCode/ApplicatpaidanbiCode/uId/<?php echo ($rs_users["uId"]); ?>">购买排单币</a></li>
                            <li><a class="J_menuItem" href="/RegCode/paidanbiwcode/at/1">购买记录</a></li>
                        </ul>

                    </li>   
                          <li>
                        <a href="#">
                            <i class="glyphicon"><img src="/Public/Default/menu/ico/cw.png" width="24px" height="24px"></i>
                            <span class="nav-label">提供援助</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/Assistance/wantinvest/uId/<?php echo ($rs_users["uId"]); ?>">提供援助</a></li>
                            <li><a class="J_menuItem" href="/Assistance/wantinvestlists/uId/<?php echo ($rs_users["uId"]); ?>">提供援助列表</a></li>
                            
                            <li><a class="J_menuItem" href="/Assistance/payinvestlists/uId/<?php echo ($rs_users["uId"]); ?>">待我支付的项目</a></li>
                            
                         
                             
                        </ul>
                    </li>
                      <li>
                        <a href="#">
                            <i class="glyphicon"><img src="/Public/Default/menu/ico/cw.png" width="24px" height="24px"></i>
                            <span class="nav-label">接受援助</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                        
                            <li><a class="J_menuItem" href="/Assistance/wantuninvest/uId/<?php echo ($rs_users["uId"]); ?>">接受援助</a></li>
                             <li><a class="J_menuItem" href="/Assistance/wantuninvestlists/uId/<?php echo ($rs_users["uId"]); ?>">接受援助列表</a></li>
                            
                             <li><a class="J_menuItem" href="/Assistance/unpayinvestlists/uId/<?php echo ($rs_users["uId"]); ?>">待我收款的项目</a></li>
                             
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon"><img src="/Public/Default/menu/ico/cw.png" width="24px" height="24px"></i>
                            <span class="nav-label">交易区</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/Assistance/youXuanQu/uId/<?php echo ($rs_users["uId"]); ?>">优选区</a></li>
                            <li><a class="J_menuItem" href="/Assistance/suiJiQu/uId/<?php echo ($rs_users["uId"]); ?>">随机区</a></li>
                            <li><a class="J_menuItem" href="/Assistance/ziXuanQu/uId/<?php echo ($rs_users["uId"]); ?>">自选区</a></li>
                       
                             
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="glyphicon"><img src="/Public/Default/menu/ico/jy.png" width="24px" height="24px"></i>
                            <span class="nav-label">数据区</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/Finance/index/uId/<?php echo ($rs_users["uId"]); ?>">我的资产</a></li>
                            <li><a class="J_menuItem" href="/Finance/withdrawals/uId/<?php echo ($rs_users["uId"]); ?>">资产提现</a></li>
                            <li><a class="J_menuItem" href="/Finance/moneylogs/uId/<?php echo ($rs_users["uId"]); ?>">财务记录</a></li>

                     <!--        <li><a class="J_menuItem" href="/Finance/xingjilogs/uId/<?php echo ($rs_users["uId"]); ?>">星级记录</a></li>
                            <li><a class="J_menuItem" href="/Finance/zzsxflogs/uId/<?php echo ($rs_users["uId"]); ?>">转账手续费记录</a></li>
                            <li><a class="J_menuItem" href="/Finance/zzjyslogs/uId/<?php echo ($rs_users["uId"]); ?>">转账金钥匙记录</a></li>
                            <li><a class="J_menuItem" href="/Finance/wdlxlogs/uId/<?php echo ($rs_users["uId"]); ?>">我的利息记录</a></li>
                            <li><a class="J_menuItem" href="/Finance/wdtblogs/uId/<?php echo ($rs_users["uId"]); ?>">我的同步记录</a></li>
                            <li><a class="J_menuItem" href="/Finance/dtjllogs/uId/<?php echo ($rs_users["uId"]); ?>">动态奖励记录</a></li>
                            <li><a class="J_menuItem" href="/Finance/scjflogs/uId/<?php echo ($rs_users["uId"]); ?>">商城积分记录</a></li> -->

                            
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa"><img src="/Public/Default/menu/ico/gonggao.png" width="24px" height="24px"></i> <span class="nav-label">留言及公告</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/Books/add">我要留言</a>
                            </li>
                            <li><a class="J_menuItem" href="/Books/lists/st/1">留言记录</a>
                            </li>
                            <!--
                            <li><a class="J_menuItem" href="/Books/lists/st/2">全部留言列表</a>
                            </li>
                            -->
                            <li>
                                <a class="J_menuItem" href="/Announcement/lists">重要公告</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa"><img src="/Public/Default/menu/ico/info.png" width="24px" height="24px"></i> <span class="nav-label">关于平台</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/Article/article">规则说明</a>
                            </li>
                            
                        </ul>
                    </li><?php endif; ?>
                    <?php if($rs_systemName["sVersions"] != ''): ?><li>
                        <a href="#"> <span class="nav-label">程序版本 <?php echo ($rs_systemName["sVersions"]); ?></span></a> 
                    </li><?php endif; ?>




                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize btn" href="#" style="width:190%; height: 50px; font-size: 18px; line-height: 36px; background: #11bcbe; color: #ffffff"><span style="margin-right:6px; font-weight: bold;">菜单</span><i class="fa fa-bars"></i><span style="margin-left:20px; margin-right: 100px; color: #ffffff; font-weight: bold;"><?php echo ($rs_systemName["sName"]); ?></span></a>
                       
                    </div>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft">
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div>
                        <a href="/Member/Index/">会员主页</a>
                    </div>
                </nav>
                
                <a href="/LoginTrue/ExitLogin" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                  <?php if($uState != 0): ?><iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="/Index/welcome/" frameborder="0" data-id="index_v1.html" seamless>
                </iframe>
                <?php else: ?>
                      <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="/Users/SetRegStateHuiYuan/" frameborder="0" data-id="index_v1.html" seamless>
                </iframe><?php endif; ?>
            </div>
            <div class="footer">
                <div class="pull-right J_iframe" name="iframe0" frameborder="0" data-id="index.html" seamless><span style="margin-right:40px; color: #00bb9c;"><img src="/Public/Default/ico/online.png" width="20" height="20"> 当前在线人数：<?php echo ($online); ?> 人</span><a href="/Member/Index/index.html" ><img src="/Public/Default/ico/back.png" width="20" height="20"> <span style="color: #00bb9c; font-weight: bold;">返回首页</span></a>
                </div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active">
                        <a data-toggle="tab" href="#tab-1">
                            <i class="fa fa-gear"></i> 主题
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                            <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                        </div>
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>
                            <div class="setings-item">
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="title">皮肤选择</div>
                            <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--右侧边栏结束-->
       
    </div>
    <script src="/Public/Default/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Default/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Default/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/Default/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/Default/js/plugins/layer/layer.min.js"></script>
    <script src="/Public/Default/js/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="/Public/Default/js/contabs.min.js"></script>
    <script src="/Public/Default/js/plugins/pace/pace.min.js"></script>
 
</body>

</html>