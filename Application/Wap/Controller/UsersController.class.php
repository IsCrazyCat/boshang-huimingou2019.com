<?php
namespace Wap\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class UsersController extends LoginTrueController {
    //激活下级会员提交
    public function jihuojiao(){
        $this->LoginTrue();
        $fuid=$_GET['fuid'];//父级id
        $uId=$_GET['uId'];//下级id
        $fus=M("users")->where("uId='{$fuid}'")->find();

        if($fus['jiHuoMa']>0){
            $data['uState']=1;
            $data['xingji']=5;//激活会员默认星级  5星

            $jieguo=M("users")->where("uId='{$uId}'")->save($data);
            if($jieguo){
                $datas['jiHuoMa']=$fus['jiHuoMa']-1;
                $jjjj=M("users")->where("uId='{$fuid}'")->save($datas);
                if($jjjj){
                    $this->success("激活注册下级会员成功！");
                }else{
                    $this->error("激活失败！！！");
                }
            }
        }else{
            $this->error("激活码数量不足，请购买！");
        }
    }
    //激活下级会员
    public function jihuohuiyuan(){
        $this->LoginTrue();
        $fu_id=$_GET['uId'];
        $weizhuce=M("users")->where("uState=0 and uTuiId='{$fu_id}'")->select();//未激活用户
        $this->assign("weijihuo",$weizhuce);
        $this->assign("fuid",$fu_id);
        $this->display();
    }
    //注册初始页
    public  function zhucechushi(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("uId",$uId);
        $this->display();
    }
    public function chushiye(){
        $this->LoginTrue();
        $uId=$_GET["uId"];

        $this->assign("uId",$uId);
        $this->display();
    }
    public function UpdateUser(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    //更改会员资料提交
    public function UpdateUserAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $aqm=$users->field("uZfPwd,uZFErrorPwdNum")->where("uId={$uId}")->find();
        $uZfPwd=md5($_POST["uZfPwd"]);
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行相关权限操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                $users->where("uId={$uId}")->save($dataerr);
                $this->error("安全密码错误，无法修改，已连续输错次".$zferr."次，输错".$rs_system['sUZFErrorPwdLockNum']."次将被锁定");
            }
            $rs=$users->field("uId,uUser,uSfId,uTel,uEmail")->where("uId!={$uId}")->select();

            /*
            $uUsers=$_POST["uUser"];
            if($uUsers!=""){
                $data["uUser"]=trim($_POST["uUser"]);
            }

            $data["uTel"]=trim($_POST["uTel"]);
            $data["yinhangName"]=trim($_POST["yinhangName"]);//银行名
            $data["uZhifubao"]=trim($_POST["uZhifubao"]);
            $data["yinhangNubmer"]=trim($_POST["yinhangNubmer"]);//银行卡号

            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }elseif($data["uTel"]==$val["uTel"]){
                    $this->error("手机号码已经存在");
                }elseif($data["uZhifubao"]==$val["uZhifubao"]){
                    $this->error("支付宝账户已经存在");
                }
            }
            $data["uSex"]=trim($_POST["uSex"]);
            $data["uName"]=trim($_POST["uName"]);
            */
            
