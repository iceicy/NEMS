<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rg_form extends CI_Model {    
    public $news_ID;
    function __construct() {
        parent::__construct();
    }

    function get_by_key($news_id) { 
        $sql = "SELECT * FROM tb_news WHERE news_ID = '".$news_id."'";
        $query = $this->db->query($sql);
        return $query;
    }

    function delete_by_key($news_id) {
        $this->db->where('news_ID', $news_id);
        $this->db->delete('tb_news');

    }

    function insert_tb_news($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin) {
        $sql = "INSERT INTO tb_news (access_level,topic,Description,content,tb_new_img_path_news_id,priority,create_date,active_date,expired_date,pin_flag)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin));
    }

    function update_tb_news($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin,$id) {
        $sql = "UPDATE tb_news 
                SET access_level=?,topic=?,Description=?,content=?,tb_new_img_path_news_id=?,priority=?,create_date=?,active_date=?,expired_date=?,pin_flag=?
                WHERE news_ID=?";   
        $this->db->query($sql, array($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin,$id)); 
    }

    function get_first_news() { 
        $wh = '';    
        if ($this->session->userdata('user_name')) {
            $wh = ' AND access_level IN (1,2) ';  
        }else{
            $wh = ' AND access_level IN (1) ';      
        }
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                    AND pin_flag = 0 ".$wh;
        $sql.= " ORDER BY priority DESC
                LIMIT 6";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_news_more() { 
        $wh = '';    
        if ($this->session->userdata('user_name')) {
            $wh = ' AND access_level IN (1,2) ';  
        }else{
            $wh = ' AND access_level IN (1) ';      
        }
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                    AND pin_flag = 0 ".$wh;
        $sql.= " ORDER BY priority DESC
                LIMIT 500 OFFSET 6";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_first_news_pin() { 
        $wh = '';    
        if ($this->session->userdata('user_name')) {
            $wh = ' AND access_level IN (1,2) ';  
        }else{
            $wh = ' AND access_level IN (1) ';      
        }
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                    AND pin_flag = 1 ".$wh;
        $sql.= " ORDER BY priority DESC
                LIMIT 1";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_news_pin_more() {
        $wh = '';    
        if ($this->session->userdata('user_name')) {
            $wh = ' AND access_level IN (1,2) ';  
        }else{
            $wh = ' AND access_level IN (1) ';      
        } 
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                    AND pin_flag = 1 ".$wh;
        $sql.= " ORDER BY priority DESC
                LIMIT 500 OFFSET 1";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_news() { 
        $sql = "SELECT * FROM `tb_news` 
                WHERE news_ID=?";
        $query = $this->db->query($sql, array($this->news_ID));
        return $query;
    }
    function get_all_news(){
        $query = $this->db->select('*')
            ->order_by('create_date','DESC')
            ->get('tb_news');

        if (!$query) {
            echo $this->rs_db->_error_message();
        } else {
            return $query ;
        }

    }
    
}    
?>