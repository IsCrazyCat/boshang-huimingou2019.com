<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ZccfsetController extends LoginTrueController{
    public function Set(){
        $this->LoginTrue();
        $zccf_system=M("zccf_system");
        $rs_zccf_system=$zccf_system->where("zsId=1")->find();
        $this->assign("rs_zccf_system",$rs_zccf_system);
        $this->display();
    }
    public function SetAction(){
        $this->LoginTrue();
        $zccf_system=M("zccf_system");
        $data["zsWebName"]=$_POST["zsWebName"];
        $data["zsWebTitle"]=$_POST["zsWebTitle"];
        $data["zsWebKeyWords"]=$_POST["zsWebKeyWords"];
        $data["zsWebDescription"]=$_POST["zsWebDescription"];
        $data["zsTel"]=$_POST["zsTel"];
        $data["zsQQ"]=$_POST["zsQQ"];
        $data["zsWeixin"]=$_POST["zsWeixin"];
        $data["zsEmail"]=$_POST["zsEmail"];
        $data["zsWebRegOnOff"]=$_POST["zsWebRegOnOff"];
        $data["zsWebLoginOnOff"]=$_POST["zsWebLoginOnOff"];
        $data["zsWebOnOff"]=$_POST["zsWebOnOff"];
        $data["zsWebOnOffInfo"]=$_POST["zsWebOnOffInfo"];
        $result=$zccf_system->where("zsId=1")->save($data);
        if($result){
           $this->success("更新成功"); 
        }else{
            $this->error("更新失败");
        }
    }
    public function DataSet(){
        $this->LoginTrue();
        $zccf_datainfo=M("zccf_datainfo");
        $rs_zccf_datainfo=$zccf_datainfo->where("zdId=1")->find();
        $this->assign("rs_zccf_datainfo",$rs_zccf_datainfo);
        $this->display();
    }
    public function DataSetAction(){
        $this->LoginTrue();
        $zccf_datainfo=M("zccf_datainfo");
        $data["zdRegPeople"]=$_POST["zdRegPeople"];
        $data["zdYuanzhuJiner"]=$_POST["zdYuanzhuJiner"];
        $data["zdTixianJiner"]=$_POST["zdTixianJiner"];
        $data["zdTZNum"]=$_POST["zdTZNum"];
        $data["zdJiangjin"]=$_POST["zdJiangjin"];
        $data["zdLixi"]=$_POST["zdLixi"];
        $data["zdTxNum"]=$_POST["zdTxNum"];
        $data["zdOnlineNumMin"]=$_POST["zdOnlineNumMin"];
        if($data["zdOnlineNumMin"]<-1){
            $this->error("请填写大于等于-1的整数");
        }
        $data["zdOnlineNumMax"]=$_POST["zdOnlineNumMax"];
        if($data["zdOnlineNumMax"]<=$data["zdOnlineNumMin"]){
            $this->error("在线人数最大值必须大于在线人数最小值");
        }
        $result=$zccf_datainfo->where("zdId=1")->save($data);
        if($result){
            $this->success("更新数据成功");
        }else{
            $this->error("更新数据失败");
        }
    }
    public function Info(){
        $this->LoginTrue();
        $info=M("zccf_info");
        $rs_info=$info->where("ziId=1")->find();
        $this->assign("rs_info",$rs_info);
        $this->display();
    }
    public function InfoAction(){
        $this->LoginTrue();
        $info=M("zccf_info");
        $data["ziContent"]=$_POST["ziContent"];
        $result=$info->where("ziId=1")->save($data);
        if($result){
            $this->success("更新规则介绍成功");
        }else{
            $this->error("更新规则介绍失败");
        }
    }
    public function Lianxi(){
        $this->LoginTrue();
        $zccf_lianxi=M("zccf_lianxi");
        $rs_lianxi=$zccf_lianxi->where("zlId=1")->find();
        $this->assign("rs_lianxi",$rs_lianxi);
        $this->display();
    }
    public function LianxiAction(){
        $this->LoginTrue();
        $zccf_lianxi=M("zccf_lianxi");
        $data["zlContent"]=$_POST["zlContent"];
        $result=$zccf_lianxi->where("zlId=1")->save($data);
        if($result){
            $this->success("更新联系我们成功");
        }else{
            $this->error("更新联系我们失败");
        }
    }
    public function Focusmap(){
        $this->LoginTrue();
        $zccf_focusmap=M("zccf_focusmap");
        $rs_focusmap=$zccf_focusmap->select();
        $this->assign("rs_focusmap",$rs_focusmap);
        $this->display();
    } 
    public function FocusmapAdd(){
        $this->LoginTrue();
        $this->display();
    }
    public function FocusmapAddAction(){
        $this->LoginTrue();
        $data["zfNum"]=$_POST["zfNum"];
        $data["zfTitle"]=$_POST["zfTitle"];
        $data["zfUrl"]=$_POST["zfUrl"];
        $data["zfColor"]=$_POST["zfColor"];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
        $upload->savePath  =     'Uploads/Focusmap/'; // 设置附件上传（子）目录
        $upload->subName=array('date','Ymd');
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }
        foreach($info as $file){
            $imgsUrl= $file['savepath'].$file['savename'];
        }
        $data["zfImages"]=$imgsUrl;
        
        $zccf_focusmap=M("zccf_focusmap");
        $result=$zccf_focusmap->add($data);
        if($result){
            $this->success("添加轮播图成功",U("focusmap"));
        }else{
            $this->error("添加轮播图失败");
        }
    }
    public function SetShow(){
        $this->LoginTrue();
        $zfId=$_GET["zfId"];
        $data["zfOnOff"]=$_GET["zfOnOff"];
        $zccf_focusmap=M("zccf_focusmap");
        $result=$zccf_focusmap->where("zfId={$zfId}")->save($data);
        if($result){
           $this->success("更新成功"); 
        }else{
            $this->error("更新失败");
        }
    }
    public function FocusmapUpdate(){
        $this->LoginTrue();
        $zfId=$_GET["zfId"];
        $zccf_focusmap=M("zccf_focusmap");
        $rs_focusmap=$zccf_focusmap->where("zfId={$zfId}")->find();
        $this->assign("rs_focusmap",$rs_focusmap);
        $this->display();
    }
    public function FocusmapUpdateAction(){
        $this->LoginTrue();
        $zfId=$_GET["zfId"];
        $zccf_focusmap=M("zccf_focusmap");
        $data["zfNum"]=$_POST["zfNum"];
        $data["zfTitle"]=$_POST["zfTitle"];
        $data["zfUrl"]=$_POST["zfUrl"];
        $data["zfColor"]=$_POST["zfColor"];
        $zfImages=$_FILES["zfImages"];
        if(strlen($zfImages["name"])>0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
            $upload->savePath  =     'Uploads/Focusmap/'; // 设置附件上传（子）目录
            $upload->subName=array('date','Ymd');
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }
            foreach($info as $file){
                $imgsUrl= $file['savepath'].$file['savename'];
            }
            $data["zfImages"]=$imgsUrl;
        }
        $result=$zccf_focusmap->where("zfId={$zfId}")->save($data);
        if($result){
            $this->success("修改轮播图成功",U("focusmap"));
        }else{
            $this->error("修改轮播图失败");
        }
    }
    public function FocusDel(){
        $this->LoginTrue();
        $zfId=$_GET["zfId"];
        $zccf_focusmap=M("zccf_focusmap");
        $result=$zccf_focusmap->where("zfId={$zfId}")->delete();
        if($result){
            $this->success("删除轮播图成功");
        }else{
            $this->error("删除轮播图失败");
        }
    }
}