<?php
namespace Member\Controller;
use Think\Controller;
class IndexController extends LoginTrueController {
    public function Index(){
        header('Location: http://huimingou.com/wap');
        $this->LoginTrue();
        $systemName=M("system");
        $rs_systemName=$systemName->field("sVersions,sName,sUrl,sCopyrightName,sMaxOnline,sMinOnline")->where("sId=1")->find();
        $this->assign("rs_systemName",$rs_systemName);
        $uId=session("uId");
        $uUser=session("uUser");
        $this->assign("uUser",$uUser);
        $logintime=session("loginTime");
        $this->assign("logintime",$logintime);
        $uName=session("uName");
        $this->assign("uName",$uName);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $year=date("Y");
        $this->assign("year",$year);
        $reggrades=M("reggrades");
        if($rs_users["uVip"]>0){
            $uVip=$rs_users["uVip"];
            $rs_reggrades=$reggrades->where("rgId={$uVip}")->find();
            $vipName=$rs_reggrades["rgName"];
        }else{
            $vipName="注册会员";
        }
        $this->assign("vipName",$vipName);
        //判断是否开启虚拟人数
        $users=M("users");
        if($rs_systemName["sMinOnline"]==0){
            //求当前真实人数在线
           $online=$users->sum("uOnline");
        }elseif($rs_systemName["sMinOnline"]==-1){
            //求当前最大人数+真实人数
            $nowline=$users->sum("uOnline");
            $online=$rs_systemName["sMaxOnline"]+$nowline;
        }else{
            //求当前虚拟在线人数
            $online=rand($rs_systemName["sMinOnline"],$rs_systemName["sMaxOnline"]);
        }
		$this->assign("online",$online);
        /*添加判断是否已经激活该登陆会员*/
          $uState=session("uState");
        $this->assign("uState",$uState);
        /*添加判断是否已经激活该登陆会员 E_N_D*/
        if($uState ==0){//未激活
            // $this->display('Users:SetRegStateHuiYuan');
            $this->redirect('Users/SetRegStateHuiYuan', array('meiyongdezhi' => 2), 3, '请先激活当前登陆会员，页面跳转中...');
        }else{
        $this->display();
        }
         // $this->display();
    }
    public function Welcome(){
        $this->LoginTrue();
        $uId=session("uId");
        $this->assign("uId",$uId);
        //打开后自动计算到期的投资项目
        $users_invest=M("users_invest");
         $users=M("users");
           $rs_users=$users->where("uId={$uId}")->field("uVip,uJiangjin,uLixi,uMXInvisible,uMXInvisibleValid")->find();
           $uble_qiu=$rs_users['uMXInvisible'];
           $ulid_qiu=$rs_users['uMXInvisibleValid'];
        $rs_daoqi=$users_invest->where("uiUid={$uId} AND uiSuccess=1 AND uiTouziEnd=0")->select();
        $nowtime=time();
        $users_param_qiu=M("users_parameters");
         $money_log=M("money_log");
        $rs_paramet_qiu=$users_param_qiu->where("upId=1")->field("upLXType,upGuDingLX,upTermOfInvestment,upLixiAllOrDay")->find();
        foreach($rs_daoqi as $val_daoqi){
            $endtime=strtotime($val_daoqi["uiTouziEndDate"]);
            if($nowtime>$endtime){
                $enddate=date("Y-m-d H:i:s",$endtime);
                $dataend["uiTouziEnd"]=1;
                  $users_invest->where("uiUid={$uId} AND uiSuccess=1 AND uiTouziEndDate='{$enddate}'")->save($dataend);
                $lixi_qiu=$rs_paramet_qiu["upGuDingLX"]*$val_daoqi['uiUJiner']*$rs_paramet_qiu['upTermOfInvestment']+$rs_users['uLixi'];
                  $userd_qiu["uLixi"]=$lixi_qiu;
                $userd_qiu["uNowLixi"]=$lixi_qiu;

                 $users->where("uId={$uiUid}")->save($userd_qiu);
                 //利息日志
                     if($uble_qiu==0){
                if($ulid_qiu==1 || $ulid_qiu==2){
                    $dataloglixi["mlShow"]=0;
                }
            }
                 $dataloglixi["mlUid"]=$uId;
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlToday"]=date("Y-m-d");
            $dataloglixi["mlDate"]=date("Y-m-d H:i:s");
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=1;
            $dataloglixi["mlSuccess"]=1;
                   $dataloglixi["mlJiner"]=$rs_paramet_qiu["upGuDingLX"]*$val_daoqi['uiUJiner']*$rs_paramet_qiu['upTermOfInvestment'];
                $dataloglixi["mlInfo"]="提供援助".$val_daoqi['uiUJiner']."元，发放全部利息";
                 $nowtimes=date("YmdHis");
                $dataloglixi["mlRandNumber"]="AI".$nowtimes."-".$dataloglixi["mlUid"];
                 $money_log->add($dataloglixi);
            }
        }
      
        //打开后自动算当前的等级
       
        $tuijianNum=$users->where("uTuiId={$uId} AND uTouziState=1")->count();
        $reggrades=M("reggrades");
        $rs_reggrades=$reggrades->select();
        foreach($rs_reggrades as $val_reggrades){
            if($tuijianNum==$val_reggrades["rgTJPeople"]){
                        $uVip=$val_reggrades["rgId"];
                        $shengjijiangjin=$val_reggrades["rgShengjiJiangjin"];
            }
        }
        //算升级奖金
      
        if($uVip!=""){
        if($rs_users["uVip"]!=$uVip){
            $data["uVip"]=$uVip;
            $data["uJiangjin"]=$rs_users["uJiangjin"]+$shengjijiangjin;
            $users->where("uId={$uId}")->save($data);
            if($shengjijiangjin>0){
            //日志的记录
            $money_log=M("money_log");
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
            //奖金的日志记录
            $datalogjiangjin["mlUid"]=$uId;
            $datalogjiangjin["mlJiner"]=$shengjijiangjin;
            $datalogjiangjin["mlMoneyType"]=3;
            $datalogjiangjin["mlToday"]=$today;
            $datalogjiangjin["mlDate"]=$nowdatetimes;
            $datalogjiangjin["mlInfo"]="当前账号升级，获得奖金".$shengjijiangjin."元";
            $datalogjiangjin["mlPorC"]=1;
            $datalogjiangjin["mlPorM"]=1;
            $datalogjiangjin["mlSuccess"]=1;
            $datalogjiangjin["mlRandNumber"]="B".$nowtimes.$datalogjiangjin["mlUid"];
            $money_log->add($datalogjiangjin);
            }
         }
        }
         
        //首页之公告
        $announcement=M("announcement");
        $rs_announcement=$announcement->where("annShow=1")->order("annId desc")->select();
        $this->assign("rs_announcement",$rs_announcement);
        //我的提供援助的项目列表
        $users_parameters=M("users_parameters");
        $rs_paramenters=$users_parameters->where("upId=1")->field("upShowITgnum,upShowIJsnum,upLXType,upGuDingLX,upQiandaoONOFF,upQiandaoJiangMin,upQiandaoJiangMax")->find();
        $tgyznum=$rs_paramenters["upShowITgnum"];
        $rs_users_invest=$users_invest->where("uiUid={$uId} AND uiTouziEnd=0")->order("uiId desc")->limit(0,$tgyznum)->select();
        $this->assign("rs_users_invest",$rs_users_invest);
        $empty="<td  colspan='4' style='color:#ff0000'>暂无提供的援助项目</td>";
        $this->assign("empty",$empty);
        //我的接受援助的项目列表
        $jsyznum=$rs_paramenters["upShowIJsnum"];
        $users_uninvest=M("users_uninvest");
        $rs_users_uninvest=$users_uninvest->where("uuniUid={$uId} AND  uuniSuccess=0")->order("uuniId desc")->limit(0,$jsyznum)->select();
        $this->assign("rs_users_uninvest",$rs_users_uninvest);
        $unempty="<td  colspan='4' style='color:#ff0000'>暂无接受援助的项目</td>";
        $this->assign("unempty",$unempty);
        //签到的奖励
        //先判断今日是否已经签到了
        $money_log=M("money_log");
        $nowday=date("Y-m-d");
        $countlog=$money_log->where("mlUid={$uId} AND mlMoneyType=4 AND mlToday='{$nowday}'")->count();
        $this->assign("countlog",$countlog);
        //判断是否开启了签到功能
        $qiandaostates=$rs_paramenters["upQiandaoONOFF"];
        $this->assign("qiandaostates",$qiandaostates);
        if($qiandaostates==1){
            $qdmin=$rs_paramenters["upQiandaoJiangMin"];
            $qdmax=$rs_paramenters["upQiandaoJiangMax"];
            $html="";
            if($qdmin==0){
                $html.="每日签到均可获 $qdmax 元奖励";
            }else{
                $html.="每日签到最高可获 $qdmax 元奖励";
            }
            $this->assign("html",$html);
        }
        //算本金
        $rs_invest=$users_invest->where("uiUid={$uId} AND uiSuccess=1")->sum("uiUJiner");
        $rs_uninvest=$users_uninvest->where("uuniUid={$uId} AND uuniSuccess=1 AND uunYuanzhuType=0")->sum("uuniJiner");
        $benjin=$rs_invest-$rs_uninvest;
        $this->assign("benjin",$benjin);
        
        //调出奖金调出利息
        $rs_shouru=$users->where("uId={$uId}")->field("uJiangjin,uLixi,uNowLixi,uVip,uPDLixi")->find();
        $this->assign("rs_shouru",$rs_shouru);
        $zonglixi=round(($rs_shouru["uNowLixi"]+$rs_shouru["uPDLixi"])/100,2);
        $this->assign("zonglixi",$zonglixi);
        $zongjiangjin=round($rs_shouru["uJiangjin"],2);
        $this->assign("zongjiangjin",$zongjiangjin);
        $nowdate=date("Y-m-d");
        $this->assign("nowdate",$nowdate);
        //算今日利息
       //首先看等级，看用什么方式计算利息
       $uservip=$rs_shouru["uVip"];
       $chavip=$reggrades->where("rgId={$uservip}")->find();
       $viplilv=$chavip["rgLixi"];
        if($rs_paramenters["upLXType"]==1){
            //来算一下未到期的本金
            $rs_benjin=$users_invest->where("uiUid={$uId} AND uiSuccess=1 AND uiTouziEnd=0")->sum("uiUJiner");
            $daylixi=$rs_benjin*($rs_paramenters["upGuDingLX"]+$viplilv);
        }else{
            //实例化管理员预设的投资数据来进行对比
            $users_touzidata=M("users_touzidata");
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
        $daylixi=round($daylixi,2);
        $this->assign("daylixi",$daylixi);
        //现在开始做能提现的金额
        $rs_tixianbenjin=$users_invest->where("uiUid={$uId}  AND uiTouziEnd=1 AND uiunShenqing=0")->sum("uiUJiner");
        if($rs_tixianbenjin==null){
            $rs_tixianbenjin=0;
        }
        $this->assign("rs_tixianbenjin",$rs_tixianbenjin);
        $this->display();
    }
    public function UserSign(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users_parameters=M("users_parameters");
        $users=M("users");
        $parameters=$users_parameters->where("upId=1")->field("upQiandaoONOFF,upQiandaoJiangMin,upQiandaoJiangMax")->find();
        if($parameters["upQiandaoONOFF"]==1){
            $rs_users=$users->where("uId={$uId}")->field("uJiangjin,uQiandaoNum")->find();
            if($parameters["upQiandaoJiangMin"]==0){
                $qiandaojiang=$parameters["upQiandaoJiangMax"];
                $data["uJiangjin"]=$rs_users["uJiangjin"]+$qiandaojiang;
                $data["uQiandaoNum"]=$rs_users["uQiandaoNum"]+1;
            }else{
                $minqdjiang=$parameters["upQiandaoJiangMin"];
                $maxqdjiang=$parameters["upQiandaoJiangMax"];
                $qiandaojiang=rand($minqdjiang,$maxqdjiang);
                $data["uJiangjin"]=$rs_users["uJiangjin"]+$qiandaojiang;
                $data["uQiandaoNum"]=$rs_users["uQiandaoNum"]+1;
            }
            $money_log=M("money_log");
            $nowday=date("Y-m-d");
            $countlog=$money_log->where("mlUid={$uId}  AND mlMoneyType=4 AND 	mlToday='{$nowday}'")->count();
            if($countlog>0){
                $this->error("非法操作，你今日已经签到了");
            }
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                $money_log=M("money_log");
                $nowdatetimes=date("Y-m-d H:i:s");
                $nowtimes=date("YmdHis");
                $today=date("Y-m-d");
                $datalogjiangjin["mlUid"]=$uId;
                $datalogjiangjin["mlJiner"]=$qiandaojiang;
                $datalogjiangjin["mlMoneyType"]=4;
                $datalogjiangjin["mlToday"]=$today;
                $datalogjiangjin["mlDate"]=$nowdatetimes;
                $datalogjiangjin["mlInfo"]=$today ."签到，获得奖金".$qiandaojiang."元";
                $datalogjiangjin["mlPorC"]=1;
                $datalogjiangjin["mlPorM"]=1;
                $datalogjiangjin["mlSuccess"]=1;
                $datalogjiangjin["mlRandNumber"]="S".$nowtimes.$datalogjiangjin["mlUid"];
                $money_log->add($datalogjiangjin);
                if($parameters["upQiandaoJiangMin"]==0){
                    $this->success("签到成功,获得奖金 $qiandaojiang 元","",6);
                }else{
                    $this->success("签到成功,获得随机奖励 $qiandaojiang 元","",6);
                }
            }else{
                $this->error("签到失败");
            }
        }
    }
}