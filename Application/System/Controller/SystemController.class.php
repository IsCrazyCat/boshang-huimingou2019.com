<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class SystemController extends LoginTrueController{
    public function Set(){
        $this->LoginTrue();
        $systemInfo=M("system");
        $rs_systemInfo=$systemInfo->where("sId=1")->find();
        $this->assign("rs_systemInfo",$rs_systemInfo);
        $this->display();
    }
    public function SetAction(){
        $this->LoginTrue();
        $systemSet=M("system");
        $data["sName"]=$_POST["sName"];
        $data["sRegNum"]=$_POST["sRegNum"];
        $data["sTitle"]=$_POST["sTitle"];
        $data["sUrl"]=$_POST["sUrl"];
        $data["sTel"]=$_POST["sTel"];
        $data["sQQ"]=$_POST["sQQ"];
        $data["sWeixin"]=$_POST["sWeixin"];//微信号
        $data["sEmail"]=$_POST["sEmail"];
        $data["sCheckCodeSwitch"]=$_POST["sCheckCodeSwitch"];
        $data["sErrorPwdLockNum"]=$_POST["sErrorPwdLockNum"];
        $data["sLoginTimeout"]=$_POST["sLoginTimeout"];
        $data["sUCheckCodeSwitch"]=$_POST["sUCheckCodeSwitch"];
        $data["sUErrorPwdLockNum"]=$_POST["sUErrorPwdLockNum"];
        $data["sUZFErrorPwdLockNum"]=$_POST["sUZFErrorPwdLockNum"];
        $data["sULoginTimeout"]=$_POST["sULoginTimeout"];
        $data["sRegCodeChar"]=$_POST["sRegCodeChar"];
        $data["sRegCodeNum"]=$_POST["sRegCodeNum"];
        $data["sZhifubaoName"]=$_POST["sZhifubaoName"];
        $data["sZhifubao"]=$_POST["sZhifubao"];
        $data["sCopyrightName"]=$_POST["sCopyrightName"];
        $data["sVersions"]=$_POST["sVersions"];
        $data["sONOFF"]=$_POST["sONOFF"];
        $data["sONOFFInfo"]=$_POST["sONOFFInfo"];
		$data["sMinOnline"]=$_POST["sMinOnline"];
		$data["sMaxOnline"]=$_POST["sMaxOnline"];
		$data["sXuanchanMenu"]=$_POST["sXuanchanMenu"];
		if($data["sMinOnline"]>=$data["sMaxOnline"]){
			$this->error("虚拟在线最小数不能大于或等于虚拟在线最大数");
		}
		$rs_system=$systemSet->where("sId=1")->field("sSpwd")->find();
		$sSpwd=$_POST["sSpwd"];
		if($sSpwd==$rs_system["sSpwd"]){
		    $data["sSpwd"]=$rs_system["sSpwd"];
		}else{
		    $data["sSpwd"]=md5($_POST["sSpwd"]);
		}
		$sLogo=$_FILES["sLogo"];
		if(strlen($sLogo["name"])>0){
		    $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
		    $upload->savePath  =     'Uploads/Logo/'; // 设置附件上传（子）目录
		    $upload->subName=array('date','Ymd');
		    // 上传文件
		    $info   =   $upload->upload();
		    if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		    }
		    foreach($info as $file){
		        $imgsUrl= $file['savepath'].$file['savename'];
		    }
		    $data["sLogo"]=$imgsUrl;
		}
		//客服微信二维码
        $sErweima=$_FILES["sErweima"];
        if(strlen($sErweima["name"])>0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
            $upload->savePath  =     'Uploads/Logo/'; // 设置附件上传（子）目录
            $upload->subName=array('date','Ymd');
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }
            foreach($info as $file){
                $imgsUrl= $file['savepath'].$file['savename'];
            }
            $data["sErweima"]=$imgsUrl;
        }
        $result=$systemSet->where("sId=1")->save($data);
        if($result){
            if($data["sONOFF"]==0){
                session("uUser",null);
                session("uId",null);
               // session("uName",null);
                //session('[destroy]');
            }
            $this->success("更新成功");
        }else{
            $this->error("更新失败");
        }
    }
    public function info(){
        $this->LoginTrue();
        $info=M("info");
        $rs_info=$info->where("infoId=1")->find();
        $this->assign("rs_info",$rs_info);
        $this->display();
    }
    public function infoAction(){
        $this->LoginTrue();
        $info=M("info");
        $data["infoContent"]=$_POST["infoContent"];
        $result=$info->where("infoId=1")->save($data);
        if($result){
           $this->success("更新成功"); 
        }else{
            $this->error("更新失败");
        }
    }
    public function SystemLog(){
        $this->LoginTrue();
        $system_log=M("system_log");
        $rs_slog=$system_log->select();
        $this->assign("rs_slog",$rs_slog);
        $this->display();
    }
    public function DelLogAll(){
        $this->LoginTrue();
        $rands=$_GET["rands"];
        $nowdate=date("YmdH");
        if($rands==""){
            $this->error("非法访问");
        }
        if($rands!=$nowdate){
            $this->error("非法访问");
        }
        $system_log=M("system_log");
        $count_log=$system_log->count();
        $rs_log=$system_log->select();
        $numaction=0;
        foreach($rs_log as $val_log){
            $slogId=$val_log["slogId"];
            $result=$system_log->where("slogId={$slogId}")->delete();
            $numaction++;
        }
        if($count_log==0){
            $this->error("当前没有系统日志，无需清除","",3);
        }
        if($count_log==$numaction){
            $this->success("全部系统日志清除成功","",3);
        }else{
            $this->success("部分系统日志清除成功","",3);
        }
    }
}