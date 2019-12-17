<?php
namespace System\Controller;
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
        $rs_system=$system->field("sLoginTimeout")->where("sId=1")->find();
        $_SESSION['expiretime'] = time() + (($rs_system["sLoginTimeout"])*60);
    }
    public function CheckAdminSession() {
        //设置超时为几分钟
        $system=M("system");
        $rs_system=$system->field("sLoginTimeout")->where("sId=1")->find();
        if(isset($_SESSION['expiretime'])) {
            if($_SESSION['expiretime'] < time()) {
                unset($_SESSION['expiretime']);
                session(null);
                 $this->error("登陆超时，请重新登陆！",U('login/index'));
                exit();
            } else {
                $_SESSION['expiretime'] = time() + (($rs_system["sLoginTimeout"])*60); // 刷新时间戳
            }
        }
    }
    public function ExitLogin(){
        session(null);
        $this->success("成功退出",U("login/index"));
          } 
    public function LoginTrue(){
        if(!session("aUser")){
            ?>
           <script type="text/javascript">
			window.location.href="<?php echo __ROOT__;?>/login/";
            </script>
            <?php 
          //  $this->error("Sorry ！你还没有登录，请登陆后访问！",U('/login/index/'));
          //  exit;
        }else{
            $users_online=M("users");
            $systems_online=M("system");
            $rs_systems_online=$systems_online->where("sId=1")->field("sULoginTimeout")->find();
            $usersout=$rs_systems_online["sULoginTimeout"]*60;
            $rs_users_online=$users_online->where("uOnline=1")->field("uId,uOnline,uOnlineDate")->select();
            foreach($rs_users_online as $val_online){
                $lastonlinetimes=strtotime($val_online["uOnlineDate"]);
                $chaoshitimes=$lastonlinetimes+$usersout;
                $xianzaitimes=time();
                $uId_online=$val_online["uId"];
                if($xianzaitimes>$chaoshitimes){
                    $data_online["uOnline"]=0;
                    $users_online->where("uId={$uId_online}")->save($data_online);
                }
            }
        }
     } 
}
