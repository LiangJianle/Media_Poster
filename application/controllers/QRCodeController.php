<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-9
 * Time: 上午8:53
 */

class QRCodeController extends CI_Controller
{

    function index()
    {
        if (isset($_POST)) {
            $this->load->library('QRCodeHelper.php');
            $helper  = new  QRCodeHelper();
            $out_dir = 'QRCodeTemp';
            $str     = $_POST['data'];
            $level   = $_POST['level'];
            $size    = $_POST['size'];

            $fileName          = $helper->qrcode($out_dir,$str, $size,$level );

            $data['filename'] = base_url() . DIRECTORY_SEPARATOR . $fileName;


            $data['include'] = "qrcode_view"; //模板界面
            $this->load->view('template',$data);

        }else{
            $data['include'] = "qrcode_view"; //模板界面
            $this->load->view('template');
         //   $this->load->view("qrcode_view");
        }



    }

    function createCode()
    {


    }


}