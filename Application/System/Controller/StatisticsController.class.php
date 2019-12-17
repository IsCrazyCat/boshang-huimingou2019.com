<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class StatisticsController extends LoginTrueController {
    public function YeWu(){
        $this->LoginTrue();
        //算提供援助金额
        $users_invest=M("users_invest");
        $invest_sum_uiUJiner=$users_invest->sum("uiUJiner");
        $this->assign("invest_sum_uiUJiner",$invest_sum_uiUJiner);
        //算接受援助金额
        $users_uninvest=M("users_uninvest");
        $uninvest_sum_uuniJiner=$users_uninvest->sum("uuniJiner");
        $this->assign("uninvest_sum_uuniJiner",$uninvest_sum_uuniJiner);
        $this->display();
    }
    public function caiwu(){
        $this->LoginTrue();
        //算总利息
        $users=M("users");
        $all_tzlixi=$users->sum("uLixi");
        $all_pdlixi=$users->sum("uPDLixi");
        $all_lixi=$all_tzlixi+$all_pdlixi;
        $this->assign("all_lixi",$all_lixi);
        //算总奖金
        $all_jiangjin=$users->sum("uJiangjin");
        $this->assign("all_jiangjin",$all_jiangjin);
        $this->display();
    }
    public function zonghe(){
        $this->LoginTrue();
        //算总利息
        $users=M("users");
        $all_tzlixi=$users->sum("uLixi");
        $all_pdlixi=$users->sum("uPDLixi");
        $all_lixi=$all_tzlixi+$all_pdlixi;
        $this->assign("all_lixi",$all_lixi);
        //算总奖金
        $all_jiangjin=$users->sum("uJiangjin");
        $this->assign("all_jiangjin",$all_jiangjin);
        //算提供援助金额
        $users_invest=M("users_invest");
        $invest_sum_uiUJiner=$users_invest->sum("uiUJiner");
        $this->assign("invest_sum_uiUJiner",$invest_sum_uiUJiner);
        //算接受援助金额
        $users_uninvest=M("users_uninvest");
        $uninvest_sum_uuniJiner=$users_uninvest->sum("uuniJiner");
        $this->assign("uninvest_sum_uuniJiner",$uninvest_sum_uuniJiner);
        //算手续费金额
        $mregcodes=M("mregcodes");
        $rs_mregcodes=$mregcodes->sum("mrcPayPrice");
        $this->assign("rs_mregcodes",$rs_mregcodes);
        $this->display();
    }
}