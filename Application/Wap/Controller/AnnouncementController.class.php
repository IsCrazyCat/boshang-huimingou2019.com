<?php
namespace Wap\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class AnnouncementController extends LoginTrueController {
    public function Lists(){
         $this->LoginTrue();
         $announcement=M("announcement");
         $rs_announcement=$announcement->where("annShow=1")->select();
         $this->assign("rs_announcement",$rs_announcement);
         $this->display();
    }
    public function Show(){
        $this->LoginTrue();
        $annId=$_GET["annId"];
        $announcement=M("announcement");
        $rs_announcement=$announcement->where("annId={$annId}")->find();
        $this->assign("rs_announcement",$rs_announcement);
        $this->display();
    }
}