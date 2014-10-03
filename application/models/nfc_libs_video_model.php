<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-22
 * Time: 下午9:08
 */

class NFC_Libs_Video_Model extends CI_Model
{

    private $tableName = 'nfc_libs_video';
    var $vid;
    var $file_name;
    var $storage_addr;
    var $user;

    function insert($model)
    {
        $this->db->insert($this->tableName, $model);
        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }

    function update($model)
    {

        $this->db->set('file_name',$model->file_name);
        $this->db->where('vid', $model->vid);
        $this->db->update($this->tableName);

        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }

    function delete($vid)
    {
        $this->db->where('vid', $vid);
        $this->db->delete($this->tableName);

        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }


    function findById($vid)
    {
        $query       = $this->db->query("SELECT *  FROM $this->tableName WHERE vid = $vid");

        $articleList = $this->getListByQuery($query);
        return $articleList[0];
    }


    private function getListByQuery($query)
    {
        $reply_rule_List = array();
        $data  = $query->result();

        for ($i = 0; $i < count($data); $i++) {

            $model = new NFC_Libs_Video_Model();

            $model->vid          = $data[$i]->vid;
            $model->file_name    = $data[$i]->file_name;
            $model->storage_addr = $data[$i]->storage_addr;
            $model->user         = $data[$i]->user;

            array_push($reply_rule_List, $model);
        }

        return $reply_rule_List;
    }


    function getLibsList()
    {
        $session_data = $this->session->userdata('logged_in');
        $username     = $session_data['username'];
        $this->db->select('vid,file_name, storage_addr, user');
        $this->db->from($this->tableName);

        $admin = 'root';
        if ($username === $admin) {
        } else {
            $this->db->where('user', $username);
        }

        $query = $this->db->get();


        $articleList = $articleList = $this->getListByQuery($query);


        return $articleList;
    }


}