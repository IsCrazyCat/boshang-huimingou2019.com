<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class FinanceController extends LoginTrueController {
    public function AllMoneyLogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlSuccess=1 AND mlShow=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
    public function NoShowMoneyLogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlSuccess=1 AND mlShow=0")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
    public function SetMoney(){
        $this->LoginTrue();
        $this->display();
    }
    public function SetMoneyAction(){
        $this->LoginTrue();
        $aSpasswd=$_POST["aSpasswd"];
        $aSpasswdb=$_POST["aSpasswdb"];
        $randPwd=md5(date("YmdH"));
        $qianpwd=md5($aSpasswd);
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        if(md5($aSpasswd)!=$rs_system["sSpwd"]){
            $this->error("安全密码前缀错误，请重新输入");
        }elseif(md5($aSpasswdb)!=$randPwd){
            $this->error("安全密码后缀错误，请重新输入");
        }elseif((md5($aSpasswd)==$rs_system["sSpwd"]) && (md5($aSpasswdb)==$randPwd)){
            $this->success("安全密码正确",U("setmoneylists?spwd=$qianpwd"));
        }
    }
    public function SetMoneyLists(){
        $this->LoginTrue();
        $spwd=$_GET["spwd"];
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        if($spwd==$rs_system["sSpwd"]){
            $this->assign("spwd",$spwd);
            $this->display();
        }else{
            $this->error("非法访问",U("Index/welcome"));
        }
    }
    public function SetUsersLists(){
        $this->LoginTrue();
/*         $spwd2=$_POST["spwd2"];
        if($spwd2==""){
            $spwd2=$_GET["spwd2"];
        }
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        if($spwd2==$rs_system["sSpwd"]){
            $this->assign("spwd2",$spwd2); */
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
/*         }else{
            $this->error("非法访问",U("setmoney"));
        } */
    }
    public function UpdateUser(){
        $this->LoginTrue();
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        $spwd2=$rs_system["sSpwd"];
        $this->assign("spwd2",$spwd2);
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
        $data["uJiangjin"]=trim($_POST["uJiangjin"]);
        $data["uLixi"]=trim($_POST["uLixi"]);
        $data["uNowLixi"]=trim($_POST["uNowLixi"]);
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
            $this->success("更改会员资料成功");
        }else{
            $this->error("更改会员资料失败");
        }
    }
    public function DelUsers(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $result=$users->where("uId={$uId}")->delete();
        if($result){
            $this->success("删除会员成功，本页面已经过期",U("setmoney"));
        }else{
            $this->error("删除会员失败，本页面已经过期",U("setmoney"));
        }
    }
    public function JiaUpdateUser(){
        $this->LoginTrue();
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        $spwd2=$rs_system["sSpwd"];
        $this->assign("spwd2",$spwd2);
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    public function JiaUpdateUserAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $uJiangjin=$_POST["uJiangjin"];
        $uLixi=$_POST["uLixi"];
        $uNowLixi=$_POST["uNowLixi"];
        $jinerType=$_POST["jinerType"];
        $zJiner=$_POST["zJiner"];
        $log=$_POST["log"];
        $money_log=M("money_log");
        if($jinerType==1){
            $data["uJiangjin"]=$uJiangjin+$zJiner;
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                $datalog["mlUid"]=$uId;
                $datalog["mlJiner"]=$zJiner;
                $datalog["mlMoneyType"]=3;  //3为奖金
                $datalog["mlDate"]=date("Y-m-d H:i:s");
                $nowdate=date("Y-m-d");
                $datalog["mlToday"]=$nowdate;
                $datalog["mlInfo"]=$log;
                $datalog["mlPorC"]=2;  //2为人工
                $datalog["mlPorM"]=4; //4为赠送
                $datalog["mlSuccess"]=1;  //1为成功
                $nowtimes=date("YmdHis");
                $datalog["mlRandNumber"]="m-z-bonus-".$nowtimes."-".$datalog["mlUid"];
                $money_log->add($datalog);
                $this->success("赠送成功");
            }else{
                $this->error("赠送失败");
            }
        }else{
            $data["uLixi"]=$uLixi+$zJiner;
            $data["uNowLixi"]=$uNowLixi+$zJiner;
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                $datalog["mlUid"]=$uId;
                $datalog["mlJiner"]=$zJiner;
                $datalog["mlMoneyType"]=2;  //2为利息
                $datalog["mlDate"]=date("Y-m-d H:i:s");
                $nowdate=date("Y-m-d");
                $datalog["mlToday"]=$nowdate;
                $datalog["mlInfo"]=$log;
                $datalog["mlPorC"]=2;  //2为人工
                $datalog["mlPorM"]=4; //4为赠送
                $datalog["mlSuccess"]=1;  //1为成功
                $nowtimes=date("YmdHis");
                $datalog["mlRandNumber"]="m-z-interest-".$nowtimes."-".$datalog["mlUid"];
                $money_log->add($datalog);
                $this->success("赠送成功");
            }else{
                $this->error("赠送失败");
            }
        }
    }
    public function JianUpdateUser(){
        $this->LoginTrue();
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        $spwd2=$rs_system["sSpwd"];
        $this->assign("spwd2",$spwd2);
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    public function JianUpdateUserAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $uJiangjin=$_POST["uJiangjin"];
        $uLixi=$_POST["uLixi"];
        $uNowLixi=$_POST["uNowLixi"];
        $jinerType=$_POST["jinerType"];
        $zJiner=$_POST["zJiner"];
        $log=$_POST["log"];
        $money_log=M("money_log");
        if($jinerType==1){
            $data["uJiangjin"]=$uJiangjin-$zJiner;
            if($data["uJiangjin"]<0){
                $this->error("你输入的金额超过会员原有的奖金");
            }
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                $datalog["mlUid"]=$uId;
                $datalog["mlJiner"]=$zJiner;
                $datalog["mlMoneyType"]=3;  //3为奖金
                $datalog["mlDate"]=date("Y-m-d H:i:s");
                $nowdate=date("Y-m-d");
                $datalog["mlToday"]=$nowdate;
                $datalog["mlInfo"]=$log;
                $datalog["mlPorC"]=2;  //2为人工
                $datalog["mlPorM"]=3; //3为扣除
                $datalog["mlSuccess"]=1;  //1为成功
                $nowtimes=date("YmdHis");
                $datalog["mlRandNumber"]="m-k-bonus-".$nowtimes."-".$datalog["mlUid"];
                $money_log->add($datalog);
                $this->success("扣除成功");
            }else{
                $this->error("扣除失败");
            }
        }else{
            $data["uLixi"]=$uLixi-$zJiner;
            if($data["uLixi"]<0){
                $this->error("你输入的金额超过会员原有的总利息");
            }
            $data["uNowLixi"]=$uNowLixi-$zJiner;
            if($data["uNowLixi"]<0){
                $data["uNowLixi"]=0;
            }
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                $datalog["mlUid"]=$uId;
                $datalog["mlJiner"]=$zJiner;
                $datalog["mlMoneyType"]=2;  //2为利息
                $datalog["mlDate"]=date("Y-m-d H:i:s");
                $nowdate=date("Y-m-d");
                $datalog["mlToday"]=$nowdate;
                $datalog["mlInfo"]=$log;
                $datalog["mlPorC"]=2;  //2为人工
                $datalog["mlPorM"]=3; //3为扣除
                $datalog["mlSuccess"]=1;  //1为成功
                $nowtimes=date("YmdHis");
                $datalog["mlRandNumber"]="m-k-interest-".$nowtimes."-".$datalog["mlUid"];
                $money_log->add($datalog);
                $this->success("扣除成功");
            }else{
                $this->error("扣除失败");
            }
        }
    }
    //这里是隐身的方法
    public function setInvisible(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $data["uMXInvisible"]=$_GET["uMXInvisible"];
        $users=M("users");
        $result=$users->where("uId={$uId}")->save($data);
        if($result){
            $this->success("操作成功");
        }else{
            $this->error("操作失败");
        }
    }
    //这里是隐身的状态
    public function setInvisibleValid(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $data["uMXInvisibleValid"]=$_GET["uMXInvisibleValid"];
        $users=M("users");
        $result=$users->where("uId={$uId}")->save($data);
        if($result){
            $this->success("操作成功");
        }else{
            $this->error("操作失败");
        }
    }
    public function SetParameters(){
        $this->LoginTrue();
        $parameters=M("users_parameters");
        $rs_parameters=$parameters->where("upId=1")->find();
        $this->assign("rs_parameters",$rs_parameters);
        $this->display();
    }
    public function SetParametersAction(){
        $this->LoginTrue();
        $parameters=M("users_parameters");
        $data["upPDLXONorOFF"]=$_POST["upPDLXONorOFF"];
        $data["upPDLXDay"]=$_POST["upPDLXDay"];
        $data["upTypeInvestment"]=$_POST["upTypeInvestment"];
        $data["upTZMultiples"]=$_POST["upTZMultiples"];
        $data["upMaxMoney"]=$_POST["upMaxMoney"];
        $data["upLXType"]=$_POST["upLXType"];
        $data["upRegCodeNum"]=$_POST["upRegCodeNum"];
        if($data["upRegCodeNum"]<2){
          //  $this->error("配置错误,必须大于0");
        }
        $data["upGuDingLX"]=$_POST["upGuDingLX"];
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
        $data["upTXSXMoney"]=$_POST["upTXSXMoney"];
        $data["upTermOfInvestment"]=$_POST["upTermOfInvestment"];
        $data["upPaymentPeriod"]=$_POST["upPaymentPeriod"];
        $data["upCollectionPeriod"]=$_POST["upCollectionPeriod"];
        $data["upRepeatInvestment"]=$_POST["upRepeatInvestment"];
        $data["upReact"]=$_POST["upReact"];
        $data["upRegCodeState"]=$_POST["upRegCodeState"];
        $data["upRegCodePrice"]=$_POST["upRegCodePrice"];
        $data["upRegJiangjin"]=$_POST["upRegJiangjin"];
        $data["upRegLixi"]=$_POST["upRegLixi"];
        $data["upShowITgnum"]=$_POST["upShowITgnum"];
        $data["upShowIJsnum"]=$_POST["upShowIJsnum"];
        $data["upQiandaoONOFF"]=$_POST["upQiandaoONOFF"];
        $data["upQiandaoJiangMin"]=$_POST["upQiandaoJiangMin"];
        $data["upQiandaoJiangMax"]=$_POST["upQiandaoJiangMax"];
        $result=$parameters->where("upId=1")->save($data);
        if($result){
            $this->success("更新会员参数成功");
        }else{
            $this->error("更新会员参数失败");
        }
    }
    //隐身模块列表
    public function NoShowLists(){
        $this->LoginTrue();
        $this->display();
    }
    //隐身会员列表的设置
    public function NoShowUsersLists(){
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
public function CalculationOfTheInterestOfTheArtificialExecutiveProgram(){
        $this->LoginTrue();
        $spwd=$_POST["spwd"];
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        if($spwd==$rs_system["sSpwd"]){
            $users=M("users");
            $users_invest=M("users_invest");
            $reggrades=M("reggrades");
            $money_log=M("money_log");
            $users_parameters=M("users_parameters");
            $users_touzidata=M("users_touzidata");
            //获取算利息的模式【固定还是浮动】
            $rs_paramenters=$users_parameters->where("upId=1")->field("upShowITgnum,upShowIJsnum,upLXType,upGuDingLX")->find();
            //获取会员ID及等级VIP 的id
            $rs_users=$users->where("uState=1 AND uLock=1 AND uTouziState=1")->field("uId,uVip")->select();
            foreach($rs_users as $val_users){
                $uId=$val_users["uId"];
                //首先看等级，看用什么方式计算利息
                $uservip=$val_users["uVip"];
                $chavip=$reggrades->where("rgId={$uservip}")->find();
                $viplilv=$chavip["rgLixi"];
                if($rs_paramenters["upLXType"]==1){
                    //当前的模式采用的是固定的计息模式
                    //来算一下未到期的本金
                    $rs_benjin=$users_invest->where("uiUid={$uId} AND uiSuccess=1 AND uiTouziEnd=0")->sum("uiUJiner");
                    $daylixi=$rs_benjin*($rs_paramenters["upGuDingLX"]+$viplilv);
                }else{
                    //否则当前的模式采用的是浮动的计息模式
                    //先获取投资中的所有本金
                    $rs_touzibenjin=$users_invest->where("uiUid={$uId} AND uiSuccess=1 AND uiTouziEnd=0")->field("uiUJiner")->select();
                    $daylixi=0;
                    foreach($rs_touzibenjin as $val_touzibenjin){
                        $touzibenjin=$val_touzibenjin["uiUJiner"];
                        $rs_touzidata=$users_touzidata->where("utBenjin={$touzibenjin}")->find();
                        $onelixi=$touzibenjin*($rs_touzidata["utJBLixi"]+$viplilv);
                        $daylixi+=$onelixi;
                    }
                }
                $gengxinusers=$users->where("uId={$uId}")->field("uNowLixi,uLixi,uMXInvisible,uMXInvisibleValid")->find();
                //以下2句话是隐身做准备的[这个是接受援助用的]
                $yinshenonoff=$gengxinusers["uMXInvisible"];
                $yinshenstate=$gengxinusers["uMXInvisibleValid"];
                //隐身功能的处理
                if($yinshenonoff==0){
                    if($yinshenstate==1 || $yinshenstate==2){
                        $datalog["mlShow"]=0;
                    }
                }
                $yuannowlixi=$gengxinusers["uNowLixi"];
                $data["uNowLixi"]=$yuannowlixi+$daylixi;
                $savetmp=$data["uNowLixi"];
                if($yuannowlixi<$gengxinusers["uLixi"]){
                    if($data["uNowLixi"]>$gengxinusers["uLixi"]){
                        $data["uNowLixi"]=$gengxinusers["uLixi"];
                        $daylixi=$gengxinusers["uLixi"]-$yuannowlixi;
                    }
                    $result=$users->where("uId={$uId}")->save($data);
                    if($result){
                        $datalog["mlUid"]=$uId;
                        $datalog["mlJiner"]=$daylixi;
                        $datalog["mlMoneyType"]=2;
                        $datalog["mlDate"]=date("Y-m-d H:i:s");
                        $nowdate=date("Y-m-d");
                        $datalog["mlToday"]=$nowdate;
                        $datalog["mlInfo"]=$nowdate." 发放利息";
                        $datalog["mlPorC"]=2;
                        $datalog["mlPorM"]=1;
                        $datalog["mlSuccess"]=1;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="m-interest-".$nowtimes."-".$datalog["mlUid"];
                        $money_log->add($datalog);
                    }else{
                        $datalog["mlUid"]=$uId;
                        $datalog["mlJiner"]=$daylixi;
                        $datalog["mlMoneyType"]=2;
                        $datalog["mlDate"]=date("Y-m-d H:i:s");
                        $nowdate=date("Y-m-d");
                        $datalog["mlToday"]=$nowdate;
                        $datalog["mlInfo"]=$nowdate." 发放利息";
                        $datalog["mlPorC"]=2;
                        $datalog["mlPorM"]=1;
                        $datalog["mlSuccess"]=2;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="m-interest-".$nowtimes."-".$datalog["mlUid"];
                        $money_log->add($datalog);
                        //$this->error("执行发放利息失败,该页面目前已经过期",U("setmoney"),3);
                    }
                }
            }
            $this->success("执行发放利息成功,该页面目前已经过期，即将退出",U("setmoney"),5);
        }else{
        $this->error("非法访问",U("setmoney"));
         }
    }
    public function ManualDeductionOfTodayInterestCalculationOperation(){
        $this->LoginTrue();
        $spwd1=$_POST["spwd1"];
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        if($spwd1==$rs_system["sSpwd"]){
            $users=M("users");
            $users_invest=M("users_invest");
            $reggrades=M("reggrades");
            $money_log=M("money_log");
            $users_parameters=M("users_parameters");
            $users_touzidata=M("users_touzidata");
            //获取算利息的模式【固定还是浮动】
            $rs_paramenters=$users_parameters->where("upId=1")->field("upShowITgnum,upShowIJsnum,upLXType,upGuDingLX")->find();
            //获取会员ID及等级VIP 的id
            $rs_users=$users->where("uState=1 AND uLock=1 AND uTouziState=1")->field("uId,uVip")->select();
            foreach($rs_users as $val_users){
                $uId=$val_users["uId"];
                //首先看等级，看用什么方式计算利息
                $uservip=$val_users["uVip"];
                $chavip=$reggrades->where("rgId={$uservip}")->find();
                $viplilv=$chavip["rgLixi"];
                if($rs_paramenters["upLXType"]==1){
                    //当前的模式采用的是固定的计息模式
                    //来算一下未到期的本金
                    $rs_benjin=$users_invest->where("uiUid={$uId} AND uiSuccess=1 AND uiTouziEnd=0")->sum("uiUJiner");
                    $daylixi=$rs_benjin*($rs_paramenters["upGuDingLX"]+$viplilv);
                }else{
                    //否则当前的模式采用的是浮动的计息模式
                    //先获取投资中的所有本金
                    $rs_touzibenjin=$users_invest->where("uiUid={$uId} AND uiSuccess=1 AND uiTouziEnd=0")->field("uiUJiner")->select();
                    $daylixi=0;
                    foreach($rs_touzibenjin as $val_touzibenjin){
                        $touzibenjin=$val_touzibenjin["uiUJiner"];
                        $rs_touzidata=$users_touzidata->where("utBenjin={$touzibenjin}")->find();
                        $onelixi=$touzibenjin*($rs_touzidata["utJBLixi"]+$viplilv);
                        $daylixi+=$onelixi;
                    }
                }
                $gengxinusers=$users->where("uId={$uId}")->field("uNowLixi,uLixi,uMXInvisible,uMXInvisibleValid")->find();
                //以下2句话是隐身做准备的[这个是接受援助用的]
                $yinshenonoff=$gengxinusers["uMXInvisible"];
                $yinshenstate=$gengxinusers["uMXInvisibleValid"];
                //隐身功能的处理
                if($yinshenonoff==0){
                    if($yinshenstate==1 || $yinshenstate==2){
                        $datalog["mlShow"]=0;
                    }
                }
                $yuannowlixi=$gengxinusers["uNowLixi"];
                $data["uNowLixi"]=$yuannowlixi-$daylixi;
                if($data["uNowLixi"]>=0){
                    $result=$users->where("uId={$uId}")->save($data);
                    if($result){
                        $datalog["mlUid"]=$uId;
                        $datalog["mlJiner"]=$daylixi;
                        $datalog["mlMoneyType"]=2;
                        $datalog["mlDate"]=date("Y-m-d H:i:s");
                        $nowdate=date("Y-m-d");
                        $datalog["mlToday"]=$nowdate;
                        $datalog["mlInfo"]=$nowdate." 扣除利息";
                        $datalog["mlPorC"]=2;
                        $datalog["mlPorM"]=3;
                        $datalog["mlSuccess"]=1;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="m-interest-".$nowtimes."-".$datalog["mlUid"];
                        $money_log->add($datalog);
                    }else{
                        $datalog["mlUid"]=$uId;
                        $datalog["mlJiner"]=$daylixi;
                        $datalog["mlMoneyType"]=2;
                        $datalog["mlDate"]=date("Y-m-d H:i:s");
                        $nowdate=date("Y-m-d");
                        $datalog["mlToday"]=$nowdate;
                        $datalog["mlInfo"]=$nowdate." 扣除利息";
                        $datalog["mlPorC"]=2;
                        $datalog["mlPorM"]=3;
                        $datalog["mlSuccess"]=2;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="m-interest-".$nowtimes."-".$datalog["mlUid"];
                        $money_log->add($datalog);
                       // $this->error("执行扣除利息失败,该页面目前已经过期",U("setmoney"),3);
                    }
                }
            }
            $this->success("执行扣除利息成功,该页面目前已经过期，即将退出",U("setmoney"),5);
        }else{
            $this->error("非法访问",U("setmoney"));
        }
    }
    //手工发放排单期间的利息
    public function PaiDanCalculationOfTheInterestOfTheArtificialExecutiveProgram(){
        $this->LoginTrue();
        $spwd=$_POST["spwd"];
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        if($spwd==$rs_system["sSpwd"]){
            $users=M("users");
            $users_invest=M("users_invest");
            $reggrades=M("reggrades");
            $money_log=M("money_log");
            $users_parameters=M("users_parameters");
            $users_touzidata=M("users_touzidata");
            //获取算利息的模式【固定还是浮动】
            $rs_paramenters=$users_parameters->where("upId=1")->field("upPDLXONorOFF,upShowITgnum,upShowIJsnum,upLXType,upGuDingLX")->find();
            //先判断是否开启排单期间的利息
            if($rs_paramenters["upPDLXONorOFF"]==1){
                //获取会员ID及等级VIP 的id
                $rs_users=$users->where("uState=1 AND uLock=1")->field("uId,uVip")->select();
            foreach($rs_users as $val_users){
                $uId=$val_users["uId"];
                //首先看等级，看用什么方式计算利息
                $uservip=$val_users["uVip"];
                $chavip=$reggrades->where("rgId={$uservip}")->find();
                $viplilv=$chavip["rgLixi"];
                if($rs_paramenters["upLXType"]==1){
                    //当前的模式采用的是固定的计息模式
                    //来算一下未到期的本金
                    $rs_benjin=$users_invest->where("uiUid={$uId} AND uiState=0")->sum("uiUJiner");
                    $daylixi=$rs_benjin*($rs_paramenters["upGuDingLX"]+$viplilv);
                }else{
                    //否则当前的模式采用的是浮动的计息模式
                    //先获取未匹配中的资金
                    $rs_touzibenjin=$users_invest->where("uiUid={$uId} AND uiState=0")->field("uiUJiner")->select();
                    $daylixi=0;
                    foreach($rs_touzibenjin as $val_touzibenjin){
                        $touzibenjin=$val_touzibenjin["uiUJiner"];
                        $rs_touzidata=$users_touzidata->where("utBenjin={$touzibenjin}")->find();
                        $onelixi=$touzibenjin*($rs_touzidata["utJBLixi"]+$viplilv);
                        $daylixi+=$onelixi;
                    }
                }
                $gengxinusers=$users->where("uId={$uId}")->field("uPDLixi,uPDLixiMax,uMXInvisible,uMXInvisibleValid")->find();
                //以下2句话是隐身做准备的[这个是接受援助用的]
                $yinshenonoff=$gengxinusers["uMXInvisible"];
                $yinshenstate=$gengxinusers["uMXInvisibleValid"];
                //隐身功能的处理
                if($yinshenonoff==0){
                    if($yinshenstate==1 || $yinshenstate==2){
                        $datalog["mlShow"]=0;
                    }
                }
                $yuannowlixi=$gengxinusers["uPDLixi"];
                $data["uPDLixi"]=$yuannowlixi+$daylixi;
                $savetmp=$data["uPDLixi"];
                if($yuannowlixi<$gengxinusers["uPDLixiMax"]){
                    if($data["uPDLixi"]>$gengxinusers["uPDLixiMax"]){
                        $data["uPDLixi"]=$gengxinusers["uPDLixiMax"];
                        $daylixi=$gengxinusers["uPDLixiMax"]-$yuannowlixi;
                    }
                    $result=$users->where("uId={$uId}")->save($data);
                    if($result){
                           $datalog["mlUid"]=$uId;
                            $datalog["mlJiner"]=$daylixi;
                            $datalog["mlMoneyType"]=2;
                            $datalog["mlDate"]=date("Y-m-d H:i:s");
                            $nowdate=date("Y-m-d");
                            $datalog["mlToday"]=$nowdate;
                            $datalog["mlInfo"]=$nowdate." 发放排单利息";
                            $datalog["mlPorC"]=2;
                            $datalog["mlPorM"]=1;
                            $datalog["mlSuccess"]=1;
                            $nowtimes=date("YmdHis");
                            $datalog["mlRandNumber"]="m-l-interest-".$nowtimes."-".$datalog["mlUid"];
                            $money_log->add($datalog);
                        }else{
                            $datalog["mlUid"]=$uId;
                            $datalog["mlJiner"]=$daylixi;
                            $datalog["mlMoneyType"]=2;
                            $datalog["mlDate"]=date("Y-m-d H:i:s");
                            $nowdate=date("Y-m-d");
                            $datalog["mlToday"]=$nowdate;
                            $datalog["mlInfo"]=$nowdate." 发放排单利息";
                            $datalog["mlPorC"]=2;
                            $datalog["mlPorM"]=1;
                            $datalog["mlSuccess"]=2;
                            $nowtimes=date("YmdHis");
                            $datalog["mlRandNumber"]="m-l-interest-".$nowtimes."-".$datalog["mlUid"];
                            $money_log->add($datalog);
                            //$this->error("执行发放利息失败,该页面目前已经过期",U("setmoney"),3);
                        }
                    }
                }
                $this->success("执行发放利息成功,该页面目前已经过期，即将退出",U("setmoney"),5);
            }else{
                $this->error("执行失败，暂时没有开启排单利息",U("setmoney"));
            }
        }else{
            $this->error("非法访问",U("setmoney"));
        }
    }
    public function PaiDanManualDeductionOfTodayInterestCalculationOperation(){
        $this->LoginTrue();
        $spwd1=$_POST["spwd1"];
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sSpwd")->find();
        if($spwd1==$rs_system["sSpwd"]){
            $users=M("users");
            $users_invest=M("users_invest");
            $reggrades=M("reggrades");
            $money_log=M("money_log");
            $users_parameters=M("users_parameters");
            $users_touzidata=M("users_touzidata");
            //获取算利息的模式【固定还是浮动】
            $rs_paramenters=$users_parameters->where("upId=1")->field("upPDLXONorOFF,upShowITgnum,upShowIJsnum,upLXType,upGuDingLX")->find();
            //先判断是否开启排单期间的利息
            if($rs_paramenters["upPDLXONorOFF"]==1){
            //获取会员ID及等级VIP 的id
            $rs_users=$users->where("uState=1 AND uLock=1")->field("uId,uVip")->select();
            foreach($rs_users as $val_users){
                $uId=$val_users["uId"];
                //首先看等级，看用什么方式计算利息
                $uservip=$val_users["uVip"];
                $chavip=$reggrades->where("rgId={$uservip}")->find();
                $viplilv=$chavip["rgLixi"];
                if($rs_paramenters["upLXType"]==1){
                    //当前的模式采用的是固定的计息模式
                    //来算未匹配的本金
                    $rs_benjin=$users_invest->where("uiUid={$uId} AND uiState=0")->sum("uiUJiner");
                    $daylixi=$rs_benjin*($rs_paramenters["upGuDingLX"]+$viplilv);
                }else{
                    //否则当前的模式采用的是浮动的计息模式
                    //先获取投资中的所有本金
                    $rs_touzibenjin=$users_invest->where("uiUid={$uId} AND uiState=0")->field("uiUJiner")->select();
                    $daylixi=0;
                    foreach($rs_touzibenjin as $val_touzibenjin){
                        $touzibenjin=$val_touzibenjin["uiUJiner"];
                        $rs_touzidata=$users_touzidata->where("utBenjin={$touzibenjin}")->find();
                        $onelixi=$touzibenjin*($rs_touzidata["utJBLixi"]+$viplilv);
                        $daylixi+=$onelixi;
                    }
                }
                $gengxinusers=$users->where("uId={$uId}")->field("uPDLixi,uPDLixiMax,uMXInvisible,uMXInvisibleValid")->find();
                //以下2句话是隐身做准备的[这个是接受援助用的]
                $yinshenonoff=$gengxinusers["uMXInvisible"];
                $yinshenstate=$gengxinusers["uMXInvisibleValid"];
                //隐身功能的处理
                if($yinshenonoff==0){
                    if($yinshenstate==1 || $yinshenstate==2){
                        $datalog["mlShow"]=0;
                    }
                }
                $yuannowlixi=$gengxinusers["uPDLixi"];
                $data["uPDLixi"]=$yuannowlixi-$daylixi;
                if($data["uPDLixi"]>=0){
                    $result=$users->where("uId={$uId}")->save($data);
                    if($result){
                        $datalog["mlUid"]=$uId;
                        $datalog["mlJiner"]=$daylixi;
                        $datalog["mlMoneyType"]=2;
                        $datalog["mlDate"]=date("Y-m-d H:i:s");
                        $nowdate=date("Y-m-d");
                        $datalog["mlToday"]=$nowdate;
                        $datalog["mlInfo"]=$nowdate." 扣除排单利息";
                        $datalog["mlPorC"]=2;
                        $datalog["mlPorM"]=3;
                        $datalog["mlSuccess"]=1;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="m-l-interest-".$nowtimes."-".$datalog["mlUid"];
                        if($data["uPDLixi"]>=0){
                        $money_log->add($datalog);
                        }
                    }else{
                        $datalog["mlUid"]=$uId;
                        $datalog["mlJiner"]=$daylixi;
                        $datalog["mlMoneyType"]=2;
                        $datalog["mlDate"]=date("Y-m-d H:i:s");
                        $nowdate=date("Y-m-d");
                        $datalog["mlToday"]=$nowdate;
                        $datalog["mlInfo"]=$nowdate." 扣除排单利息";
                        $datalog["mlPorC"]=2;
                        $datalog["mlPorM"]=3;
                        $datalog["mlSuccess"]=2;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="m-l-interest-".$nowtimes."-".$datalog["mlUid"];
                        if($data["uPDLixi"]>0){
                        $money_log->add($datalog);
                        }
                        // $this->error("执行扣除利息失败,该页面目前已经过期",U("setmoney"),3);
                    }
                }
            }
            $this->success("执行扣除利息成功,该页面目前已经过期，即将退出",U("setmoney"),5);
            }else{
                $this->error("执行失败，暂时没有开启排单利息",U("setmoney"));
            }
            }else{
            $this->error("非法访问",U("setmoney"));
        }
    }
}