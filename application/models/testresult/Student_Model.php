<?php

class Student_Model extends CI_Model {
	

	private $table = "tb_student_tresult";
	public listStudent(){
		$this->db->select("*");
		//$this->db->where("");
		$query =  $this->db->get($table);
		return $query->result();
	}
	public listStudentForSendEmail(){
		//insert into table (student_id)
		// select student_id student from ....


		$sql = "SELECT  
					s.student_ID,c.email 
				FROM 
					   tb_contact_test c 
					,  tb_student_tresult s 
				where 
					c.contact_ID = s.student_ID";
		$query = $this->db->query($sql);
		return $query->result();
	}
}
?>