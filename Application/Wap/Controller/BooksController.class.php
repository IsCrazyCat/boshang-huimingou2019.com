<?php
namespace Wap\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class BooksController extends LoginTrueController {
    public function Lists(){
        $this->LoginTrue();
        $st=$_GET["st"];
        $uUser=session("uUser");
        $books=M("books");
        $rs_books=$books->where("bUser='{$uUser}'")->select();
        $this->assign("st",$st);
        $this->assign("rs_books",$rs_books);
        $this->display();
    }
    public function Show(){
        $this->LoginTrue();
        $bId=$_GET["bId"];
        $books=M("books");
        $rs_books=$books->where("bId={$bId}")->find();
        $this->assign("rs_books",$rs_books);
        $this->display();   
    }
    public function Add(){
        $this->LoginTrue();
        $uUser=session("uUser");
        $uTel=session("uTel");
        $this->assign("uUser",$uUser);
        $this->assign("uTel",$uTel);
        $this->display();
    }
    public function AddAction(){
        $this->LoginTrue();
        $data["bUser"]=$_POST["bUser"];
        $data["bTel"]=$_POST["bTel"];
        $data["bTitle"]=$_POST["bTitle"];
        $data["bContent"]=$_POST["bContent"];
        $data["bDate"]=date("Y-m-d H:i:s");
        $books=M("books");
        $result=$books->add($data);
        if($result){
            $this->success("留言成功",U("lists?st=1"),3);
        }else{
            $this->error("留言失败");
        }
    }
}