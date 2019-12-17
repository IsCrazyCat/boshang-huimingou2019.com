<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统参数设置</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Default/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
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
                        <h5>系统配置参数 <small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/System/System/SetAction" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">系统名称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sName" id="sName" placeholder="控制在25个字、50个字节以内" value="<?php echo ($rs_systemInfo["sName"]); ?>" required >
                                </div>
                            </div>
                            
                            <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">网站口号(副标题)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sTitle" id="sTitle" placeholder="控制在250个字节以内" value="<?php echo ($rs_systemInfo["sTitle"]); ?>" required >
                                </div>
                            </div>
                            
                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">网址</label>
                                    <div class="col-sm-10">
                                        <input type="url" name="sUrl" id="sUrl" placeholder="请输入网址" value="<?php echo ($rs_systemInfo["sUrl"]); ?>" class="form-control" required>
                                    </div>
                            	</div>
                            
                            
                                <div class="form-group" style="display: none;">
                                <label class="col-sm-2 control-label">客服电话</label>
                                    <div class="col-sm-10">
                                        <input type="tel" name="sTel" placeholder="请输入电话号码" value="<?php echo ($rs_systemInfo["sTel"]); ?>" class="form-control" required>
                                    </div>
                            	</div>
                           
                           
                                <div class="form-group" style="display: none;">
                                <label class="col-sm-2 control-label">客服QQ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sQQ" placeholder="请输入QQ" value="<?php echo ($rs_systemInfo["sQQ"]); ?>" class="form-control" required>
                                    </div>
                            	</div>

                            <div class="form-group" style="display: none;">
                                <label class="col-sm-2 control-label">客服邮箱</label>
                                <div class="col-sm-10">
                                    <input type="email" name="sEmail" placeholder="请输入电子邮箱" value="<?php echo ($rs_systemInfo["sEmail"]); ?>" class="form-control" required>
                                </div>
                            </div>
                              

                                


                                <div class="form-group" style="display: none;">
                                <label class="col-sm-2 control-label">客服支付宝户名</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sZhifubaoName" placeholder="请输入支付宝对应的户名" value="<?php echo ($rs_systemInfo["sZhifubaoName"]); ?>" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group" style="display: none;">
                                <label class="col-sm-2 control-label">客服支付宝账户</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sZhifubao" placeholder="请输入支付宝账户" value="<?php echo ($rs_systemInfo["sZhifubao"]); ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">重复资料注册次数</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sRegNum" placeholder="手机、支付宝、身份证、姓名、微信号允许重复次数 [备注：-2为关闭注册，-1无限重复,0不许重复，大于0则允许重复次数]" value="<?php echo ($rs_systemInfo["sRegNum"]); ?>" class="form-control" required>
                                    </div>
                                </div>
                              
                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">手续费字符串</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sRegCodeChar" placeholder="请输入手续费的字符串" value="<?php echo ($rs_systemInfo["sRegCodeChar"]); ?>" class="form-control" required>
                                    </div>
                                </div>

                                
                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">手续费长度</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sRegCodeNum" placeholder="请输入整数" value="<?php echo ($rs_systemInfo["sRegCodeNum"]); ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">安全密码前缀</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="sSpwd" placeholder="请输入安全密码前缀" value="<?php echo ($rs_systemInfo["sSpwd"]); ?>" class="form-control" required>
                                    </div>
                                </div>
                            
                            
                            <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">后台验证码开关</label>

                                <div class="col-sm-10">
                                <?php if($rs_systemInfo["sCheckCodeSwitch"] == 1): ?><label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sCheckCodeSwitch" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sCheckCodeSwitch"> 关闭</label>
                                        <?php else: ?>
                                        <label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sCheckCodeSwitch" > 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sCheckCodeSwitch" checked> 关闭</label><?php endif; ?>
                                    
                                </div>
                            </div>

                            <div class="form-group" >
                                <label class="col-sm-2 control-label">前台登陆验证码开关</label>

                                <div class="col-sm-10">
                                <?php if($rs_systemInfo["sUCheckCodeSwitch"] == 1): ?><label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sUCheckCodeSwitch" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sUCheckCodeSwitch"> 关闭</label>
                                        <?php else: ?>
                                        <label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sUCheckCodeSwitch" > 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sUCheckCodeSwitch" checked> 关闭</label><?php endif; ?>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">后台登录超时（分钟）</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sLoginTimeout" placeholder="请输入登录几分钟超时" value="<?php echo ($rs_systemInfo["sLoginTimeout"]); ?>" class="form-control" required>
                                    </div>
                                </div>
                                

                            <div class="form-group">
                                <label class="col-sm-2 control-label">前台登录超时（分钟）</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sULoginTimeout" placeholder="请输入登录几分钟超时" value="<?php echo ($rs_systemInfo["sULoginTimeout"]); ?>" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <label class="col-sm-2 control-label">后台登错次数锁定</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sErrorPwdLockNum" placeholder="请输入登录错误几次锁定账户" value="<?php echo ($rs_systemInfo["sErrorPwdLockNum"]); ?>" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <label class="col-sm-2 control-label">前台连续登错次数锁定</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sUErrorPwdLockNum" placeholder="前台连续登错次数锁定" value="<?php echo ($rs_systemInfo["sUErrorPwdLockNum"]); ?>" class="form-control" required>
                                    </div>
                                </div>

                                 <div class="form-group">
                                <label class="col-sm-2 control-label">前台安全密码连错次数锁定</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sUZFErrorPwdLockNum" placeholder="前台安全密码连错次数锁定" value="<?php echo ($rs_systemInfo["sUZFErrorPwdLockNum"]); ?>" class="form-control" required>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                <label class="col-sm-2 control-label">虚拟在线人数最小值</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sMinOnline" placeholder="请输入在线人数最小值，为0的时候则为真实数据，为-1的时候则为最大值+真实数据" value="<?php echo ($rs_systemInfo["sMinOnline"]); ?>" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <label class="col-sm-2 control-label">虚拟在线人数最大值</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="sMaxOnline" placeholder="请输入在线人数最大值" value="<?php echo ($rs_systemInfo["sMaxOnline"]); ?>" class="form-control" >
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">客服微信号</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sWeixin" placeholder="请输入微信号或公众号" value="<?php echo ($rs_systemInfo["sWeixin"]); ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">客服微信二维码</label>
                                <div class="col-sm-10">
                                    <img src="/<?php echo ($rs_systemInfo["sErweima"]); ?>" width="300" height="100">

                                    <input style="margin-top: 8px;" type="file" name="sErweima" class="form-control" >
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">站点LOGO</label>
                                    <div class="col-sm-10">
                                    <img src="/<?php echo ($rs_systemInfo["sLogo"]); ?>" width="300" height="100">

                                        <input style="margin-top: 8px;" type="file" name="sLogo" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">版权名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sCopyrightName" placeholder="请输入版权名称" value="<?php echo ($rs_systemInfo["sCopyrightName"]); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">版本号</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sVersions" placeholder="请输入版本号" value="<?php echo ($rs_systemInfo["sVersions"]); ?>" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-2 control-label">站点开关</label>

                                <div class="col-sm-10">
                                <?php if($rs_systemInfo["sONOFF"] == 1): ?><label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sONOFF" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sONOFF"> 关闭</label>
                                        <?php else: ?>
                                        <label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sONOFF" > 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sONOFF" checked> 关闭</label><?php endif; ?>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">关闭网站说明文字</label>
                                    <div class="col-sm-10">
                                    <span style="color: #ff0000"><textarea class="input-text form-control" id="sONOFFInfo" name="sONOFFInfo" rows="4"><?php echo ($rs_systemInfo["sONOFFInfo"]); ?></textarea></span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group" style="display: none">
                                <label class="col-sm-2 control-label">宣传网站后台菜单</label>

                                <div class="col-sm-10">
                                <?php if($rs_systemInfo["sXuanchanMenu"] == 1): ?><label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sXuanchanMenu" checked> 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sXuanchanMenu"> 关闭</label>
                                        <?php else: ?>
                                        <label class="checkbox-inline">
                                    
                                        <input type="radio" value="1" name="sXuanchanMenu" > 开启</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="0" name="sXuanchanMenu" checked> 关闭</label><?php endif; ?>
                                    
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                <!--
                                    <button class="btn btn-primary" type="submit">保存配置</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                    -->
                                    <input class="btn btn-primary" type="submit" value="保存配置">
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
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
</body>

</html>