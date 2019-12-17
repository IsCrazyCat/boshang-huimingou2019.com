<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会员列表</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/Public/Default/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>会员列表 <small><a href="/System/Users/useradd">添加会员</a></small></h5>
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
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span class="dropdown hidden-xs">会员</span>账号</th>
                                    <th class="dropdown hidden-xs">姓名</th>
                                    <th>姓别</th>
                                    <th class="dropdown hidden-xs">手机</th>
                                    <th class="dropdown hidden-xs">本金</th>
                                    <th class="dropdown hidden-xs">可提本金</th>
                                    <th class="dropdown hidden-xs">总利息</th>
                                    <th class="dropdown hidden-xs">当前利息</th>
                                    <th class="dropdown hidden-xs">奖金</th>
                                    <th class="dropdown hidden-xs">签到次数</th>
                                    <th class="dropdown hidden-xs">等级</th>
                                    <th class="dropdown hidden-xs">推荐人</th>
                                    <th class="dropdown hidden-xs">注册时间</th>
                                    <th class="dropdown hidden-xs">激活</th>
                                    <th class="dropdown hidden-xs">账户</th>
                                    <th class="dropdown hidden-xs">登陆</th>
                                    <th class="dropdown hidden-xs">安全</th>
                                    <th class="dropdown hidden-xs">投资</th>
                                    <th class="dropdown hidden-xs">登陆</th>
                                    <th class="dropdown hidden-xs">在线</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($rs_users)): $i = 0; $__LIST__ = $rs_users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_users): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                    <td><?php echo ($val_users["uId"]); ?></td>
                                    <td><?php echo ($val_users["uUser"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_users["uName"]); ?></td>
                                    <?php if($val_users["uSex"] == 1): ?><td>男</td>
                                    <?php else: ?>
                                    <td>女</td><?php endif; ?>
                                    <td class="dropdown hidden-xs"><?php echo ($val_users["uTel"]); ?></td>
                                    
                                    <?php $uId=$val_users["uId"]; $users_invest=M("users_invest"); $users_uninvest=M("users_uninvest"); $rs_invest=$users_invest->where("uiUid={$uId} AND uiSuccess=1")->sum("uiUJiner"); $rs_uninvest=$users_uninvest->where("uuniUid={$uId} AND uuniSuccess=1 AND uunYuanzhuType=0")->sum("uuniJiner"); $benjin=$rs_invest-$rs_uninvest; $rs_tixianbenjin=$users_invest->where("uiUid={$uId} AND uiTouziEnd=1 AND uiunShenqing=0")->sum("uiUJiner"); if($rs_tixianbenjin==null){ $rs_tixianbenjin=0; } $tzlixi=$val_users["uNowLixi"]; $pdlixi=$val_users["uPDLixi"]; $uNowLixi=$tzlixi+$pdlixi; $alltzlixi=$val_users["uLixi"]; $allpdlixi=$val_users["uPDLixiMax"]; $alllixi=$alltzlixi+$allpdlixi; ?> 
                                    <td class="dropdown hidden-xs"><?php echo ($benjin); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($rs_tixianbenjin); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($alllixi); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($uNowLixi); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_users["uJiangjin"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_users["uQiandaoNum"]); ?> 次</td>
                                    <?php $uVip=$val_users["uVip"]; if($uVip==0){ if($val_users["uId"]==1){ $dengji="<span style='color:#ff0000'>超级会员</span>"; }else{ $dengji="注册会员"; } }else{ $reggrades=M("reggrades"); $rs_vip=$reggrades->where("rgId={$uVip}")->find(); $dengji=$rs_vip["rgName"]; } ?>
                                    <td class="dropdown hidden-xs"><?php echo ($dengji); ?></td>
                                    <?php $users=M("users"); $uTuiId=$val_users["uTuiId"]; if($uTuiId==0){ $tuijianren="<span style='color:#ff0000'>超级会员</span>"; }else{ $rs_tuijianUsers=$users->where("uId={$uTuiId}")->find(); $tuijianren=$rs_tuijianUsers["uName"]; } ?>
                                    <td class="dropdown hidden-xs"><?php echo ($tuijianren); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_users["uRegDate"]); ?></td>
                                    <?php if($val_users["uState"] == 0): ?><td class="dropdown hidden-xs"><a class="btn btn-default btn-rounded btn-xs" href="/System/Users/setregstate/uId/<?php echo ($val_users["uId"]); ?>">未激活</a></td>
                                   
                                    <?php else: ?>
                                    <td class="dropdown hidden-xs"><a class="btn btn-primary btn-rounded btn-xs" >已激活</a></td><?php endif; ?>

                                    <?php if($val_users["uLock"] == 0): ?><td class="dropdown hidden-xs"><a class="btn btn-warning btn-rounded btn-xs" href="/System/Users/SetLock/uId/<?php echo ($val_users["uId"]); ?>/lock/-1">锁定</a></td>
                                   
                                    <?php elseif($val_users["uLock"] == 1): ?>
                                    <td class="dropdown hidden-xs"><a class="btn btn-info btn-rounded btn-xs" href="/System/Users/SetLock/uId/<?php echo ($val_users["uId"]); ?>/lock/0">正常</a></td>
                                    <?php elseif($val_users["uLock"] == -1): ?>
                                    <td class="dropdown hidden-xs"><a class="btn btn-danger btn-rounded btn-xs" href="/System/Users/SetLock/uId/<?php echo ($val_users["uId"]); ?>/lock/1">封号</a></td><?php endif; ?>
                                    <?php if($val_users["uErrorPwdNum"] < $loginerrnum): ?><td class="dropdown hidden-xs"><a class="btn btn-info btn-rounded btn-xs">正常</a></td>
                                    <?php else: ?>
                                    <td class="dropdown hidden-xs"><a class="btn btn-danger btn-rounded btn-xs" href="/System/Users/QixiaoLLock/uId/<?php echo ($val_users["uId"]); ?>">系统锁定</a></td><?php endif; ?>

                                    <?php if($val_users["uZFErrorPwdNum"] < $zhifuerrnum): ?><td class="dropdown hidden-xs"><a class="btn btn-info btn-rounded btn-xs" >正常</a></td>
                                    <?php else: ?>
                                    <td class="dropdown hidden-xs"><a class="btn btn-danger btn-rounded btn-xs" href="/System/Users/QixaoZFLock/uId/<?php echo ($val_users["uId"]); ?>">系统锁定</a></td><?php endif; ?>
                                    <?php if($val_users["uTouziNum"] == 0): ?><td style="color: #ff0000"><?php echo ($val_users["uTouziNum"]); ?> 次</td>
                                    <?php else: ?>
                                    <td><?php echo ($val_users["uTouziNum"]); ?> 次</td><?php endif; ?>
                                    <?php if($val_users["uLoginNum"] == 0): ?><td style="color: #ff0000"><?php echo ($val_users["uLoginNum"]); ?> 次</td>
                                    <?php else: ?>
                                    <td><?php echo ($val_users["uLoginNum"]); ?> 次</td><?php endif; ?>
                                    <?php if($val_users["uOnline"] == 1): ?><td style="color:#00c39d; font-weight: bold">在线</td>
                                    <?php else: ?>
                                    <td style="color:#a7a7a7">离线</td><?php endif; ?>
                                   
                                    <td>
                                    <!--
                                    <a href="<?php echo ($QtURL); ?>/login/CheckLogin/htdl/1/htdlId/<?php echo ($val_users["uId"]); ?>" target="_bank">登录</a> | 
                                    -->

                                    <a href="/System/Users/updateuser/uId/<?php echo ($val_users["uId"]); ?>">修改</a>
                                    
                                    <!--
                                    <?php if($val_users["uId"] != 1): ?>| 
                                     <a href="/System/Users/DelUsers/uId/<?php echo ($val_users["uId"]); ?>">删除</a></td><?php endif; ?>
                                     -->
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>    
                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/Default/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Default/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Default/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/Public/Default/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/Public/Default/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/Public/Default/js/content.min.js?v=1.0.0"></script>
    <script>
        $(document).ready(function(){$(".dataTables-example").dataTable();var oTable=$("#editable").dataTable();oTable.$("td").editable("../example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
    </script>

</body>

</html>