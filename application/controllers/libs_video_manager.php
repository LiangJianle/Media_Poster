<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-6-15
 * Time: 下午9:39
 */

class Libs_Video_Manager extends CI_Controller
{
    var $index_url = "index.php/libs_video_manager";

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

        $this->load->model('nfc_libs_video_model');
        $list            = $this->nfc_libs_video_model->getLibsList();
        $data['include'] = "admin_video_libs_manager";
        $data['list']    = $list;
        $this->load->vars($data);
        $this->load->view('template');

    }


    public function show()
    {
        $this->load->view('show');
    }

    public function showByid()
    {

        if (isset($_GET['vid']) != '') {
            $video_id = $_GET['vid'];

            $video_name = 'video/14060720140409_195758.mp4';
            $video_url  = '';
        }

        $data['video_name'] = $video_name;

        $this->load->view('video_player', $data);
    }

    function add_libs_video_view()
    {
        $session_data = $this->session->userdata('logged_in');
        $this->load->helper('url');
        $data['include']  = "libs_video_editor";
        $data['username'] = $session_data['username'];
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function edit_libs_video_view()
    {
        $this->load->helper('url');
        $this->load->model('nfc_libs_video_model');

        $Id              = $_GET['Id'];
        $model           = $this->nfc_libs_video_model->findById($Id);
        $data['model']   = $model;
        $data['include'] = "libs_video_editor";
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function delete_libs_video()
    {
        $this->load->model('nfc_libs_video_model');

        $Id = $_GET['Id'];
        $this->nfc_libs_video_model->delete($Id);

        $this->index();
    }

    function  add_libs_video($model)
    {
        var_dump($model);
        if (!empty($model->vid))
            $returnCode = $this->nfc_libs_video_model->update($model);
        else
            $returnCode = $this->nfc_libs_video_model->insert($model);

        if ($returnCode == 1) {

            $this->reutrn_to_index();
        } else {
            echo '错误,请重新添加，返回';
        }
    }

    public function add_video()
    {
        $this->load->model('nfc_libs_video_model');

        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date                         = date("ymd");
            $configVideo['upload_path']   = './video';
            $configVideo['max_size']      = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite']     = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name                   = $date . $_FILES['video']['name'];
            $configVideo['file_name']     = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
                var_dump($configVideo);
            } else {
                $videoDetails         = $this->upload->data();
                $data['video_name']   = $configVideo['file_name'];
                $data['video_detail'] = $videoDetails;

                $vid          = $_POST['vid'];
                $file_name    = $_POST['file_name'];
                $storage_addr = $videoDetails['file_name'];

                $model               = new NFC_Libs_Video_Model();
                $model->vid          = $vid;
                $model->file_name    = $file_name;
                $model->storage_addr = "video/" . $storage_addr; //$storage_addr;
                $session_data        = $this->session->userdata('logged_in');
                $username            = $session_data['username'];
                $model->user         = $username;

                $this->add_libs_video($model);

                $this->load->view('show', $data);


            }

        } else {
            $vid       = $_POST['vid'];
            $file_name = $_POST['file_name'];

            $model            = new NFC_Libs_Video_Model();
            $model->vid       = $vid;
            $model->file_name = $file_name;


            if (!empty($model->vid)) {
                $returnCode = $this->nfc_libs_video_model->update($model);
                $this->reutrn_to_index();
            } else {
                echo "Please select a file";
            }


        }
    }
}