<?php
namespace System\Controller;
use Think\Controller;
import('ORG.Net.IpLocation');// 导入IpLocation类
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller {
	public function _empty(){
        $this->display("Public/404");
    }
    //这里是返回IP地址的
    public function getIPaddress(){
        $IPaddress='';
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
        return $IPaddress;
    }
    public function Index(){
       if(strlen(session("aUser"))>0){
          $this->success("你已登陆，正在跳转",U("Index/index"));
       }else{
           //当访问的时候就记录IP地址及信息
           //$ip = get_client_ip();
           $ip=$this->getIPaddress();
           $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
           $area = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
           $nowtimes=date("Y-m-d H:i:s");
           $dataip["slogTimes"]=$nowtimes;
           $dataip["slogIp"]=$area["ip"];
           $dataip["slogCity"]=$area["country"];
           if($dataip["slogIp"]=="127.0.0.1"){
               $dataip["slogCity"]="内网本机IP";
           }
           $dataip["slogAction"]=0;
           $system_log=M("system_log");
           $rs_dataip=$system_log->add($dataip);
           //动作，0为访问页面，-2为账户错误登陆失败，-1为密码错误登陆失败，1为登陆成功
           $systemName=M("system");
           $rs_systemName=$systemName->field("sName,sCopyrightName,sCheckCodeSwitch")->where("sId=1")->find();
           $this->assign("rs_systemName",$rs_systemName);
            $year=date("Y");
            $this->assign("year",$year);
            $this->display();
       }
    }
    public function CheckLogin(){
            $system=M("system");
            $rs_system=$system->field("sCheckCodeSwitch,sErrorPwdLockNum,sLoginTimeout")->where("sId=1")->find();
            if($rs_system["sCheckCodeSwitch"]==1){
                $Verify = new \Think\Verify;
                if(!$Verify->check($_POST['code'])){
                    $this->error("验证码错误！");
                    return;
                }
             }
            $admin=M("admin");
            $aUser=$_POST["aUser"];
            $aPwd=md5($_POST["aPwd"]);
            $rs=$admin->where("aUser='{$aUser}' OR aTel='{$aUser}'")->find();
            if(count($rs)>0){
                if($rs["aErrorPwdNum"]>=$rs_system["sErrorPwdLockNum"]){
                    $this->error("该账号输入密码错误已达到".$rs_system['sErrorPwdLockNum']."次，被系统锁定","",4);
                }elseif($rs["aErrorPwdNum"]==-1){
                    $this->error("该账号已被管理员锁定,请联系管理员解锁");
                }elseif($aPwd==$rs["aPwd"]){
                    if($rs["aStatic"]==0){
                        $this->error("对不起，该账户已被系统管理员停用！","",5); 
                        exit;
                    }else{
                    $aLoginNum=$rs["aLoginNum"]+1;
					$data["aLoginNum"]=$aLoginNum;
					$data["aErrorPwdNum"]=0;
					$admin->where("aUser='{$aUser}' OR aTel='{$aUser}'")->save($data);
                    session("aId",$rs["aId"]);
					session("aUser",$rs["aUser"]);
                    session("aPowers",$rs["aPowers"]);
                    session("aName",$rs["aName"]);
                    session("aDid",$rs["aDid"]);
                    session("aLN",$aLoginNum);
                    session("time",time());
                    $_SESSION['expiretime'] = time() + (($rs_system["sLoginTimeout"])*60);
                    $loginTime=date("Y-m-d H:i:s");
                    session("loginTime",$loginTime);
                    //当访问的时候就记录IP地址及信息
                    //$ip = get_client_ip();
                    $ip=$this->getIPaddress();
                    $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
                    $area = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
                    $nowtimes=date("Y-m-d H:i:s");
                    $dataip["slogUsers"]=$aUser;
                    $dataip["slogTimes"]=$nowtimes;
                    $dataip["slogIp"]=$area["ip"];
                    $dataip["slogCity"]=$area["country"];
                    if($dataip["slogIp"]=="127.0.0.1"){
                        $dataip["slogCity"]="内网本机IP";
                    }
                    $dataip["slogAction"]=1;
                    $system_log=M("system_log");
                    $rs_dataip=$system_log->add($dataip);
                    $this->success("登陆成功",U("/system/index/index/"));
                    }
                }else{
                    //当访问的时候就记录IP地址及信息
                    //$ip = get_client_ip();
                    $ip=$this->getIPaddress();
                    $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
                    $area = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
                    $nowtimes=date("Y-m-d H:i:s");
                    $dataip["slogUsers"]=$aUser;
                    $dataip["slogTimes"]=$nowtimes;
                    $dataip["slogIp"]=$area["ip"];
                    $dataip["slogCity"]=$area["country"];
                    if($dataip["slogIp"]=="127.0.0.1"){
                        $dataip["slogCity"]="内网本机IP";
                    }
                    $dataip["slogAction"]=-1;
                    $system_log=M("system_log");
                    $rs_dataip=$system_log->add($dataip);
                   
                    if($rs["aId"]==1){
                       $this->error("密码不正确"); 
                    }else{
                    $errPwdNum=$data["aErrorPwdNum"]=($rs["aErrorPwdNum"])+1;
                    $admin->where("aUser='{$aUser}' OR aTel='{$aUser}'")->save($data);
                    $this->error("密码不正确，已输入错误".$errPwdNum."次，连续输入错误达到 ".$rs_system["sErrorPwdLockNum"]."次自动锁定","",6);
                    exit;
                    }
                }
            }else{
                //当访问的时候就记录IP地址及信息
                //$ip = get_client_ip();
                $ip=$this->getIPaddress();
                $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
                $area = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
                $nowtimes=date("Y-m-d H:i:s");
                $dataip["slogUsers"]=$aUser;
                $dataip["slogTimes"]=$nowtimes;
                $dataip["slogIp"]=$area["ip"];
                $dataip["slogCity"]=$area["country"];
                if($dataip["slogIp"]=="127.0.0.1"){
                    $dataip["slogCity"]="内网本机IP";
                }
                $dataip["slogAction"]=-2;
                $system_log=M("system_log");
                $rs_dataip=$system_log->add($dataip);
                if(strlen($aUser)==11 &&  is_numeric($aUser) ==true){
                    $this->error("手机号码不存在");
                    exit;
                }else{
                    $this->error("用户名不存在");
                    exit;
                }
            }
      }     
}
