<?php

include_once("Payment_model.php");

class M_audit extends Payment_model {	

	// add your functions here
	
	/*
	Query ประเภทการสอบ/ชนิดการสอบ 
	*/
	function get_year_exam(){
		$sql = "SELECT Year FROM `tb_TypeExam` GROUP BY Year";
		$query = $this->pa_db->query($sql);
		return $query;
	}//end fn get_type_exam

	
} // end class M_audit
?>