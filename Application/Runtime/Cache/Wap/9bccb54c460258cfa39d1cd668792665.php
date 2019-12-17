<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>我的接受援助列表</title>

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
                        <h5><a style="color:#00bb9c; margin-right:5px;" href="/Wap/Assistance/wantuninvestlists/uId/<?php echo ($rs_users["uId"]); ?>">接受援助列表</a> <small><a style="color:#ff0000;" href="/Wap/Assistance/wantuninvest/uId/<?php echo ($rs_users["uId"]); ?>">我想接受援助</a></small></h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <!--
                                    <th>ID</th>
                                -->
                                    <th class="dropdown hidden-xs">接受援助账户</th>
                                    <th class="dropdown hidden-xs">收款账户（支付宝）</th>
                                    <th >接受援助金额</th>
                                    
                                    <th >提交时间</th>
                                    <th >状态</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($rs_invest)): $i = 0; $__LIST__ = $rs_invest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_invest): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                <!--
                                    <td><?php echo ($val_invest["uuniId"]); ?></td>
                                -->
                                    <td class="dropdown hidden-xs"><?php echo ($rs_users["uUser"]); ?></td>
                                    <td class="dropdown hidden-xs"><a href="/Wap/Assistance/showyespayimg/uuniId/<?php echo ($val_invest["uuniId"]); ?>"><?php echo ($rs_users["uZhifubao"]); ?></a></td>
                                    <td ><?php echo ($val_invest["uuniJiner"]); ?></td>
                                    

                                    <td ><?php echo ($val_invest["uuniDate"]); ?></td>
                                    
                                    <?php if($val_invest["uuniState"] == 0): ?><td ><a class="btn btn-default btn-rounded btn-xs">等待匹配</a></td>
                                    <?php elseif($val_invest["uuniState"] == 1 AND $val_invest["uuniPay"] == 0): ?>
                                        <td ><a class="btn btn-warning btn-rounded btn-xs" href="/Wap/Assistance/showuserinfo/uId/<?php echo ($val_invest["uuniJiuyuanUid"]); ?>">等待收款</a></td>
                                    <?php elseif($val_invest["uuniState"] == 1 AND $val_invest["uuniPay"] == 1 AND $val_invest["uuniSuccess"] == 0): ?>
                                    
                                        <?php $users_parameters=M("users_parameters"); $fukuanqx=$users_parameters->where("upId=1")->field("upCollectionPeriod")->find(); $start=strtotime(($val_invest["uuniPayDate"])); $stepend=$fukuanqx["upCollectionPeriod"]*3600; $nowtime=strtotime(date("Y-m-d H:i:s")); $shengyu=round(((($start+$stepend)-$nowtime)/3600),1); if($shengyu<1){ $fenzhong=floor((($start+$stepend)-$nowtime)/60); } ?>



                                        <?php if($fenzhong < 0 AND $shengyu < 1): ?><td><a class="btn btn-danger btn-rounded btn-outline btn-xs">确认收款已过期</a></td>
                                        <?php else: ?>

                                        <td><a class="btn btn-danger btn-rounded btn-xs" href="/Wap/Assistance/yesunpayinvest/uuniId/<?php echo ($val_invest["uuniId"]); ?>">待我收款</a></td><?php endif; ?>

                                    <?php elseif($val_invest["uuniState"] == 1 AND $val_invest["uuniPay"] == 1 AND $val_invest["uuniSuccess"] == 1): ?>
                                    <td ><a class="btn btn-primary btn-rounded btn-xs" href="#">项目完成</a></td><?php endif; ?>
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

    <script>
        var $parentNode = window.parent.document;
        if ($(".tooltip-demo").tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        }), $(".modal").appendTo("body"), $("[data-toggle=popover]").popover(), $(".collapse-link").click(function () {
            var o = $(this).closest("div.ibox"),
                e = $(this).find("i"),
                i = o.find("div.ibox-content");
            i.slideToggle(200),
                e.toggleClass("fa-chevron-up").toggleClass("fa-chevron-down"),
                o.toggleClass("").toggleClass("border-bottom"),
                setTimeout(function () {
                        o.resize(),
                            o.find("[id^=map-]").resize()
                    },
                    50)
        }), $(".close-link").click(function () {
            var o = $(this).closest("div.ibox");
            o.remove()
        }), top == this) {
            //update lishibo by 20190308
            var gohome = '<div class="gohome"><a class="animated bounceInUp" href="http://huimingou.com/wap/index" title="返回首页"><i class="fa fa-home"></i></a></div>';
            $("body").append(gohome)
        }
    </script>
</body>

</html>