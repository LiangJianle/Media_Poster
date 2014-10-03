<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function reutrnToIndex()
    {
        $url = base_url() . $this->index_url;
        echo "<script language=\"javascript\">";
        echo "location.href=\"$url\"";
        echo "</script>";
    }


    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['include'] = "admin_main_content"; //模板界面
            $this->load->view('template',$data);

        }
        else
        {
            //If no session, redirect to login page
            echo 'redirect';
            redirect('login', 'refresh');
        }


        
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('welcome', 'refresh');
    }


    public function video_play()
    {
        $this->load->view('video_player');
    }



    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */