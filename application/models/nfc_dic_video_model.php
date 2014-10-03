<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-6-8
 * Time: 上午11:21
 */

class NFC_Dic_Video_Model extends CI_Model{

    private $tableName = 'nfc_dic_video';
    var $dic_id;
    var $dic_name;
    var $web_url;
    var $video_id;
    var $video_name;

    function insert($model)
    {

        $this->db->set('dic_id', $model->dic_id);
        $this->db->set('dic_name',$model->dic_name);
        $this->db->set('web_url', $model->web_url);
        $this->db->set('video_id', $model->video_id);
        $this->db->insert($this->tableName);
       // $this->db->insert($this->tableName, $model);
        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }

    function update($model)
    {

        $this->db->set('dic_name',$model->dic_name);
        $this->db->set('web_url', $model->web_url);
        $this->db->set('video_id', $model->video_id);
        $this->db->where('dic_id', $model->dic_id);
        $this->db->update($this->tableName);

        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }

    function delete($dic_id)
    {
        $this->db->where('dic_id', $dic_id);
        $this->db->delete($this->tableName);

        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }


    function findById($dic_id)
    {
        $query = $this->db->query("SELECT *  FROM $this->tableName WHERE dic_id = $dic_id");
        $articleList = $this->getListByQuery($query);
        return $articleList[0];
    }


    private function getListByQuery($query)
    {
        $reply_rule_List = array();
        $this->load->model('nfc_libs_video_model');
        $libs = new NFC_Libs_Video_Model();

        for ($i = 0; $i < count($query->result()); $i++) {
            $data = $query->result();
            $model = new NFC_Dic_Video_Model();

            $model->dic_id = $data[$i]->dic_id;
            $model->dic_name = $data[$i]->dic_name;
            $model->web_url =  $data[$i]->web_url;
            $model->video_id =  $data[$i]->video_id;

            $model->video_name =  $libs->findById($model->video_id)->file_name;

            array_push($reply_rule_List, $model);
        }


        return $reply_rule_List;
    }


    function getDicList()
    {
        $query = $this->db->query("SELECT *  FROM $this->tableName");
        $articleList = $articleList = $this->getListByQuery($query);

        return $articleList;
    }



}