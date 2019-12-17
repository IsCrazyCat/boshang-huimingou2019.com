<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>待匹配的接受援助列表</title>

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
                        <h5>接受援助待匹配列表 <small></small></h5>
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
                                    <th>接受援助账户</th>
                                    <th>接受援助姓名</th>
                                    <th>接受援助电话</th>
                                    <th class="dropdown hidden-xs">收款账户（支付宝）</th>
                                    <th class="dropdown hidden-xs">接受援助金额</th>
                                    <th class="dropdown hidden-xs">提交时间</th>
                                    <th class="dropdown hidden-xs">匹配操作</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($rs_invest)): $i = 0; $__LIST__ = $rs_invest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_invest): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                    <td><?php echo ($val_invest["uuniId"]); ?></td>
                                    <?php $uId=$val_invest["uuniUid"]; $users=M("users"); $rs_users=$users->where("uId={$uId}")->field("uUser,uName,uZhifubao,uTel")->find(); ?>
                                    <td><?php echo ($rs_users["uUser"]); ?></td>
                                    <td><?php echo ($rs_users["uName"]); ?></td>
                                    <td><?php echo ($rs_users["uTel"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($rs_users["uZhifubao"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_invest["uuniJiner"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_invest["uuniDate"]); ?></td>
                                    <td class="dropdown hidden-xs"><a class="btn btn-default btn-rounded btn-xs" style="margin-top: 5px;" >等待匹配</a></td>
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