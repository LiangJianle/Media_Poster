<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-6-8
 * Time: 上午10:58
 */

class Video_Manager extends CI_Controller
{
    var $index_url = "index.php/video_manager";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
    }


    public function reutrn_to_index()
    {
        $url = base_url() . $this->index_url;
        echo "<script language=\"javascript\">";
        echo "location.href=\"$url\"";
        echo "</script>";
    }

    public function index()
    {

        $this->load->model('nfc_dic_video_model');
        $list            = $this->nfc_dic_video_model->getDicList();

        $data['include'] = "admin_video_dic_manager";
        $data['list']    = $list;
        $this->load->vars($data);
        $this->load->view('template');

        //  $this->load->view('movie');
    }


    public function show()
    {
        $this->load->view('show');
    }

    public function showByid()
    {

        if (isset($_GET['did']) != '') {
            $dic_id = $_GET['did'];
            $this->load->model('nfc_libs_video_model');
            $this->load->model('nfc_dic_video_model');
            $dic_model  =$this->nfc_dic_video_model->findById($dic_id);
            $video_id   = $dic_model->video_id;
            $model           = $this->nfc_libs_video_model->findById($video_id);

            $full_path = $model->storage_addr;

        }

        $data['full_path'] = $full_path;
        redirect(base_url($full_path));
       // $this->load->view('video_player', $data);
    }

    function add_dic_video_view()
    {
        $this->load->helper('url');
        $data['include'] = "dic_video_editor";
        $this->load->model('nfc_libs_video_model');
        $videoList   = $this->nfc_libs_video_model->getLibsList();
        $data['videoList']    = $videoList;

        $this->load->vars($data);
        $this->load->view('template');
    }

    public function edit_dic_video_view()
    {
        $this->load->helper('url');
        $this->load->model('nfc_dic_video_model');
        $this->load->model('nfc_libs_video_model');
        $videoList   = $this->nfc_libs_video_model->getLibsList();
        $data['videoList']    = $videoList;

        $Id              = $_GET['Id'];
        $model           = $this->nfc_dic_video_model->findById($Id);
        $data['model']   = $model;
        $data['include'] = "dic_video_editor";
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function delete_dic_video()
    {
        $this->load->model('nfc_dic_video_model');

        $Id = $_GET['Id'];
        $this->nfc_dic_video_model->delete($Id);

        $this->index();
    }

    function  add_dic_video()
    {
        $dic_id   = $_POST['dic_id'];
        $web_url  = $_POST['web_url'];
        $video_id = $_POST['video_id'];
        $dic_name = $_POST['dic_name'];
        $video_name = $_POST['video_name'];


        $this->load->model('nfc_dic_video_model');

        $model           = new NFC_Dic_Video_Model();
        $model->dic_name = $dic_name;
        $model->dic_id   = $dic_id;
        $model->video_id = $video_id;
        $model->web_url  = $web_url;
        $model->video_name = $video_name;

        $returnCode      = 1;


        if (!empty($model->dic_id))
            $returnCode = $this->nfc_dic_video_model->update($model);
        else
            $returnCode = $this->nfc_dic_video_model->insert($model);

        if ($returnCode == 1) {
            $this->reutrn_to_index();
        } else {
            echo '错误,请重新添加，返回';
        }
    }



}