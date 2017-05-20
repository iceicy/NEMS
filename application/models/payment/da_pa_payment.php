<?php

include_once("Payment_model.php");

class Da_pa_payment extends Payment_model {		
	
	// PK is ottd_ott_id, ottd_date
	
	public $pay_id;
	public $pay_stu_id;
	public $pay_bs_id;
	public $pay_bill;
	public $pay_date;
	public $pay_amount;
	public $pay_receiver;
	public $pay_createdate;
	public $pay_creator;

	public $last_insert_id;

	function __construct() {
		parent::__construct();
	}
	
	function insert() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO pa_payment (pay_id,pay_stu_id,pay_bs_id,pay_bill,pay_date,pay_amount,pay_receiver,pay_createdate,pay_creator)
				VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->pa_db->query($sql, array($this->pay_id,$this->pay_stu_id,$this->pay_bs_id,$this->pay_bill,$this->pay_date,$this->pay_amount,$this->pay_receiver,$this->pay_createdate,$this->pay_creator));
		$this->last_insert_id = $this->pa_db->insert_id();
	}
	
	function update() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "UPDATE pa_payment 
				SET	pay_stu_id=?,pay_bs_id=?,pay_bill=?,pay_date=?,pay_amount=?,pay_receiver=?,pay_createdate=?,pay_creator=?
				WHERE pay_id=?";	
		$this->pa_db->query($sql, array($this->pay_stu_id,$this->pay_bs_id,$this->pay_bill,$this->pay_date,$this->pay_amount,$this->pay_receiver,$this->pay_createdate,$this->pay_creator,$this->pay_id));	
	}
	
	function delete() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "DELETE FROM pa_payment
				WHERE pay_id=?";
		$this->pa_db->query($sql, array($this->pay_id));
	}
	
	/*
	 * You have to assign primary key value before call this function.
	 */
	function get_by_key($withSetAttributeValue=FALSE) {	
		$sql = "SELECT * 
				FROM pa_payment 
				WHERE pay_id=?";
		$query = $this->pa_db->query($sql, array($this->pay_id));
		if ( $withSetAttributeValue ) {
			$this->row2attribute( $query->row() );
		} else {
			return $query ;
		}
	}
	
}	 //=== end class Da_hr_ot_temp_detail
?>