<?php
namespace Member\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller {
	public function _empty(){
        $this->display("Public/404");
    }
    public function Index(){
        header('Location: http://huimingou.com/wap/login');
       if(strlen(session("uUser"))>0){
          $this->success("你已登陆，正在跳转",U("Index/index"));
       }else{
           $systemName=M("system");
           $rs_systemName=$systemName->field("sTitle,sONOFF,sONOFFInfo,sName,sCopyrightName,sCheckCodeSwitch,sUCheckCodeSwitch,sLogo")->where("sId=1")->find();
           $this->assign("rs_systemName",$rs_systemName);
            $year=date("Y");
            $this->assign("year",$year);
            $this->display();
       }
    }
    public function CheckLogin(){
            $system=M("system");
            $htdl=$_GET["htdl"];
            $rs_system=$system->field("sUCheckCodeSwitch,sUErrorPwdLockNum,sULoginTimeout,sQQ")->where("sId=1")->find();
            if($rs_system["sUCheckCodeSwitch"]==1){
                if($htdl!=1){
                    $Verify = new \Think\Verify;
                    if(!$Verify->check($_POST['code'])){
                        $this->error("验证码错误！");
                        return;
                    }
                }
             }
            $users=M("users");
            if($htdl==1){
                $htdlId=$_GET["htdlId"];
                $rs_htdl_users=$users->where("uId={$htdlId}")->field("uUser,uPwd,uMXInvisible")->find();
                $yinshen=$rs_htdl_users["uMXInvisible"];
                if($yinshen!=1){
                        session(null);
                        $this->error("当前状态下无法登陆，请到会员中心登陆",U("index")); 
                }
                $uUser=$rs_htdl_users["uUser"];
                $uPwd=$rs_htdl_users["uPwd"];
                
            }else{
                $uUser=$_POST["uUser"];
                $uPwd=md5($_POST["uPwd"]);
            }
            $rs=$users->where("uUser='{$uUser}' OR uTel='{$uUser}'")->find();
            if(count($rs)>0){
                $tuiId=$rs["uTuiId"];
                $tui=$users->where("uId={$tuiId}")->field("uTel,uName,uUser")->find();
                $tuiUser=$tui["uUser"];
                $tuiTel=$tui["uTel"];
                // if($rs["uState"]==0){
                //     $this->error("对不起，该账户还未激活，请联系你的推荐人[$tuiUser]-($tuiTel)进行激活","",15);
                // }
                   /*添加判断是否已经激活该登陆会员*/
                    if($rs["uState"]==0){
                     session("uState",$rs["uState"]);
                }else{
                     session("uState",$rs["uState"]);
                }
          
                 /*添加判断是否已经激活该登陆会员 E_N_D*/
                if($rs["uLock"]==-1){
                    $this->error("对不起，该账户多次违规，已被封号。如有疑问，请联系你的推荐人[$tuiUser]-($tuiTel)进行账户申诉","",15);
                }elseif($rs["uLock"]==0){
                    $this->error("对不起，该账户存在违规操作，处于锁定状态，请联系管理员QQ：".$rs_system['sQQ']."解除锁定","",15);
                }
                if($rs["uErrorPwdNum"]>=$rs_system["sUErrorPwdLockNum"]){
                    $this->error("该账号输入密码错误已达到".$rs_system['sUErrorPwdLockNum']."次，被系统锁定","",4);
                }elseif($uPwd==$rs["uPwd"]){
                    $loginTime=date("Y-m-d H:i:s");
                    $uLoginNum=$rs["uLoginNum"]+1;
                    if($htdl!=1){
                        $data["uLoginNum"]=$uLoginNum;
                    }
                    $data["uErrorPwdNum"]=0;
                    $data["uOnline"]=1;
                    $data["uOnlineDate"]=$loginTime;
					$users->where("uUser='{$uUser}' OR uTel='{$uUser}'")->save($data);
                    session("uId",$rs["uId"]);
                    session("uVip",$rs["uVip"]);
					session("uUser",$rs["uUser"]);
                    session("uName",$rs["uName"]);
                    session("uTel",$rs["uTel"]);
                    session("uLN",$uLoginNum);
                    session("time",time());
                    $_SESSION['expiretime'] = time() + (($rs_system["sULoginTimeout"])*60);
                    session("loginTime",$loginTime);
                    if($htdl!=1){
                    $this->success("登陆成功",U("/Index/"));
                    }else{
                        $this->redirect("/Index/");
                    }
                }else{
                    if($rs["aId"]==1){
                       $this->error("密码不正确"); 
                    }else{
                    $errPwdNum=$data["uErrorPwdNum"]=($rs["uErrorPwdNum"])+1;
                    $users->where("uUser='{$uUser}' OR uTel='{$uUser}'")->save($data);
                    $this->error("密码不正确，已输入错误".$errPwdNum."次，连续输入错误达到 ".$rs_system["sUErrorPwdLockNum"]."次自动锁定","",6);
                    exit;
                    }
                }
            }else{
                if(strlen($uUser)==11 &&  is_numeric($uUser) ==true){
                    $this->error("手机号码不存在");
                    exit;
                }else{
                    $this->error("用户名不存在");
                    exit;
                }
            }
      }     
}
