<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-10
 * Time: 下午11:42
 */

class Reply_Rule_Model extends CI_Model {

    private $tableName = 'kc_reply_rule';
    var $Id;
    
    var $name;
    var $type;
    var $keyword;
    var $title;
    var $description;
    var $picurl;
    
    var $url;
    var $note;
	var $message_type;
    var $status;


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
        $this->db->where('Id', $model->Id);
        $this->db->update($this->tableName, $model);

        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }

    function findById($Id)
    {

        $query = $this->db->query("SELECT *  FROM $this->tableName WHERE Id = $Id");


        $reply_rule_List = $this->getListByQuery($query);


        return $reply_rule_List[0];
    }

    function delete($Id)
    {
        $this->db->where('Id', $Id);
        $this->db->delete($this->tableName);

        if ($this->db->affected_rows() == 0)
            return 0;
        else
            return 1;
    }

    function getReplyRuleListByMessageType($message_type)
    {
        
       $query = $this->db->query("SELECT *  FROM $this->tableName WHERE message_type='$message_type';");

        $reply_rule_List = $this->getListByQuery($query);

        return $reply_rule_List; 
    }
    
    function getReplyRuleListByName($name)
    {
        
       $query = $this->db->query("SELECT *  FROM $this->tableName WHERE name= '$name';");

        $reply_rule_List = $this->getListByQuery($query);

        return $reply_rule_List; 
    }
    
    
    function getReplyRuleList()
    {

        $query = $this->db->query("SELECT *  FROM $this->tableName");

        $reply_rule_List = $this->getListByQuery($query);

        return $reply_rule_List;
    }
    
    
    
    private function getListByQuery($query)
    {
         $reply_rule_List = array();
          for ($i = 0; $i < count($query->result()); $i++) {
            $data = $query->result();
            $model = new Reply_Rule_Model();

                     $model->name = $data[$i]->name;
            $model->Id =  $data[$i]->Id;
            $model->type =  $data[$i]->type;
            $model->keyword =  $data[$i]->keyword;
            $model->title =  $data[$i]->title;
            $model->description =  $data[$i]->description;
            $model->picurl =  $data[$i]->picurl;
            
            $model->url =  $data[$i]->url;
            $model->note =  $data[$i]->note;
            $model->message_type = $data[$i]->message_type;
             $model->status = $data[$i]->status;
            array_push($reply_rule_List, $model);
        }
        return $reply_rule_List;
    }

} 