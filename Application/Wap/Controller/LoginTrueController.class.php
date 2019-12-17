<?php
namespace Wap\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class LoginTrueController extends Controller {
	public function _empty(){
        $this->display("Public/404");
    }
    public function __construct() {
        parent::__construct();
        $this->checkAdminSession();
        $system=M("system");
        $rs_system=$system->field("sULoginTimeout")->where("sId=1")->find();
        $_SESSION['expiretime'] = time() + (($rs_system["sULoginTimeout"])*60);
    }
    public function CheckAdminSession() {
        //设置超时为几分钟
        $system=M("system");
        $rs_system=$system->field("sULoginTimeout")->where("sId=1")->find();
        if(isset($_SESSION['expiretime'])) {
            if($_SESSION['expiretime'] < time()) {
                unset($_SESSION['expiretime']);
                $uId=session("uId");
                $users=M("users");
                $data["uOnline"]=0;
				if ( (int)$uId > 0 ) {
					$users->where("uId={$uId}")->save($data);
				}
                session(null);
                 $this->error("登陆超时，请重新登陆！",U('login/index'));
                exit();
            } else {
                $_SESSION['expiretime'] = time() + (($rs_system["sULoginTimeout"])*60); // 刷新时间戳
            }
        }
    }
    public function ExitLogin(){
        $uId=session("uId");
		
        $users=M("users");
        $data["uOnline"]=0;
		if ( (int)$uId > 0 ) {
        	$users->where("uId={$uId}")->save($data);
		}
        session(null);
        $this->success("成功退出",U("login/index"));
          } 
    public function LoginTrue(){
        if(!session("uUser")){
            ?>
           <script type="text/javascript">
			window.location.href="<?php echo __ROOT__;?>/login/";
            </script>
            <?php 
          //  $this->error("Sorry ！你还没有登录，请登陆后访问！",U('/login/index/'));
          //  exit;
        }else{
            $uId_online=session("uId");
            $loginTime=date("Y-m-d H:i:s");
            $data_online["uOnline"]=1;
            $data_online["uOnlineDate"]=$loginTime;
            $users_online=M("users");
			
            $users_online->where("uId={$uId_online}")->save($data_online);
        }
     } 
/*      public function OnOff(){
        if(strlen(session("uUser"))>0){
           $systemName=M("system");
           $rs_systemName=$systemName->field("sONOFF,sONOFFInfo,sName,sCopyrightName,sCheckCodeSwitch,sUCheckCodeSwitch")->where("sId=1")->find();
           if($rs_systemName["sONOFF"]==0){
           $this->assign("rs_systemName",$rs_systemName);
           $year=date("Y");
           $this->assign("year",$year);
           $this->display();
           }else{
          $this->success("你已登陆，正在跳转",U("Index/index"));
           }
         }else{
             $systemName=M("system");
             $rs_systemName=$systemName->field("sONOFF,sONOFFInfo,sName,sCopyrightName,sCheckCodeSwitch,sUCheckCodeSwitch")->where("sId=1")->find();
             $this->assign("rs_systemName",$rs_systemName);
             $year=date("Y");
             $this->assign("year",$year);
             $this->display();
         }
     } */
}
