<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'third_party/phpqrcode/qrlib.php';

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-9
 * Time: 上午9:28
 */

class QRCodeHelper
{

    function testfunc()
    {
        $dir= 'QRCodeTemp';

        $root = base_url($dir);
        $PNG_TEMP_DIR =  dirname(APPPATH) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;

        echo $PNG_TEMP_DIR;
    }

    /*
     * $data为要生成的二维码数据,$dir为要存放二维码的路径
        //$size是二维码大小， $mycode重命名二维码时加密的密文
        //加载所需的文件
     */
    //二维码纠错能力大小$errorCorrectionLevel

    //二维码图片大小 $size
    public function qrcode( $dir,$data, $size = 4, $errorCorrectionLevel='L',$mycode = 'CD')
    {
        //存放二维码的文件夹
        $PNG_TEMP_DIR =   dirname(APPPATH) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;

        //如果没有该目录，则创建一个
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);
        //设置一个二维码名称作为初始化的二维码图片
        $filename = $PNG_TEMP_DIR . 'test.png';

        if ($data) {
            //重命名加上路径
            $filename = $PNG_TEMP_DIR . $mycode . md5($data . '|' . $errorCorrectionLevel . '|' . $size) . '.png';
            //设置二维码
            QRcode::png($data, $filename, $errorCorrectionLevel, $size, 2);
            return $dir . DIRECTORY_SEPARATOR . $mycode . md5($data . '|' . $errorCorrectionLevel . '|' . $size) . '.png';
        }
    }
} 