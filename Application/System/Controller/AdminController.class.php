<?php
namespace System\Controller;
use Think\Controller;
use Think\Upload;
header("content-type:text/html;charset=utf-8");
class AdminController extends LoginTrueController {
    public function Lists(){
        $this->LoginTrue();
        $admin=M("admin");
        $rs_admin=$admin->order("aId asc")->select();
        $this->assign("rs_admin",$rs_admin);
        $sessionPowers=session("aPowers");
        $this->assign("sessionPowers",$sessionPowers);
        $sessionaId=session("aId");
        $this->assign("sessionaId",$sessionaId);
        $system=M("system");
        $rs_system=$system->field("sErrorPwdLockNum")->where("sId=1")->find();
        $sEPLN=$rs_system["sErrorPwdLockNum"];
        $this->assign("systemEPLN",$sEPLN);
        $this->display();
    }
    public function Add(){
        $this->LoginTrue();
        $this->display();
    }
    public function AddAction(){
        $this->LoginTrue();
        $admin=M("admin");
        $rs_admin=$admin->select();
        $data["aUser"]=$_POST["aUser"];
        $data["aName"]=$_POST["aName"];
        $data["aPwd"]=md5($_POST["aPwd"]);
        $data["aSex"]=$_POST["aSex"];
        $data["aPowers"]=$_POST["aPowers"];
        $data["aTel"]=$_POST["aTel"];
        $data["aEmail"]=$_POST["aEmail"];
        if($data["aEmail"]==""){
            $data["aEmail"]==null;
        }
        foreach($rs_admin as $val_admin){
            if($data["aUser"]==$val_admin["aUser"]){
                $this->error("登陆账号已存在，不得重复");
            }elseif($data["aTel"]==$val_admin["aTel"]){
                $this->error("手机号码已经存在，不得重复");
            }elseif($data["aEmail"]!=""){
                if($data["aEmail"]==$val_admin["aEmail"]){
                    $this->error("邮箱已存在，不得重复");
                }
            }
        }  
        $aImages=$_FILES["aImages"];
        if(strlen($aImages["name"])>0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
            $upload->savePath  =     'Uploads/Admin/images/'; // 设置附件上传（子）目录
            $upload->subName=array('date','Ymd');
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }
            foreach($info as $file){
                $imgsUrl= $file['savepath'].$file['savename'];
            }
            $data["aImages"]=$imgsUrl;
        }
        $result=$admin->add($data);
        if($result){
            $this->success("添加管理员成功","lists");
        }else{
            $this->error("添加管理员失败");
        }
    }
    public function Update(){
        $this->LoginTrue();
        $aId=$_GET["aId"];
        $admin=M("admin");
        $rs_admin=$admin->where("aId={$aId}")->find();
        $this->assign("rs_admin",$rs_admin);
        $sessionPowers=session("aPowers");
        $this->assign("sessionPowers",$sessionPowers);
        $this->display();
    }
    
    public function OneUpdate(){
        $this->LoginTrue();
        $aId=$_GET["aId"];
        $admin=M("admin");
        $rs_admin=$admin->where("aId={$aId}")->find();
        $this->assign("rs_admin",$rs_admin);
        $sessionPowers=session("aPowers");
        $this->assign("sessionPowers",$sessionPowers);
        $this->display();
    }
    public function UpdateAction(){
        $this->LoginTrue();
        $aId=$_GET["aId"];
        $oneId=$_GET["oneId"];
        $sessionPowers=session("Powers");
        $admin=M("admin");
        $data["aName"]=$_POST["aName"];
        $data["aSex"]=$_POST["aSex"];
        $data["aTel"]=$_POST["aTel"];
        $data["aEmail"]=$_POST["aEmail"];
        $aImages=$_FILES["aImages"];
        if(strlen($aImages["name"])>0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
            $upload->savePath  =     'Uploads/Admin/images/'; // 设置附件上传（子）目录
            $upload->subName=array('date','Ymd');
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }
            foreach($info as $file){
                $imgsUrl= $file['savepath'].$file['savename'];
            }
            $data["aImages"]=$imgsUrl;
        }
        if($data["aEmail"]==""){
            $data["aEmail"]=null;
        }
        $rs_admin=$admin->where("aId!={$aId}")->select();
        foreach($rs_admin as $val_admin){
           if($data["aTel"]==$val_admin["aTel"]){
                $this->error("手机号码已经存在，不得重复");
            }elseif($data["aEmail"]!=""){
                if($data["aEmail"]==$val_admin["aEmail"]){
                    $this->error("邮箱已存在，不得重复");
                }
            }
        }
        if($oneId==""){
            $data["aPowers"]=$_POST["aPowers"];
            if($data["aPowers"]==""){
                $data["aPowers"]=0;
            }
        }
        $aOldPwd=$_POST["aOldPwd"];
        $aNewPwd=$_POST["aNewPwd"];
        $aNewPwd2=$_POST["aNewPwd2"];
        
        if($sessionPowers==0){
            if($aNewPwd!="" && $aOldPwd==""){
                    $data["aPwd"]=md5($_POST["aNewPwd"]);
            }
        }else{
            if($aOldPwd!="" && $aNewPwd!=""){
                $rs_pwd=$admin->where("aId={$aId}")->field("aPwd")->find();
                if($rs_pwd["aPwd"]!=md5($aOldPwd)){
                    $this->error("原密码错误");
                }else{
                        $data["aPwd"]=md5($_POST["aNewPwd"]);
                }
            }elseif($aOldPwd!="" && $aNewPwd==""){
                $this->error("如果不需要修改密码，请不要填写原密码");
            }elseif($aOldPwd=="" && $aNewPwd!=""){
                $this->error("如果需要修改密码，请验证原密码");
            }   
        }
        $result=$admin->where("aId={$aId}")->save($data);
        if($result){
            $this->success("修改成功",U("lists"));
        }else{
            $this->error("修改失败");
        }
    }
    public function SetErrN(){
        $this->LoginTrue();
        $data["aErrorPwdNum"]=$_GET["errNum"];
        $aId=$_GET["aId"];
        $admin=M("admin");
        $result=$admin->where("aId={$aId}")->save($data);
        if($result){
            $this->success("更新状态成功");
        }else{
            $this->error("更新失败");
        }
    }
    public function SetLock(){
        $this->LoginTrue();
        $data["aStatic"]=$_GET["lock"];
        $aId=$_GET["aId"];
        $admin=M("admin");
        $result=$admin->where("aId={$aId}")->save($data);
        if($result){
            $this->success("设置成功");
        }else{
            $this->error("设置失败");
        }
    }
    public function Del(){
        $this->LoginTrue();
        $aId=$_GET["aId"];
        $admin=M("admin");
        $rs_admin=$admin->where("aId={$aId}")->find();
        if(is_file($rs_admin["aImages"])){
            unlink($rs_admin["aImages"]);
        }
        $result=$admin->where("aId={$aId}")->delete();
        if($result){
            $this->success("删除成功",U("lists"));
        }else{
            $this->error("删除失败");
        }
    }
}
