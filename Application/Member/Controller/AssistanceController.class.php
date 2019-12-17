<?php
namespace Member\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class AssistanceController extends LoginTrueController {
    /*交割*/
    public function JiaoGe(){
        $this->LoginTrue();
          $users_uninvest=M("users_uninvest");
            $unId=$_GET["uIdjs"];        //接受救援人Id
            $jiaoTiem=$_GET["jiaoTiem"];        //给自选区的 交割做标记
 
 if(!empty($jiaoTiem)){
    $undata["zixuanbiaoji"]=2;
 }
        /*判断该会员当前有无待交割项*/
         $number_uninvest=$users_uninvest->where("uuniUid={$unId} AND uuniState=0")->select();
         if(empty($number_uninvest)){
             $this->error("该会员当前无待交割项!");
         }
        /*判断该会员当前有无待交割项 E-N-D*/
          $uiId=$_GET["uiId"];    //救援条目Id
        $uId=$_GET["uiUid"];          // 救援人ID
        // $uuniId=$_GET["uuniId"];      //被救援记录ID
      if($uId == $unId){
        $this->error("不能和自己交割！！！");
      }
        $users=M("users");
        $users_invest=M("users_invest");
      

        $data["uiBeijiuyuanUid"]=$unId;   //接受救援人Id
        $data["uiState"]=1;
        $data["uiStateDate"]=date("Y-m-d H:i:s");

        $undata["uuniJiuyuanUid"]=$uId;   // 救援人ID
        $undata["uuniState"]=1;
        $undata["uuniStateDate"]=$data["uiStateDate"];

        /*判断  匹配的救援人和被救援人的  值  2018-12-19 QHY*/
          $tg_money=$users_invest->where("uiId={$uiId}")->find(); //获得提供援助的金额 uiUJiner 提供援助金额
            $js_money=$users_uninvest->where("uuniUid={$unId} AND uuniState=0")->find();//获得接受援助金额 uuniJiner
            $users_parameters=M("users_parameters");
			$paramenters=$users_parameters->where("upId=1")->find();
         if($tg_money['uiUJiner'] > $js_money['uuniJiner']){//如果   提供援助的金额大于接受援助的金额 进行交割
            $cha_money=$tg_money['uiUJiner']-$js_money['uuniJiner'];
             $data["uiUJiner"]=$js_money['uuniJiner'];
             //消耗排单币
             $pai_p=$data["uiUJiner"]/$paramenters['paiduoshaoyuan']*$paramenters['xiaohaopaidanbi'];
            $pai_jian=$users->where("uId={$uId}")->setDec('paiDanBi',$pai_p);
             //消耗排单币 end  qhy
             $data["uiSQShenyuJiner"]=$js_money['uuniJiner'];
            if($cha_money <= 400){  //小于等于400的单子 系统不支持
                
                   $result=$users_invest->where("uiId={$uiId}")->save($data);
            }else{//把差值单子插入表格成为  优选区的单子   并修改原来金额
                //插入优选值行
                $arrt=array(
                    'uiUid'=>$tg_money['uiUid'],//提供救援人id
                    'uiUJiner'=>$cha_money,       //提供金额
                    'uiDate'=>date("Y-m-d H:i:s",time()),//提交时间
                   'uiSQShenyuJiner'=>$cha_money,//能申请的申请后剩余金额
                   'youXuanQu'=>2//1随机区2优选区
                );
                  $result_add=$users_invest->add($arrt);
                    $result=$users_invest->where("uiId={$uiId}")->save($data);
            }
         }

         if($tg_money['uiUJiner'] == $js_money['uuniJiner']){//如果交割的两值相等
                //消耗排单币
             $pai_p=$tg_money["uiUJiner"]/$paramenters['paiduoshaoyuan']*$paramenters['xiaohaopaidanbi'];

            $pai_jian=$users->where("uId={$uId}")->setDec('paiDanBi',$pai_p);

             //消耗排单币 end  qhy
             $result=$users_invest->where("uiId={$uiId}")->save($data);
         }

         if($tg_money['uiUJiner'] < $js_money['uuniJiner']){//如果提供援助值 小于  接受援助值 交割
            //获取差值
          $tdaj=$js_money['uuniJiner']-$tg_money['uiUJiner'];
            //计算消耗排单币
           $data["uiUJiner"]=$tg_money['uiUJiner'];
               $pai_p=$data["uiUJiner"]/$paramenters['paiduoshaoyuan']*$paramenters['xiaohaopaidanbi'];
            $pai_jian=$users->where("uId={$uId}")->setDec('paiDanBi',$pai_p);
            //进行交割 更新数据
             $data["uiSQShenyuJiner"]=$js_money['uuniJiner'];
             $result=$users_invest->where("uiId={$uiId}")->save($data);
             //把剩余接受援助的一条数据插入  接受援助列表
             $arrt=array(
                  'uuniUid'=>$unId,//接受援助人  id
                  'uuniJiner'=>$tdaj,//接受援助金额
                  'uuniDate'=>date("Y-m-d H:i:s",time()),//当前时间

             );
 $result_add=$users_uninvest->add($arrt);
 //更新原始金额
  $id=$js_money['uuniId'];
  $gengyuan["uuniJiner"]=$tg_money['uiUJiner'];
 $gengyuans=$users_uninvest->where("uuniId={$id}")->save($gengyuan);
       
         }

        /*判断  匹配的救援人和被救援人的  值  2018-12-19 QHY E-N-D*/
 if($tg_money['uiUJiner'] < $js_money['uuniJiner']){
    $id=$js_money['uuniId'];
     $unresult=$users_uninvest->where("uuniId={$id}")->save($undata);
 }else{
    $unresult=$users_uninvest->where("uuniUid={$unId} AND uuniState=0")->save($undata);
 }


        if($result && $unresult){
            $this->success("交割成功");
        }else{
            $this->error("交割失败");
        }
        $this->display();
    }
    /*交割 E-N-D*/
    /*自选区搜索 qiu*/
    public function ziXuanQuTj(){
         $this->LoginTrue();
           $uId=session("uId");//当前用户id
         $yonghuming=$_POST['uiUJiner'];
            $ceshi=$_GET["ceshi"];
            $biaojige=$_GET["biaojige"];
            if($biaojige==2){
                     $this->error("距上次交割未满48小时！");
            }
         $sousuoxianzhi=M('sousuoxianzhi');
         $dangqian_time=time();//当前时间
         //获取每天的限制搜索次数
          $users_parameters=M('users_parameters');
          $uparcishu=$users_parameters->field("zixuanquSOUSHUOnub")->where(array('upId'=>1))->find();
         if($ceshi>=$uparcishu['zixuanquSOUSHUOnub']){
               $this->error("今日搜索次数已达上限！");
         }else{
            $data_s['s_time']=$dangqian_time;
            $data_s['s_uid']=$uId;
            $sousuoxianzhi->add($data_s);
         }
         $user_qiu=M('users')->where(array('uUser'=>$yonghuming))->find();
         if(empty($user_qiu)){
             $this->error("搜索失败,没有该用户！");
         }
         $beisousuoID=$user_qiu['uId'];//被搜索的 会员id
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiState=0 AND uiShow=1 AND uiUid=$beisousuoID")->order('uiId desc')->select();
        $this->assign("rs_invest",$rs_invest);
          $this->assign("uIdjs",$uId);//会员ID
         $this->display();

    }
    /*自选区搜索 qiu   E-N-D*/
    /*自选区*/
    public function ZiXuanQu(){
         $this->LoginTrue();
        $uId=$_GET["uId"];
                    $sousuoxianzhi=M('sousuoxianzhi');
   $start = mktime(0,0,0,date('m'),date('d'),date('Y'));
  $end = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
         $ceshi=$sousuoxianzhi->where(array('s_uid'=>$uId))->where("s_time > $start and s_time<$end")->count();//当天搜索次数
  $this->assign("ceshi",$ceshi);
      $users_parameters=M('users_parameters');
          $uparcishu=$users_parameters->field("zixuanquSOUSHUOnub")->where(array('upId'=>1))->find();
$haisheng=$uparcishu['zixuanquSOUSHUOnub']-$ceshi;
  $this->assign("haisheng",$haisheng);
    //判断是否过了48小时
  $siba=$sousuoxianzhi->where(array('zixuan_uid'=>$uId))->find();
  if(empty($siba)){
    $shifouke="可交割";
    $this->assign('shifouke',$shifouke);
    $biaojige=1;
     $this->assign('biaojige',$biaojige);
  }else{
    $shangtime=$siba['jiaoge_time'];
    $tody=time();
    $chat=$tody-$shangtime;
      //计算小时数
      $remain = $chat%86400;
      $hours = intval($remain/3600);
      $zuihoucha=48-$hours;
      if($zuihoucha>0){
          $shifouke=$zuihoucha;
    $this->assign('shifouke',$shifouke);
      $biaojige=2;
     $this->assign('biaojige',$biaojige);
      }else{
         $shifouke="可交割";
    $this->assign('shifouke',$shifouke);
      $biaojige=1;
     $this->assign('biaojige',$biaojige);
      }
  }

        $this->display();
    }
    /*自选区 E-N-D*/
    /*随机区*/
    public function SuiJiQu(){
            $this->LoginTrue();
               $uId=$_GET["uId"];
              $this->assign("uIdjs",$uId);//会员ID
          $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiState=0 AND uiShow=1 AND youXuanQu=1")->order('uiId desc')->limit(5)->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    /*随机区 E-N-D*/
    /*优选区*/
    public function YouXuanQu(){
           $this->LoginTrue();
               $uId=$_GET["uId"];
              $this->assign("uIdjs",$uId);//会员ID
          $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiState=0 AND uiShow=1 AND youXuanQu=2")->order('uiId desc')->limit(25)->select();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    /*优选区 E-N-D*/
    //基于上传类的新组件
    public function up(){
        $config = array(
            'rootPath'      =>  './Uploads/', //保存根路径
            'savePath'      =>  'Users/payimgs/', //保存路径
            'subName' =>array('date','Ymd'),
        );
        $up=new \Think\Upload($config);
        $rup=$up->upload($_FILES);
        $a="";
        foreach($rup as $v){
            $name='./Uploads/'.$v['savepath'].$v['savename'];
            $url='Uploads/'.$v['savepath'].$v['savename'];
            list($width, $height, $type, $attr) = getimagesize($name);
            if($width > 0){
                echo json_encode(array("error"=>"0","pic"=>$url));
            }else{
                echo json_encode(array("error"=>"上传有误，清检查服务器配置！"));
            }
        }
    }
    //提供援助页面
    public function WantInvest(){
		
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $uVip=$rs_users["uVip"];
		
        //求出等级
        $reggrades=M("reggrades");
        $rs_reggrades=$reggrades->where("rgId={$uVip}")->find();
        $this->assign("rs_reggrades",$rs_reggrades);
        
        $users_parameters=M("users_parameters");
        $paramenters=$users_parameters->where("upId=1")->find();
        $this->assign("paramenters",$paramenters);

//        $lilv=($rs_reggrades["rgLixi"]+$paramenters["upGuDingLX"])*100;
        $lilv=($rs_reggrades["rgLixi"]+$paramenters["upGuDingLX"]);
//		var_dump($lilv);die;
//        $lilv=$paramenters["jingshou"]*100+$paramenters["dakuanjifen"]*100;
        $this->assign("lilv",$lilv);
        $users_invest=M("users_invest");
//        if($paramenters["upTypeInvestment"]==1){
//            $utBenJin = $users_invest->where("uiState=1 AND uiZhifu=1 AND uiSuccess=1 AND uiTouziEnd = 0 AND uiUid={$uId}")->max('uiUJiner');
            $utBenJin = $users_invest->where("uiState=1 AND uiZhifu=1 AND uiUid={$uId}")->max('uiUJiner');
            $users_touzidata=M("users_touzidata");

            if(!empty($utBenJin)){
                $touzidata=$users_touzidata->where("utBenJin >= {$utBenJin}")->select();
            }else{
                $touzidata=$users_touzidata->select();
            }
            $this->assign("touzidata",$touzidata);
//        }
        $count_pipei=$users_invest->where("uiState=0 AND uiUid={$uId}")->count();
        $this->assign("conut_pipei",$count_pipei);
        $count_success=$users_invest->where("uiState=1 AND uiSuccess=0  AND uiUid={$uId}")->count();
        $this->assign("conut_success",$count_success);
        $count_invest=$users_invest->where("uiState=1 AND uiSuccess=1 AND uiTouziEnd=0  AND uiUid={$uId}")->count();
        $this->assign("conut_invest",$count_invest);
        /*计算该会员提供援助金额的区间*/
            //获取该会员的星级等级
//             $max=5000+($rs_users["xingji"]-5)*1000; //区间最大值
//             $min=1000;//区间最小值
//               $this->assign("max",$max);
//               $this->assign("min",$min);
//               $tishijiange=$min."~~".$max;
//                 $this->assign("tishijiange",$tishijiange);


        //区间最小值
        $min_val=$users_invest->where("uiUid={$uId} and uiSuccess = 1")->max('uiDate');
        if(empty($min_val)){
            $min = 1000;//区间最小值
			$max = 5000;
        }else{
            $val_jiuyuanjin = $users_invest->field("uiUJiner")->where(array("uiDate"=>$min_val,"uiSuccess"=>1))->find();
            $min = $val_jiuyuanjin['uiUJiner'];//区间最小值
			$max = $min + 1000;
        }
		
        //$max = $min+($rs_users["xingji"]-5)*1000; //区间最大值
	    //$max=5000+($rs_users["xingji"]-5)*1000; //区间最大值
		
		if ( $paramenters['upTypeInvestment'] == 0 ) {
			$maxd=$paramenters['upMaxMoney'];//区间最大值
			if($max>$maxd){
				$max=$maxd;
			}
		}
		
        $this->assign("max",$max);
        $this->assign("min",$min);

        $tishijiange=$min."~~".$max;
        $this->assign("tishijiange",$tishijiange);
        /*计算该会员提供援助金额的区间 E_N_D*/
        $this->display();
    }
    //提交提供援助处理
    public function WantInvestAction(){
        $this->LoginTrue();
//        var_dump("4444");die;
        $uId=session("uId");
        $users=M("users");
        $aqm=$users->field("uZfPwd,uZFErrorPwdNum,uPwd,uMXInvisible,uMXInvisibleValid,paiDanBi")->where("uId={$uId}")->find();
        $uZfPwd=md5($_POST["uZfPwd"]);
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行援助操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                //$users->where("uId={$uId}")->save($dataerr);
                //$this->error("安全密码错误，无法援助，已连续输错次".$zferr."次，输错".$rs_system['sUZFErrorPwdLockNum']."次将被锁定");
                $this->error("安全密码错误，无法援助");
            }
               $uiUid=$data["uiUid"]=$_POST["uiUid"];//这个值是投资会员的ID
                $data["uiUJiner"]=$_POST["uiUJiner"];
                $touzijiner = $data["uiUJiner"];//投资会员的投资金额
                $data["uiSQShenyuJiner"]=$data["uiUJiner"];
                $users_parameters=M("users_parameters");
                $paramenters=$users_parameters->where("upId=1")->find();
                $lixiAllOrDay=$paramenters["upLixiAllOrDay"];
                if($paramenters["upTypeInvestment"]==0){
                    if(($data["uiUJiner"])%($paramenters["upTZMultiples"])!=0){
                        $this->error("请输入".$paramenters["upTZMultiples"]."的倍数");
                    }elseif($data["uiUJiner"]>$paramenters["upMaxMoney"]){
                        $this->error("最高排单上限额度".$paramenters["upMaxMoney"]."元");
                    }
                }
                /*判断该会员排单币数量是否需要购买*/
                $numb=$aqm['paiDanBi']-$touzijiner/$paramenters['paiduoshaoyuan']*$paramenters['xiaohaopaidanbi'];
                if($numb<0){
                      $this->error("当前排单币不足,请联系平台或者推荐人进行充值！");
                }
                /*判断该会员排单币数量是否需要购买 E-N-D*/
                $data["uiDate"]=date("Y-m-d H:i:s");
                //这里是判断是否开启了隐身
                $yinshenonoff=$aqm["uMXInvisible"];
                $yinshenstate=$aqm["uMXInvisibleValid"];
                if($yinshenonoff==0){
                    if($yinshenstate==0 || $yinshenstate==2){
                        $data["uiShow"]=0;
                        $datalogtigong["mlShow"]=0;
                        $dataloglixi["mlShow"]=0;
                        $userdata["uMXInvisibleValid"]=1;
                    }elseif($yinshenstate==1){
                        $userdata["uMXInvisible"]=1;
                        $userdata["uMXInvisibleValid"]=0;
                    }
                }
                $users_invest=M("users_invest");
                $startdate=time()-600;
                $count=$users_invest->where("uiUid={$uiUid} AND uiState=0")->count();
                /*判断是不是设置的撞单*/
                $zhuangDan=$_POST["zhuangDan"];
                if($zhuangDan == 2){
                if($count>0){
                    $this->error("提交失效，当前还有系统未匹配的项目");
                }
                    
                }
                /*判断是不是设置的撞单 E-N-D*/
                
                $result=$users_invest->add($data);
                //提供援助成功就开始计算利息，首先判断是否开启了利息计算
                if($paramenters["upPDLXONorOFF"]==1){
                    //此时已经开启了排队利息的功能
                    //下面来计算排队前的利息
                   
                    $rs_users_touzinum=$users->where("uId={$uiUid}")->field("uVip,uTouziState,uTouziNum,uJiangjin,uLixi,uNowLixi,uPDLixiMax,uPDLixi")->find();
                    $uVip=$rs_users_touzinum["uVip"];//会员的当前等级ID
                    //算出当前用户的等级所享受的多余利率
                    // $reggrades=M("reggrades");
                    // $dengjiduiying=$reggrades->where("rgId={$uVip}")->find();
                    // $duoyulilv=$dengjiduiying["rgLixi"];  //算出多余的利率了
                    $duoyulilv=0;

                    //日志的记录
                    $money_log=M("money_log");
                    $nowdatetimes=date("Y-m-d H:i:s",time());
                    $nowtimes=date("YmdHis",time());
                    $today=date("Y-m-d",time());
                    
                    //提供排队援助日志记录
                    $datalogtigong["mlUid"]=$uiUid;
                    $datalogtigong["mlJiner"]=$touzijiner;
                    $datalogtigong["mlMoneyType"]=1;
                    $datalogtigong["mlToday"]=$today;
                    $datalogtigong["mlDate"]=$nowdatetimes;
                    $datalogtigong["mlInfo"]="提供援助，排队期本金流入".$touzijiner."元";
                    $datalogtigong["mlPorC"]=1;
                    $datalogtigong["mlPorM"]=5;
                    $datalogtigong["mlSuccess"]=1;
                    $datalogtigong["mlRandNumber"]="LP".$nowtimes.$datalogtigong["mlUid"];
                    

                }
                if($result){
                    if($paramenters["upPDLXONorOFF"]==1){
                    $users->where("uId={$uiUid}")->save($userdata);
                    $money_log->add($datalogtigong);
                    }
                    $this->success("提供援助成功，等待系统匹配",U("wantinvestlists?uId=$uId"),3);
                }else{
                    $this->error("提供援助失败");
                }
          }
    }
    //提供援助列表
    public function WantInvestLists(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $this->assign("fuid",$uId);
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiUid={$uId} AND uiunShenqing=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uUser,uId,uName,uTel,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    public function PayInvestLists(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiUid={$uId} AND uiState=1 AND uiZhifu=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uUser,uId,uName,uTel,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    //待我打款
    public function YesPayInvest(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiId={$uiId}")->field("uiUid,uiStateDate,uiUJiner")->find();
        $uId=$rs_invest["uiUid"];
        $shsj=$rs_invest["uiStateDate"];
        $users_uninvest=M("users_uninvest");
        $rs_uninvest=$users_uninvest->where("uuniStateDate='{$shsj}'")->field("uuniId,uuniUid")->find();
        $unId=$rs_uninvest["uuniUid"];
        $jiner=$rs_invest["uiUJiner"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uUser,uId,uName,uTel,uZhifubao,uWeixin")->find();
        $this->assign("rs_users",$rs_users);
        
        $rs_use=$users->where("uId={$unId}")->field("uUser,uId,uName,uTel,uZhifubao,uWeixin")->find();
        $this->assign("rs_use",$rs_use);
        $this->assign("jiner",$jiner);
        $this->assign("uiId",$uiId);
        $this->display();
        
    }
    //提交支付处理
    public function YesPayInvestAction(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];//救援条目Id
        $uId=$_GET["uId"];
        $fuid=session("uId");
        $users=M("users");
        $aqm=$users->field("uZfPwd,uZFErrorPwdNum,uPwd,shangchengjifen")->where("uId={$uId}")->find();

        $uZfPwd=md5($_POST["uZfPwd"]);
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行援助操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                $this->error("安全密码错误，无法提供援助");
            }
            $data["uiImages"]=$_POST["uiImages"];
                $data["uiZhifuDate"]=date("Y-m-d H:i:s");
                $data["uiZhifu"]=1;
                $users_invest = M("users_invest");
                $rs_invest = $users_invest->where("uiId={$uiId}")->find();
                $usersId=$rs_invest["uiUid"];
                $uiUJiner=$rs_invest["uiUJiner"];//救援金额
                $uuniStateDate=$rs_invest["uiStateDate"];//交割时间
                $users_uninvest=M("users_uninvest");
                $undata["uuniPay"]=1;
                $undata["uuniPayDate"]=$data["uiZhifuDate"];
                $paUsers=M("users_parameters");
                $paramenters=$paUsers->where("upId=1")->find();//在几小时内完成打款
                $lixiAllOrDay=$paramenters["upLixiAllOrDay"];
                $result=$users_invest->where("uiId={$uiId}")->save($data);
                if($result){
                    $users_uninvest->where("uuniStateDate='{$uuniStateDate}'")->save($undata);
                    /*每排单交易成功一单，增加一星，同时可增加1000元排单额度*/
                    $aqm=$users->where("uId={$uId}")->setInc('xingji');
                    /*每排单交易成功一单，增加一星，同时可增加1000元排单额度 E_N_D*/
                    /*诚信金判断*/
//					$rs_invest = $users_invest->where("uiId={$uiId}")->find();
//					$uuniStateDate=$rs_invest["uiStateDate"];//交割时间
                    $timeCha=time()-strtotime($uuniStateDate);
					
					/*
					//如果是 固定汇率 那么
					if ( $paramenters["upLXType"] == 1 ) {
						
					}
					//如果是 浮动汇率 那么
					if ( $paramenters["upLXType"] == 0 ) {
						$uiStateDate = strtotime($val_daoqi["uiStateDate"]);//审核成功时间
						$uiSuccessDate = strtotime($val_daoqi["uiSuccessDate"]);//打款成功的时间
					}
					*/
									
					$aaa = $paramenters['jixiaoshinei'];
					$bbb = $paramenters['upPaymentPeriod'];
					$users->where("uId={$uId}")->setInc('dakuanbiaozhi');
                    if( ( $timeCha > (int)$aaa * 3600 ) && ( $timeCha <= (int)$bbb * 3600 ) ){//如果打款时间大于两个小时
                        $lixiLv = $paramenters['waijingshou'];//在几小时(外)完成打款静态收益
                        $jifenLv = $paramenters['waidakuanjifen'];//在几小时(外)完成打款商城积分收益
                        $shopjifenlogo['mlInfo']='期限外提供援助发放商城积分';
                    }
					if( $timeCha <= (int)$aaa*3600 )
					{
                        $lixiLv = $paramenters['jingshou'];//在几小时(内)完成打款静态收益
                        $jifenLv = $paramenters['dakuanjifen'];//在几小时(内)完成打款商城积分收益
                        $shopjifenlogo['mlInfo']='期限内提供援助发放商城积分';
                    }
					
                    //算排队利息
                    //1为固定利息
                    $rs_users_touzinum=$users->where("uId={$uId}")->field("uVip,uTouziState,uTouziNum,uJiangjin,uLixi,uNowLixi,uPDLixiMax,uPDLixi")->find();
                    $uVip=$rs_users_touzinum["uVip"];//会员的当前等级ID
                    $touzijiner=$uiUJiner;//救援金额
                    $duoyulilv=0;
                    if($paramenters["upLXType"]==1){
                        /**
                         * 固定的利息             upGuDingLX
                         * 根据等级多余的利率     $duoyulilv
                         * 投资会员的投资金额    touzijiner
                         * 排队计息天数       upPDLXDay
                         * 排队期最大利息      uPDLixiMax
                         */
                        $paramenters["upGuDingLX"]=$lixiLv;

                        $lixi=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv)*($paramenters["upPDLXDay"]))+$rs_users_touzinum["uPDLixiMax"];
                        $lixinow=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv))+$rs_users_touzinum["uPDLixi"];
                        $daylixi=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv));
                        $liximl=($touzijiner*($paramenters["upGuDingLX"]+$duoyulilv)*($paramenters["upPDLXDay"]));
                    }else{
                        //这里是浮动利息
                        $users_touzidata=M("users_touzidata");
                        $rs_fudonglilv=$users_touzidata->where("utBenJin={$touzijiner}")->find();
                        $fudonglilv=$rs_fudonglilv["utJBLixi"];
                        $lixi=($touzijiner*($fudonglilv+$duoyulilv)*($paramenters["upPDLXDay"]))+$rs_users_touzinum["uPDLixiMax"];
                        $lixinow=($touzijiner*($fudonglilv+$duoyulilv))+$rs_users_touzinum["uPDLixi"];
                        $daylixi=($touzijiner*($fudonglilv+$duoyulilv));
                        $liximl=($touzijiner*($fudonglilv+$duoyulilv)*($paramenters["upPDLXDay"]));
                    }
                    $userdata["uPDLixiMax"]=$lixi/100; //这里是排队利息最大值
                    //这里为系统自动每日发放利息做判断值
                    if($lixiAllOrDay==2){
                        //这里是每天发放
                        $userdata["uPDLixi"]=$lixinow;
                    }else{
                        //这里是一次性发放
                        $userdata["uPDLixi"]=$lixi;//排队期间的利息
                    }
                    //利息日志记录
                    $money_log=M("money_log");
                    $nowdatetimes=date("Y-m-d H:i:s",time());
                    $nowtimes=date("YmdHis",time());
                    $today = date("Y-m-d",time()); 

                    $dataloglixi["mlUid"]=$uId;
                    $dataloglixi["mlMoneyType"]=2;
					
					$nowdatetimes = date("Y-m-d H:i:s",time());
					$today = date("Y-m-d",time()); 
					
                    $dataloglixi["mlToday"]=$today;
                    $dataloglixi["mlDate"]=$nowdatetimes;
                    $dataloglixi["mlPorC"]=1;
                    $dataloglixi["mlPorM"]=1;
                    $dataloglixi["mlSuccess"]=1;
                    if($lixiAllOrDay==2){
                        $dataloglixi["mlJiner"]=$daylixi/100;
                        $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，排队期发放当日利息 X";
                        $dataloglixi["mlRandNumber"]="LI".$nowtimes.$dataloglixi["mlUid"];
                    }else{
                        $dataloglixi["mlJiner"]=$liximl/100;
                        $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，排队期发放全部利息 Y";
                        $dataloglixi["mlRandNumber"]="LAI".$nowtimes.$dataloglixi["mlUid"];
                    }
                    /*算商城积分*/
                    $userdata['shangchengjifen'] = (int)$aqm['shangchengjifen'] + $touzijiner * $jifenLv / 100;
