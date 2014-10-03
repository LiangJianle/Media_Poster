<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-10
 * Time: 下午10:33
 */

class Articles_Manager extends CI_Controller{

    var $index_url = "index.php/articles_manager";

    
    public function reutrn_to_index()
    {
        $url = base_url() . $this->index_url;
        echo "<script language=\"javascript\">";
        echo "location.href=\"$url\"";
        echo "</script>";
    }


    public function index()
    {
        $this->load->model('articles_model');
        $articleList =  $this->articles_model->getArticleList();
        $data['include'] = "admin_main_articles_manager";
        $data['articleList'] =$articleList;
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function listAll()
    {
        $this->load->model('articles_model');
        $articleList =  $this->articles_model->getArticleList();
        $data['include'] = "admin_main_articles_manager";
        $data['articleList'] =$articleList;
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function method_article()
    {

    }

    public function add_article()
    {
        $Id =$_POST['Id'];
        $title =$_POST['title'];
        $category=$_POST['category'];
        $date=$_POST['date'];
        $introduction=$_POST['introduction'];
        $editorValue=$_POST['editorValue'];

        $this->load->model('articles_model');

        $model = new Articles_Model();
        $model->Id = $Id;
        $model->title = $title;
        $model->category = $category;
        $model->date = $date;
        $model->introduction = $introduction;
        $model->editorValue = $editorValue;
        $returnCode = 1;


        if(!empty($model->Id))
            $returnCode = $this->articles_model->update($model);
        else
             $returnCode = $this->articles_model->insert($model);

        if($returnCode==1)
        {
            $this->reutrn_to_index();
        }
        else{
            echo '错误,请重新添加，返回';
        }
    }
    public function test()
    {

        $this->load->model('articles_model');

        $model = new Articles_Model();


       $find =  $this->articles_model->findById(1);

        var_dump($find);

    }


    public function edit_article_view()
    {
        $this->load->helper('url');
        $this->load->model('articles_model');

        $Id =$_GET['Id'];
        $model =  $this->articles_model->findById($Id);
     //   var_dump($model);
        $data['model'] = $model;
        $data['include'] = "articles_editor";
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function delete_article()
    {
        $this->load->model('articles_model');

        $Id =$_GET['Id'];
        $this->articles_model->delete($Id);

        $this->listAll();
    }
    public function add_article_view()
    {
        $this->load->helper('url');
        $data['include'] = "articles_editor";
        $this->load->vars($data);
        $this->load->view('template');
    }


    public function enter_editor()
    {
        $this->load->helper('url');

        $data['include'] = "articles_editor";

        $this->load->vars($data);
        $this->load->view('template');

    }

    public function view_article()
    {
        $this->load->helper('url');
        $this->load->model('articles_model');

        $Id =$_GET['Id'];
        $model =  $this->articles_model->findById($Id);
        $data['content'] = $model->editorValue;
        $data['include'] = "article_view";
        $this->load->vars($data);
        $this->load->view('template');
    }

}