<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/26
 * Time: 14:55
 */

function qrcode($url,$size=4){
    Vendor('phpqrcode.phpqrcode');
    QRcode::png($url,false,QR_ECLEVEL_L,$size,2,false,0xFFFFFF,0x000000);
    $QR = imagecreatefromstring(file_get_contents($url));

    //输出图片
    imagepng($QR, 'qrcode.png');
    imagedestroy($QR);
    return '<img src="qrcode.png" alt="使用微信扫描支付">';

}