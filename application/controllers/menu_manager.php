<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-10
 * Time: 上午8:02
 */

class Menu_Manager extends CI_Controller{



    public function index()
    {
        $data['include'] = "admin_main_menu_manager";
        $this->load->vars($data);
        $this->load->view('template');
    }
    public function getToken()
    {
        $this->load->helper('menu');
        $menu = new Menu();
        echo $menu->getToken();
    }
    public function init_menu()
    {
        $this->load->helper('menu');
        $menu = new Menu();
        echo $menu->updateMenu();
    }
    public function add_menu()
    {

    }

    public function update_menu()
    {
		
    }

    public function check_menu()
    {
        $this->load->helper('menu');
        $this->load->helper('json');
        $this->load->model('menu_model');

        $menu = new Menu();
        $menuList = array();
        $jsonString =  $menu->getMenu();
        $de_json = json_decode($jsonString);

        $menu_buttons =  $de_json->menu->button;

        for ($i = 0; $i < count($menu_buttons); $i++) {

            $button_object = $menu_buttons[$i];
            $sub_buttons = $button_object->sub_button;


            if(count($sub_buttons)>0)
            {
                for ($j = 0; $j < count($sub_buttons); $j++) {
                    {
                        $sub_button = $sub_buttons[$j];

                        $model = new Menu_Model();
                        $model->name =  $button_object->name;
                        $model->sub_name =  $sub_button->name;
                        $model->type = $sub_button->type;
                        $model->url = $sub_button->url;
                        array_push($menuList, $model);
                    }
                }
            }else
            {

            }
        }



        $data['include'] = "admin_main_menu_manager";
        $data['menuList'] =$menuList;
        $this->load->vars($data);
        $this->load->view('template');

    }

    public function delete_menu()
    {

    }
}