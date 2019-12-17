<?php
namespace Wap\Controller;
use Think\Controller;
import('ORG.Net.IpLocation');// 导入IpLocation类
header("content-type:text/html;charset=utf-8");
class IPAPIController extends Controller {
    public function index(){
      $ip = get_client_ip();
      $aa=$this->getIPaddress();
	  //$aa='120.27.143.17';
      //$Ip = new \Org\Net\IpLocation('tinyipdata_utf8.dat'); // 实例化类 参数表示IP地址库文件
      //$area = $Ip->getlocation('112.112.127.80');
	  echo "IP地址为：".$aa." ";
      echo "来自：".$this->taobaoIP($aa)."的朋友，您好！您的IP地址已被记录";
    }
    function getIPaddress(){
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

    public function taobaoIP($clientIP){
        $taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP;
        $IPinfo = json_decode(file_get_contents($taobaoIP));
        $province = $IPinfo->data->region;
        $city = $IPinfo->data->city;
        $data = $province.$city;
        return $data;
    }
}