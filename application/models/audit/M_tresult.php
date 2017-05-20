<?php

include_once("Payment_model.php");

class M_tresult extends Payment_model {	

	function get_log(){
		$sql = "SELECT * FROM `tb_log_edit_tresult`";
		$query = $this->pa_db->query($sql);
		return $query;
	}

	
} 
?>