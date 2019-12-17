<?php
namespace System\Controller;
use Think\Controller;
class IndexController extends LoginTrueController {
    public function Index(){
        $this->LoginTrue();

        $systemName=M("system");
        $rs_systemName=$systemName->field("sVersions,sName,sUrl,sCopyrightName,sXuanchanMenu")->where("sId=1")->find();
        $this->assign("rs_systemName",$rs_systemName);
        $aId=session("aId");
        $aUser=session("aUser");
        $this->assign("aUser",$aUser);
        $logintime=session("loginTime");
        $this->assign("logintime",$logintime);
        $aName=session("aName");
        $this->assign("aName",$aName);
        $aPowers=session("aPowers");
        if($aPowers==0){
            $powersName="系统管理员";
            $powersValue="0";
        }elseif($aPowers==1){
            $powersName="超级管理员";
        }elseif($aPowers==2){
            $powersName="普通管理员";
        }
        $this->assign("powersName",$powersName);
        $this->assign("aPowers",$aPowers);
        $admin=M("admin");
        $rs_admin=$admin->where("aId={$aId}")->find();
        $this->assign("rs_admin",$rs_admin);
        $year=date("Y");
        $this->assign("year",$year);
        //计算一下前台在线多少人真实的数据
        $users=M("users");
        $users_online=$users->sum("uOnline");
        $this->assign("users_online",$users_online);
        $this->display();
    }
    public function Welcome(){
        $this->LoginTrue();
        $nowdate=date("Y-m-d H:i:s");
        $this->assign("nowdate",$nowdate);
        //算进行中的提供援助金额
        $users_invest=M("users_invest");
        //注释这句是以前的
        //$invest_sum_uiUJiner=$users_invest->where("uiSuccess=1 AND uiunShenqing=0")->sum("uiUJiner");
        //现在2X版本的
        $invest_sum_uiUJiner=$users_invest->sum("uiUJiner");
        $this->assign("invest_sum_uiUJiner",$invest_sum_uiUJiner);
        //算接受援助金额
        $users_uninvest=M("users_uninvest");
        $uninvest_sum_uuniJiner=$users_uninvest->sum("uuniJiner");
        $this->assign("uninvest_sum_uuniJiner",$uninvest_sum_uuniJiner);
        //算总利息
        $users=M("users");
        $all_tzlixi=$users->sum("uLixi");
        $all_pdlixi=$users->sum("uPDLixi");
        $all_lixi=round(($all_tzlixi+$all_pdlixi),2);
        $this->assign("all_lixi",$all_lixi);
        //算今日发放的利息
        $goingdate=date("Y-m-d");
        //日志中获取数据
        $money_log=M("money_log");
        $rs_nowlixi=$money_log->where("mlMoneyType=2 AND mlPorM=1 AND mlToday='{$goingdate}'")->sum("mlJiner");
        if($rs_nowlixi==""){
            $rs_nowlixi=0;
        }
        $rs_nowlixi=round($rs_nowlixi,2);
        $this->assign("todaylixi",$rs_nowlixi);
        //算总奖金
        $all_jiangjin=round(($users->sum("uJiangjin")),2);
        $this->assign("all_jiangjin",$all_jiangjin);
        //算手续费收入
        $mregcodes=M("mregcodes");
        $rs_mregcodes=$mregcodes->sum("mrcPayPrice");
        if($rs_mregcodes==null){
            $rs_mregcodes=0;
        }
        $this->assign("rs_mregcodes",$rs_mregcodes);
        //列出暂未匹配的项目
        $weipipeitgjy=$users_invest->where("uiState=0 AND uiShow=1")->order("uiId desc")->limit(0,10)->select();
        $inempty="<td clospan='4'><span style='color:#ff0000'>暂无未匹配的提供援助项目</span></td>";
        $this->assign("inempty",$inempty);
        $this->assign("weipipeitgjy",$weipipeitgjy);
        $weipipeijsjy=$users_uninvest->where("uuniState=0 AND uuniShow=1")->order("uuniId desc")->limit(0,10)->select();
        $uninempty="<td clospan='3'><span style='color:#1faf09'>暂无未匹配的接受援助项目</span></td>";
        $this->assign("uninempty",$uninempty);
        $this->assign("weipipeijsjy",$weipipeijsjy);
        //列出最新消息5条
        $books=M("books");
        $rs_books=$books->order("bId desc")->select();
        $this->assign("rs_books",$rs_books);
        $this->display();
    }
}