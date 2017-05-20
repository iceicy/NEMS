<?php

class Registration extends CI_Model {

	var $date;
	var $subj_code;
	var $subj_name;
	var $subj_time;
	var $subj_price;
	
	function __construct() {
		parent::__construct();
	}

	function getRegistrations() {
		$sql = "SELECT r.CreateDate, sj.SubID, sj.SubName, sj.Price  FROM tb_Registration r JOIN tb_Subject sj ON r.SubID = sj.SubID LEFT JOIN tb_student s ON r.student_ID = s.student_ID LEFT JOIN tb_ExamBill_Line el ON r.RegID = el.RegID WHERE s.student_ID IS NOT NULL AND el.RegID IS NULL";

        $query = $this->db->query($sql);
        return $query;
	}
	
}

?>