//                    var_dump($userdata['shangchengjifen']);
//                    echo $uId;
//                    die;
                    /*算商城积分  e n d*/
                    //商场积分 日志
                    $shopjifenlogo['mlUid']=$uId;//财务日志对应的会员
                    $nowtimes=time();
                    $shopjifenlogo['mlRandNumber']="Shop".$nowtimes.$uId;//业务流水号
					
                    $shopjifenlogo['mlJiner'] = $touzijiner * $jifenLv / 100;//财务日志对应的金钱
                    $shopjifenlogo['mlMoneyType'] = 5;//  金额类型  5   商城积分
					
//					$shopjifenlogo['mlInfo']='提供援助发放商城积分';
					
					$nowdatetimes = date("Y-m-d H:i:s",time());
					$today = date("Y-m-d",time()); 
					
                    $shopjifenlogo['mlToday'] = $today;// 今日是多少号
                    $shopjifenlogo['mlDate'] = $nowdatetimes;// 财务日志记录的时间

                    $shopjifenlogo['mlPorC']=1;// 系统发放还是人工发放（1为系统，2为人工）
                    $shopjifenlogo['mlPorM']=1;// 加金额还是减金额（1加2减）
                    $shopjifenlogo['mlSuccess']=1;// 成功还是失败


                    if($paramenters["upPDLXONorOFF"]==1){


                        $dds=$users->where("uId={$uId}")->save($userdata);
                        $money_log->add($dataloglixi);
                        $money_log->add($shopjifenlogo);


                    }

                    /*诚信金  E N D */
                    $this->success("确认支付成功",U("wantinvestlists?uId=$fuid"),3);
                }else{
                    $this->error("确认支付失败");
                }
        }
    }
    public function UnPayInvestLists(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users_invest=M("users_uninvest");
        $rs_invest=$users_invest->where("uuniUid={$uId} AND uuniPay=1 AND uuniSuccess=0")->select();
        $this->assign("rs_invest",$rs_invest);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uUser,uId,uName,uTel,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    //确认待收款
    public function YesUnPayInvest(){
        $this->LoginTrue();
        $uuniId=$_GET["uuniId"];
        $this->assign("uuniId",$uuniId);
        $users_uninvest=M("users_uninvest");
        $rs_uninvest=$users_uninvest->where("uuniId={$uuniId}")->find();
        $jiner=$rs_uninvest["uuniJiner"];
        $zfsj=$rs_uninvest["uuniPayDate"];
        $this->assign("zfsj",$zfsj);
        $this->assign("jiner",$jiner);
        $users=M("users");
        $uId=$rs_uninvest["uuniJiuyuanUid"];
        $rs_use=$users->where("uId={$uId}")->field("uUser,uId,uName,uTel,uZhifubao,uWeixin")->find();
        $this->assign("rs_use",$rs_use);
        $unId=$rs_uninvest["uuniUid"];
        $rs_users=$users->where("uId={$unId}")->field("uUser,uId,uName,uTel,uZhifubao,uWeixin")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    //确认待收款提交
    public function YesUnPayInvestAction(){
        $this->LoginTrue();
        $uuniId=$_GET["uuniId"];
        $uId=$_GET["uId"];//接受援助的会员id
        // var_dump($uId);die;
        $fuid=session("uId");
        $users=M("users");
        $aqm=$users->where("uId={$uId}")->find();
        $uZfPwd=md5($_POST["uZfPwd"]);
        //以下2句话是隐身做准备的[这个是接受援助用的]
        $yinshenonoff=$aqm["uMXInvisible"];//会员投资明细是否隐身
        $yinshenstate=$aqm["uMXInvisibleValid"];//会员投资明细隐身是否生效
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行援助操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                //$users->where("uId={$uId}")->save($dataerr);
                //$this->error("安全密码错误，无法确认收款，已连续输错次".$zferr."次，输错".$rs_system['sUZFErrorPwdLockNum']."次将被锁定");
                $this->error("安全密码错误，无法确认收款");
            }
            $undata["uuniImages"]=$_POST["uuniImages"];
            /* $uuniImages=$_FILES["uuniImages"];
            if(strlen($uuniImages["name"])>0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
                $upload->savePath  =     'Uploads/Users/shoukuanbeiyuanzhu/'; // 设置附件上传（子）目录
                $upload->subName=array('date','Ymd');
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }
                foreach($info as $file){
                    $imgsUrl= $file['savepath'].$file['savename'];
                }
                $undata["uuniImages"]=$imgsUrl;
            } */
            $zfsj=$_POST["zfsj"];
            $users_invest=M("users_invest");
            $zinvest=$users_invest->where("uiZhifuDate='{$zfsj}'")->find();
            if($zinvest["uiSuccess"]==1){
                $this->error("你已经确认过了，无需重复提交");
            }
            $uiId=$zinvest["uiId"];
            $uiUid=$zinvest["uiUid"];//这个值是投资会员的ID
            $touzijiner=$zinvest["uiUJiner"];//投资会员的投资金额
            // echo $uiUid;echo "<br/>";echo $touzijiner;die;
            $data["uiSuccessDate"]=date("Y-m-d H:i:s");
            //算投资结束时间
            $users_parameters=M("users_parameters");
            $rs_parameters=$users_parameters->where("upId=1")->field("upLXType,upGuDingLX,upTermOfInvestment,upLixiAllOrDay,dongtaib,shopjifenb")->find();
            $lixiAllOrDay=$rs_parameters["upLixiAllOrDay"];
            $touzitime=($rs_parameters["upTermOfInvestment"])*24*60*60;
            $starttouzitime=strtotime($data["uiSuccessDate"]);
            $lasttouzitime=$touzitime+$starttouzitime;
            $lasttouzidate=date("Y-m-d H:i:s",$lasttouzitime);
            $data["uiTouziEndDate"]=$lasttouzidate;//投资到期的时间
            $undata["uuniSuccessDate"]=$data["uiSuccessDate"];//确认收款时间
            $undata["uuniEnd"]=1;//整个项目是否彻底结束
            $undata["uuniSuccess"]=1;//是否救援成功
            $data["uiSuccess"]=1;//救助是否成功
            $uninvest=M("users_uninvest");
            $result=$users_invest->where("uiId={$uiId}")->save($data);
            //看援助类型
            $rs_yuanzhutype=$uninvest->where("uuniId={$uuniId}")->field("uunYuanzhuType,zixuanbiaoji,uuniUid")->find();
            $yuanzhutype=$rs_yuanzhutype["uunYuanzhuType"];//提供援助与提现的类型
            $rs_users_touzinum=$users->where("uId={$uiUid}")->field("uVip,uTouziState,uTouziNum,uJiangjin,uLixi,uNowLixi,uPDLixi,uPDLixiMax,uMXInvisible,uMXInvisibleValid,uTuiId")->find();
            //以下2句话是为提供援助相关的隐身
            $yinshenonofftg=$rs_users_touzinum["uMXInvisible"];
            $yinshenstatetg=$rs_users_touzinum["uMXInvisibleValid"];
            $userdata["uTouziState"]=1;//投资状态
            $userdata["uTouziNum"]=$rs_users_touzinum["uTouziNum"]+1;//投资次数
            $userdata["uPDLixi"]=0;//排队期间的利息
            $userdata["uPDLixiMax"]=0;//排队期最大利息
            $uVip=$rs_users_touzinum["uVip"];//会员的当前等级
            
            //算出当前用户的等级所享受的多余利率
            $reggrades=M("reggrades");
            $dengjiduiying=$reggrades->where("rgId={$uVip}")->find();
            $duoyulilv=$dengjiduiying["rgLixi"];  //算出多余的利息了
            
            // sleep(1);//一秒后
            //算利息
            if($rs_parameters["upLXType"]==1){//利息选择的模式(1固定，0浮动)
                $lixi=($touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv)*($rs_parameters["upTermOfInvestment"]))+$rs_users_touzinum["uLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $lixinow=($touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv))+$rs_users_touzinum["uNowLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $daylixi=($touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv));
                $liximl=($touzijiner*($rs_parameters["upGuDingLX"]+$duoyulilv)*($rs_parameters["upTermOfInvestment"]));
            }else{
                $users_touzidata=M("users_touzidata");
                $rs_fudonglilv=$users_touzidata->where("utBenJin={$touzijiner}")->find();
                $fudonglilv=$rs_fudonglilv["utJBLixi"];
                $lixi=($touzijiner*($fudonglilv+$duoyulilv)*($rs_parameters["upTermOfInvestment"]))+$rs_users_touzinum["uLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $lixinow=($touzijiner*($fudonglilv+$duoyulilv))+$rs_users_touzinum["uNowLixi"]+$rs_users_touzinum["uPDLixiMax"];
                $daylixi=($touzijiner*($fudonglilv+$duoyulilv));
                $liximl=($touzijiner*($fudonglilv+$duoyulilv)*($rs_parameters["upTermOfInvestment"]));
            }
            // $userdata["uLixi"]=$lixi;
            if($lixiAllOrDay==2){
                // $userdata["uNowLixi"]=$lixinow;
            }else{
                // $userdata["uNowLixi"]=$lixi;
            }
            
            //算奖金
            //首先查找本会员是谁推广的？并且查找等级，查找当前奖金
            $myTuiId=$users->where("uId={$uiUid}")->field("uTuiId,uUser")->find();
            $tuiId=$myTuiId["uTuiId"];
            $myfather=$users->where("uId={$tuiId}")->field("uVip,uJiangjin")->find();
            $myfather_vip=$myfather["uVip"];
            $myfather_Jiangjin=$myfather["uJiangjin"];
            $myfathervip=$reggrades->where("rgId={$myfather_vip}")->find();
            $jiangjinlilv=$myfathervip["rgTJJangjin"];
            $userfatherjiangjin=$touzijiner*$jiangjinlilv+$myfather_Jiangjin;
            $userfathergoingjiangjin=$touzijiner*$jiangjinlilv;
            $userfatherdata["uJiangjin"]=$userfatherjiangjin;
            
            //日志的记录
            $money_log=M("money_log");
            $nowdatetimes=date("Y-m-d H:i:s",time());
            $nowtimes=date("YmdHis",time());
            $today=date("Y-m-d",time());
           
            //提供援助日志记录
            //隐身功能的处理
            if($yinshenonofftg==0){
                if($yinshenstatetg==1 || $yinshenstatetg==2){
                    $datalogtigong["mlShow"]=0;
                    $dataloglixi["mlShow"]=0;
                    $datalogjiangjin["mlShow"]=0;
                }
            }
            $datalogtigong["mlUid"]=$uiUid;
            $datalogtigong["mlJiner"]=$touzijiner;
            $datalogtigong["mlMoneyType"]=1;
            $datalogtigong["mlToday"]=$today;
            $datalogtigong["mlDate"]=$nowdatetimes;
            $datalogtigong["mlInfo"]="提供援助，本金增加".$touzijiner."元";
            $datalogtigong["mlPorC"]=1;
            $datalogtigong["mlPorM"]=1;
            $datalogtigong["mlSuccess"]=1;
            $datalogtigong["mlRandNumber"]="P".$nowtimes.$datalogtigong["mlUid"];
           
            //接受援助日志记录
            //隐身功能的处理
            if($yinshenonoff==0){
                if($yinshenstate==1 || $yinshenstate==2){
                    $datalogjieshou["mlShow"]=0;
                }
            }
            if($yuanzhutype==0){
            $datalogjieshou["mlUid"]=$uId;
            $datalogjieshou["mlJiner"]=$touzijiner;
            $datalogjieshou["mlMoneyType"]=1;
            $datalogjieshou["mlToday"]=$today;
            $datalogjieshou["mlDate"]=$nowdatetimes;
            $datalogjieshou["mlInfo"]="接受援助，金额减少".$touzijiner."元";
            $datalogjieshou["mlPorC"]=1;
            $datalogjieshou["mlPorM"]=2;
            $datalogjieshou["mlSuccess"]=1;
            $datalogjieshou["mlRandNumber"]="A".$nowtimes.$datalogjieshou["mlUid"];
            }
            //利息日志记录
       
            if($lixiAllOrDay==2){
                $dataloglixi["mlJiner"]=$daylixi;
                $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，当日发放利息";
                $dataloglixi["mlRandNumber"]="I".$nowtimes.$dataloglixi["mlUid"];
            }else{
                $dataloglixi["mlJiner"]=$liximl;
                $dataloglixi["mlInfo"]="提供援助".$touzijiner."元，发放全部利息 Z";
                $dataloglixi["mlRandNumber"]="AI".$nowtimes."-".$dataloglixi["mlUid"];
            }
            
            //奖金日志记录
            $datalogjiangjin["mlUid"]=$tuiId;
            $datalogjiangjin["mlJiner"]=$userfathergoingjiangjin;
            $datalogjiangjin["mlMoneyType"]=3;
            $datalogjiangjin["mlToday"]=$today;
            $datalogjiangjin["mlDate"]=$nowdatetimes;
            $datalogjiangjin["mlInfo"]="下级会员".$myTuiId["uUser"]."提供援助".$touzijiner."元，获得奖金";
            $datalogjiangjin["mlPorC"]=1;
            $datalogjiangjin["mlPorM"]=1;
            $datalogjiangjin["mlSuccess"]=1;
            $datalogjiangjin["mlRandNumber"]="B".$nowtimes.$datalogjiangjin["mlUid"]; // mlRandNumber 业务流水号
 $userdeeata["dongtaiqianbao"]=$rs_parameters['dongtaib']*0.01*$touzijiner=$zinvest["uiUJiner"];//动态收益
 $userdeeata["shangchengjifen"]=$rs_parameters['shopjifenb']*0.01*$touzijiner=$zinvest["uiUJiner"];//商城积分
 $shangj=$users->where("uId={$uId}")->find();//uTuiId
            //动态钱包  日志   增加
$dongtaiqianbaologo['mlUid']=$rs_users_touzinum['uTuiId'];//财务日志对应的会员
$dongtaiqianbaologo['mlRandNumber']="D".$nowtimes.$dongtaiqianbaologo['mlUid'];//业务流水号
$dongtaiqianbaologo['mlJiner']=$userdeeata["dongtaiqianbao"];//财务日志对应的金钱
$dongtaiqianbaologo['mlMoneyType']=4;//  金额类型  4   动态钱包
$dongtaiqianbaologo['mlToday']=$today;// 今日是多少号
$dongtaiqianbaologo['mlDate']=$nowdatetimes;// 财务日志记录的时间
$dongtaiqianbaologo['mlInfo']="下级会员提供援助获得动态收益：".$dongtaiqianbaologo['mlJiner']."元";// 财务日志说明
$dongtaiqianbaologo['mlPorC']=1;// 系统发放还是人工发放（1为系统，2为人工）
$dongtaiqianbaologo['mlPorM']=1;// 加金额还是减金额（1加2减）
$dongtaiqianbaologo['mlSuccess']=1;// 成功还是失败
            //动态钱包  日志   减少
$dongtaijianlogo['mlUid']=$shangj['uTuiId'];//财务日志对应的会员
$dongtaijianlogo['mlRandNumber']="DJ".$nowtimes.$dongtaijianlogo['mlUid'];//业务流水号
$dongtaijianlogo['mlJiner']=$userdeeata["dongtaiqianbao"];//财务日志对应的金钱
$dongtaijianlogo['mlMoneyType']=4;//  金额类型  4   动态钱包
$dongtaijianlogo['mlToday']=$today;// 今日是多少号
$dongtaijianlogo['mlDate']=$nowdatetimes;// 财务日志记录的时间
$dongtaijianlogo['mlInfo']="下级会员接受援助：".$dongtaijianlogo['mlJiner']."元动态钱包自动转让同步钱包";// 财务日志说明
$dongtaijianlogo['mlPorC']=1;// 系统发放还是人工发放（1为系统，2为人工）
$dongtaijianlogo['mlPorM']=2;// 加金额还是减金额（1加2减）
$dongtaijianlogo['mlSuccess']=1;// 成功还是失败
            //商场积分 日志
$shopjifenlogo['mlUid']=$rs_users_touzinum['uTuiId'];//财务日志对应的会员
$shopjifenlogo['mlRandNumber']="Shop".$nowtimes.$shopjifenlogo['mlUid'];//业务流水号


//$shopjifenlogo['mlJiner']=$userdeeata["shangchengjifen"];//财务日志对应的金钱

$paramenters = $users_parameters->where("upId=1")->find();
$uuniStateDate = $zinvest["uiStateDate"];//交割时间
$timeCha = time()- strtotime($uuniStateDate);
/*
//如果是 固定汇率 那么
if ( $paramenters["upLXType"] == 1 ) {
	
}
//如果是 浮动汇率 那么
if ( $paramenters["upLXType"] == 0 ) {
	$uiStateDate = strtotime($val_daoqi["uiStateDate"]);//审核成功时间
	$uiSuccessDate = strtotime($val_daoqi["uiSuccessDate"]);//打款成功的时间
}
*/
$aaa = $paramenters['jixiaoshinei'];
$bbb = $paramenters['upPaymentPeriod'];
$users->where("uId={$uId}")->setInc('dakuanbiaozhi');
if( ( $timeCha > (int)$aaa * 3600 ) && ( $timeCha <= (int)$bbb * 3600 ) ){//如果打款时间大于两个小时
	$lixiLv = $paramenters['waijingshou'];//在几小时(外)完成打款静态收益
	$jifenLv = $paramenters['waidakuanjifen'];//在几小时(外)完成打款商城积分收益
}
if( $timeCha <= (int)$aaa*3600 )
{
	$lixiLv = $paramenters['jingshou'];//在几小时(内)完成打款静态收益
	$jifenLv = $paramenters['dakuanjifen'];//在几小时(内)完成打款商城积分收益
}

$shopjifenlogo['mlJiner'] = $touzijiner * $jifenLv / 100;
$shopjifenlogo['mlMoneyType'] = 5;//  金额类型  5   商城积分


$nowdatetimes = date("Y-m-d H:i:s",time());
$today = date("Y-m-d",time()); 

$shopjifenlogo['mlToday']=$today;// 今日是多少号
$shopjifenlogo['mlDate']=$nowdatetimes;// 财务日志记录的时间
$shopjifenlogo['mlInfo']="下级会员提供援助获得积分收益：".$shopjifenlogo['mlJiner']."元";// 财务日志说明
$shopjifenlogo['mlPorC']=1;// 系统发放还是人工发放（1为系统，2为人工）
$shopjifenlogo['mlPorM']=1;// 加金额还是减金额（1加2减）
$shopjifenlogo['mlSuccess']=1;// 成功还是失败
            //同步钱包  日志
$tonglogo['mlUid']=$shangj['uTuiId'];//财务日志对应的会员
$tonglogo['mlRandNumber']="T".$nowtimes.$tonglogo['mlUid'];//业务流水号
$tonglogo['mlJiner']=$userdeeata["dongtaiqianbao"];//财务日志对应的金钱
$tonglogo['mlMoneyType']=6;//  金额类型  6   同步钱包
$tonglogo['mlToday']=$today;// 今日是多少号
$tonglogo['mlDate']=$nowdatetimes;// 财务日志记录的时间
$tonglogo['mlInfo']="下级会员接受援助动态钱包系统自动划入同步钱包金额：".$tonglogo['mlJiner']."元";// 财务日志说明
$tonglogo['mlPorC']=1;// 系统发放还是人工发放（1为系统，2为人工）
$tonglogo['mlPorM']=1;// 加金额还是减金额（1加2减）
$tonglogo['mlSuccess']=1;// 成功还是失败
//动态奖(直推奖只有一代8%，其中5%动态收益，3%转入商城积分用于购买产品)
        // $uiUid=$zinvest["uiUid"];//这个值是投资会员的ID   
       //     $touzijiner=$zinvest["uiUJiner"];//投资会员的投资金额
       //     $rs_users_touzinum['uTuiId']推荐人id
       //     $rs_parameters['zhituijiangb']    直推奖只有一代8%
       //      $rs_parameters['dongtaib']   其中动态收益%
       //       $rs_parameters['shopjifenb']    其中商城积分%
// $baifenzhiba=$touzijiner*$rs_parameters['zhituijiangb']*0.01;//8%的直推奖


 //需等该会员卖出时，系统自动划入同步钱包后，可以随时提现

            if($result){
                $users->where("uId={$uiUid}")->save($userdata);
                $users->where("uId={$shangj['uTuiId']}")->setDec('dongtaiqianbao',$userdeeata["dongtaiqianbao"]);//系统自动划入同步钱包  动态钱包  减
                $users->where("uId={$shangj['uTuiId']}")->setInc('tongbuqianbao',$userdeeata["dongtaiqianbao"]);//系统自动划入同步钱包  同步钱包  加
$users->where("uId={$rs_users_touzinum['uTuiId']}")->setInc('dongtaiqianbao',$userdeeata["dongtaiqianbao"]);//动态收益  累加 上级
$users->where("uId={$rs_users_touzinum['uTuiId']}")->setInc('shangchengjifen',$userdeeata["shangchengjifen"]);//商城积分  累加 上级
                $users->where("uId={$tuiId}")->save($userfatherdata);
                $uninvest->where("uuniId={$uuniId}")->save($undata);
                if($rs_yuanzhutype['zixuanbiaoji'] == 2){
                    $sousuoxianzhi=M("sousuoxianzhi");
                    //判断在表中是否有该会员
                    $ushoujieshouren=$rs_yuanzhutype['uuniUid'];
                    $ujie=$sousuoxianzhi->where(array('zixuan_uid'=>$ushoujieshouren))->find();
                       $dddd_q['jiaoge_time']=time();
                    if(empty($ujie)){
                     
                        $dddd_q['zixuan_uid']=$ushoujieshouren;
                        $sousuoxianzhi->add($dddd_q);
                    }else{
                         $sousuoxianzhi->where(array('zixuan_uid'=>$ushoujieshouren))->save($dddd_q);
                    }
                }
                $money_log->add($datalogtigong);
                $money_log->add($datalogjieshou);
                // $money_log->add($dataloglixi);
                $money_log->add($datalogjiangjin);
                $money_log->add($dongtaiqianbaologo);//动态钱包  日志   增加
                $money_log->add($dongtaijianlogo);//动态钱包  日志   减少
                $money_log->add($tonglogo);//同步钱包  日志
                $money_log->add($shopjifenlogo);//商城积分  日志
                $this->success("确认收款成功",U("wantuninvestlists?uId=$fuid"),1);
            }else{
                $this->error("确认收款失败");
            }
        }
    }
    //接受援助
    public function WantUnInvest(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->find();
        $this->assign("rs_users",$rs_users);
        $users_invest=M("users_invest");
        /**
         * uiTouziEnd   本轮投资是否到期
         * uiEnd   本轮是否已经结束，0为未结束1为结束
         * uiunShenqing   是否申请了被救助              
         */
        // $rs_invest_count=$users_invest->where("uiTouziEnd=1 AND uiEnd=0 AND uiunShenqing=0 AND uiUid={$uId}")->count();
      
        //     $rs_invest=$users_invest->where("uiTouziEnd=1 AND uiEnd=0 AND uiunShenqing=0 AND uiUid={$uId}")->order("uiTouziEndDate desc")->find();
        //     $this->assign("rs_invest",$rs_invest);
//获取当前用户 所有的还未申请的所有单子ID（可提金额）  QIU
             $rs_invest=M("users_invest")->field("uiId")->where("uiTouziEnd=1 AND uiEnd=0 AND uiunShenqing=0 AND uiUid={$uId}")->order("uiTouziEndDate desc")->select();
             $array_id=array();
             foreach ($rs_invest as $key=> $value ) {
             
                $array_id[$key]=$value['uiId'];
             }
             $array_id = implode(",", $array_id);
             $this->assign("array_id",$array_id);
//获取当前用户 所有的还未申请的所有单子ID（可提金额）QIU E-N-D



            $users_parameters=M("users_parameters");
            $paramenters=$users_parameters->where("upId=1")->find();

            $this->assign("paramenters",$paramenters);

            if($paramenters["upRepeatInvestment"]==1){
                $jiedong_count=$users_invest->where("uiSuccess=1 AND uiTouziEnd=0  AND uiEnd=0")->count();
              
                if($jiedong_count>0){
                    $jiedong_jiner=$users_invest->where("uiSuccess=1 AND uiTouziEnd=0  AND uiEnd=0")->order("uiSuccessDate asc")->find();
                    if($jiedong_jiner["uiUJiner"]>$rs_invest["uiUJiner"]){
                        $TixianJiner=$rs_invest["uiUJiner"];
                    }elseif($jiedong_jiner["uiUJiner"]<$rs_invest["uiUJiner"]){
                        $TixianJiner=$jiedong_jiner["uiUJiner"];
                    }else{
                        $TixianJiner=$rs_invest["uiUJiner"];
                    }
                }else{
                   $TixianJiner=$rs_invest["uiUJiner"];
                }
                $this->assign("TixianJiner",$TixianJiner);
                $this->assign("jiedong_count",$jiedong_count);
            }
            $this->display();
        
    }
    //提交接受援助
    public function WantUnInvestAction(){
        $this->LoginTrue();
        $uId=session("uId");//当前用户ID
        $uiId=$_GET["uiId"];//当前用户所有待接受援助的 单子  数值分割成的字符串
     $uiId=explode(",",$uiId);
  
        $users=M("users");
        $aqm=$users->field("uZfPwd,uZFErrorPwdNum,uPwd,uMXInvisible,uMXInvisibleValid")->where("uId={$uId}")->find();
        $uZfPwd=md5($_POST["uZfPwd"]);
        //以下2句话是隐身做准备的
        $yinshenonoff=$aqm["uMXInvisible"];//会员投资明细是否隐身
        $yinshenstate=$aqm["uMXInvisibleValid"];//会员投资明细隐身是否生效
        
        $system=M("system");
        $rs_system=$system->field("sUZFErrorPwdLockNum")->where("sId=1")->find();
        if($aqm["uZFErrorPwdNum"]>=$rs_system["sUZFErrorPwdLockNum"]){
            $this->error("该账号输入安全密码错误已达到".$rs_system['sUZFErrorPwdLockNum']."次，被系统锁定，无法进行援助操作","",6);
        }else{
            if($uZfPwd!=$aqm["uZfPwd"]){
                $zferr=$dataerr["uZFErrorPwdNum"]=$aqm["uZFErrorPwdNum"]+1;
                //$users->where("uId={$uId}")->save($dataerr);
                //$this->error("安全密码错误，无法接受援助，已连续输错次".$zferr."次，输错".$rs_system['sUZFErrorPwdLockNum']."次将被锁定");
                $this->error("安全密码错误，无法接受援助");
            }
            $uuniUid=$data["uuniUid"]=$uId;//被救援用户ID
            $data["uuniJiner"]=$_POST["uuniJiner"];//接受援助金额
               $users_parameters=M("users_parameters");
            $rs_paramenters=$users_parameters->where("upId=1")->field("upBJMultiples")->find();
            /*可提本金*/
               /**
         * uiUid   救援人Id    
         * uiTouziEnd   本轮投资是否到期
         * uiunShenqing  是否申请了被救助
         * uiUJiner     救援金额
         */
             $users_invest=M("users_invest");
        $rs_tixianbenjin=$users_invest->where("uiUid={$uId}  AND uiTouziEnd=1 AND uiunShenqing=0")->sum("uiUJiner");
        $rs_tixianbenjind=$users_invest->where("uiUid={$uId}  AND uiTouziEnd=1 AND uiunShenqing=1 AND uiSQShenyuJiner!=0")->sum("uiSQShenyuJiner");
 $rs_tixianbenjin= $rs_tixianbenjin+$rs_tixianbenjind;
            /*可提本金 E-N-D*/
                if($data["uuniJiner"]<$rs_paramenters["upBJMultiples"]){
                    $this->error("你的可提本金还未达到系统最低限制的".$rs_paramenters['upBJMultiples']."元");
                }elseif($data["uuniJiner"]%$rs_paramenters["upBJMultiples"]!=0){
                    $this->error("你输入的可提金额不是系统限制的".$rs_paramenters['upBJMultiples']."的倍数");
                }elseif($data["uuniJiner"]>$rs_tixianbenjin){
                    $this->error("你输入的金额超过你当前可用的可提本金！");
                }
          
            $users_parameters=M("users_parameters");
            $data["uuniDate"]=date("Y-m-d H:i:s");       
            $uidata["uiunShenqing"]=1;//是否申请了被救助
          
            if($uidata["uiSQShenyuJiner"]==0){
                $uidata["uiEnd"]=1;//本轮是否已经结束，0为未结束  1为结束
            }
            $users_uninvest=M("users_uninvest");
            $count=$users_uninvest->where("uuniUid={$uuniUid} AND uuniState=0")->count();
            if($count>0){
                $this->error("提交失效，您当前还有接受援助系统未匹配的项目");
            }
            //隐身功能的处理
            if($yinshenonoff==0){
                if($yinshenstate==0 || $yinshenstate==2){  
                    $data["uuniShow"]=0;
                    $userdata["uMXInvisibleValid"]=1;
                }elseif($yinshenstate==1){
                    $userdata["uMXInvisible"]=1;
                    $userdata["uMXInvisibleValid"]=0;
                }
            }
            $result=$users_uninvest->add($data);
            $users->where("uId={$uId}")->save($userdata);
            if($result){
                if(!empty($uiId)){
                        foreach ($uiId as $o_id) {
                            $rs_jiner=$users_invest->where("uiId={$o_id}")->field("uiUJiner")->find();//排单额度
                            if($data["uuniJiner"]>$rs_jiner["uiUJiner"]){
                                          $uidata["uiSQShenyuJiner"]=0;
                                      $users_invest->where("uiId={$o_id}")->save($uidata);
                                      $data["uuniJiner"]=$data["uuniJiner"]-$rs_jiner["uiUJiner"];
                            }else{
                                  $uidata["uiSQShenyuJiner"]=$rs_jiner["uiUJiner"]-$data["uuniJiner"];//能申请的申请后剩余金额
                              $users_invest->where("uiId={$o_id}")->save($uidata);
                                 break;//结束循环体
                            }
                        }
                }
             
                $this->success("申请接受援助成功，请耐心等待系统匹配",U("wantuninvestlists?uId=$uId"),3);
            }else{
                $this->error("申请接受援助失败");
            }
        }
    }
    public function WantUnInvestLists(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $users_invest=M("users_uninvest");
        $rs_invest=$users_invest->where("uuniUid={$uId}")->select();
        $this->assign("rs_invest",$rs_invest);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uUser,uId,uName,uTel,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $this->display();
    }
    public function PingZheng(){
        $this->LoginTrue();
        $uuniId=$_GET["uuniId"];
        $users_uninvest=M("users_uninvest");
        $rs_uninvest=$users_uninvest->where("uuniId={$uuniId}")->field("uuniImages,uuniStateDate")->find();
        $this->assign("rs_uninvest",$rs_uninvest);
        $users_invest=M("users_invest");
        $udate=$rs_uninvest["uuniStateDate"];
        $rs_invest=$users_invest->where("uiStateDate='{$udate}'")->field("uiImages")->find();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function ShowPayImg(){
        $this->LoginTrue();
        $uiId=$_GET["uiId"];
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiId={$uiId}")->field("uiImages,uiUid")->find();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function ShowDfPayImg(){
        $this->LoginTrue();
        $uidate=$_GET["uidate"];
        $uiId=$_GET["uiId"];
        $users_invest=M("users_invest");
        $rs_invest=$users_invest->where("uiUid={$uiId} AND uiZhifuDate='{$uidate}'")->field("uiImages,uiBeijiuyuanUid")->find();
        $this->assign("rs_invest",$rs_invest);
        $this->display();
    }
    public function ShowYesPayImg(){
        $this->LoginTrue();
        $uuniId=$_GET["uuniId"];
        $users_uninvest=M("users_uninvest");
        $rs_uninvest=$users_uninvest->where("uuniId={$uuniId}")->field("uuniImages,uuniUid")->find();
        $this->assign("rs_uninvest",$rs_uninvest);
        $this->display();
    }
    public function  ShowUserInfo(){
        $this->LoginTrue();
        $uId=$_GET["uId"];
        $LoId=session("uId");
        $this->assign("LoId",$LoId);
        $users=M("users");
        $rs_users=$users->where("uId={$uId}")->field("uId,uTuiId,uUser,uName,uTel,uWeixin,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $uTuiId=$rs_users["uTuiId"];
        $tuijianren=$users->where("uId={$uTuiId}")->field("uName,uTel")->find();
        $this->assign("tuijianren",$tuijianren);
        $this->display();
    }
    public function  ShowUnUserInfo(){
        $this->LoginTrue();
        $unuserId=$_GET["unuserId"];
        $LoId=session("uId");
        $this->assign("LoId",$LoId);
        $users=M("users");
        $rs_users=$users->where("uId={$unuserId}")->field("uId,uTuiId,uUser,uName,uTel,uWeixin,uZhifubao")->find();
        $this->assign("rs_users",$rs_users);
        $uTuiId=$rs_users["uTuiId"];
        $tuijianren=$users->where("uId={$uTuiId}")->field("uName,uTel")->find();
        $this->assign("tuijianren",$tuijianren);
        $this->display();
    }
}