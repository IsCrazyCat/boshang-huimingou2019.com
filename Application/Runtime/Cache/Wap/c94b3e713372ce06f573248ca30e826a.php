<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>我的商城积分记录</title>

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
                    <h5><a style="color:#00bb9c;margin-right:5px;" href="/Wap/Finance/moneylogs/uId/<?php echo ($usersuId); ?>">商城积分记录</a> <small><a style="color:#ff0000;" href="/Wap/Finance/index/uId/<?php echo ($usersuId); ?>">我的资产</a></small></h5>
                    <div class="ibox-tools">

                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th class="dropdown hidden-xs">ID</th>
                            <th class="dropdown hidden-xs">业务流水号</th>
                            <th >财务类型</th>
                            <th class="dropdown hidden-xs">收入类型</th>
                            <th >金额</th>
                            <th class="dropdown hidden-xs">操作类型</th>
                            <th class="dropdown hidden-xs">处理状态</th>
                            <th >处理说明</th>
                            <th >记录时间</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($rs_mlog)): $i = 0; $__LIST__ = $rs_mlog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_mlog): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                <td class="dropdown hidden-xs"><?php echo ($val_mlog["mlId"]); ?></td>
                                <td class="dropdown hidden-xs"><?php echo ($val_mlog["mlRandNumber"]); ?></td>
                                <?php if($val_mlog["mlMoneyType"] == 1): ?><td style="color:#e04b32">本金</td>
                                    <?php elseif($val_mlog["mlMoneyType"] == 2): ?>
                                    <td style="color:#49a862">利息</td>
                                    <?php elseif($val_mlog["mlMoneyType"] == 3): ?>
                                    <td style="color:#e18003">奖金</td>
                                    <?php elseif($val_mlog["mlMoneyType"] == 4): ?>
                                    <td style="color:#f651cd">动态收益</td>
                                    <?php elseif($val_mlog["mlMoneyType"] == 5): ?>
                                    <td style="color:#f651cd">积分收益</td>
                                    <?php elseif($val_mlog["mlMoneyType"] == 6): ?>
                                    <td style="color:#f651cd">同步钱包</td><?php endif; ?>
                                <?php if($val_mlog["mlPorM"] == 1): ?><td class="dropdown hidden-xs" style="color:#2818f9" >增加</td>
                                    <td style="color:#2818f9">+ <?php echo ($val_mlog["mlJiner"]); ?></td>
                                    <?php elseif($val_mlog["mlPorM"] == 2): ?>
                                    <td class="dropdown hidden-xs"  style="color:#ff0000">减少</td>
                                    <td style="color:#ff0000">- <?php echo ($val_mlog["mlJiner"]); ?></td>
                                    <?php elseif($val_mlog["mlPorM"] == 3): ?>
                                    <td class="dropdown hidden-xs"  style="color:#d304f9">扣除</td>
                                    <td style="color:#d304f9">- <?php echo ($val_mlog["mlJiner"]); ?></td>
                                    <?php elseif($val_mlog["mlPorM"] == 4): ?>
                                    <td class="dropdown hidden-xs"  style="color:#02b895">赠送</td>
                                    <td style="color:#02b895">+ <?php echo ($val_mlog["mlJiner"]); ?></td>
                                    <?php elseif($val_mlog["mlPorM"] == 5): ?>
                                    <td class="dropdown hidden-xs"  style="color:#2d9bd4">流入</td>
                                    <td style="color:#2d9bd4"> <?php echo ($val_mlog["mlJiner"]); ?></td>
                                    <?php elseif($val_mlog["mlPorM"] == 6): ?>
                                    <td class="dropdown hidden-xs"  style="color:#ea6be6">流出</td>
                                    <td style="color:#ea6be6"> <?php echo ($val_mlog["mlJiner"]); ?></td><?php endif; ?>
                                <?php if($val_mlog["mlPorC"] == 1): ?><td  class="dropdown hidden-xs">系统操作</td>
                                    <?php else: ?>
                                    <td  class="dropdown hidden-xs">人工操作</td><?php endif; ?>
                                <?php if($val_mlog["mlSuccess"] == 1): ?><td class="dropdown hidden-xs">成功</td>
                                    <?php else: ?>
                                    <td class="dropdown hidden-xs" style="color:#ff0000">失败</td><?php endif; ?>
                                <td ><?php echo ($val_mlog["mlInfo"]); ?></td>
                                <td ><?php echo ($val_mlog["mlDate"]); ?></td>
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