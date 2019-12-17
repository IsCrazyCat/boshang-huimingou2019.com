<?php
namespace System\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class BooksController extends LoginTrueController {
    public function Lists(){
        $this->LoginTrue();
        $st=$_GET["st"];
        $books=M("books");
        if($st==0){
            $empty="<tr><td>暂无未审核留言</td></tr>";
            $rs_books=$books->where("bState=0")->select();
        }elseif($st==1){
            $empty="<tr><td>暂无留言信息</td></tr>";
            $rs_books=$books->where("(bState=1) OR (bState=2)")->select();
        }
        $this->assign("st",$st);
        $this->assign("empty",$empty);
        $this->assign("rs_books",$rs_books);
        $this->display();
    }
    public function SetShow(){
        $this->LoginTrue();
        $bId=$_GET["bId"];
        $data["bState"]=$_GET["showId"];
        $books=M("books");
        $result=$books->where("bId={$bId}")->save($data);
        if($result){
            $this->success("更新成功");
        }else{
            $this->error("更新失败");
        }
    }
    public function Reply(){
        $this->LoginTrue();
        $bId=$_GET["bId"];
        $books=M("books");
        $rs_books=$books->where("bId={$bId}")->find();
        $this->assign("rs_books",$rs_books);
        $this->display();
    }
    public function ReplyAction(){
        $this->LoginTrue();
        $bId=$_GET["bId"];
        $data["bTitle"]=$_POST["bTitle"];
        $data["bContent"]=$_POST["bContent"];
        $data["bRcontent"]=$_POST["bRcontent"];
        $data["bRdate"]=date("Y-m-d H:i:s");
        $books=M("books");
        $result=$books->where("bId={$bId}")->save($data);
        if($result){
            $this->success("留言回复成功");
        }else{
            $this->error("留言回复失败");
        }
    }
    public function Del(){
        $this->LoginTrue();
        $bId=$_GET["bId"];
        $books=M("books");
        $result=$books->where("bId={$bId}")->delete();
        if($result){
            $this->success("删除留言成功");
        }else{
            $this->error("删除留言失败");
        } 
    }
}