<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class UsersController extends LoginTrueController {
    public function SetParameters(){
        $this->LoginTrue();
        $parameters=M("users_parameters");
        $rs_parameters=$parameters->where("upId=1")->find();
        $this->assign("rs_parameters",$rs_parameters);
        $this->display();
    }
    //更新会员参数  提交
    public function SetParametersAction(){
        $this->LoginTrue();
        $parameters=M("users_parameters");
        $data["upPDLXONorOFF"]=$_POST["upPDLXONorOFF"];
        $data["upPDLXDay"]=$_POST["upPDLXDay"];
        $data["upTypeInvestment"]=$_POST["upTypeInvestment"];
        $data["upTZMultiples"]=$_POST["upTZMultiples"];
        $data["upMaxMoney"]=$_POST["upMaxMoney"];
        $data["upLXType"]=$_POST["upLXType"];
        $data["jgkaishitime"]=$_POST["jgkaishitime"];//交割开始时间当天
        $data["jgjieshutime"]=$_POST["jgjieshutime"];//交割结束时间当天
        if($data["jgkaishitime"]>235959){
            $this->error("时间输入不正确！！！","",5);
        }
        if($data["jgjieshutime"]>235959){
            $this->error("时间输入不正确！！！","",5);
        }
        if($data["jgkaishitime"]>$data["jgjieshutime"]){
            $this->error("交割开始时间不可以大于交割结束时间！！！","",5);
        }

        $data["upGuDingLX"]=$_POST["upGuDingLX"];
        // $data["zhituijiangb"]=$_POST["zhituijiangb"];//直推奖一代
        $data["dongtaib"]=$_POST["dongtaib"];//其中动态收益
        $data["jingshou"]=$_POST["jingshou"];//在几小时(内)完成打款静态收益
        $data["dakuanjifen"]=$_POST["dakuanjifen"];//在几小时(内)完成打款商城积分收益
        $data["waijingshou"]=$_POST["waijingshou"];//在几小时(外)完成打款静态收益
        $data["waidakuanjifen"]=$_POST["waidakuanjifen"];//在几小时(外)完成打款商城积分收益
        $data["shopjifenb"]=$_POST["shopjifenb"];//其中商城积分
        $data["tongzuidi"]=$_POST["tongzuidi"];//同步钱包提现最低额度

        $data["yxqXsts"]=$_POST["yxqXsts"];//优选区显示条数
        $data["yxqjxsgx"]=$_POST["yxqjxsgx"];//优选区几小时更新
        $data["sjqXsts"]=$_POST["sjqXsts"];//随机区显示条数
        $data["sjqjxsgx"]=$_POST["sjqjxsgx"];//随机区几小时更新
        if($data["upTypeInvestment"]==1){
            if($data["upLXType"]!=0){
                $this->error("你当前选择了按预设投资，必须选择按浮动利率计息","",5);
            }
        }elseif($data["upTypeInvestment"]==0){
            if($data["upLXType"]!=1){
                $this->error("你当前选择了按倍数投资，必须选择按固定利率计息","",5);
            }
        }
        $data["upLixiAllOrDay"]=$_POST["upLixiAllOrDay"];
        $data["upLXMultiples"]=$_POST["upLXMultiples"];
        $data["upJJMultiples"]=$_POST["upJJMultiples"];
        $data["upBJMultiples"]=$_POST["upBJMultiples"];
        $data["upTXSXMoney"]=$_POST["upTXSXMoney"];
        $data["upTermOfInvestment"]=$_POST["upTermOfInvestment"];
        $data["upPaymentPeriod"]=$_POST["upPaymentPeriod"];
        $data["upCollectionPeriod"]=$_POST["upCollectionPeriod"];
        $data["jixiaoshinei"]=$_POST["jixiaoshinei"];//在几小时内完成打款（小时）
        $data["upRepeatInvestment"]=$_POST["upRepeatInvestment"];
        $data["upReact"]=$_POST["upReact"];
        $data["upRegCodeState"]=$_POST["upRegCodeState"];
        $data["upRegCodePrice"]=$_POST["upRegCodePrice"];
        $data["paiRegCodePrice"]=$_POST["paiRegCodePrice"];//排单币单价
        $data["upRegJiangjin"]=$_POST["upRegJiangjin"];
        $data["upRegLixi"]=$_POST["upRegLixi"];
        $data["upShowITgnum"]=$_POST["upShowITgnum"];
        $data["upShowIJsnum"]=$_POST["upShowIJsnum"];
        $data["upQiandaoONOFF"]=$_POST["upQiandaoONOFF"];
        $data["upQiandaoJiangMin"]=$_POST["upQiandaoJiangMin"];
        $data["upQiandaoJiangMax"]=$_POST["upQiandaoJiangMax"];
        /*qiu hong yang  新增   2018-11-16*/
        $data["paiduoshaoyuan"]=$_POST["paiduoshaoyuan"];
        $data["xiaohaopaidanbi"]=$_POST["xiaohaopaidanbi"];
        $data["zixuanquSOUSHUOnub"]=$_POST["zixuanquSOUSHUOnub"];//自选区限制搜索次数
        /*qiu hong yang  新增   2018-11-16 E-N-D*/
        $result=$parameters->where("upId=1")->save($data);
        if($result){
            $this->success("更新会员参数成功");
        }else{
            $this->error("更新会员参数失败");
        }
    }
    public function RegGradesLists(){
        $this->LoginTrue();
        $reggrades=M("reggrades");
        $rs_reggrades=$reggrades->order("rgId asc")->select();
        $this->assign("rs_reggrades",$rs_reggrades);
        $this->display();
    }
    public function AddRegGrades(){
        $this->LoginTrue();
        $this->display();
    }
    public function AddRegGradesAction(){
        $this->LoginTrue();
        $reggrades=M("reggrades");
        $rs_reggrades=$reggrades->field("rgName")->select();
        $data["rgName"]=$_POST["rgName"];
        foreach($rs_reggrades as $val_reggrades){
            if($data["rgName"]==$val_reggrades["rgName"]){
                $this->error("等级名称不得重复");
            }
        }
        $data["rgTJPeople"]=$_POST["rgTJPeople"];
        $data["rgSJNextPeople"]=$_POST["rgSJNextPeople"];
        $data["rgLixi"]=$_POST["rgLixi"];
        $data["rgTJJangjin"]=$_POST["rgTJJangjin"];
        $data["rgShengjiJiangjin"]=$_POST["rgShengjiJiangjin"];
        $data["rgShuifei"]=$_POST["rgShuifei"];

        $result=$reggrades->add($data);
        if($result){
            $this->success("添加等级成功",U("reggradeslists"));
        }else{
            $this->error("添加等级失败");
        }
    }
    public function UpdateRegGrades(){
        $this->LoginTrue();
        $rgId=$_GET["rgId"];
        $reggrades=M("reggrades");
        $rs_reggrades=$reggrades->where("rgId={$rgId}")->find();
        $this->assign("rs_reggrades",$rs_reggrades);
        $this->display();
    }
    public function UpdateRegGradesAction(){
        $this->LoginTrue();
        $rgId=$_GET["rgId"];
        $reggrades=M("reggrades");
        $rs_reggrades=$reggrades->where("rgId!={$rgId}")->field("rgName")->select();
        $data["rgName"]=$_POST["rgName"];
        foreach($rs_reggrades as $val_reggrades){
            if($data["rgName"]==$val_reggrades["rgName"]){
                $this->error("等级名称不得重复");
            }
        }
        $data["rgTJPeople"]=$_POST["rgTJPeople"];
        $data["rgSJNextPeople"]=$_POST["rgSJNextPeople"];
        $data["rgLixi"]=$_POST["rgLixi"];
        $data["rgTJJangjin"]=$_POST["rgTJJangjin"];
        $data["rgShengjiJiangjin"]=$_POST["rgShengjiJiangjin"];
        $data["rgShuifei"]=$_POST["rgShuifei"];
        $result=$reggrades->where("rgId={$rgId}")->save($data);
        if($result){
            $this->success("修改等级成功",U("reggradeslists"));
        }else{
            $this->error("修改等级失败");
        }
    }
    public function DelRegGrades(){
        $this->LoginTrue();
        $rgId=$_GET["rgId"];
        $reggrades=M("reggrades");
        $result=$reggrades->where("rgId={$rgId}")->delete();
        if($result){
            $this->success("删除等级成功");
        }else{
            $this->error("删除等级失败");
        }
    }
    public function UserAdd(){
        $this->LoginTrue();
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sRegNum")->find();
        if($rs_system["sRegNum"]==-2){
            $this->error("系统临时关闭了注册功能，正在维护中，请随时留意公告",U("userslists"),8);
        }else{
            $users=M("users");
            $rs_users=$users->where("uId=1")->field("uUser,uId")->find();
            $this->assign("rs_users",$rs_users);
            $this->display();
        }
    }
    public function UserAddAction(){
        $this->LoginTrue();
        $system=M("system");
        $users=M("users");
        $rs=$users->field("uId,uUser,uSfId,uTel,uEmail")->select();
        $data["uUser"]=trim($_POST["uUser"]);
        $uSfId=$data["uSfId"]=trim($_POST["uSfId"]);
        $uTel=$data["uTel"]=trim($_POST["uTel"]);
        $uZhifubao=$data["uZhifubao"]=trim($_POST["uZhifubao"]);
        $uWeixin=$data["uWeixin"]=trim($_POST["uWeixin"]);
        $uEmail=$email=$_POST["uEmail"];
        if(strlen($email)>3){
            $data["uEmail"]=trim($email);
        }
        $rs_system=$system->where("sId=1")->field("sRegNum")->find();
        if($rs_system["sRegNum"]==-1){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }
            }
        }elseif($rs_system["sRegNum"]==0){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }elseif($data["uSfId"]==$val["uSfId"]){
                    $this->error("身份证号码已经存在");
                }elseif($data["uTel"]==$val["uTel"]){
                    $this->error("手机号码已经存在");
                }elseif($data["uZhifubao"]==$val["uZhifubao"]){
                    $this->error("支付宝账户已经存在");
                }elseif($data["uWeixin"]==$val["uWeixin"]){
                    $this->error("微信号码已经存在");
                }elseif($data["uEmail"]==$val["uEmail"]){
                    if(strlen($val["uEmail"])>3){
                        $this->error("电子邮箱已经存在");
                    }
                }
            }
        }elseif($rs_system["sRegNum"]>0){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }
            }
            $count_sfz=$users->where("uSfId='{$uSfId}'")->count();
            if($count_sfz>$rs_system["sRegNum"]){
                $this->error("身份证号码超过系统限制注册的最大次数","",5);
            }
            $count_utel=$users->where("uTel='{$uTel}'")->count();
            if($count_utel>$rs_system["sRegNum"]){
                $this->error("手机号码超过系统限制注册的最大次数","",5);
            }
            $count_zfb=$users->where("uZhifubao='{$uZhifubao}'")->count();
            if($count_zfb>$rs_system["sRegNum"]){
                $this->error("支付宝账户超过系统限制注册的最大次数","",5);
            }
            $count_weixin=$users->where("uWeixin='{$uWeixin}'")->count();
            if($count_weixin>$rs_system["sRegNum"]){
                $this->error("微信号超过系统限制注册的最大次数","",5);
            }
            if(strlen($val["uEmail"])>3){
                $count_email=$users->where("uEmail='{$uEmail}'")->count();
                if($count_email>$rs_system["sRegNum"]){
                    $this->error("电子邮箱超过系统限制注册的最大次数","",5);
                }
            }
        }
        $data["uSex"]=trim($_POST["uSex"]);
        $uPwd=$_POST["uPwd"];
        if($uPwd==""){
            $data["uPwd"]=md5($data["uTel"]);
        }else{
            $data["uPwd"]=md5(trim($_POST["uPwd"]));
        }
        $uZfPwd=$_POST["uZfPwd"];
        if($uZfPwd==""){
            $data["uZfPwd"]=md5(654321);
        }else{
            $data["uZfPwd"]=md5($_POST["uZfPwd"]);
        }
        if($data["uPwd"]==$data["uZfPwd"]){
            $this->error("登陆密码不能和安全密码一样");
        }
        $data["uName"]=trim($_POST["uName"]);
        $uTuiUser=trim($_POST["uTuiUser"]);
        $rs_count=$users->where("uUser='{$uTuiUser}' OR uTel='{$uTuiUser}'")->count();
        if($rs_count<1){
            $this->error("推荐人不存在，请重新填写");
        }else{
            $rs_users=$users->where("uUser='{$uTuiUser}' OR uTel='{$uTuiUser}'")->find();
            $data["uTuiId"]=$rs_users["uId"];
            $sonData["uSonUser"]=$rs_users["uSonUser"].$data["uUser"]."|";
        }
        $data["uRegDate"]=date("Y-m-d H:i:s");
        $result=$users->add($data);
        if($result){
            $users->where("uId={$data['uTuiId']}")->save($sonData);
            if($uPwd=="" && $uZfPwd!=""){
                $this->success("添加会员成功，登陆密码默认为你注册的手机号",U("userslists"),3);
            }elseif($uPwd=="" && $uZfPwd==""){
                $this->success("添加会员成功，登陆密码及安全码为默认的手机号及654321",U("userslists"),3);
            }elseif($uPwd!="" && $uZfPwd==""){
                $this->success("添加会员成功，安全密码默认为654321",U("userslists"),3);
            }else{
                $this->success("添加会员成功,请牢记登陆密码及安全码",U("userslists"),3);
            }
        }else{
            $this->error("添加会员失败");
        }
    }
    public function UsersLists(){
        $this->LoginTrue();
        $users=M("users");
        $rs_users=$users->order("uId desc")->select();
        $this->assign("rs_users",$rs_users);
        $system=M("system");
        $errornum=$system->where("sId=1")->field("sUErrorPwdLockNum,sUZFErrorPwdLockNum,sUrl")->find();
        $loginerrnum=$errornum["sUErrorPwdLockNum"];
        $zhifuerrnum=$errornum["sUZFErrorPwdLockNum"];
        $QtURL=$errornum["sUrl"];
        $this->assign("QtURL",$QtURL);
        $this->assign("loginerrnum",$loginerrnum);
        $this->assign("zhifuerrnum",$zhifuerrnum);
        $this->display();
    }
    public function SetLock(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $data["uLock"]=$_GET["lock"];
        $users=M("users");
        $result=$users->where("uId={$uId}")->save($data);
        if($result){
            $this->success("设置成功");
        }else{
            $this->error("设置失败");
        }
    }
    public function QixiaoLLock(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $data["uErrorPwdNum"]=0;
        $users=M("users");
        $result=$users->where("uId={$uId}")->save($data);
        if($result){
            $this->success("解锁登陆状态成功");
        }else{
            $this->error("解锁登陆状态失败");
        }
    }
    public function QixaoZFLock(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $data["uZFErrorPwdNum"]=0;
        $users=M("users");
        $result=$users->where("uId={$uId}")->save($data);
        if($result){
            $this->success("解锁支付状态成功");
        }else{
            $this->error("解锁支付状态失败");
        }
    }
    public function SetRegState(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $parameters=M("users_parameters");
        $rs_parameters=$parameters->where("upId=1")->field("upRegCodeState")->find();
        $this->assign("rs_parameters",$rs_parameters);
        $rs_tuijianren=$users->where("uId={$rs_users['uTuiId']}")->field("uId,uUser,uTel,uName")->find();
        $this->assign("rs_tuijianren",$rs_tuijianren);
        $this->display();

    }
    public function SetRegStateAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $codestate=$_GET["codestate"];
        $data["uState"]=1;
        $users=M("users");
        $users_parameters=M("users_parameters");
        $rs_paramenters=$users_parameters->where("upId=1")->field("upRegJiangjin,upRegLixi")->find();
        $data["uJiangjin"]=$rs_paramenters["upRegJiangjin"];
        $data["uLixi"]=$rs_paramenters["upRegLixi"];
        $data["uNowLixi"]=$rs_paramenters["upRegLixi"];
        $money_log=M("money_log");
        //日志的记录
        if($data["uJiangjin"]>0){
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
            $datalogjiangjin["mlUid"]=$uId;
            $datalogjiangjin["mlJiner"]=$data["uJiangjin"];
            $datalogjiangjin["mlMoneyType"]=3;
            $datalogjiangjin["mlToday"]=$today;
            $datalogjiangjin["mlDate"]=$nowdatetimes;
            $datalogjiangjin["mlInfo"]="首次激活会员，赠送奖金".$data["uJiangjin"]."元";
            $datalogjiangjin["mlPorC"]=1;
            $datalogjiangjin["mlPorM"]=4;
            $datalogjiangjin["mlSuccess"]=1;
            $datalogjiangjin["mlRandNumber"]="B".$nowtimes.$datalogjiangjin["mlUid"];
        }
        //日志的记录
        if($data["uLixi"]>0){
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
            $dataloglixi["mlUid"]=$uId;
            $dataloglixi["mlJiner"]=$data["uLixi"];
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlToday"]=$today;
            $dataloglixi["mlDate"]=$nowdatetimes;
            $dataloglixi["mlInfo"]="首次激活会员，赠送利息".$data["uLixi"]."元";
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=4;
            $dataloglixi["mlSuccess"]=1;
            $dataloglixi["mlRandNumber"]="I".$nowtimes.$dataloglixi["mlUid"];
        }
        if($codestate==0){
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                if($data["uJiangjin"]>0){
                    $money_log->add($datalogjiangjin);
                }
                if($data["uLixi"]>0){
                    $money_log->add($dataloglixi);
                }
                $this->success("激活成功",U("userslists"));
            }else{
                $this->error("激活失败");
            }
        }else{
            //校验注册码
            $regcode=$_POST["uUseRegCode"];
            $mregcodes=M("mregcodes");
            $rs_mrc_n=$mregcodes->where("mrcRegCode='{$regcode}'")->count();
            if($rs_mrc_n==0){
                $this->error("你输入的手续费错误");
            }else{
                $rs_mrc=$mregcodes->field("mrcId,mrcRegCode,mrcState")->where("mrcRegCode='{$regcode}'")->find();
                if($rs_mrc["mrcState"]==1){
                    $this->error("该手续费已被使用");
                }else{
                    $result=$users->where("uId={$uId}")->save($data);
                    if($result){
                        $mrcId=$rs_mrc["mrcId"];
                        $data["uUseRegCode"]=$regcode;
                        $codeInfo["mrcUseDate"]=date("Y-m-d H:i:s");
                        $codeInfo["mrcUseUid"]=$uId;
                        $codeInfo["mrcState"]=1;
                        $mregcodes->where("mrcId={$mrcId}")->save($codeInfo);
                        if($data["uJiangjin"]>0){
                            $money_log->add($datalogjiangjin);
                        }
                        if($data["uLixi"]>0){
                            $money_log->add($dataloglixi);
                        }
                        $this->success("激活成功",U("userslists"));
                    }else{
                        $this->error("激活失败");
                    }
                }
            }
        }
    }
    public function UpdateUser(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    public function UpdateUserAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs=$users->field("uId,uUser,uSfId,uTel,uEmail")->where("uId!={$uId}")->select();
        $uUsers=$_POST["uUser"];
        if($uUsers!=""){
            $data["uUser"]=trim($_POST["uUser"]);
        }
        $data["uSfId"]=trim($_POST["uSfId"]);
        $data["uTel"]=trim($_POST["uTel"]);
        $data["uZhifubao"]=trim($_POST["uZhifubao"]);
        $data["uWeixin"]=trim($_POST["uWeixin"]);
        $email=$_POST["uEmail"];
        if(strlen($email)>3){
            $data["uEmail"]=trim($email);
        }
        foreach($rs as $val){
            if($data["uUser"]==$val["uUser"]){
                $this->error("登陆账户已经存在");
            }elseif($data["uSfId"]==$val["uSfin"]){
                $this->error("身份证号码已经存在");
            }elseif($data["uTel"]==$val["uTel"]){
                $this->error("手机号码已经存在");
            }elseif($data["uZhifubao"]==$val["uZhifubao"]){
                $this->error("支付宝账户已经存在");
            }elseif($data["uWeixin"]==$val["uWeixin"]){
                $this->error("微信号码已经存在");
            }elseif($data["uEmail"]==$val["uEmail"]){
                if(strlen($val["uEmail"])>3){
                    $this->error("电子邮箱已经存在");
                }
            }
        }
        $data["uSex"]=trim($_POST["uSex"]);
        $uPwd=$_POST["uPwd"];
        if($uPwd!=""){
            $data["uPwd"]=md5(trim($_POST["uPwd"]));
        }
        $uZfPwd=$_POST["uZfPwd"];
        if($uZfPwd!=""){
            $data["uZfPwd"]=md5($_POST["uZfPwd"]);
        }
        if($uPwd!="" && $uZfPwd!=""){
            if($data["uPwd"]==$data["uZfPwd"]){
                $this->error("登陆密码不能和安全密码一样");
            }
        }
        $data["uName"]=trim($_POST["uName"]);
        $result=$users->where("uId={$uId}")->save($data);
        if($result){
            $this->success("修改会员资料成功",U("userslists"));
        }else{
            $this->error("修改会员资料失败");
        }
    }
    public function DelUsers(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $result=$users->where("uId={$uId}")->delete();
        if($result){
            $this->success("删除会员成功");
        }else{
            $this->error("删除会员失败");
        }
    }
    public function AddUsersTouziData(){
        $this->LoginTrue();
        $this->display();
    }
    public function AddUsersTouziDataAction(){
        $this->LoginTrue();
        $data["utBenJin"]=$_POST["utBenJin"];
        $data["utJBLixi"]=$_POST["utJBLixi"];
        $touzi=M("users_touzidata");
        $result=$touzi->add($data);
        if($result){
            $this->success("添加投资数据成功",U("userstouzidata"));
        }else{
            $this->error("添加投资数据失败");
        }
    }
    public function UsersTouziData(){
        $this->LoginTrue();
        $touzi=M("users_touzidata");
        $rs_touzidata=$touzi->order("utId asc")->select();
        $this->assign("rs_touzidata",$rs_touzidata);
        $this->display();
    }
    public function SetTouziDataState(){
        $this->LoginTrue();
        $utId=$_GET["utId"];
        $data["utState"]=$_GET["sutId"];
        $touzi=M("users_touzidata");
        $result=$touzi->where("utId={$utId}")->save($data);
        if($result){
            $this->success("更新成功");
        }else{
            $this->error("更新失败");
        }
    }
    public function UpdateUsersTouziData(){
        $this->LoginTrue();
        $utId=$_GET["utId"];
        $touzi=M("users_touzidata");
        $rs_touzi=$touzi->where("utId={$utId}")->find();
        $this->assign("rs_touzi",$rs_touzi);
        $this->display();
    }
    public function UpdateUsersTouziDataAction(){
        $this->LoginTrue();
        $utId=$_GET["utId"];
        $data["utBenJin"]=$_POST["utBenJin"];
        $data["utJBLixi"]=$_POST["utJBLixi"];
        $touzi=M("users_touzidata");
        $result=$touzi->where("utId={$utId}")->save($data);
        if($result){
            $this->success("修改成功",U("userstouzidata"));
        }else{
            $this->error("修改失败");
        }
    }
    public function DelUsersTouziData(){
        $this->LoginTrue();
        $utId=$_GET["utId"];
        $touzi=M("users_touzidata");
        $result=$touzi->where("utId={$utId}")->delete();
        if($result){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
    //直接发送手续费免费
    public function GiveCode(){
        $this->LoginTrue();
        $parameters=M("users_parameters");
        //随机生成手续费
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sRegCodeChar,sRegCodeNum")->find();
        $str = null;
        $strPol = $rs_system["sRegCodeChar"];
        $strNum=$rs_system["sRegCodeNum"];
        $max = strlen($strPol)-1;
        for($i=0;$i<$strNum;$i++){
            $str.=$strPol[rand(0,$max)];
        }
        $this->assign("codestr",$str);
        $this->assign("strNum",$strNum);
        $rs_parameters=$parameters->where("upId=1")->field("upRegCodePrice")->find();
        $this->assign("rs_parameters",$rs_parameters);
        $this->display();
    }
    //直接发送 报单币 免费
    public function GivebaodanbiCode(){
        $this->LoginTrue();
        $parameters=M("users_parameters");
        //随机生成报单币
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sRegCodeChar,sRegCodeNum")->find();
        $str = null;
        $strPol = $rs_system["sRegCodeChar"];
        $strNum=$rs_system["sRegCodeNum"];
        $max = strlen($strPol)-1;
        for($i=0;$i<$strNum;$i++){
            $str.=$strPol[rand(0,$max)];
        }
        $this->assign("codestr",$str);
        $this->assign("strNum",$strNum);
        $rs_parameters=$parameters->where("upId=1")->field("paiRegCodePrice")->find();
        $this->assign("rs_parameters",$rs_parameters);
        $this->display();
    }
    //发送手续费确认
    public function givecodeshowinfo(){
        $this->LoginTrue();
        $zuser=$_POST["zuser"];
        $mrcRegCode=$_POST["mrcRegCode"];
        $this->assign("mrcRegCode",$mrcRegCode);
        $data["mrcPrice"]=$_POST["mrcPrice"];
        $data["mrcHuiPrice"]=$_POST["mrcHuiPrice"];
        $users=M("users");
        $rs_count=$users->where("uUser='{$zuser}' OR uTel='{$zuser}'")->count();
        if($rs_count==0){
            $this->error("你要赠送的账户或手机号码不存在");
        }
        $rs_user=$users->where("uUser='{$zuser}' OR uTel='{$zuser}'")->field("uId,uName,uTel,uUser")->find();
        $data["mrcMUid"]=$rs_user["uId"];
        $data["mrcMUser"]=$rs_user["uUser"];
        $data["mrcMName"]=$rs_user["uName"];
        $data["mrcMTel"]=$rs_user["uTel"];
        $mregcodes=M("mregcodes");
        $rs_mregcodes=$mregcodes->field("mrcRegCode")->select();
        foreach($rs_mregcodes as $val_mregcodes){
            if($mrcRegCode==$val_mregcodes){
                $this->error("验证码已经重复，返回重新生成",U("givecode"));
            }else{
                $data["mrcRegCode"]=$_POST["mrcRegCode"];
            }
        }
        if($data["mrcHuiPrice"]>$data["mrcPrice"]){
            $this->error("优惠价格不得高于售价");
        }
        if($data["mrcHuiPrice"]==$data["mrcPrice"] && $data["mrcPrice"]!=0){
            $data["mrcPayPrice"]=0;
            $data["mrcMorZ"]=0;
        }elseif($data["mrcHuiPrice"]==0 && $data["mrcPrice"]!=0){
            $data["mrcPayPrice"]=$data["mrcPrice"];
            $data["mrcMorZ"]=1;
        }elseif($data["mrcHuiPrice"]<$data["mrcPrice"] && $data["mrcHuiPrice"]!=0 && $data["mrcPrice"]!=0){
            $data["mrcPayPrice"]=$data["mrcPrice"]-$data["mrcHuiPrice"];
            $data["mrcMorZ"]=2;
        }elseif($data["mrcHuiPrice"]==$data["mrcPrice"] && $data["mrcPrice"]==0){
            $data["mrcPayPrice"]=0;
            $data["mrcMorZ"]=0;
        }
        $this->assign("datainfo",$data);
        $this->display();
    }
    //发送 排单币 确认
    public function fasongpaidanbiqueren(){
        $this->LoginTrue();
        $zuser=$_POST["zuser"];
        $mrcRegCode=$_POST["mrcRegCode"];
        $this->assign("mrcRegCode",$mrcRegCode);
        $data["mrcPrice"]=$_POST["mrcPrice"];
        $data["mrcHuiPrice"]=$_POST["mrcHuiPrice"];
        $users=M("users");
        $rs_count=$users->where("uUser='{$zuser}' OR uTel='{$zuser}'")->count();
        if($rs_count==0){
            $this->error("你要赠送的账户或手机号码不存在");
        }
        $rs_user=$users->where("uUser='{$zuser}' OR uTel='{$zuser}'")->field("uId,uName,uTel,uUser")->find();
        $data["mrcMUid"]=$rs_user["uId"];
        $data["mrcMUser"]=$rs_user["uUser"];
        $data["mrcMName"]=$rs_user["uName"];
        $data["mrcMTel"]=$rs_user["uTel"];
        $mregcodes=M("mregcodes");
        $rs_mregcodes=$mregcodes->field("mrcRegCode")->select();
        foreach($rs_mregcodes as $val_mregcodes){
            if($mrcRegCode==$val_mregcodes){
                $this->error("验证码已经重复，返回重新生成",U("givecode"));
            }else{
                $data["mrcRegCode"]=$_POST["mrcRegCode"];
            }
        }
        $data["mrcPayPrice"]=0;
        $data["mrcMorZ"]=0;
        $this->assign("datainfo",$data);
        $this->display();
    }
    //免费发送手续费确认发送
    public function givecodeshowinfoAction(){
        $this->LoginTrue();
        $data["mrcMUid"]=$_POST["mrcMUid"];
        $data["mrcRegCode"]=$_POST["mrcRegCode"];
        $data["mrcPrice"]=$_POST["mrcPrice"];
        $data["mrcHuiPrice"]=$_POST["mrcHuiPrice"];
        $data["mrcPayPrice"]=$_POST["mrcPayPrice"];
        $data["mrcMorZ"]=$_POST["mrcMorZ"];
        $data["mrcStartDate"]=date("Y-m-d H:i:s");
        $mregcodes=M("mregcodes");
        $result=$mregcodes->add($data);
        if($result){
            $this->success("手续费发放成功",U("regcodelists"));
        }else{
            $this->error("手续费发放失败");
        }
    }
    //免费发送排单币确认发送
    public function paidanbiquerfasongtion(){
        $this->LoginTrue();
        $data["uId"]=$_POST["mrcMUid"];//被赠送会员的ID
        $data["mrcHuiPrice"]=$_POST["mrcHuiPrice"];//免费赠送排单币的个数
        $mregcodes=M("mregcodes");
        $result=$mregcodes->add($data);
        $usersd=M("users");
        $fafangnumd=$usersd->where("uId={$data["uId"]}")->field("paiDanBi")->find();
        $datalockd["paiDanBi"]=$data["mrcHuiPrice"]+$fafangnumd['paiDanBi'];
        $ljl=$usersd->where("uId={$data["uId"]}")->save($datalockd);
        if($ljl){
            $this->success("排单币发放成功",U("givebaodanbiCode"));
        }else{
            $this->error("排单币发放失败");
        }
    }
    public function RegCodeLists(){
        $this->LoginTrue();
        $st=$_GET["st"];
        $mregcodes=M("mregcodes");
        if($st==1){
            $rs_mregcodes=$mregcodes->where("mrcState=1")->select();
        }elseif($st==0){
            $rs_mregcodes=$mregcodes->where("mrcState=0")->select();
        }elseif($st==2){
            $rs_mregcodes=$mregcodes->select();
        }
        $this->assign("stts",$st);
        $this->assign("rs_mregcodes",$rs_mregcodes);
        $this->display();
    }
    //手续费  发放审核
    public function  ReviewCode(){
        $this->LoginTrue();
        $at=$_GET["at"];
        $apply=M("users_apply_regcode");
        $rs_apply=$apply->select();
        $this->assign("rs_apply",$rs_apply);
        $this->display();
    }
    //排单币  发放审核
    public function  Paidanbicode(){
        $this->LoginTrue();
        $at=$_GET["at"];
        $apply=M("users_paidanbi_regcode");
        $rs_apply=$apply->select();
        $this->assign("rs_apply",$rs_apply);
        $this->display();
    }
    public function ReviewCodeOne(){
        $this->LoginTrue();
        $uarId=$_GET["uarId"];
        $apply=M("users_apply_regcode");
        $rs_apply=$apply->where("uarId={$uarId}")->find();
        $this->assign("rs_apply",$rs_apply);
        $this->display();
    }
    //后台发送  手续费
    public function ReviewSend(){
        $this->LoginTrue();
        $uarId=$_GET["uarId"];//申请手续费 id
        $apply=M("users_apply_regcode");
        $rs_apply=$apply->where("uarId={$uarId}")->find();
        $this->assign("rs_apply",$rs_apply);
        //随机生成手续费
        $system=M("system");
        /**
         * sRegCodeChar    手续费字符串
         * sRegCodeNum      手续费位数
         */
        $rs_system=$system->where("sId=1")->field("sRegCodeChar,sRegCodeNum")->find();
        $str = null;
        $strPol = $rs_system["sRegCodeChar"];
        $strNum=$rs_system["sRegCodeNum"];
        $max = strlen($strPol)-1;
        for($i=0;$i<$strNum;$i++){
            $str.=$strPol[rand(0,$max)];
        }
        $this->assign("codestr",$str);
        $this->display();
    }
    //后台发送  排单币  给会员
    public function Paidanbifasong(){
        $this->LoginTrue();
        $uarId=$_GET["uarId"];//申请手续费 id
        $apply=M("users_paidanbi_regcode");
        $rs_apply=$apply->where("uarId={$uarId}")->find();
        $this->assign("rs_apply",$rs_apply);
        //随机生成手续费
        $system=M("system");
        /**
         * sRegCodeChar    手续费字符串
         * sRegCodeNum      手续费位数
         */
        $rs_system=$system->where("sId=1")->field("sRegCodeChar,sRegCodeNum")->find();
        $str = null;
        $strPol = $rs_system["sRegCodeChar"];
        $strNum=$rs_system["sRegCodeNum"];
        $max = strlen($strPol)-1;
        for($i=0;$i<$strNum;$i++){
            $str.=$strPol[rand(0,$max)];
        }
        $this->assign("codestr",$str);
        $this->display();
    }
    //审核发送 手续费提交
    public function ReviewSendAction(){
        $this->LoginTrue();
        $uarId=$_GET["uarId"];
        $uarState=$_POST["uarState"];
        $apply=M("users_apply_regcode");
        $fafangnum=$apply->where("uarId={$uarId}")->field("uarCodeNumState")->find();
        if($uarState==1){
            $data["mrcMUid"]=$_POST["mrcMUid"];
            $data["mrcRegCode"]=$_POST["mrcRegCode"];
            $data["mrcPrice"]=$_POST["mrcPrice"];
            $data["mrcHuiPrice"]=$_POST["mrcHuiPrice"];
            $data["mrcPayPrice"]=$_POST["mrcPayPrice"];
            $data["mrcMorZ"]=1;
            $data["mrcStartDate"]=date("Y-m-d H:i:s");
            $mregcodes=M("mregcodes");
            $result=$mregcodes->add($data);
            if($result){
                $datas["uarState"]=$uarState;
                $datas["uarCodeNumState"]=$fafangnum["uarCodeNumState"]+1;
                $apply->where("uarId={$uarId}")->save($datas);
                $this->success("手续费发放成功",U("regcodelists"));
            }else{
                $this->error("手续费发放失败");
            }
        }elseif($uarState==2){
            $rs_apply=$apply->where("uarId={$uarId}")->find();
            $data["uarState"]=$uarState;
            $data["uarErrorNum"]=$rs_apply["uarErrorNum"]+1;
            $result=$apply->where("uarId={$uarId}")->save($data);
            if($result){
                $this->success("信息错误，虚假提交，给予警告",U("regcodelists"));
            }else{
                $this->error("相关结果处理失败");
            }
        }elseif($uarState==3){
            $rs_apply=$apply->where("uarId={$uarId}")->find();
            $uId=$rs_apply["uarUid"];
            $users=M("users");
            $datalock["uLock"]=0;
            $data["uarState"]=$uarState;
            $data["uarErrorNum"]=$rs_apply["uarErrorNum"]+1;
            $result=$apply->where("uarId={$uarId}")->save($data);
            if($result){
                $users->where("uId={$uId}")->save($datalock);
                $this->success("多次信息错误，给予冻结锁定账户",U("regcodelists"));
            }else{
                $this->error("相关结果处理失败");
            }
        }elseif($uarState==4){
            $rs_apply=$apply->where("uarId={$uarId}")->find();
            $uId=$rs_apply["uarUid"];
            $users=M("users");
            $datalock["uLock"]=-1;
            $data["uarState"]=$uarState;
            $data["uarErrorNum"]=$rs_apply["uarErrorNum"]+1;
            $result=$apply->where("uarId={$uarId}")->save($data);
            if($result){
                $users->where("uId={$uId}")->save($datalock);
                $this->success("恶意提交虚假信息多次，给予封号处理",U("regcodelists"));
            }else{
                $this->error("相关结果处理失败");
            }
        }
    }
    //审核发送 排单币提交
    public function PaidanbishenhetijiaoAction(){
        $this->LoginTrue();
        $uarId=$_GET["uarId"];
        $uarState=$_POST["uarState"];
        $apply=M("users_paidanbi_regcode");
        $fafangnum=$apply->where("uarId={$uarId}")->field("uarCodeNumState")->find();
        if($uarState==1){
            $rs_applyd=$apply->where("uarId={$uarId}")->find();
            $uId=$rs_applyd["uarUid"];
            $usersd=M("users");
            $fafangnumd=$usersd->where("uId={$uId}")->field("paiDanBi")->find();
            $datalockd["paiDanBi"]=$_POST["mrcRegCode"]+$fafangnumd['paiDanBi'];

            $usersd->where("uId={$uId}")->save($datalockd);
            $datas["uarState"]=$uarState;
            $datas["uarCodeNumState"]=$fafangnum["uarCodeNumState"]+1;
            $rpaidan=$apply->where("uarId={$uarId}")->setfield($datas);
            if($rpaidan){
                $this->success("排单币发放成功",U("paidanbicode"));
            }else{
                $this->error("排单币发放失败");
            }
        }elseif($uarState==2){
            $rs_apply=$apply->where("uarId={$uarId}")->find();
            $data["uarState"]=$uarState;
            $data["uarErrorNum"]=$rs_apply["uarErrorNum"]+1;
            $result=$apply->where("uarId={$uarId}")->save($data);
            if($result){
                $this->success("信息错误，虚假提交，给予警告",U("paidanbicode"));
            }else{
                $this->error("相关结果处理失败");
            }
        }elseif($uarState==3){
            $rs_apply=$apply->where("uarId={$uarId}")->find();
            $uId=$rs_apply["uarUid"];
            $users=M("users");
            $datalock["uLock"]=0;
            $data["uarState"]=$uarState;
            $data["uarErrorNum"]=$rs_apply["uarErrorNum"]+1;
            $result=$apply->where("uarId={$uarId}")->save($data);
            if($result){
                $users->where("uId={$uId}")->save($datalock);
                $this->success("多次信息错误，给予冻结锁定账户",U("paidanbicode"));
            }else{
                $this->error("相关结果处理失败");
            }
        }elseif($uarState==4){
            $rs_apply=$apply->where("uarId={$uarId}")->find();
            $uId=$rs_apply["uarUid"];
            $users=M("users");
            $datalock["uLock"]=-1;
            $data["uarState"]=$uarState;
            $data["uarErrorNum"]=$rs_apply["uarErrorNum"]+1;
            $result=$apply->where("uarId={$uarId}")->save($data);
            if($result){
                $users->where("uId={$uId}")->save($datalock);
                $this->success("恶意提交虚假信息多次，给予封号处理",U("paidanbicode"));
            }else{
                $this->error("相关结果处理失败");
            }
        }
    }
}