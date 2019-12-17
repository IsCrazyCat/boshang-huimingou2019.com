<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class AnnouncementController extends LoginTrueController {
    public function Add(){
        $this->LoginTrue();
        $announcement=M("announcement");
        $num=$announcement->count();
        $annNum=$num+1;
        $this->assign("annNum",$annNum);
        $this->display();
    }
    public function AddAction(){
        $this->LoginTrue();
        $data["annNum"]=$_POST["annNum"];
        $data["annTitle"]=$_POST["annTitle"];
        $data["annContent"]=$_POST["annContent"];
        $data["annDate"]=date("Y-m-d");
        $announcement=M("announcement");
        $result=$announcement->add($data);
        if($result){
           $this->success("添加公告成功",U("lists"));
        }else{
            $this->error("添加公告失败");
        }
    }
    public function Lists(){
         $this->LoginTrue();
         $announcement=M("announcement");
         $rs_announcement=$announcement->select();
         $this->assign("rs_announcement",$rs_announcement);
         $this->display();
    }
    public function SetShow(){
        $this->LoginTrue();
        $annId=$_GET["annId"];
        $data["annShow"]=$_GET["showId"];
        $announcement=M("announcement");
        $result=$announcement->where("annId={$annId}")->save($data);
        if($result){
            $this->success("更新成功");
        }else{
            $this->error("更新失败");
        }
    }
    public function Del(){
        $this->LoginTrue();
        $annId=$_GET["annId"];
        $announcement=M("announcement");
        $result=$announcement->where("annId={$annId}")->delete();
        if($result){
            $this->success("删除公告成功");
        }else{
            $this->error("删除公告失败");
        }
    }
    public function Update(){
        $this->LoginTrue();
        $annId=$_GET["annId"];
        $announcement=M("announcement");
        $rs_announcement=$announcement->where("annId={$annId}")->find();
        $this->assign("rs_announcement",$rs_announcement);
        $this->display();
    }
    public function UpdateAction(){
        $this->LoginTrue();
        $annId=$_GET["annId"];
        $data["annNum"]=$_POST["annNum"];
        $data["annTitle"]=$_POST["annTitle"];
        $data["annContent"]=$_POST["annContent"];
        $announcement=M("announcement");
        $result=$announcement->where("annId={$annId}")->save($data);
        if($result){
            $this->success("修改公告成功");
        }else{
            $this->error("修改公告失败");
        }
    }
}