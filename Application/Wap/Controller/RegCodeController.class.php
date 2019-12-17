<?php
namespace Wap\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class RegCodeController extends LoginTrueController {
    //购买激活码
    public function ApplicationRegCode(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("uId",$uId);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uId,uUser,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $parameters=M("users_parameters");
        $rs_parameters=$parameters->where("upId=1")->field("upRegCodePrice,upRegCodeNum")->find();
        $parametersPrice=$rs_parameters["upRegCodePrice"];
        $this->assign("parametersPrice",$parametersPrice);
        $this->assign("rs_parameters",$rs_parameters);
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sZhifubao,sZhifubaoName")->find();
        $sZhifubao=$rs_system["sZhifubao"];
        $this->assign("sZhifubao",$sZhifubao);
        $sZhifubaoName=$rs_system["sZhifubaoName"];
        $this->assign("sZhifubaoName",$sZhifubaoName);
        $this->display();
    }
     //购买手续费
    public function ApplicatpaidanbiCode(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uId,uUser,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $parameters=M("users_parameters");
        $rs_parameters=$parameters->where("upId=1")->field("paiRegCodePrice")->find();
        $parametersPrice=$rs_parameters["paiRegCodePrice"];
        $this->assign("parametersPrice",$parametersPrice);
        $this->assign("rs_parameters",$rs_parameters);
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sZhifubao,sZhifubaoName")->find();
        $sZhifubao=$rs_system["sZhifubao"];
        $this->assign("sZhifubao",$sZhifubao);
        $sZhifubaoName=$rs_system["sZhifubaoName"];
        $this->assign("sZhifubaoName",$sZhifubaoName);
        $this->display();
    }
    //转激活码提交
    public function ApplicationRegCodeAction(){
        $this->LoginTrue();
        $fuid=session("uId");//打款
        $zi_id=$_POST["zizhanghu"];//收款
        $paycodenum=$_POST["paycodenum"];//个数
        $muser=M("users");
        $userss=$muser->where("uId='{$fuid}'")->find();
        if($userss['jiHuoMa']<$paycodenum){
            $this->error("对不起，您当前没有这么多激活码！");
        }
        $zi_u=$muser->where("uUser='{$zi_id}'")->find();
        if($zi_u){
            $da['jiHuoMa']=$zi_u['jiHuoMa']+$paycodenum;
            $zi_shou=$muser->where("uUser='{$zi_id}'")->save($da);
            if($zi_shou){
                $das['jiHuoMa']=$userss['jiHuoMa']-$paycodenum;
                if($das['jiHuoMa']<0){
                    $das['jiHuoMa']=0;
                }
                $fu_re=$muser->where("uId='{$fuid}'")->save($das);
                if($fu_re){
                    /*手续费转入日志*/
                    $add['mrcMUid']=$fuid;//手续费转出人id
                    $add['mrcUseUid']=$zi_u['uId'];//手续费转入人id
                    $add['mrcUseDate']=date("Y-m-d H:i:s",time());//时间
                    $add['mrcPrice']=$paycodenum;//手续费个数
                    $add['mrcMorZ']=8;//类型 8是激活码 9是手续费
                    M("mregcodes")->add($add);
                    /*手续费转入日志  end*/
                    $this->success("激活码转入成功");
                }else{
                    $this->error("激活码转入失败！！！");
                }
            }else{
                $this->error("转入激活码失败！！！");
            }
        }else{
            $this->error("请输入正确的转入账号");
        }

    }
     //转手续费提交
    public function ApplipaidanbinRegCodeAction(){
        $this->LoginTrue();
        $fuid=session("uId");//打款
        $zi_id=$_POST["zizhanghu"];//收款
        $paycodenum=$_POST["paycodenum"];//个数
        $muser=M("users");
        $userss=$muser->where("uId='{$fuid}'")->find();
        if($userss['paiDanBi']<$paycodenum){
            $this->error("对不起，您当前没有这么多手续费！");
        }
        $zi_u=$muser->where("uUser='{$zi_id}'")->find();
        if($zi_u){
            $da['paiDanBi']=$zi_u['paiDanBi']+$paycodenum;
            $zi_shou=$muser->where("uUser='{$zi_id}'")->save($da);
            if($zi_shou){
                $das['paiDanBi']=$userss['paiDanBi']-$paycodenum;
                if($das['paiDanBi']<0){
                    $das['paiDanBi']=0;
                }
                $fu_re=$muser->where("uId='{$fuid}'")->save($das);
                if($fu_re){
                    /*手续费转入日志*/
                    $add['mrcMUid']=$fuid;//手续费转出人id
                    $add['mrcUseUid']=$zi_u['uId'];//手续费转入人id
                    $add['mrcUseDate']=date("Y-m-d H:i:s",time());//时间
                    $add['mrcPrice']=$paycodenum;//手续费个数
                    $add['mrcMorZ']=9;//类型 8是激活码 9是手续费

                    M("mregcodes")->add($add);
                    /*手续费转入日志  end*/
                    $this->success("手续费转入成功");
                }else{
                    $this->error("手续费转入失败！！！");
                }
            }else{
                $this->error("转入手续费失败！！！");
            }
        }else{
            $this->error("请输入正确的转入账号");
        }
    }
    //会员激活码 转换记录
    public function  ReviewCode(){
        $this->LoginTrue();
        $uId=session("uId");
        $apply=M("mregcodes")->where("mrcMUid='{$uId}' and  mrcMorZ=8")->select();
        $uuuu=M("users");
        foreach ($apply as& $vv){
                $us=$uuuu->where("uId='{$vv['mrcUseUid']}'")->field("uUser")->find();
                $vv['mrcUseUid']=$us['uUser'];
        }
        $this->assign('apply',$apply);
        $this->display();
    }
     //会员手续费 转换记录
    public function  PaidanbiwCode(){
        $this->LoginTrue();
        $uId=session("uId");
        $apply=M("mregcodes")->where("mrcMUid='{$uId}' and mrcMorZ=9")->select();
        $uuuu=M("users");
        foreach ($apply as& $vv){
            $us=$uuuu->where("uId='{$vv['mrcUseUid']}'")->field("uUser")->find();
            $vv['mrcUseUid']=$us['uUser'];
        }
        $this->assign('apply',$apply);
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
    public function RegCodeLists(){
        $this->LoginTrue();
        $st=$_GET["st"];
        $uId=session("uId");
        $mregcodes=M("mregcodes");
        if($st==1){
            $rs_mregcodes=$mregcodes->where("mrcState=1 AND mrcMUid={$uId}")->select();
        }elseif($st==0){
            $rs_mregcodes=$mregcodes->where("mrcState=0 AND mrcMUid={$uId}")->select();
        }elseif($st==2){
            $rs_mregcodes=$mregcodes->where("mrcMUid={$uId}")->select();
        }
        $this->assign("stts",$st);
        $this->assign("uId",$uId);
        $this->assign("rs_mregcodes",$rs_mregcodes);
        $this->display();
    }
}