<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>配置会员参数</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Default/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Default/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Default/css/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>配置会员参数 </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>

                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="/System/Users/SetParametersAction" class="form-horizontal"
                          id="form-admin-add">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">排队利息开关</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upPDLXONorOFF"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upPDLXONorOFF" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upPDLXONorOFF"> 关闭</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upPDLXONorOFF"> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upPDLXONorOFF" checked> 关闭</label><?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">待匹配利息天数</label>
                            <div class="col-sm-10">
                                <input type="number" name="upPDLXDay" value="<?php echo ($rs_parameters["upPDLXDay"]); ?>"
                                       id="upPDLXDay" placeholder="排队计息天数" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">利息分配周期</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upLixiAllOrDay"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upLixiAllOrDay" checked> 一次性</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="2" name="upLixiAllOrDay"> 按天发</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upLixiAllOrDay"> 一次性</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="2" name="upLixiAllOrDay" checked> 按天发</label><?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">利率分配选择</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upLXType"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upLXType" checked> 按固定</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upLXType"> 按浮动</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upLXType"> 按固定</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upLXType" checked> 按浮动</label><?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">投资金额模式</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upTypeInvestment"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upTypeInvestment" checked> 按预设</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upTypeInvestment"> 按倍数</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upTypeInvestment"> 按预设</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upTypeInvestment" checked> 按倍数</label><?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">会员投资倍数</label>
                            <div class="col-sm-10">
                                <input type="number" name="upTZMultiples" value="<?php echo ($rs_parameters["upTZMultiples"]); ?>"
                                       id="upTZMultiples" placeholder="请输入正整数的倍数，当且仅当开启按倍数投资才有效" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label class="col-sm-2 control-label">会员最多投资金额（元）</label> -->
                            <label class="col-sm-2 control-label">最高排单上限额度（元）</label>
                            <div class="col-sm-10">
                                <input type="number" name="upMaxMoney" step="<?php echo ($rs_parameters["upMultiples"]); ?>"
                                       value="<?php echo ($rs_parameters["upMaxMoney"]); ?>" id="upMaxMoney"
                                       placeholder="请输入正整数 （单位 元），当且仅当开启按倍数投资才有效" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">基准利率固定值</label>
                            <div class="col-sm-10">
                                <input type="text" name="upGuDingLX" value="<?php echo ($rs_parameters["upGuDingLX"]); ?>"
                                       id="upGuDingLX" placeholder="输入整数或小数或百分数" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">投资的期限（天）</label>
                            <div class="col-sm-10">
                                <input type="number" name="upTermOfInvestment"
                                       value="<?php echo ($rs_parameters["upTermOfInvestment"]); ?>" id="upTermOfInvestment"
                                       placeholder="请输入正整数（单位 天）" class="form-control">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">匹配后付款期限（小时）</label>
                            <div class="col-sm-10">
                                <input type="number" name="upPaymentPeriod" value="<?php echo ($rs_parameters["upPaymentPeriod"]); ?>"
                                       id="upPaymentPeriod" placeholder="请输入正整数 （单位 小时）" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">在几小时内完成打款（小时）</label>
                            <div class="col-sm-10">
                                <input type="number" name="jixiaoshinei" value="<?php echo ($rs_parameters["jixiaoshinei"]); ?>"
                                       id="jixiaoshinei" placeholder="请输入正整数 （单位 小时）" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">在几小时(内)完成打款静态收益</label>
                            <div class="col-sm-10">
                                <input type="text" name="jingshou" value="<?php echo ($rs_parameters["jingshou"]); ?>" id="jingshou"
                                       placeholder="输入整数或小数或百分数" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">在几小时(内)完成打款商城积分收益</label>
                            <div class="col-sm-10">
                                <input type="number" name="dakuanjifen" value="<?php echo ($rs_parameters["dakuanjifen"]); ?>"
                                       id="dakuanjifen" placeholder="%" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">在几小时(外)完成打款静态收益</label>
                            <div class="col-sm-10">
                                <input type="text" name="waijingshou" value="<?php echo ($rs_parameters["waijingshou"]); ?>"
                                       id="waijingshou" placeholder="输入整数或小数或百分数" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">在几小时(外)完成打款商城积分收益</label>
                            <div class="col-sm-10">
                                <input type="number" name="waidakuanjifen" value="<?php echo ($rs_parameters["waidakuanjifen"]); ?>"
                                       id="waidakuanjifen" placeholder="%" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">匹配后收款确认期限（小时）</label>
                            <div class="col-sm-10">
                                <input type="number" name="upCollectionPeriod"
                                       value="<?php echo ($rs_parameters["upCollectionPeriod"]); ?>" id="upCollectionPeriod"
                                       placeholder="请输入正整数 （单位 小时）" class="form-control">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否重复投资解冻</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upRepeatInvestment"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upRepeatInvestment" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upRepeatInvestment"> 关闭</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upRepeatInvestment"> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upRepeatInvestment" checked> 关闭</label><?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否允许本轮未到期反复投资</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upReact"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upReact" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upReact"> 关闭</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upReact"> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upReact" checked> 关闭</label><?php endif; ?>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否开启注册码注册</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upRegCodeState"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upRegCodeState" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upRegCodeState"> 关闭</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upRegCodeState"> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upRegCodeState" checked> 关闭</label><?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">排单币单个售价（元）</label>
                            <div class="col-sm-10">
                                <input type="number" name="paiRegCodePrice" value="<?php echo ($rs_parameters["paiRegCodePrice"]); ?>"
                                       id="paiRegCodePrice" placeholder="请输入正整数 （单位 元）" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">注册码单个售价（元）</label>
                            <div class="col-sm-10">
                                <input type="number" name="upRegCodePrice" value="<?php echo ($rs_parameters["upRegCodePrice"]); ?>"
                                       id="upRegCodePrice" placeholder="请输入正整数 （单位 元）" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">激活账户赠送奖金</label>
                            <div class="col-sm-10">
                                <input type="number" name="upRegJiangjin" value="<?php echo ($rs_parameters["upRegJiangjin"]); ?>"
                                       id="upRegJiangjin" placeholder="请输入正整数 （单位 元）" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">激活账户赠送利息</label>
                            <div class="col-sm-10">
                                <input type="number" name="upRegLixi" value="<?php echo ($rs_parameters["upRegLixi"]); ?>"
                                       id="upRegLixi" placeholder="请输入正整数 （单位 元）" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否开启每日签到</label>

                            <div class="col-sm-10">
                                <?php if($rs_parameters["upQiandaoONOFF"] == 1): ?><label class="checkbox-inline">
                                        <input type="radio" value="1" name="upQiandaoONOFF" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upQiandaoONOFF"> 关闭</label>
                                    <?php else: ?>
                                    <label class="checkbox-inline">

                                        <input type="radio" value="1" name="upQiandaoONOFF"> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="upQiandaoONOFF" checked> 关闭</label><?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">签到最小赠送奖金（元）</label>
                            <div class="col-sm-10">
                                <input type="number" name="upQiandaoJiangMin"
                                       value="<?php echo ($rs_parameters["upQiandaoJiangMin"]); ?>" id="upQiandaoJiangMin"
                                       placeholder="输入0为最大奖金，否则为随机奖金" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">签到最大赠送奖金（元）</label>
                            <div class="col-sm-10">
                                <input type="number" name="upQiandaoJiangMax"
                                       value="<?php echo ($rs_parameters["upQiandaoJiangMax"]); ?>" id="upQiandaoJiangMax"
                                       placeholder="请输入大于0的整数" class="form-control">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">本金提现倍数</label>
                            <div class="col-sm-10">
                                <input type="number" name="upBJMultiples" value="<?php echo ($rs_parameters["upBJMultiples"]); ?>"
                                       id="upBJMultiples" placeholder="请输入正整数 （单位 人）" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">奖金提现倍数</label>
                            <div class="col-sm-10">
                                <input type="number" name="upJJMultiples" value="<?php echo ($rs_parameters["upJJMultiples"]); ?>"
                                       id="upJJMultiples" placeholder="请输入正整数 （单位 人）" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">利息提现倍数</label>
                            <div class="col-sm-10">
                                <input type="number" name="upLXMultiples" value="<?php echo ($rs_parameters["upLXMultiples"]); ?>"
                                       id="upLXMultiples" placeholder="请输入正整数 （单位 人）" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">提现手续费</label>
                            <div class="col-sm-10">
                                <input type="text" name="upTXSXMoney" value="<?php echo ($rs_parameters["upTXSXMoney"]); ?>"
                                       id="upTXSXMoney" placeholder="请输入正整数0或小数或百分数" class="form-control">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div style="display: none" class="form-group">
                            <label class="col-sm-2 control-label">会员首页提供援助显示条数</label>
                            <div class="col-sm-10">
                                <input type="number" name="upShowITgnum" value="<?php echo ($rs_parameters["upShowITgnum"]); ?>"
                                       id="upShowITgnum" placeholder="请输入正整数" class="form-control">
                            </div>
                        </div>

                        <div style="display: none" class="form-group">
                            <label class="col-sm-2 control-label">会员首页接受援助显示条数</label>
                            <div class="col-sm-10">
                                <input type="number" name="upShowIJsnum" value="<?php echo ($rs_parameters["upShowIJsnum"]); ?>"
                                       id="upShowIJsnum" placeholder="请输入正整数" class="form-control">
                            </div>
                        </div>
                        <!--优选区显示条数设置-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">优选区显示条数</label>
                            <div class="col-sm-10">
                                <input type="number" name="yxqXsts" value="<?php echo ($rs_parameters["yxqXsts"]); ?>" id="yxqXsts"
                                       placeholder="请输入正整数" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">优选区几小时更新</label>
                            <div class="col-sm-10">
                                <input type="number" name="yxqjxsgx" value="<?php echo ($rs_parameters["yxqjxsgx"]); ?>" id="yxqjxsgx"
                                       placeholder="请输入正整数" class="form-control">
                            </div>
                        </div>
                        <!--优选区显示条数设置 e n d-->
                        <!--随机区显示条数设置-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">随机区显示条数</label>
                            <div class="col-sm-10">
                                <input type="number" name="sjqXsts" value="<?php echo ($rs_parameters["sjqXsts"]); ?>" id="sjqXsts"
                                       placeholder="请输入正整数" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">随机区几小时更新</label>
                            <div class="col-sm-10">
                                <input type="number" name="sjqjxsgx" value="<?php echo ($rs_parameters["sjqjxsgx"]); ?>" id="sjqjxsgx"
                                       placeholder="请输入正整数" class="form-control">
                            </div>
                        </div>
                        <!--随机区显示条数设置 e n d-->
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">每排多少元</label>
                            <div class="col-sm-10">
                                <input type="number" name="paiduoshaoyuan" value="<?php echo ($rs_parameters["paiduoshaoyuan"]); ?>"
                                       id="paiduoshaoyuan" placeholder="请输入正整数,排单需派单币,每排多少元,消耗多少个排单币"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">消耗排单币(个)</label>
                            <div class="col-sm-10">
                                <input type="number" name="xiaohaopaidanbi" value="<?php echo ($rs_parameters["xiaohaopaidanbi"]); ?>"
                                       id="xiaohaopaidanbi" placeholder="请输入正整数,排单需派单币,每排多少元,消耗多少个排单币"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">自选区每天搜索次数(次)</label>
                            <div class="col-sm-10">
                                <input type="number" name="zixuanquSOUSHUOnub"
                                       value="<?php echo ($rs_parameters["zixuanquSOUSHUOnub"]); ?>" id="zixuanquSOUSHUOnub"
                                       placeholder="请输入正整数" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <!--      <div class="form-group">
                                <label class="col-sm-2 control-label">直推奖一代</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="zhituijiangb" value="<?php echo ($rs_parameters["zhituijiangb"]); ?>" id="zhituijiangb" placeholder="%" class="form-control">
                                    </div>
                                 </div> -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">其中动态收益</label>
                            <div class="col-sm-10">
                                <input type="number" name="dongtaib" value="<?php echo ($rs_parameters["dongtaib"]); ?>" id="dongtaib"
                                       placeholder="%" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">其中商城积分</label>
                            <div class="col-sm-10">
                                <input type="number" name="shopjifenb" value="<?php echo ($rs_parameters["shopjifenb"]); ?>"
                                       id="shopjifenb" placeholder="%" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">同步钱包提现最低额度</label>
                            <div class="col-sm-10">
                                <input type="number" name="tongzuidi" value="<?php echo ($rs_parameters["tongzuidi"]); ?>"
                                       id="tongzuidi" placeholder="元" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">当天可交割开始时间</label>
                            <div class="col-sm-10">
                                <input type="number" name="jgkaishitime" value="<?php echo ($rs_parameters["jgkaishitime"]); ?>"
                                       id="jgkaishitime" placeholder="时间格式(24)：hhiiss" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">当天可交割结束时间</label>
                            <div class="col-sm-10">
                                <input type="number" name="jgjieshutime" value="<?php echo ($rs_parameters["jgjieshutime"]); ?>"
                                       id="jgjieshutime" placeholder="时间格式(24)：hhiiss" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="submit" class="btn btn-primary" value="更新会员参数">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/Public/Default/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Default/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/Public/Default/js/content.min.js?v=1.0.0"></script>