            $uImages=$_FILES["uImages"];
            if(strlen($uImages["name"])>0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
                $upload->savePath  =     'Uploads/Users/images/'; // 设置附件上传（子）目录
                $upload->subName=array('date','Ymd');
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }
                foreach($info as $file){
                    $imgsUrl= $file['savepath'].$file['savename'];
                }
                $data["uImages"]=$imgsUrl;
            }
            $data["uZFErrorPwdNum"]=0;
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                $this->success("修改资料成功");
            }else{
                $this->error("修改资料失败");
            }
        }
    }
    public function UpdateUserLoginPassword(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    public function UpdateUserLoginPasswordAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $aqm=$users->field("uZfPwd,uZFErrorPwdNum,uPwd")->where("uId={$uId}")->find();
        $uZfPwd=md5($_POST["uZfPwd"]);
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行相关权限操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                $users->where("uId={$uId}")->save($dataerr);
                $this->error("安全密码错误，无法修改，已连续输错次".$zferr."次，输错".$rs_system['sUZFErrorPwdLockNum']."次将被锁定");
            }
            $uoPwd=md5($_POST["uoPwd"]);
            if($uoPwd!=$aqm["uPwd"]){
                $this->error("原始登陆密码错误");
            }else{
                $data["uPwd"]=md5($_POST["uPwd"]);
                $data["uZFErrorPwdNum"]=0;
                if($data["uPwd"]==$aqm["uPwd"]){
                    $this->error("新登陆密码不能和旧密码相同");
                }
                if($data["uPwd"]==$aqm["uZfPwd"]){
                   $this->error("新密码不能和安全密码相同"); 
                }
                $result=$users->where("uId={$uId}")->save($data);
                if($result){
                    $this->success("修改登陆密码成功");
                }else{
                    $this->error("修改登陆密码失败");
                }
            }
         }
    }
    public function UpdateUserSafePassword(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    public function UpdateUserSafePasswordAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $aqm=$users->field("uZfPwd,uZFErrorPwdNum,uPwd")->where("uId={$uId}")->find();
        $uZfPwd=md5($_POST["uoPwd"]);
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行相关权限操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                $users->where("uId={$uId}")->save($dataerr);
                $this->error("原安全密码错误，无法修改，已连续输错次".$zferr."次，输错".$rs_system['sUZFErrorPwdLockNum']."次将被锁定");
            }
                $data["uZfPwd"]=md5($_POST["uZfPwd"]);
                $data["uZFErrorPwdNum"]=0;
                if($data["uZfPwd"]==$aqm["uPwd"]){
                    $this->error("新安全密码不能和旧登陆密码相同");
                }
                if($data["uZfPwd"]==$aqm["uZfPwd"]){
                    $this->error("新安全密码不能和旧安全密码相同");
                }
                $result=$users->where("uId={$uId}")->save($data);
                if($result){
                    $this->success("修改安全密码成功");
                }else{
                    $this->error("修改修改密码失败");
                }
            }
    }
    //生成链接二维码
    public function Erweima(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $fenlian="http://huimingou.com/wap/Users/FenxiangZhuce/uId/".$uId;
        $imgs=qrcode($fenlian,9);
        var_dump($imgs);die;
        $this->display();

    }
    //注册下级用户 链接生成页面f
    public function FenxiangZhuceEr(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $fenlian="http://huimingou.com/wap/Users/FenxiangZhuce/uId/".$uId;
        $this->assign("fenlian",$fenlian);
        $this->display();
    }
    //分享链接注册下级会员页面
    public function FenxiangZhuce(){
        $uId=$_GET["uId"];
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sRegNum")->find();
        if($rs_system["sRegNum"]==-2){
            $this->error("系统临时关闭了注册功能，正在维护中，请随时留意公告",U("userslists?uId={$uId}"),8);
        }else{
            $users=M("users");
            $rs_users=$users->where("uId={$uId}")->field("uUser,uId")->find();
            $this->assign("rs_users",$rs_users);
            $this->assign("uId",$uId);
            $this->display();
        }
    }
    //注册下级会员页面
    public function UserAdd(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $system=M("system");
        $rs_system=$system->where("sId=1")->field("sRegNum")->find();
        if($rs_system["sRegNum"]==-2){
            $this->error("系统临时关闭了注册功能，正在维护中，请随时留意公告",U("userslists?uId={$uId}"),8);
        }else{
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uUser,uId")->find();
        $this->assign("rs_users",$rs_users);
        $this->assign("uId",$uId);
        $this->display();
        }
    }
    //分享注册下级  接受数据
    public function UserAddFenxiang(){

        $users=M("users");
        $system=M("system");
        $rs=$users->field("uId,uUser,uSfId,uTel,uEmail")->select();
        $data["uUser"]=trim($_POST["uUser"]);//用户账户

        $data["yinhangName"]=trim($_POST["yinhangName"]);//银行名称
        $data["yinhangNubmer"]=trim($_POST["yinhangNubmer"]);//银行卡号

        $uTel=$data["uTel"]=trim($_POST["uTel"]);//手机号码
        $uZhifubao=$data["uZhifubao"]=trim($_POST["uZhifubao"]);//支付宝账户
        $rs_system=$system->where("sId=1")->field("sRegNum")->find();
        if($rs_system["sRegNum"]==-1){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }
            }
        }elseif($rs_system["sRegNum"]==0){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }elseif($data["uTel"]==$val["uTel"]){
                    $this->error("手机号码已经存在");
                }elseif($data["uZhifubao"]==$val["uZhifubao"]){
                    $this->error("支付宝账户已经存在");
                }
            }
        }elseif($rs_system["sRegNum"]>0){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }
            }

            $count_utel=$users->where("uTel='{$uTel}'")->count();
            if($count_utel>$rs_system["sRegNum"]){
                $this->error("手机号码超过系统限制注册的最大次数","",5);
            }
            $count_zfb=$users->where("uZhifubao='{$uZhifubao}'")->count();
            if($count_zfb>$rs_system["sRegNum"]){
                $this->error("支付宝账户超过系统限制注册的最大次数","",5);
            }


        }
        $data["uSex"]=trim($_POST["uSex"]);
        $uPwd=$_POST["uPwd"];
        if($uPwd==""){
            $data["uPwd"]=md5($data["uTel"]);
        }else{
            $data["uPwd"]=md5(trim($_POST["uPwd"]));
        }
        $uZfPwd=$_POST["uZfPwd"];
        if($uZfPwd==""){
            $data["uZfPwd"]=md5(654321);
        }else{
            $data["uZfPwd"]=md5($_POST["uZfPwd"]);
        }
        if($data["uPwd"]==$data["uZfPwd"]){
            $this->error("登陆密码不能和安全密码一样");
        }
        $data["uName"]=trim($_POST["uName"]);
        $uTuiUser=trim($_POST["uTuiUser"]);
        $rs_count=$users->where("uUser='{$uTuiUser}' OR uTel='{$uTuiUser}'")->count();
        if($rs_count<1){
            $this->error("推荐人不存在，请重新填写");
        }else{
            $rs_users=$users->where("uUser='{$uTuiUser}' OR uTel='{$uTuiUser}'")->find();
            $data["uTuiId"]=$rs_users["uId"];
            $sonData["uSonUser"]=$rs_users["uSonUser"].$data["uUser"]."|";
        }
        $data["uRegDate"]=date("Y-m-d H:i:s");
        $result=$users->add($data);
        if($result){
            $users->where("uId={$data['uTuiId']}")->save($sonData);
            if($uPwd=="" && $uZfPwd!=""){
                $this->success("注册会员成功，登陆密码默认为你注册的手机号",U("loglogin/indexin"));
            }elseif($uPwd=="" && $uZfPwd==""){
                $this->success("注册会员成功，登陆密码及安全码为默认的手机号及654321",U("login/index"));
            }elseif($uPwd!="" && $uZfPwd==""){
                $this->success("注册会员成功，安全密码默认为654321",U("login/index"));
            }else{
                $this->success("注册会员成功,请牢记登陆密码及安全码",U("login/index"));
            }
        }else{
            $this->error("注册会员失败");
        }
    }
    //用户注册 接受数据
    public function UserAddAction(){
        $this->LoginTrue();
        $fuid=session("uId");
        $users=M("users");
        $system=M("system");
        $rs=$users->field("uId,uUser,uSfId,uTel,uEmail")->select();
        $data["uUser"]=trim($_POST["uUser"]);//用户账户

        $data["yinhangName"]=trim($_POST["yinhangName"]);//银行名称
        $data["yinhangNubmer"]=trim($_POST["yinhangNubmer"]);//银行卡号

        $uTel=$data["uTel"]=trim($_POST["uTel"]);//手机号码
        $uZhifubao=$data["uZhifubao"]=trim($_POST["uZhifubao"]);//支付宝账户
     $rs_system=$system->where("sId=1")->field("sRegNum")->find();
        if($rs_system["sRegNum"]==-1){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }
            }
        }elseif($rs_system["sRegNum"]==0){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }elseif($data["uTel"]==$val["uTel"]){
                    $this->error("手机号码已经存在");
                }elseif($data["uZhifubao"]==$val["uZhifubao"]){
                    $this->error("支付宝账户已经存在");
                }
            }
        }elseif($rs_system["sRegNum"]>0){
            foreach($rs as $val){
                if($data["uUser"]==$val["uUser"]){
                    $this->error("登陆账户已经存在");
                }
            }

            $count_utel=$users->where("uTel='{$uTel}'")->count();
            if($count_utel>$rs_system["sRegNum"]){
                $this->error("手机号码超过系统限制注册的最大次数","",5);
            }
            $count_zfb=$users->where("uZhifubao='{$uZhifubao}'")->count();
            if($count_zfb>$rs_system["sRegNum"]){
                $this->error("支付宝账户超过系统限制注册的最大次数","",5);
            }


        }
        $data["uSex"]=trim($_POST["uSex"]);
        $uPwd=$_POST["uPwd"];
        if($uPwd==""){
            $data["uPwd"]=md5($data["uTel"]);
        }else{
            $data["uPwd"]=md5(trim($_POST["uPwd"]));
        }
        $uZfPwd=$_POST["uZfPwd"];
        if($uZfPwd==""){
            $data["uZfPwd"]=md5(654321);
        }else{
            $data["uZfPwd"]=md5($_POST["uZfPwd"]);
        }
        if($data["uPwd"]==$data["uZfPwd"]){
            $this->error("登陆密码不能和安全密码一样");
        }
        $data["uName"]=trim($_POST["uName"]);
        $uTuiUser=trim($_POST["uTuiUser"]);
        $rs_count=$users->where("uUser='{$uTuiUser}' OR uTel='{$uTuiUser}'")->count();
        if($rs_count<1){
            $this->error("推荐人不存在，请重新填写");
        }else{
            $rs_users=$users->where("uUser='{$uTuiUser}' OR uTel='{$uTuiUser}'")->find();
            $data["uTuiId"]=$rs_users["uId"];
            $sonData["uSonUser"]=$rs_users["uSonUser"].$data["uUser"]."|";
        }
        $data["uRegDate"]=date("Y-m-d H:i:s");
        $result=$users->add($data);
        if($result){
            $users->where("uId={$data['uTuiId']}")->save($sonData);
            if($uPwd=="" && $uZfPwd!=""){
                $this->success("注册会员成功，登陆密码默认为你注册的手机号",U("userslists?uId=$fuid"),3);
            }elseif($uPwd=="" && $uZfPwd==""){
                $this->success("注册会员成功，登陆密码及安全码为默认的手机号及654321",U("userslists?uId=$fuid"),3);
            }elseif($uPwd!="" && $uZfPwd==""){
                $this->success("注册会员成功，安全密码默认为654321",U("userslists?uId=$fuid"),3);
            }else{
                $this->success("注册会员成功,请牢记登陆密码及安全码",U("userslists?uId=$fuid"),3);
            }
        }else{
            $this->error("注册会员失败");
        }
    }
    public function UsersLists(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $stId=$_GET["stId"];
        $users=M("users");
        if($stId==0){
            $rs_users=$users->order("uId desc")->where("uTuiId={$uId}")->select();
        }elseif($stId==2){
            $rs_users=$users->order("uId desc")->where("uTuiId={$uId} AND uState=0")->select();
        }elseif($stId==4){
            $rs_users=$users->order("uId desc")->where("uTuiId={$uId} AND uState=1 AND uTouziState=0")->select();
        }elseif($stId==6){
            $rs_users=$users->order("uId desc")->where("uTuiId={$uId} AND uState=1 AND uTouziState=1")->select();
        }

        $this->assign("rs_users",$rs_users);
        $this->assign("uId",$uId);
        $this->display();
    }
    public function UsersListsSon(){
        $this->UsersLists();
    }
    public function UserAddSon(){
        $this->UserAdd();
    }
    public function SetRegState(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $parameters=M("users_parameters");
        $rs_parameters=$parameters->where("upId=1")->field("upRegCodeState")->find();
        $this->assign("rs_parameters",$rs_parameters);
        $rs_tuijianren=$users->where("uId={$rs_users['uTuiId']}")->field("uId,uUser,uTel,uName")->find();
        $this->assign("rs_tuijianren",$rs_tuijianren);
        $this->display();
    
    }
    /*激活登陆会员用手续费*/
        public function SetRegStateHuiYuan(){
        $this->LoginTrue();
          $uId=session("uId");
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $parameters=M("users_parameters");
        $rs_parameters=$parameters->where("upId=1")->field("upRegCodeState")->find();
        $this->assign("rs_parameters",$rs_parameters);
        $rs_tuijianren=$users->where("uId={$rs_users['uTuiId']}")->field("uId,uUser,uTel,uName")->find();
        $this->assign("rs_tuijianren",$rs_tuijianren);
        // var_dump($rs_tuijianren);die;
        $this->display();
    
    }
      public function SetRegStateActionHuiYuan(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $fuid=session("uId");
        $codestate=$_GET["codestate"];
        $data["uState"]=1;
        $users_parameters=M("users_parameters");
        $rs_paramenters=$users_parameters->where("upId=1")->field("upRegJiangjin,upRegLixi")->find();
        $data["uJiangjin"]=$rs_paramenters["upRegJiangjin"];
        $data["uLixi"]=$rs_paramenters["upRegLixi"];
        $data["uNowLixi"]=$rs_paramenters["upRegLixi"];
        $money_log=M("money_log");
        //日志的记录
        if($data["uJiangjin"]>0){
        $nowdatetimes=date("Y-m-d H:i:s");
        $nowtimes=date("YmdHis");
        $today=date("Y-m-d");
        $datalogjiangjin["mlUid"]=$uId;
        $datalogjiangjin["mlJiner"]=$data["uJiangjin"];
        $datalogjiangjin["mlMoneyType"]=3;
        $datalogjiangjin["mlToday"]=$today;
        $datalogjiangjin["mlDate"]=$nowdatetimes;
        $datalogjiangjin["mlInfo"]="首次激活会员，赠送奖金".$data["uJiangjin"]."元";
        $datalogjiangjin["mlPorC"]=1;
        $datalogjiangjin["mlPorM"]=4;
        $datalogjiangjin["mlSuccess"]=1;
        $datalogjiangjin["mlRandNumber"]="B".$nowtimes.$datalogjiangjin["mlUid"];
        }
        //日志的记录
        if($data["uLixi"]>0){
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
            $dataloglixi["mlUid"]=$uId;
            $dataloglixi["mlJiner"]=$data["uLixi"];
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlToday"]=$today;
            $dataloglixi["mlDate"]=$nowdatetimes;
            $dataloglixi["mlInfo"]="首次激活会员，赠送利息".$data["uLixi"]."元";
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=4;
            $dataloglixi["mlSuccess"]=1;
            $dataloglixi["mlRandNumber"]="I".$nowtimes.$dataloglixi["mlUid"];
        }
        if($codestate==0){
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                if($data["uJiangjin"]>0){
                 $money_log->add($datalogjiangjin);
                }
                if($data["uLixi"]>0){
                    $money_log->add($dataloglixi);
                }
            $rsdddd=1;
                     session("uState",$rsdddd);

                $this->success("激活成功",U("Index/index/"));

            }else{
                $this->error("激活失败");
            }
        }else{
            //校验注册码
            $regcode=$_POST["uUseRegCode"];
            $mregcodes=M("mregcodes");
            $rs_mrc_n=$mregcodes->where("mrcRegCode='{$regcode}'")->count();
            if($rs_mrc_n==0){
                $this->error("你输入的手续费错误");
            }else{
                $rs_mrc=$mregcodes->field("mrcId,mrcRegCode,mrcState")->where("mrcRegCode='{$regcode}'")->find();
                if($rs_mrc["mrcState"]==1){
                    $this->error("该手续费已被使用");
                }else{
                    $result=$users->where("uId={$uId}")->save($data);
                    if($result){
                        $mrcId=$rs_mrc["mrcId"];
                        $data["uUseRegCode"]=$regcode;
                        $codeInfo["mrcUseDate"]=date("Y-m-d H:i:s");
                        $codeInfo["mrcUseUid"]=$uId;
                        $codeInfo["mrcState"]=1;
                        $mregcodes->where("mrcId={$mrcId}")->save($codeInfo);
                        if($data["uJiangjin"]>0){
                            $money_log->add($datalogjiangjin);
                        }
                        if($data["uLixi"]>0){
                            $money_log->add($dataloglixi);
                        }
                          $rsdddd=1;
                     session("uState",$rsdddd);
                     /*激活成功系统，默认5颗星*/
                     $data['xingji']=5;
                     $users->where(array('uId' => $uId))->save($data);
                     /*激活成功系统，默认5颗星 E_N_D*/
                        $this->success("激活成功",U("Index/index/"));
                    }else{
                        $this->error("激活失败");
                    }
                }
            }
        }
    }
    /*激活登陆会员用手续费 E_N_D*/
    public function SetRegStateAction(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $fuid=session("uId");
        $codestate=$_GET["codestate"];
        $data["uState"]=1;
        $users_parameters=M("users_parameters");
        $rs_paramenters=$users_parameters->where("upId=1")->field("upRegJiangjin,upRegLixi")->find();
        $data["uJiangjin"]=$rs_paramenters["upRegJiangjin"];
        $data["uLixi"]=$rs_paramenters["upRegLixi"];
        $data["uNowLixi"]=$rs_paramenters["upRegLixi"];
        $money_log=M("money_log");
        //日志的记录
        if($data["uJiangjin"]>0){
        $nowdatetimes=date("Y-m-d H:i:s");
        $nowtimes=date("YmdHis");
        $today=date("Y-m-d");
        $datalogjiangjin["mlUid"]=$uId;
        $datalogjiangjin["mlJiner"]=$data["uJiangjin"];
        $datalogjiangjin["mlMoneyType"]=3;
        $datalogjiangjin["mlToday"]=$today;
        $datalogjiangjin["mlDate"]=$nowdatetimes;
        $datalogjiangjin["mlInfo"]="首次激活会员，赠送奖金".$data["uJiangjin"]."元";
        $datalogjiangjin["mlPorC"]=1;
        $datalogjiangjin["mlPorM"]=4;
        $datalogjiangjin["mlSuccess"]=1;
        $datalogjiangjin["mlRandNumber"]="B".$nowtimes.$datalogjiangjin["mlUid"];
        }
        //日志的记录
        if($data["uLixi"]>0){
            $nowdatetimes=date("Y-m-d H:i:s");
            $nowtimes=date("YmdHis");
            $today=date("Y-m-d");
            $dataloglixi["mlUid"]=$uId;
            $dataloglixi["mlJiner"]=$data["uLixi"];
            $dataloglixi["mlMoneyType"]=2;
            $dataloglixi["mlToday"]=$today;
            $dataloglixi["mlDate"]=$nowdatetimes;
            $dataloglixi["mlInfo"]="首次激活会员，赠送利息".$data["uLixi"]."元";
            $dataloglixi["mlPorC"]=1;
            $dataloglixi["mlPorM"]=4;
            $dataloglixi["mlSuccess"]=1;
            $dataloglixi["mlRandNumber"]="I".$nowtimes.$dataloglixi["mlUid"];
        }
        if($codestate==0){
            $result=$users->where("uId={$uId}")->save($data);
            if($result){
                if($data["uJiangjin"]>0){
                 $money_log->add($datalogjiangjin);
                }
                if($data["uLixi"]>0){
                    $money_log->add($dataloglixi);
                }
                $this->success("激活成功",U("userslists?uId=$fuid"),3);
            }else{
                $this->error("激活失败");
            }
        }else{
            //校验注册码
            $regcode=$_POST["uUseRegCode"];
            $mregcodes=M("mregcodes");
            $rs_mrc_n=$mregcodes->where("mrcRegCode='{$regcode}'")->count();
            if($rs_mrc_n==0){
                $this->error("你输入的手续费错误");
            }else{
                $rs_mrc=$mregcodes->field("mrcId,mrcRegCode,mrcState")->where("mrcRegCode='{$regcode}'")->find();
                if($rs_mrc["mrcState"]==1){
                    $this->error("该手续费已被使用");
                }else{
                    $result=$users->where("uId={$uId}")->save($data);
                    if($result){
                        $mrcId=$rs_mrc["mrcId"];
                        $data["uUseRegCode"]=$regcode;
                        $codeInfo["mrcUseDate"]=date("Y-m-d H:i:s");
                        $codeInfo["mrcUseUid"]=$uId;
                        $codeInfo["mrcState"]=1;
                        $mregcodes->where("mrcId={$mrcId}")->save($codeInfo);
                        if($data["uJiangjin"]>0){
                            $money_log->add($datalogjiangjin);
                        }
                        if($data["uLixi"]>0){
                            $money_log->add($dataloglixi);
                        }
                        $this->success("激活成功",U("userslists?uId=$fuid"),3);
                    }else{
                        $this->error("激活失败");
                    }
                }
            }
        }
    }
}