<?php
namespace Wap\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class FinanceController extends LoginTrueController {
    //分类子目录页
    public function chushiye(){
		
        $this->LoginTrue();
        $uId=$_GET["uId"];

        $this->assign("uId",$uId);
        $this->display();
    }

       // 动态奖励记录
    public function Dtjllogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
        // 我的同步记录
    public function Wdtblogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
       // 我的利息记录
    public function Wdlxlogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
      // 转账金钥匙记录
    public function Zzjyslogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
      // 转账手续费记录
    public function Zzsxflogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
     // 星级记录
    public function Xingjilogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
    public function Index(){
        $this->LoginTrue();
        $uiUid=$_GET["uId"];
        $tixianId=session("uId");
        $users_invest=M("users_invest");
        /**
         * uiUid   救援人Id
         * uiSuccess   救助是否成功
         * uiUJiner   救援金额
         */
        $rs_invest=$users_invest->where("uiUid={$uiUid} AND uiSuccess=1")->sum("uiUJiner");
        $users_uninvest=M("users_uninvest");
        /**
         * uuniUid   被救援用户ID
         *uuniSuccess   是否救援成功
         *uunYuanzhuType  提供援助与提现的类型
         *uuniJiner        收款金额
         */
        $rs_uninvest=$users_uninvest->where("uuniUid={$uiUid} AND uuniSuccess=1 AND uunYuanzhuType=0")->sum("uuniJiner");
        $benjin=$rs_invest-$rs_uninvest;  //本金
        $this->assign("benjin",$benjin);
        //调出利息//调出奖金
        $users=M("users");
        $rs_shouru=$users->where("uId={$uiUid}")->field("uJiangjin,uLixi,uNowLixi,uVip,uTouziNum,uPDLixi,paiDanBi,xingji,shangchengjifen,tongbuqianbao,dongtaiqianbao")->find();
        $this->assign("rs_shouru",$rs_shouru);
        /**
         * uNowLixi         当前的利息
         *  uPDLixi           排队期间的利息   
         */
        $zonglixi=round(($rs_shouru["uNowLixi"]+$rs_shouru["uPDLixi"])/100,2);
        $this->assign("zonglixi",$zonglixi);//利息
        $zongjiangjin=round($rs_shouru["uJiangjin"],2);
        $this->assign("zongjiangjin",$zongjiangjin);
        
       //算今日利息
       //首先看等级，看用什么方式计算利息
        $reggrades=M("reggrades");
       $uservip=$rs_shouru["uVip"];
       $chavip=$reggrades->where("rgId={$uservip}")->find();
       $viplilv=$chavip["rgLixi"];
       $vipName=$chavip["rgName"];
       $this->assign("vipName",$vipName);
       $users_parameters=M("users_parameters");
       $rs_paramenters=$users_parameters->where("upId=1")->field("upLXType,upGuDingLX")->find();
        if($rs_paramenters["upLXType"]==1){
            //来算一下未到期的本金
            $rs_benjin=$users_invest->where("uiUid={$uiUid} AND uiSuccess=1 AND uiTouziEnd=0")->sum("uiUJiner");
            $daylixi=$rs_benjin*($rs_paramenters["upGuDingLX"]/100+$viplilv)+$rs_shouru["uPDLixi"];
        }else{
            //实例化管理员预设的投资数据来进行对比
            $users_touzidata=M("users_touzidata");
            //先获取投资中的所有本金
            $rs_touzibenjin=$users_invest->where("uiUid={$uiUid} AND uiSuccess=1 AND uiTouziEnd=0")->field("uiUJiner")->select();
            $daylixi=0;
            foreach($rs_touzibenjin as $val_touzibenjin){
                $touzibenjin=$val_touzibenjin["uiUJiner"];
                $rs_touzidata=$users_touzidata->where("utBenjin={$touzibenjin}")->find();
                $onelixi=$touzibenjin*($rs_touzidata["utJBLixi"]/100+$viplilv)+$rs_shouru["uPDLixi"];
                $daylixi+=$onelixi;
            }
        }
        $daylixi=round($daylixi,2);
        $this->assign("daylixi",$daylixi);
        //现在开始算我提现了几次
        $rs_tixiannum=$users_uninvest->where("	uuniUid={$tixianId} AND uuniSuccess=1")->count();
        $this->assign("rs_tixiannum",$rs_tixiannum);
        //现在开始做能提现的金额
        /**
         * uiUid   提供救援人Id    
         * uiTouziEnd   本轮投资是否到期
         * uiunShenqing  是否申请了被救助
         * uiUJiner     救援金额
         */
        $rs_tixianbenjin=$users_invest->where("uiUid={$tixianId}  AND uiTouziEnd=1 AND uiunShenqing=0")->sum("uiUJiner");
        $uiSQShenyuJinerd=$users_invest->where("uiUid={$tixianId}  AND uiTouziEnd=1 AND uiunShenqing=1 AND uiSQShenyuJiner!=0")->sum("uiSQShenyuJiner");
        $rs_tixianbenjin=$rs_tixianbenjin+$uiSQShenyuJinerd;
        $this->assign("rs_tixianbenjin",$rs_tixianbenjin);//可提本金

        $this->display();
    }
    //资产提现
    public function Withdrawals(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uId,uJiangjin,uLixi,uNowLixi,uPDLixi,uUser,uName,uTel,uZhifubao,tongbuqianbao")->find();
        $this->assign("rs_users",$rs_users);
        $nowzonglixi=round(($rs_users["uLixi"]+$rs_users["uPDLixi"]),2);
        $lixi=round($rs_users["uLixi"],2);
        $dongjielixi=round($rs_users["uPDLixi"],2);
        $this->assign("nowzonglixi",$nowzonglixi);//当前利息
        $this->assign("lixi",$lixi);        //可用利息
        $this->assign("dongjielixi",$dongjielixi);
        $this->display();
    }
//资产提现 提交
    public function WithdrawalsAction(){
        $this->LoginTrue();
        $uId=$_POST["uId"];
        $users=M("users");
        $aqm=$users->field("uJiangjin,uLixi,uNowLixi,uZfPwd,uZFErrorPwdNum,uPwd,tongbuqianbao")->where("uId={$uId}")->find();
        $uZfPwd=md5($_POST["uZfPwd"]);
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行援助操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                $users->where("uId={$uId}")->save($dataerr);
                $this->error("安全密码错误，无法确认收款，已连续输错次".$zferr."次，输错".$rs_system['sUZFErrorPwdLockNum']."次将被锁定");
            }
            /**
             * 1  利息
             * 2  奖金
             * 3  同步钱包
             */
            $moneytype=$_POST["moneytype"];
            $uMoneys=$_POST["uMoneys"];
            $users_parameters=M("users_parameters");
            $rs_paramenters=$users_parameters->where("upId=1")->field("upLXMultiples,upJJMultiples,tongzuidi")->find();
            if($moneytype==1){
                if($uMoneys<$rs_paramenters["upLXMultiples"]){
                    $this->error("你的利息还未达到系统最低限制的".$rs_paramenters['upLXMultiples']."元");
                }elseif($uMoneys%$rs_paramenters["upLXMultiples"]!=0){
                    $this->error("你输入的利息金额不是系统限制的".$rs_paramenters['upLXMultiples']."的倍数");
                }elseif($uMoneys>$aqm["uNowLixi"]){
                    $this->error("你输入的金额超过你当前可用的利息，输入错误");
                }
            }elseif($moneytype==2){
                $invest=M("users_invest");
                $nowmonth=date("Y-m");
                $map['uiSuccessDate'] = array('like',$nowmonth.'%');
                $map['uiUid']=array('eq',$uId);
                $countin=$invest->where($map)->count();
                if($countin==0){
                    $this->error("提现失败，你本月还没有提供任何一笔投资");
                }
                if($uMoneys<$rs_paramenters['upJJMultiples']){
                    $this->error("你的奖金还未达到系统最低限制的".$rs_paramenters['upJJMultiples']."元");
                }elseif($uMoneys%$rs_paramenters['upJJMultiples']!=0){
                    $this->error("你输入的奖金不是系统限制的".$rs_paramenters['upJJMultiples']."的倍数");
                }elseif($uMoneys>$aqm["uJiangjin"]){
                    $this->error("你输入的金额超过你当前的奖金，输入错误");
                }
            }else{//提现 同步钱包  操作
if($rs_paramenters['upLXMultiples']>$uMoneys){
     $this->error("你输入的金额小于最小同步钱包提现设定，输入错误!");
}
                if($uMoneys>$aqm["tongbuqianbao"]){
                    $this->error("你输入的金额超过你当前的金额，输入错误!");
                }
            }
            $data["uuniJiner"]=$uMoneys;
            $data["uuniUid"]=$uId;
            $data["uunYuanzhuType"]=1;
            $data["uuniDate"]=date("Y-m-d H:i:s");
            $users_uninvest=M("users_uninvest");
            $count=$users_uninvest->where("uuniUid={$uId} AND uuniState=0")->count();
            if($count>0){
                $this->error("提交失效，您当前还有接受援助系统未匹配的项目");
            }
            $result=$users_uninvest->add($data);
            $sylxdata['uNowLixi']=$aqm["uNowLixi"]-$data["uuniJiner"];
            $sylxdata['uLixi']=$aqm["uLixi"]-$data["uuniJiner"];
            $syjjdata["uJiangjin"]=$aqm["uJiangjin"]-$data["uuniJiner"];
            //日志的记录
            $money_log=M("money_log");
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
            //利息提现的日志记录
            $dataloglixi["mlUid"]=$uId;
            $dataloglixi["mlJiner"]=$uMoneys;
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlDate"]=$nowdatetimes;
            $dataloglixi["mlInfo"]="利息提现，减少".$uMoneys."元";
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=2;
            $dataloglixi["mlSuccess"]=1;
            $dataloglixi["mlRandNumber"]="I".$nowtimes.$dataloglixi["mlUid"];
            
