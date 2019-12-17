<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>我的提供援助列表</title>

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
                        <h5><a style="color:#00bb9c; margin-right:5px;" href="/Member/Assistance/wantinvestlists/uId/<?php echo ($rs_users["uId"]); ?>">我的提供援助列表</a><small><a style="color:#ff0000;" href="/Member/Assistance/wantinvest/uId/<?php echo ($rs_users["uId"]); ?>">我要援助</a></small></h5>
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
                                    <th class="dropdown hidden-xs">提供援助账户</th>
                                    <th class="dropdown hidden-xs">支付账户（支付宝）</th>
                                    <th>提供援助金额</th>
                                    <th >提交时间</th>
                                    <th>状态</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($rs_invest)): $i = 0; $__LIST__ = $rs_invest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_invest): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                <!--
                                    <td><?php echo ($val_invest["uiId"]); ?></td>
                                -->
                                    <td class="dropdown hidden-xs"><?php echo ($rs_users["uUser"]); ?></td>
                                    <td class="dropdown hidden-xs"><a href="/Member/Assistance/showpayimg/uiId/<?php echo ($val_invest["uiId"]); ?>"><?php echo ($rs_users["uZhifubao"]); ?></a></td>
                                    <td><?php echo ($val_invest["uiUJiner"]); ?></td>
                                    <td ><?php echo ($val_invest["uiDate"]); ?></td>
                                    <?php if($val_invest["uiState"] == 0): ?><td><a class="btn btn-default btn-rounded btn-xs">等待排单</a></td>
                                    <?php elseif($val_invest["uiState"] == 1 AND $val_invest["uiZhifu"] == 0): ?>

                                    <?php $users_parameters=M("users_parameters"); $fukuanqx=$users_parameters->where("upId=1")->field("upPaymentPeriod")->find(); $start=strtotime(($val_invest["uiStateDate"])); $stepend=$fukuanqx["upPaymentPeriod"]*3600; $nowtime=strtotime(date("Y-m-d H:i:s")); $shengyu=round(((($start+$stepend)-$nowtime)/3600),1); if($shengyu<1){ $fenzhong=floor((($start+$stepend)-$nowtime)/60); } ?>

                                        <?php if($fenzhong < 0 AND $shengyu < 1): ?><td><a class="btn btn-danger btn-rounded btn-outline btn-xs">打款期限已过</a></td>
                                            <?php else: ?>

                                            <td><a class="btn btn-danger btn-rounded btn-xs"
                                                   href="/Member/Assistance/yespayinvest/uiId/<?php echo ($val_invest["uiId"]); ?>">待我打款</a><br/>
                                                <span style="color:#06b6b0; font-weight: bold;" id="shi">00时</span>
                                                <span style="color:#06b6b0; font-weight: bold;" id="fen">00分</span>
                                                <span style="color:#06b6b0; font-weight: bold;" id="miao">00秒</span>
                                            </td>
                                            <?php $paUsers=M("users_parameters"); $paramenters=$paUsers->where("upId=1")->find(); $jixiaoshinei = $paramenters['jixiaoshinei']; $uuniStateDate=$val_invest["uiStateDate"]; $daojishi=date("Y/m/d H:i:s",strtotime($uuniStateDate)+$jixiaoshinei*3600); ?>
                                            <script>
                                                function GetRTime1(){
                                                    var EndTime= new Date('<?php echo ($daojishi); ?>');
                                                    var NowTime = new Date();
                                                    var t =EndTime.getTime() - NowTime.getTime();
                                                    if(t<=0){
                                                        clearInterval(dwfk)
                                                    }else{
                                                        var d=Math.floor(t/1000/60/60/24);
                                                        var h=Math.floor(t/1000/60/60%24);
                                                        var m=Math.floor(t/1000/60%60);
                                                        var s=Math.floor(t/1000%60);

                                                        if(document.getElementById("shi").innerHTML !== (h + "时")){
                                                            document.getElementById("shi").innerHTML = h + "时";
                                                        }
                                                        if(document.getElementById("fen").innerHTML !== (m + "分")){
                                                            document.getElementById("fen").innerHTML = m + "分";
                                                        }
                                                        document.getElementById("miao").innerHTML = s + "秒";
                                                    }

                                                }
                                                var dwfk = setInterval(GetRTime1,1000);
                                            </script><?php endif; ?>

                                    <?php elseif($val_invest["uiState"] == 1 AND $val_invest["uiZhifu"] == 1 AND $val_invest["uiSuccess"] == 0): ?>
                                    <?php $uId=$val_invest["uiBeijiuyuanUid"]; ?>
                                        <td><a class="btn btn-warning btn-rounded btn-xs" href="/Member/Assistance/showunuserinfo/unuserId/<?php echo ($uId); ?>">待对方收款</a></td>


                                    <?php elseif($val_invest["uiState"] == 1 AND $val_invest["uiZhifu"] == 1 AND $val_invest["uiSuccess"] == 1 AND $val_invest["uiTouziEnd"] == 0): ?>
                                        <td><a class="btn btn-info btn-rounded btn-xs" href="#">进行中</a></td>

                                    <?php elseif($val_invest["uiState"] == 1 AND $val_invest["uiZhifu"] == 1 AND $val_invest["uiSuccess"] == 1 AND $val_invest["uiTouziEnd"] == 1 AND $val_invest["uiunShenqing"] == 0): ?>
                                        <td><a class="btn btn-primary btn-rounded btn-xs" href="#">已经完成</a></td><?php endif; ?>
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
        }), $(".modal").appendTo("body"), $("[data-toggle=popover]").popover(), $(".collapse-link").click(function() {
            var o = $(this).closest("div.ibox"),
                e = $(this).find("i"),
                i = o.find("div.ibox-content");
            i.slideToggle(200),
                e.toggleClass("fa-chevron-up").toggleClass("fa-chevron-down"),
                o.toggleClass("").toggleClass("border-bottom"),
                setTimeout(function() {
                        o.resize(),
                            o.find("[id^=map-]").resize()
                    },
                    50)
        }), $(".close-link").click(function() {
            var o = $(this).closest("div.ibox");
            o.remove()
        }), top == this) {
            //update lishibo by 20190308
            var gohome = '<div class="gohome"><a class="animated bounceInUp" href="http://huimingou.com/wap/Users/zhucechushi/uId/<?php echo ($fuid); ?>" title="返回首页"><i class="fa fa-home"></i></a></div>';
            $("body").append(gohome)
        }
    </script>
</body>

</html>