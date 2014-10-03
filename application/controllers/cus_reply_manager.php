<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-18
 * Time: 下午6:55
 */

class Cus_Reply_Manager extends CI_Controller{

    
     var $index_url = "index.php/cus_reply_manager";

    
    public function reutrn_to_index()
    {
        $url = base_url() . $this->index_url;
        echo "<script language=\"javascript\">";
        echo "location.href=\"$url\"";
        echo "</script>";
    }

    
    public function index()
    {
        
   
        $this->load->model('reply_rule_model');
        

        $reply_rule_List =  $this->reply_rule_model->getReplyRuleListByMessageType('sys_auto_keyword');
        $data['include'] = "admin_reply_manager";
        $data['reply_rule_List'] =$reply_rule_List;
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function edit_rule_view()
    {
        
        $this->load->helper('url');
        $this->load->model('reply_rule_model');

        $Id =$_GET['Id'];
        $model =  $this->reply_rule_model->findById($Id);
 
        $data['model'] = $model;
        $data['include'] = "reply_rule_editor";
        $this->load->vars($data);
        $this->load->view('template');
    }
    
    public function delete_rule()
    {
        
        $this->load->model('reply_rule_model');
        
        $Id =$_GET['Id'];
        $this->reply_rule_model->delete($Id);

        $this->reutrn_to_index();
        
    }
    
    public function add_rule_view()
    {
        
        $this->load->helper('url');
        $data['include'] = "reply_rule_editor";
        $this->load->vars($data);
        $this->load->view('template');
    }
    
    public function add_rule()
    {

        
        $Id =isset($_POST["Id"])?$_POST["Id"]:'';
        $name =isset($_POST["name"])?$_POST["name"]:'';
        $type=isset($_POST["type"])?$_POST["type"]:'';
        $keyword=isset($_POST["keyword"])?$_POST["keyword"]:'';
        $title=isset($_POST["title"])?$_POST["title"]:'';$_POST['title'];
        $description=isset($_POST["description"])?$_POST["description"]:'';
        $picurl=isset($_POST["picurl"])?$_POST["picurl"]:'';
        $url=isset($_POST["url"])?$_POST["url"]:'';
        $note=isset($_POST["notes"])?$_POST["notes"]:'';
        $message_type=isset($_POST["message_type"])?$_POST["message_type"]:'';
        $status=isset($_POST["is_valued"])?$_POST["is_valued"]:'';


        $this->load->model('reply_rule_model');

        $model = new Reply_Rule_Model();
        $model->Id = $Id;
        $model->name = $name;
        $model->type = $type;
        $model->keyword = $keyword;
        $model->description = $description;
        $model->title = $title;
        
        $model->picurl = $picurl;
        $model->url = $url;
        $model->note = $note;
        $model->message_type = $message_type;
        $model->status = $status;


         if(!empty($model->Id))
             $returnCode = $this->reply_rule_model->update($model);
         else
             $returnCode = $this->reply_rule_model->insert($model);

        if($returnCode==1)
        {
            $this->reutrn_to_index();
        }
        else{
            echo '错误,请重新添加，返回';
        }
        

    }
    
    public function view_rule()
    {
        
        $this->load->helper('url');
        $data['include'] = "reply_rule_editor";
        $this->load->vars($data);
        $this->load->view('template');
    }
    
    public function reply_subscribe()
    {
        $this->load->model('reply_rule_model');
        $reply_rule_List =  $this->reply_rule_model->getReplyRuleListByMessageType('sys_auto_subscribe');
        $this->load->helper('url');
        $data['include'] = "reply_subscribe";
        $data['model']  = $reply_rule_List[0];
        $this->load->vars($data);
        $this->load->view('template');
    }
    
     public function reply_others()
    {
         
        $this->load->model('reply_rule_model');
        $reply_rule_List =  $this->reply_rule_model->getReplyRuleListByMessageType('sys_auto_other');
        
         
        $this->load->helper('url');
        $data['include'] = "reply_others";
        $data['model']  = $reply_rule_List[0];
        $this->load->vars($data);
        $this->load->view('template');
    }
    
}