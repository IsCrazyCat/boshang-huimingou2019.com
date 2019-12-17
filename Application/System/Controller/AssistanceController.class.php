<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class AssistanceController extends LoginTrueController {
    public function WantInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiState=0 AND uiShow=1")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function NoShowWantInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiState=0  AND uiShow=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function DelWantinv(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiId={$uiId}")->field("uiUid,uiUJiner")->find();
        $uId=$rs_invest["uiUid"];
        $touzijiner=$rs_invest["uiUJiner"];
        $uiUid=$uId;
        $users=M("users");
        $users_parameters=M("users_parameters");
        $rs_paramenters=$users_parameters->where("upId=1")->field("upPDLXONorOFF")->find();
        $rs_users=$users->where("uId={$uId}")->field("uPDLixi,uPDLixiMax,uMXInvisible,uMXInvisibleValid")->find();
        //以下2句话是隐身做准备的[这个是清除援助的]
        $yinshenonoff=$rs_users["uMXInvisible"];
        $yinshenstate=$rs_users["uMXInvisibleValid"];
        
        $result=$users_invest->where("uiId={$uiId}")->delete();
        $uPDLixi=$rs_users["uPDLixi"];
        $data["uPDLixi"]=0;
        $data["uPDLixiMax"]=0;
        //日志记录
        //日志的记录
        $money_log=M("money_log");
        $nowdatetimes=date("Y-m-d H:i:s");
        $nowtimes=date("YmdHis");
        $today=date("Y-m-d");
        //提供排队援助日志记录
        //隐身功能的处理
        if($yinshenonoff==0){
            if($yinshenstate==1 || $yinshenstate==2){
                $datalogtigong["mlShow"]=0;
                $dataloglixi["mlShow"]=0;
            }
        }
        $datalogtigong["mlUid"]=$uiUid;
        $datalogtigong["mlJiner"]=$touzijiner;
        $datalogtigong["mlMoneyType"]=1;
        $datalogtigong["mlToday"]=$today;
        $datalogtigong["mlDate"]=$nowdatetimes;
        $datalogtigong["mlInfo"]="清除提供援助，排队期本金留出".$touzijiner."元";
        $datalogtigong["mlPorC"]=1;
        $datalogtigong["mlPorM"]=6;
        $datalogtigong["mlSuccess"]=1;
        $datalogtigong["mlRandNumber"]="a-qc-l-provide-".$nowtimes."-".$datalogtigong["mlUid"];
        
        //利息日志记录
            $dataloglixi["mlUid"]=$uiUid;
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlToday"]=$today;
            $dataloglixi["mlDate"]=$nowdatetimes;
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=2;
            $dataloglixi["mlSuccess"]=1;
            $dataloglixi["mlJiner"]=$uPDLixi;
            $dataloglixi["mlInfo"]="清除提供援助".$touzijiner."元，扣除排队期利息";
            $dataloglixi["mlRandNumber"]="QCLI".$nowtimes.$dataloglixi["mlUid"];

        if($result){
            if($rs_paramenters["upPDLXONorOFF"]==1){
            $users->where("uId={$uId}")->save($data);
            $money_log->add($datalogtigong);
                if($uPDLixi!=0){
                $money_log->add($dataloglixi);
                }
            }
            $this->success("清除本条数据成功");
        }else{
            $this->error("清除数据失败");
        }
    }
    public function WantunInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_uninvest");
        $rs_invest=$users_invest->where("uuniState=0 AND uuniShow=1")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function NoShowWantunInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_uninvest");
        $rs_invest=$users_invest->where("uuniState=0  AND uuniShow=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    //点击  智能匹配 按钮后执行
    public function WantInvestListsSelect(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $uId=$_GET["uId"];
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiId={$uiId}")->find();
        $this->assign("rs_invest",$rs_invest);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $uiUJiner=$rs_invest["uiUJiner"];
        $uiUid=$rs_invest["uiUid"];
        $users_uninvest=M("users_uninvest");
        $rs_uninvest=$users_uninvest->where("(uuniJiner={$uiUJiner}) AND (uuniUid!={$uiUid}) AND (uuniState=0)")->select();
        $this->assign("rs_uninvest",$rs_uninvest);
        $this->display();
    }
    /*点击 匹配user 按钮后执行*/
    public function InvestSend(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $uuniId=$_GET["uuniId"];
        $users=M("users");
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiId={$uiId}")->find();
        $this->assign("rs_invest",$rs_invest);
        $uiUid=$rs_invest["uiUid"];
        $rs_users=$users->where("uId={$uiUid}")->find();
        $this->assign("rs_users",$rs_users);
        $users_uninvest=M("users_uninvest");
        $rs_uninvest=$users_uninvest->where("uuniId={$uuniId}")->find();
        $this->assign("rs_uninvest",$rs_uninvest);
        $uuniUid=$rs_uninvest["uuniUid"];
        $rs_use=$users->where("uId={$uuniUid}")->find();
        $this->assign("rs_use",$rs_use);
        $this->display();
    }
    //确认配对
    public function InvestSendAction(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $uuniId=$_GET["uuniId"];
        $uId=$_GET["uId"];
        $unId=$_GET["unId"];
        $users=M("users");
        $users_invest=M("users_invest");
        $users_uninvest=M("users_uninvest");
        $data["uiBeijiuyuanUid"]=$unId;
        $data["uiState"]=1;
        $data["uiStateDate"]=date("Y-m-d H:i:s");

        $undata["uuniJiuyuanUid"]=$uId;
        $undata["uuniState"]=1;
        $undata["uuniStateDate"]=$data["uiStateDate"];
        $result=$users_invest->where("uiId={$uiId}")->save($data);
        $unresult=$users_uninvest->where("uuniId={$uuniId}")->save($undata);
        if($result && $unresult){
            $this->success("配对成功",U("payinvestlists"));
        }else{
            $this->error("配对失败");
        }
    }
    public function PayInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiState=1 AND uiShow=1")->select();
        //下面这一句是在未接受援助之前的
        //$rs_invest=$users_invest->where("uiState=1 AND uiunShenqing=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function NoShowPayInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiState=1 AND uiShow=0")->select();
        //下面这一句是在未接受援助之前的
        //$rs_invest=$users_invest->where("uiState=1 AND uiunShenqing=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    
    //超时后取消匹配
    public function SetNoPipei(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $uuniId=$_GET["uuniId"];
        $data["uiState"]=0;
        $data["uiStateDate"]="0000-00-00 00:00:00";
        $data["uiBeijiuyuanUid"]=0;
        $undata["uuniState"]=0;
        $undata["uuniStateDate"]="0000-00-00 00:00:00";
        $undata["uuniJiuyuanUid"]=0;
        $users_invest=M("users_invest");
        $users_uninvest=M("users_uninvest");
        $result_1=$users_invest->where("uiId={$uiId}")->save($data);
        $result_2=$users_uninvest->where("uuniId={$uuniId}")->save($undata);
        if($result_1 && $result_2){
            $this->success("取消匹配成功");
        }else{
            $this->error("取消匹配失败");
        } 
    }
    //超时后管理员封账户
    public function SetDongjie(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $data["uLock"]=0;
        $result=$users->where("uId={$uId}")->save($data);
        if($result){
            $this->success("成功冻结了该账户");
        }else{
            $this->error("冻结账户失败");
        }
    }
    public function UnPayInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_uninvest");
        $rs_invest=$users_invest->where("uuniState=1 AND uuniShow=1")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function NoShowUnPayInvestLists(){
        $this->LoginTrue();
        $users_invest=M("users_uninvest");
        $rs_invest=$users_invest->where("uuniState=1  AND uuniShow=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function SetUnPay(){
        $this->LoginTrue();
        $uuniId=$_GET["uuniId"];
        $uuniPayDate=$_GET["uuniPayDate"];
        $users_uninvest=M("users_uninvest");
        $users_invest=M("users_invest");
        $data["uiZhifuDate"]="0000-00-00 00:00:00";
        $data["uiZhifu"]=0;
        $undata["uuniPayDate"]="0000-00-00 00:00:00";
        $undata["uuniPay"]=0;
        $result_1=$users_invest->where("uiZhifuDate='{$uuniPayDate}'")->save($data);
        $result_2=$users_uninvest->where("uuniId={$uuniId}")->save($undata);
        if($result_1 && $result_2){
            $this->success("取消付款成功");
        }else{
            $this->error("取消付款失败");
        }
    }
    public function SetYesPay(){
        $uuniId=$_GET["uuniId"];
        $uuniPayDate=$_GET["uuniPayDate"];
        $users_uninvest=M("users_uninvest");
        $rs_users_touziId=$users_uninvest->where("uuniId={$uuniId}")->field("uuniJiuyuanUid,uuniJiner,uuniSuccess,uuniUid")->find();
        $uId=$rs_users_touziId["uuniJiuyuanUid"];  //这个就是提供援助的会员的ID
        $uunUid=$rs_users_touziId["uuniUid"]; //这个是接受援助的会员ID
        $touzijiner=$rs_users_touziId["uuniJiner"]; //这个是接受援助的金额，也是投资援助的金额
        $users=M("users");
        $aqm=$users->field("uMXInvisible,uMXInvisibleValid")->where("uId={$uId}")->find();
        //以下2句话是隐身做准备的[这个是接受援助用的]
        $yinshenonoff=$aqm["uMXInvisible"];
        $yinshenstate=$aqm["uMXInvisibleValid"];
        //重要的
        $rs_users_touzinum=$users->where("uId={$uId}")->field("uVip,uTouziState,uTouziNum,uJiangjin,uLixi,uNowLixi,uPDLixi,uPDLixiMax,uMXInvisible,uMXInvisibleValid")->find();
        //以下2句话是为提供援助相关的隐身
        $yinshenonofftg=$rs_users_touzinum["uMXInvisible"];
        $yinshenstatetg=$rs_users_touzinum["uMXInvisibleValid"];
        
        $userdata["uTouziState"]=1;
        $userdata["uTouziNum"]=$rs_users_touzinum["uTouziNum"]+1;
        $userdata["uPDLixi"]=0;
        $userdata["uPDLixiMax"]=0;
        $uVip=$rs_users_touzinum["uVip"];//会员的当前等级
        //看援助类型
        $rs_yuanzhutype=$users_uninvest->where("uuniId={$uuniId}")->field("uunYuanzhuType")->find();
        $yuanzhutype=$rs_yuanzhutype["uunYuanzhuType"];
        
        $users_invest=M("users_invest");
        $data["uiSuccessDate"]=date("Y-m-d H:i:s");
        $data["uiSuccess"]=1;
        //算出当前用户的等级所享受的多余利率
        $reggrades=M("reggrades");
        $dengjiduiying=$reggrades->where("rgId={$uVip}")->find();
        $duoyulilv=$dengjiduiying["rgLixi"];  //算出多余的利息了
        //算投资结束时间
        $users_parameters=M("users_parameters");
        $rs_parameters=$users_parameters->where("upId=1")->field("upLXType,upGuDingLX,upTermOfInvestment,upLixiAllOrDay")->find();
        $lixiAllOrDay=$rs_parameters["upLixiAllOrDay"];
        $touzitime=($rs_parameters["upTermOfInvestment"])*24*60*60;
        $starttouzitime=strtotime($data["uiSuccessDate"]);
        $lasttouzitime=$touzitime+$starttouzitime;
        $lasttouzidate=date("Y-m-d H:i:s",$lasttouzitime);
        $data["uiTouziEndDate"]=$lasttouzidate;
        $undata["uuniSuccessDate"]=$data["uiSuccessDate"];
        $undata["uuniSuccess"]=1;
        $result_1=$users_invest->where("uiZhifuDate='{$uuniPayDate}'")->save($data);
        //sleep(1);//1秒后
        //算利息
            if($rs_parameters["upLXType"]==1){
                $lixi=$touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv)*$rs_parameters["upTermOfInvestment"]+$rs_users_touzinum["uLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $lixinow=($touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv))+$rs_users_touzinum["uNowLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $daylixi=($touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv));
                $liximl=$touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv)*$rs_parameters["upTermOfInvestment"];
            }else{
                $users_touzidata=M("users_touzidata");
                $rs_fudonglilv=$users_touzidata->where("utBenJin={$touzijiner}")->find();
                $fudonglilv=$rs_fudonglilv["utJBLixi"];
                $lixi=$touzijiner*($fudonglilv+$duoyulilv)*$rs_parameters["upTermOfInvestment"]+$rs_users_touzinum["uLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $lixinow=($touzijiner*($fudonglilv+$duoyulilv))+$rs_users_touzinum["uNowLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $daylixi=($touzijiner*($fudonglilv+$duoyulilv));
                $liximl=$touzijiner*($fudonglilv+$duoyulilv)*$rs_parameters["upTermOfInvestment"];
            }
            $userdata["uLixi"]=$lixi;
            if($lixiAllOrDay==2){
                $userdata["uNowLixi"]=$lixinow;
            }else{
                $userdata["uNowLixi"]=$lixi;
            }
            //算奖金
            //首先查找本会员是谁推广的？并且查找等级，查找当前奖金
            $myTuiId=$users->where("uId={$uId}")->field("uTuiId")->find();
            $tuiId=$myTuiId["uTuiId"];//这个是我推荐提供援助人的上级会员ID
            $myfather=$users->where("uId={$tuiId}")->field("uVip,uJiangjin")->find();
            $myfather_vip=$myfather["uVip"];
            $myfather_Jiangjin=$myfather["uJiangjin"];
            $myfathervip=$reggrades->where("rgId={$myfather_vip}")->find();
            $jiangjinlilv=$myfathervip["rgTJJangjin"];
            $userfatherjiangjin=$touzijiner*$jiangjinlilv+$myfather_Jiangjin;
            $userfathergoingjiangjin=$touzijiner*$jiangjinlilv;
            $userfatherdata["uJiangjin"]=$userfatherjiangjin;

            //日志的记录
            $money_log=M("money_log");
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
            
            //提供援助日志记录
            //隐身功能的处理
            if($yinshenonofftg==0){
                if($yinshenstatetg==1 || $yinshenstatetg==2){
                    $datalogtigong["mlShow"]=0;
                    $dataloglixi["mlShow"]=0;
                    $datalogjiangjin["mlShow"]=0;
                }
            }
            $datalogtigong["mlUid"]=$uId;
            $datalogtigong["mlJiner"]=$touzijiner;
            $datalogtigong["mlMoneyType"]=1;
            $datalogtigong["mlToday"]=$today;
            $datalogtigong["mlDate"]=$nowdatetimes;
            $datalogtigong["mlInfo"]="提供援助，本金增加".$touzijiner."元";
            $datalogtigong["mlPorC"]=1;
            $datalogtigong["mlPorM"]=1;
            $datalogtigong["mlSuccess"]=1;
            $datalogtigong["mlRandNumber"]="P".$nowtimes.$datalogtigong["mlUid"];
             
            //接受援助日志记录
            //隐身功能的处理
            if($yinshenonoff==0){
                if($yinshenstate==1 || $yinshenstate==2){
                    $datalogjieshou["mlShow"]=0;
                }
            }
            if($yuanzhutype==0){
            $datalogjieshou["mlUid"]=$uunUid;
            $datalogjieshou["mlJiner"]=$touzijiner;
            $datalogjieshou["mlMoneyType"]=1;
            $datalogjieshou["mlToday"]=$today;
            $datalogjieshou["mlDate"]=$nowdatetimes;
            $datalogjieshou["mlInfo"]="接受援助，金额减少".$touzijiner."元";
            $datalogjieshou["mlPorC"]=1;
            $datalogjieshou["mlPorM"]=2;
            $datalogjieshou["mlSuccess"]=1;
            $datalogjieshou["mlRandNumber"]="A".$nowtimes.$datalogjieshou["mlUid"];
            }
            //利息日志记录
            $dataloglixi["mlUid"]=$uId;
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlToday"]=$today;
            $dataloglixi["mlDate"]=$nowdatetimes;
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=1;
            $dataloglixi["mlSuccess"]=1;
            if($lixiAllOrDay==2){
                $dataloglixi["mlJiner"]=$daylixi;
                $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，当日发放利息";
                $dataloglixi["mlRandNumber"]="I".$nowtimes.$dataloglixi["mlUid"];
            }else{
                $dataloglixi["mlJiner"]=$liximl;
                $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，发放全部利息";
                $dataloglixi["mlRandNumber"]="AI".$nowtimes.$dataloglixi["mlUid"];
            }
            //奖金日志记录
            $datalogjiangjin["mlUid"]=$tuiId;
            $datalogjiangjin["mlJiner"]=$userfathergoingjiangjin;
            $datalogjiangjin["mlMoneyType"]=3;
            $datalogjiangjin["mlToday"]=$today;
            $datalogjiangjin["mlDate"]=$nowdatetimes;
            $datalogjiangjin["mlInfo"]="下级会员".$myTuiId["uUser"]."提供援助".$touzijiner."元，获得奖金";
            $datalogjiangjin["mlPorC"]=1;
            $datalogjiangjin["mlPorM"]=1;
            $datalogjiangjin["mlSuccess"]=1;
            $datalogjiangjin["mlRandNumber"]="B".$nowtimes.$datalogjiangjin["mlUid"];
            $result_2=$users_uninvest->where("uuniId={$uuniId}")->save($undata);
            if($result_1 && $result_2){
                $users->where("uId={$uId}")->save($userdata);
                $users->where("uId={$tuiId}")->save($userfatherdata);
                $money_log->add($datalogtigong);
                $money_log->add($datalogjieshou);
                $money_log->add($dataloglixi);
                $money_log->add($datalogjiangjin);
                $this->success("确认收款成功",U("unpayinvestlists"));
            }else{
                $this->error("确认收款失败");
            }
    }
    public function SetDongjieAB(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $ab=$_GET["ab"];
        $users=M("users");
        $data["uLock"]=0;
        $result=$users->where("uId={$uiId}")->save($data);
        if($result){
            if($ab==1){
                $this->success("冻结提供援助人账户成功");
            }else{
                $this->success("冻结接受援助人账户成功");
            }
        }else{
            if($ab==1){
                $this->success("冻结提供援助人账户失败");
            }else{
                $this->success("冻结接受援助人账户失败");
            }
        }
    }
    //下面是管理员添加虚拟的援助与被援助信息
    public function AddInvest(){
        $this->LoginTrue();
        $users_parameters=M("users_parameters");
        $paramenters=$users_parameters->where("upId=1")->field("upTypeInvestment,upTZMultiples,upMaxMoney,upReact")->find();
        $this->assign("paramenters",$paramenters);
        if($paramenters["upTypeInvestment"]==1){
            $users_touzidata=M("users_touzidata");
            $touzidata=$users_touzidata->select();
            $this->assign("touzidata",$touzidata);
        }
        $this->display();
    }
    public function AddInvestAction(){
        $this->LoginTrue();
        $uUser=$_POST["uUser"];
        $users=M("users");
        $rs_users=$users->where("uUser='{$uUser}'")->find();
        $uId=$rs_users["uId"];
        //以下2句话是隐身做准备的
        $yinshenonoff=$rs_users["uMXInvisible"];
        $yinshenstate=$rs_users["uMXInvisibleValid"];
        
        if($uId>0){
            $data["uiUid"]=$uId;
        }else{
            $this->error("你输入的用户不存在");
        }
        $uiUid=$data["uiUid"];
        $data["uiUJiner"]=$_POST["uiUJiner"];
        $touzijiner=$data["uiUJiner"];//投资会员的投资金额
        $data["uiSQShenyuJiner"]=$data["uiUJiner"];
        $users_parameters=M("users_parameters");
        $paramenters=$users_parameters->where("upId=1")->field("upPDLXONorOFF,upGuDingLX,upLXType,upPDLXDay,upLixiAllOrDay,upTypeInvestment,upTZMultiples,upMaxMoney")->find();
        $lixiAllOrDay=$paramenters["upLixiAllOrDay"];
        
         /*因为2个西瓜配置奖金与利息最小提现倍数配置错了，所以注释了  
         if($paramenters["upTypeInvestment"]==0){
            if(($data["uiUJiner"])%($paramenters["upTZMultiples"])!=0){
                $this->error("请输入".$paramenters["upTZMultiples"]."的倍数");
            }elseif($data["uiUJiner"]>$paramenters["upMaxMoney"]){
                $this->error("你输入的金额超过系统限定的".$paramenters["upMaxMoney"]."元");
            }
        }       
        */
        
        $data["uiDate"]=date("Y-m-d H:i:s");
        //隐身功能的处理
        if($yinshenonoff==0){
            if($yinshenstate==0 || $yinshenstate==2){
                $data["uiShow"]=0;
                $datalogtigong["mlShow"]=0;
                $dataloglixi["mlShow"]=0;
                $userdata["uMXInvisibleValid"]=1;
            }elseif($yinshenstate==1){
                $userdata["uMXInvisible"]=1;
                $userdata["uMXInvisibleValid"]=0;
            }
        }
        
        $users_invest=M("users_invest");
        $result=$users_invest->add($data);
        
        //提供援助成功就开始计算利息，首先判断是否开启了利息计算
        if($paramenters["upPDLXONorOFF"]==1){
            //此时已经开启了排队利息的功能
            //下面来计算排队前的利息
            $rs_users_touzinum=$users->where("uId={$uiUid}")->field("uVip,uTouziState,uTouziNum,uJiangjin,uLixi,uNowLixi,uPDLixi,uPDLixiMax")->find();
            $uVip=$rs_users_touzinum["uVip"];//会员的当前等级ID
            //算出当前用户的等级所享受的多余利率
            $reggrades=M("reggrades");
            $dengjiduiying=$reggrades->where("rgId={$uVip}")->find();
            $duoyulilv=$dengjiduiying["rgLixi"];  //算出多余的利率了
        
            //算排队利息
            //1为固定利息
            if($paramenters["upLXType"]==1){
                    $lixi=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv)*($paramenters["upPDLXDay"]))+$rs_users_touzinum["uPDLixiMax"];
                    $lixinow=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv))+$rs_users_touzinum["uPDLixi"];
                    $daylixi=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv));
                    $liximl=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv)*($paramenters["upPDLXDay"]));
            }else{
                //这里是浮动利息
                $users_touzidata=M("users_touzidata");
                $rs_fudonglilv=$users_touzidata->where("utBenJin={$touzijiner}")->find();
                $fudonglilv=$rs_fudonglilv["utJBLixi"];
                $lixi=($touzijiner*($fudonglilv+$duoyulilv)*($paramenters["upPDLXDay"]))+$rs_users_touzinum["uPDLixiMax"];
                $lixinow=($touzijiner*($fudonglilv+$duoyulilv))+$rs_users_touzinum["uPDLixi"];
                $daylixi=($touzijiner*($fudonglilv+$duoyulilv));
                $liximl=($touzijiner*($fudonglilv+$duoyulilv)*($paramenters["upPDLXDay"]));
            }
            //这里为系统自动每日发放利息做判断值
            $userdata["uPDLixiMax"]=$lixi;
            if($lixiAllOrDay==2){
                //这里是每天发放
                $userdata["uPDLixi"]=$lixinow;
            }else{
                //这里是一次性发放
                $userdata["uPDLixi"]=$lixi;
            }
            //日志的记录
            $money_log=M("money_log");
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
        
            //提供排队援助日志记录
            $datalogtigong["mlUid"]=$uiUid;
            $datalogtigong["mlJiner"]=$touzijiner;
            $datalogtigong["mlMoneyType"]=1;
            $datalogtigong["mlToday"]=$today;
            $datalogtigong["mlDate"]=$nowdatetimes;
            $datalogtigong["mlInfo"]="提供援助，排队期本金流入".$touzijiner."元";
            $datalogtigong["mlPorC"]=1;
            $datalogtigong["mlPorM"]=5;
            $datalogtigong["mlSuccess"]=1;
            $datalogtigong["mlRandNumber"]="XNLP".$nowtimes.$datalogtigong["mlUid"];
        
            //利息日志记录
            $dataloglixi["mlUid"]=$uiUid;
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlToday"]=$today;
            $dataloglixi["mlDate"]=$nowdatetimes;
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=1;
            $dataloglixi["mlSuccess"]=1;
            if($lixiAllOrDay==2){
                $dataloglixi["mlJiner"]=$daylixi;
                $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，排队期发放当日利息";
                $dataloglixi["mlRandNumber"]="XNLI".$nowtimes.$dataloglixi["mlUid"];
            }else{
                $dataloglixi["mlJiner"]=$liximl;
                $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，排队期发放全部利息";
                $dataloglixi["mlRandNumber"]="XNLAI".$nowtimes.$dataloglixi["mlUid"];
            }
        }
        if($result){
            if($paramenters["upPDLXONorOFF"]==1){
                $users->where("uId={$uiUid}")->save($userdata);
                $money_log->add($datalogtigong);
                $money_log->add($dataloglixi);
            }
            $this->success("添加提供援助成功，等待系统匹配",U("wantinvestlists"),3);
        }else{
            $this->error("添加提供援助失败");
        }
    }
    public function AddUnInvest(){
        $this->LoginTrue();
        $this->display();
    }
    public function AddUnInvestAction(){
        $this->LoginTrue();
        $uUser=$_POST["uUser"];
        $users=M("users");
        $rs_users=$users->where("uUser='{$uUser}'")->find();
        //以下2句话是隐身做准备的
        $yinshenonoff=$rs_users["uMXInvisible"];
        $yinshenstate=$rs_users["uMXInvisibleValid"];
        $uId=$rs_users["uId"];
        if($uId>0){
            $data["uuniUid"]=$uId;
        }else{
            $this->error("你输入的用户不存在");
        }
        $data["uuniJiner"]=$_POST["uuniJiner"];
        $users_parameters=M("users_parameters");
        $paramenters=$users_parameters->where("upId=1")->field("upTypeInvestment,upTZMultiples,upMaxMoney")->find();
        /*因为2个西瓜配置奖金与利息最小提现倍数配置错了，所以注释了
        if($paramenters["upTypeInvestment"]==0){
            if(($data["uuniJiner"])%($paramenters["upTZMultiples"])!=0){
                $this->error("请输入".$paramenters["upTZMultiples"]."的倍数");
            }elseif($data["uuniJiner"]>$paramenters["upMaxMoney"]){
                $this->error("你输入的金额超过系统限定的".$paramenters["upMaxMoney"]."元");
            }
        }
        */
        $data["uuniDate"]=date("Y-m-d H:i:s");
        $users_uninvest=M("users_uninvest");
        //隐身功能的处理
        if($yinshenonoff==0){
            if($yinshenstate==0 || $yinshenstate==2){
                $data["uuniShow"]=0;
                $userdata["uMXInvisibleValid"]=1;
            }elseif($yinshenstate==1){
                $userdata["uMXInvisible"]=1;
                $userdata["uMXInvisibleValid"]=0;
            }
        }
        $result=$users_uninvest->add($data);
        $users->where("uId={$uId}")->save($userdata);
        if($result){
            $this->success("添加接受援助成功，等待系统匹配",U("wantuninvestlists"),3);
        }else{
            $this->error("添加接受援助失败");
        }
    }
    public function PingZheng(){
        $uiId=$_GET["uiId"];
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiId={$uiId}")->field("uiImages,uiStateDate")->find();
        $this->assign("rs_invest",$rs_invest);
        $users_uninvest=M("users_uninvest");
        $undate=$rs_invest["uiStateDate"];
        $rs_uninvest=$users_uninvest->where("uuniStateDate='{$undate}'")->field("uuniImages")->find();
        $this->assign("rs_uninvest",$rs_uninvest);
        $this->display();
    }
}