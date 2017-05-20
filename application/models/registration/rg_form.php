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
	function insert_tb_news($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin) {
		$sql = "INSERT INTO tb_news (access_level,topic,Description,content,tb_new_img_path_news_id,priority,create_date,active_date,expired_date,pin_flag)
				VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->db->query($sql, array($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin));
	}
	function update_tb_news($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin,$id) {
		$sql = "UPDATE tb_news 
				SET	access_level=?,topic=?,Description=?,content=?,tb_new_img_path_news_id=?,priority=?,create_date=?,active_date=?,expired_date=?,pin_flag=?
				WHERE news_ID=?";	
		$this->db->query($sql, array($access_level,$topic,$description,$content,$picture,$priority,$create_date,$startDate,$endDate,$pin,$id));	
	}

    function get_first_news() { 
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                 	AND pin_flag = 0
                ORDER BY priority DESC
                LIMIT 6";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_news_more() { 
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                    AND pin_flag = 0
                ORDER BY priority DESC
                LIMIT 500 OFFSET 6";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_first_news_pin() { 
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                    AND pin_flag = 1
                ORDER BY priority DESC
                LIMIT 1";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_news_pin_more() { 
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `tb_news` 
                WHERE ('".$today."' >= `active_date` 
                    AND '".$today."' <= `expired_date`)
                    AND pin_flag = 1
                ORDER BY priority DESC
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
	
}	 
?>