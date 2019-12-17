<?php
namespace Member\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class RegCodeController extends LoginTrueController {
    //购买手续费
    public function ApplicationRegCode(){

        $this->LoginTrue();
        $uId=$_GET["uId"];
        $dddd="Location: http://huimingou.com/wap/RegCode/applicationregcode/uId/".$uId;
        header($dddd);
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
     //购买排单币
    public function ApplicatpaidanbiCode(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $dddd="Location: http://huimingou.com/wap/RegCode/ApplicatpaidanbiCode/uId/".$uId;

        header($dddd);
        header("Location:http://huimingou.com/wap/RegCode/ApplicatpaidanbiCode/uId/".$uId);
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
    //购买手续费提交
    public function ApplicationRegCodeAction(){
        $this->LoginTrue();
        $fuid=session("uId");
        $fukuanyesno=$_POST["fukuanyesno"];
        if($fukuanyesno==0){
            $this->error("请确认打款后再提交，否则虚假提交账户会被冻结或封号");
        }else{
            $data["uarUid"]=$_POST["uarUid"];
            $data["uarPrice"]=$_POST["uarPrice"];
            $paycodenum=$_POST["paycodenum"];
            $data["uarPayPrice"]=$_POST["uarPayPrice"];
            if(($data["uarPayPrice"]/$data["uarPrice"])!=$paycodenum){
                $this->error("你输入的打款金额不能购买当前的个数,请核对后再购买");
            }
            $data["uarShouKuanUser"]=$_POST["uarShouKuanUser"];
            $data["uarZhifuUser"]=$_POST["uarZhifuUser"];
            
            $uarFiles=$_FILES["uarFiles"];
            if(strlen($uarFiles["name"])>0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
                $upload->savePath  =     'Uploads/Users/zhifucode/'; // 设置附件上传（子）目录
                $upload->subName=array('date','Ymd');
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }
                foreach($info as $file){
                    $imgsUrl= $file['savepath'].$file['savename'];
                }
                $data["uarFiles"]=$imgsUrl;
                $data["uarDate"]=date("Y-m-d H:i:s");
                $apply_regcode=M("users_apply_regcode");
                $nowtimes=time();
                $selecttime=date("Y-m-d H");
                $map["uarDate"]=array("like","%$selecttime%");
                $rs_regcode=$apply_regcode->where($map)->select();
                foreach($rs_regcode as $val_regcode){
                    $sqldate=strtotime($val_regcode["uarDate"]);
                    if($nowtimes-$sqldate<180){
                        $this->error("三分钟之内不允许反复购买申请");
                    }
                }
                $data["uarCodeNum"]=$paycodenum;
                $result=$apply_regcode->add($data);
                if($result){
                    $this->success("申请购买成功，请等待管理员审核",U("reviewcode?at=$fuid"),3);
                }else{
                    $this->error("申请购买失败");
                }
            }
        }
    }
     //会员购买排单币提交
    public function ApplipaidanbinRegCodeAction(){
        $this->LoginTrue();
        $fuid=session("uId");
        $fukuanyesno=$_POST["fukuanyesno"];
        if($fukuanyesno==0){
            $this->error("请确认打款后再提交，否则虚假提交账户会被冻结或封号");
        }else{
            $data["uarUid"]=$_POST["uarUid"];
            $data["uarPrice"]=$_POST["uarPrice"];
            $paycodenum=$_POST["paycodenum"];
            $data["uarPayPrice"]=$_POST["uarPayPrice"];
            if(($data["uarPayPrice"]/$data["uarPrice"])!=$paycodenum){
                $this->error("你输入的打款金额不能购买当前的个数,请核对后再购买");
            }
            $data["uarShouKuanUser"]=$_POST["uarShouKuanUser"];
            $data["uarZhifuUser"]=$_POST["uarZhifuUser"];
            
            $uarFiles=$_FILES["uarFiles"];
            if(strlen($uarFiles["name"])>0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
                $upload->savePath  =     'Uploads/Users/zhifucode/'; // 设置附件上传（子）目录
                $upload->subName=array('date','Ymd');
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }
                foreach($info as $file){
                    $imgsUrl= $file['savepath'].$file['savename'];
                }
                $data["uarFiles"]=$imgsUrl;
                $data["uarDate"]=date("Y-m-d H:i:s");
                $apply_regcode=M("users_paidanbi_regcode");
                $nowtimes=time();
                $selecttime=date("Y-m-d H");
                $map["uarDate"]=array("like","%$selecttime%");
                $rs_regcode=$apply_regcode->where($map)->select();
                foreach($rs_regcode as $val_regcode){
                    $sqldate=strtotime($val_regcode["uarDate"]);
                    if($nowtimes-$sqldate<180){
                        $this->error("三分钟之内不允许反复购买申请");
                    }
                }
                $data["uarCodeNum"]=$paycodenum;
                $result=$apply_regcode->add($data);
                if($result){
                    $this->success("申请购买成功，请等待管理员审核",U("reviewcode?at=$fuid"),3);
                }else{
                    $this->error("申请购买失败");
                }
            }
        }
    }
    //会员手续费 购买记录
    public function  ReviewCode(){
        $this->LoginTrue();
        $at=$_GET["at"];
        $uId=session("uId");
        $apply=M("users_apply_regcode");
        if($at==1){
            $rs_apply=$apply->where("uarUid={$uId}")->select();
        }else{
            $rs_apply=$apply->where("uarState=0 AND uarUid={$uId}")->select();
        }
        $this->assign("uId",$uId);
        $this->assign("rs_apply",$rs_apply);
        $this->display();
    }
     //会员排单币 购买记录
    public function  PaidanbiwCode(){
        $this->LoginTrue();
        $at=$_GET["at"];
        $uId=session("uId");
        $apply=M("users_paidanbi_regcode");
        if($at==1){
            $rs_apply=$apply->where("uarUid={$uId}")->select();
        }else{
            $rs_apply=$apply->where("uarState=0 AND uarUid={$uId}")->select();
        }
        $this->assign("uId",$uId);
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