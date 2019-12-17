<?php
namespace System\Controller;
use Think\Controller;
class AutomaticexecutionController extends Controller {
    //这个方法是系统自动发放投资中的利息
    public function OperatingSystemAutomaticallyPerformsCalculationOfInterest(){
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
                    $datalog["mlPorC"]=1;
                    $datalog["mlPorM"]=1;
                    $datalog["mlSuccess"]=1;
                    $nowtimes=date("YmdHis");
                    $datalog["mlRandNumber"]="I".$nowtimes.$datalog["mlUid"];
                    $money_log->add($datalog);
                }else{
                    $datalog["mlUid"]=$uId;
                    $datalog["mlJiner"]=$daylixi;
                    $datalog["mlMoneyType"]=2;
                    $datalog["mlDate"]=date("Y-m-d H:i:s");
                    $nowdate=date("Y-m-d");
                    $datalog["mlToday"]=$nowdate;
                    $datalog["mlInfo"]=$nowdate." 发放利息";
                    $datalog["mlPorC"]=1;
                    $datalog["mlPorM"]=1;
                    $datalog["mlSuccess"]=2;
                    $nowtimes=date("YmdHis");
                    $datalog["mlRandNumber"]="I".$nowtimes.$datalog["mlUid"];
                    $money_log->add($datalog);
                }
            }
        }
    }
    //这里是系统执行匹配之前的利息
    public function TheOperatingSystemAutomaticallyPerformsCalculationOfPastInterest(){
        $users=M("users");
        $users_invest=M("users_invest");
        $reggrades=M("reggrades");
        $money_log=M("money_log");
        $users_parameters=M("users_parameters");
        $users_touzidata=M("users_touzidata");
        //获取算利息的模式【固定还是浮动】
        $rs_paramenters=$users_parameters->where("upId=1")->field("upPDLXONorOFF,upPDLXDay,upShowITgnum,upShowIJsnum,upLXType,upGuDingLX")->find();
        //获取会员ID及等级VIP 的id
        if($rs_paramenters["upPDLXONorOFF"]==1){
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
                        $datalog["mlPorC"]=1;
                        $datalog["mlPorM"]=1;
                        $datalog["mlSuccess"]=1;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="LI".$nowtimes.$datalog["mlUid"];
                        $money_log->add($datalog);
                    }else{
                        $datalog["mlUid"]=$uId;
                        $datalog["mlJiner"]=$daylixi;
                        $datalog["mlMoneyType"]=2;
                        $datalog["mlDate"]=date("Y-m-d H:i:s");
                        $nowdate=date("Y-m-d");
                        $datalog["mlToday"]=$nowdate;
                        $datalog["mlInfo"]=$nowdate." 发放排单利息";
                        $datalog["mlPorC"]=1;
                        $datalog["mlPorM"]=1;
                        $datalog["mlSuccess"]=2;
                        $nowtimes=date("YmdHis");
                        $datalog["mlRandNumber"]="LI".$nowtimes.$datalog["mlUid"];
                        $money_log->add($datalog);
                    }
                }
            }
        }
    }   
}