            //奖金提现的日志记录
            $datalogjiangjin["mlUid"]=$uId;
            $datalogjiangjin["mlJiner"]=$uMoneys;
            $datalogjiangjin["mlMoneyType"]=3;
            $datalogjiangjin["mlDate"]=$nowdatetimes;
            $datalogjiangjin["mlInfo"]="奖金提现，减少".$uMoneys."元";
            $datalogjiangjin["mlPorC"]=1;
            $datalogjiangjin["mlPorM"]=2;
            $datalogjiangjin["mlSuccess"]=1;
            $datalogjiangjin["mlRandNumber"]="B".$nowtimes.$datalogjiangjin["mlUid"];
            if($result){
                if($moneytype==1){
                    $users->where("uId={$uId}")->save($sylxdata);
                    $money_log->add($dataloglixi);
                    $this->success("利息提现申请成功，等待匹配",U("Assistance/wantuninvestlists?uId=$uId"),3);
                }elseif($moneytype==2){
                    $users->where("uId={$uId}")->save($syjjdata);
                    $money_log->add($datalogjiangjin);
                    $this->success("奖金提现申请成功，等待匹配",U("Assistance/wantuninvestlists?uId=$uId"),3);
                }else{
                     $users->where("uId={$uId}")->save($syjjdata);
                      $this->success("同步钱包提现申请成功，等待匹配",U("Assistance/wantuninvestlists?uId=$uId"),3);
                }
            }else{
                if($moneytype==1){
                    $this->error("利息提现申请失败");
                }else{
                    $this->error("奖金提现申请失败");
                }
            }
        }
    }
    // 财务记录
    public function MoneyLogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
    // 商城积分记录
    public function scjflogs(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("usersuId",$uId);
        $money_log=M("money_log");
        $rs_mlog=$money_log->where("mlUid={$uId} AND mlSuccess=1 and mlMoneyType=5")->order("mlId desc")->select();
        $this->assign("rs_mlog",$rs_mlog);
        $this->display();
    }
}