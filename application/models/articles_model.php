<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-10
 * Time: 下午11:42
 */

class Articles_Model extends CI_Model {

    private $tableName = 'kc_article';
    var $Id;
    var $title;
    var $category;
    var $date;
    var $introduction;
    var $editorValue;



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

        $articleList = array();
        for ($i = 0; $i < count($query->result()); $i++) {
            $data = $query->result();
            $model = new Articles_Model();

            $model->Id =  $data[$i]->Id;
            $model->title =  $data[$i]->title;
            $model->category =  $data[$i]->category;
            $model->date =  $data[$i]->date;
            $model->introduction =  $data[$i]->introduction;
            $model->editorValue =  $data[$i]->editorValue;
            array_push($articleList, $model);
        }


        return $articleList[0];
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

    function getArticleList()
    {

        $query = $this->db->query("SELECT *  FROM $this->tableName");

        $articleList = array();
        for ($i = 0; $i < count($query->result()); $i++) {
            $data = $query->result();
            $model = new Articles_Model();

            $model->Id =  $data[$i]->Id;
            $model->title =  $data[$i]->title;
            $model->category =  $data[$i]->category;
            $model->date =  $data[$i]->date;
            $model->introduction =  $data[$i]->introduction;
            $model->editorValue =  $data[$i]->editorValue;
            array_push($articleList, $model);
        }

        return $articleList;
    }

} 