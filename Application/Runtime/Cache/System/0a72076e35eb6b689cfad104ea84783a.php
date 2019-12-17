<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--<title><?php echo ($rs_systemName["sName"]); ?>-主页</title>-->
        <title>CFht主页</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style2.min.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation" style="background-color:#519abc;border-right: 0px solid #ffffff">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                        <?php if($rs_admin["aImages"] == null): if($rs_admin["aSex"] == 1): ?><span><img alt="image" class="img-circle" src="/Public/Default/img/default_1.jpg" width="80" height="80" /></span>
                            <?php else: ?>
                            <span><img alt="image" class="img-circle" src="/Public/Default/img/default_2.jpg" width="80" height="80" /></span><?php endif; ?>
                            <?php else: ?>
                        <span><img alt="image" class="img-circle" src="/<?php echo ($rs_admin["aImages"]); ?>" width="80" height="80" /></span><?php endif; ?>
                            
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo ($aUser); ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo ($powersName); ?><b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="/system/Admin/oneupdate/aId/<?php echo ($rs_admin["aId"]); ?>/oneId/1">修改资料</a>
                                </li>
                                
                                <li class="divider"></li>
                                <li><a href="/LoginTrue/ExitLogin">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">主页
                        </div>
                    </li>

                    <?php if($aPowers == 0 ): ?><li>
                        <a href="#">
                           
                            <span class="nav-label" style="margin-left: 20px;">系统管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/system/System/set" data-index="0">系统配置</a>
                            </li>
                            <li style="display: none"><a class="J_menuItem" href="/system/Finance/setmoney">规则管理</a></li>
                            
                            <li>
                            <a class="J_menuItem" href="/system/Users/setparameters">会员参数</a></li>
                            <li>
                            

                            <li style="display: none">
                            <a class="J_menuItem" href="/system/Users/userstouzidata">投资数据</a>
                            </li>

                            <li style="display: none">
                                <a class="J_menuItem" href="/system/Bak/index">数据库管理</a>
                            </li>
                            
                            
                            <li style="display: none">
                                <a class="J_menuItem" href="/system/Admin/add">添加管理员</a>
                            </li>
                            <li style="display: none">
                                <a class="J_menuItem" href="/system/Admin/lists">管理员列表</a>
                            </li>

                            <li>
                                <a class="J_menuItem" href="/system/System/systemlog" data-index="0">系统日志</a>
                            </li>
                            
                            <li>
                                <a class="J_menuItem" href="/system/System/info" data-index="0">系统简介</a>
                            </li>
                            
                        </ul>

                    </li><?php endif; ?>
                    <?php if($aPowers == 0 OR $aPowers == 1 ): ?><li>
                        <a href="#"><span class="nav-label" style="margin-left: 20px;">会员中心</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        
                            <li style="display: none">
                                <a href="#">等级系列 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="/system/Users/addreggrades">添加等级</a></li>
                                    <li><a class="J_menuItem" href="/system/Users/reggradeslists">等级列表</a></li>
                                </ul>
                            </li>
                        
                            
                                    <li><a class="J_menuItem" href="/system/Users/useradd">添加会员</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/system/Users/userslists">会员列表</a>
                                    </li>

                        </ul>
                    </li>

                     <li>
                        <a href="#"><span class="nav-label" style="margin-left: 20px;">激活码中心</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                                    <li style="display: none"><a class="J_menuItem" href="/system/Users/reviewcode">发放审核</a></li>
                                    <li><a class="J_menuItem" href="/system/Users/givecode">直接发放</a></li>
                                    <li style="display: none"><a class="J_menuItem" href="/system/Users/regcodelists/st/2">激活码列表</a></li>
                                    <li style="display: none"><a class="J_menuItem" href="/system/Users/regcodelists/st/0">未使用手续费</a></li>
                                    <li style="display: none"><a class="J_menuItem" href="/system/Users/regcodelists/st/1">已使用手续费</a></li>
                         </ul>
                    </li>
   <li>
                        <a href="#"><span class="nav-label" style="margin-left: 20px;">手续费中心</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                                    <li><a class="J_menuItem" href="/system/Users/paidanbicode">发放审核</a></li>
                              <li><a class="J_menuItem" href="/system/Users/givebaodanbiCode">直接发放</a></li>          
                         </ul>
                    </li><?php endif; ?>
                    <li>
                        <a href="#">
                           
                            <span class="nav-label" style="margin-left: 20px;">交易大厅</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                           
                            <li><a class="J_menuItem" href="/system/Assistance/wantinvestlists">未匹配提供援助列表</a></li>
                            <li><a class="J_menuItem" href="/system/Assistance/wantuninvestlists">未匹配接受援助列表</a></li>
                            <li><a class="J_menuItem" href="/system/Assistance/payinvestlists">全部提供援助</a></li>
                            <li><a class="J_menuItem" href="/system/Assistance/unpayinvestlists">全部接受援助</a></li>

                        </ul>
                    </li>
                    <?php if($aPowers == 0 OR $aPowers == 1 ): ?><li>
                        <a href="#">
                            
                            <span class="nav-label" style="margin-left: 20px;">虚拟中心</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">                       
                            <li><a class="J_menuItem" href="/system/Assistance/addinvest">添加提供援助项目</a></li>
                            <li><a class="J_menuItem" href="/system/Assistance/adduninvest">添加接受援助项目</a></li>
                        </ul>
                    </li><?php endif; ?>

                    <li>
                        <a href="#">
                            
                            <span class="nav-label" style="margin-left: 20px;">财务管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/system/Finance/allmoneylogs">财务流水</a></li>
                            <li><a class="J_menuItem" href="/system/Statistics/yewu">业务统计</a></li>
                            <li><a class="J_menuItem" href="/system/Statistics/caiwu">财务统计</a></li>
                            <li><a class="J_menuItem" href="/system/Statistics/zonghe">综合统计</a></li>
                            
                        </ul>
                    </li>

                     <li>
                        <a href="#">
                            <span class="nav-label" style="margin-left: 20px;">公告管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/system/Announcement/add">添加公告</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/system/Announcement/lists">查看公告</a>
                            </li>
                        </ul>
                    </li>

                    
                    <li>
                        <a href="#"><span class="nav-label" style="margin-left: 20px;">留言管理</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/system/Books/lists/st/0">审核留言</a>
                            </li>
                            <li><a class="J_menuItem" href="/system/Books/lists/st/1">留言列表</a>
                            </li>
                        </ul>
                    </li>
                    
                    <?php if($rs_systemName["sXuanchanMenu"] == 1): ?><li>
                        <a href="#"><span class="nav-label" style="margin-left: 20px;">宣传网管理</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li style="display: none"><a class="J_menuItem" href="/system/Zccfset/set">网站配置</a>
                            </li>
                            <li style="display: none"><a class="J_menuItem" href="/system/Zccfset/dataset">数据配置</a>
                            </li>
                            <li style="display: none"><a class="J_menuItem" href="/system/Zccfset/focusmapadd">添加焦点图</a>
                            </li>
                            <li><a class="J_menuItem" href="/system/Zccfset/focusmap">焦点图管理</a>
                            </li>
                            <li style="display: none"><a class="J_menuItem" href="/system/Zccfset/info">玩法规则</a>
                            </li>
                            <li style="display: none"><a class="J_menuItem" href="/system/Zccfset/lianxi">联系我们</a>
                            </li>
                        </ul>
                    </li><?php endif; ?>
                    
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize btn" href="#" style="width:190%; height: 50px; font-size: 18px; line-height: 36px; background: #f6f6f6; color: #7f7f7f"><i class="fa fa-bars"></i><span style="margin-left:20px; margin-right: 100px; color: #7f7f7f; font-weight: bold;"><?php echo ($rs_systemName["sName"]); ?></span> </a>
                       
                    </div>
                    
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 主题
                            </a>
                        </li>
                    </ul>
                    
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft">
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div>
                        <a href="/System/Index/">系统主页</a>
                    </div>
                </nav>
                
                <a href="/LoginTrue/ExitLogin" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>

            <div class="row J_mainContent" id="content-main" style="background:#d7f2ff;" >
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="/system/index/welcome" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>

            <div class="footer" style="background:#d7f2ff"  >
                <div class="pull-right" >
                <?php if($rs_systemName["sVersions"] != ''): ?><span style="margin-right: 20px;">版本 <?php echo ($rs_systemName["sVersions"]); ?></span><?php endif; ?>
                <?php if($users_online == 0): ?>当前暂无会员在线
                <?php elseif($users_online > 0 AND $users_online < 5): ?>
                <span style="color: #00bb9c">当前人气较弱，共有 <span style="color: #ff0000"> <?php echo ($users_online); ?> </span> 人 在线</span>
                <?php elseif($users_online > 5 AND $users_online < 15): ?>
                <span style="color: #00bb9c">当前人气一般，共有 <?php echo ($users_online); ?> 人 在线</span>
                <?php elseif($users_online > 15 AND $users_online < 50): ?>
                <span style="color: #ff0000">当前人气较旺，共有 <{$users_online} 人 在线</span>
                <?php elseif($users_online > 50 AND $users_online < 100): ?>
                <span style="color: #ff0000">当前人气很旺，共有 <{$users_online} 人 在线</span>
                <?php elseif($users_online > 100): ?>
                <span style="color: #ff0000; font-weight: bold">当前人气非常旺，请维护好网站，共有 <{$users_online} 人 在线</span><?php endif; ?>
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