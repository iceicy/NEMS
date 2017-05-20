<?php

class Subject extends CI_Model {

	var $subj_id;
	var $subj_type;
	var $subj_code;
	var $subj_name;
	var $subj_date;
	var $subj_time;
	var $subj_no_min;
	var $subj_year;
	var $subj_no;
	
	function Subject() {
		parent::__construct();
	}

	function getSubjects() {
		$query = $this->db->get('tb_Subject');
        return $query->result();
	}
	
}

?>