<script src="/Public/Default/js/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="/Public/Default/check/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="/Public/Default/check/js/messages_zh.min.js"></script>


<script type="text/javascript" src="/Public/Default/check/js/validate-methods.js"></script>


<script>
    $(document).ready(function () {
        $(".i-checks").iCheck({checkboxClass: "icheckbox_square-green", radioClass: "iradio_square-green",})
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#form-admin-add").validate({
            rules: {
                upTZMultiples: {
                    required: true,
                },
                upMaxMoney: {
                    required: true,

                },
                upGuDingLX: {
                    required: true,

                },
                upLXMultiples: {
                    required: true,

                },
                upBJMultiples: {
                    required: true,

                },
                upJJMultiples: {
                    required: true,

                },
                upTermOfInvestment: {
                    required: true,

                },
                upTXSXMoney: {
                    required: true,

                },
                upPaymentPeriod: {
                    required: true,

                },
                upCollectionPeriod: {
                    required: true,

                },
                upRepeatInvestment: {
                    required: true,

                },
                upShowITgnum: {
                    required: true,

                },
                upShowIJsnum: {
                    required: true,

                },
            },
            onkeyup: false,
            focusCleanup: true,
            success: "valid",
            submitHandler: function (form) {
                $(form).ajaxSubmit();
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });
</script>


</body>

</html>