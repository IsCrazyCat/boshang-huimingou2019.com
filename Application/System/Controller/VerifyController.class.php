<?php
namespace System\Controller;
use Think\Controller;
class VerifyController extends Controller{
    public function Verify(){
        $config =    array(
        'expire' => 120,  //验证码输入错误后的有效时间，输入正确则失效
        'fontSize'    =>    14,    // 验证码字体大小
        'length'      =>    5,     // 验证码位数
        'useNoise'    =>    false, // 关闭验证码杂点
        'useCurve' => false,  //关闭曲线
        'imageW'  =>132,     //宽度
        'imageH'  =>33,   //高度
        //'useImgBg'  =>true,  //背景
        );
        $Verify =     new \Think\Verify($config);
        // 设置验证码字符为纯数字
        $Verify->codeSet = '123456789'; 
        $Verify->entry();
    }
}