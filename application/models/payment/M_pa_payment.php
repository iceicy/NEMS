<?php

include_once("Da_pa_payment.php");

class M_pa_payment extends Da_pa_payment {

	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	 */
	function get_all($aOrderBy=""){
		$orderBy = "";
		if ( is_array($aOrderBy) ) {
			$orderBy.= "ORDER BY "; 
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * 
				FROM pa_payment 
				$orderBy";
		$query = $this->pa_db->query($sql);
	}
	
	/*
	 * create array of pk field and value for generate select list in view, must edit PK_FIELD and FIELD_NAME manually
	 * the first line of select list is '-----เลือก-----' by default.
	 * if you do not need the first list of select list is '-----เลือก-----', please pass $optional parameter to other values. 
	 * you can delete this function if it not necessary.
	 */
	function get_options($optional='y') {
		$qry = $this->get_all();
		if ($optional=='y') $opt[''] = '-----เลือก-----';
		foreach ($qry->result() as $row) {
			$opt[$row->PK_FIELD] = $row->FIELD_NAME;
		}
		return $opt;
	}
	
	// add your functions here
	
	/*
	Query ประเภทการสอบ/ชนิดการสอบ 
	*/
	function get_year_exam(){
		$sql = "SELECT Year FROM `tb_TypeExam` GROUP BY Year";
		$query = $this->pa_db->query($sql);
		return $query;
	}//end fn get_type_exam
	
	
	/*
	Query ประเภทการสอบ/ชนิดการสอบ ค้นหาจาก ปีการศึกษา
	*/
	function get_type_exam_by_year($edu_year){
		$sql = "SELECT TypeID,TypeName ,Term,Year
				FROM `tb_TypeExam`
				WHERE Year = '".$edu_year."' ";
		$query = $this->pa_db->query($sql);
		return $query;
	}//end fn get_type_exam
	
	/*
	Query bill payment by $billID
	*/
	function get_bill($bill_id){
		$sql = "SELECT * FROM `tb_ExamBill` WHERE BillNo = '".$bill_id."' ";
		$query = $this->pa_db->query($sql);
		return $query;
	}//end fn get_bill

	
	/*
	Update ActualAmount in tb_ExamBill
	*/
	function update_bill($BillNo, $ActualAmount){
		$sql = "UPDATE `tb_ExamBill` 
				SET ActualAmount = '".$ActualAmount."'
				WHERE BillNo = '".$BillNo."' ";
		$this->pa_db->query($sql);		
	}//end fn update_bill
	
	
} // end class M_pa_payment
?>