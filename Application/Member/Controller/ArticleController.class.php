<?php
namespace Member\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ArticleController extends LoginTrueController {
    public function Article(){
        $this->LoginTrue();
        $info=M("info");
        $rs_info=$info->where("infoId=1")->find();
        $this->assign("rs_info",$rs_info);
        $this->display();
    }
}