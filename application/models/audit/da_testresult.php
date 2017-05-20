<?php

include_once("My_model.php");

class Da_testresult extends My_model {		
	
	public $subject_id;

	function __construct() {
		parent::__construct();
	}
	
	function get_by_key($withSetAttributeValue=FALSE) {	
		$sql = "SELECT * 
				FROM tresult_iscore
				WHERE subject_id=?";
		$query = $this->testresult_db->query($sql, array($this->subject_id));
		if ( $withSetAttributeValue ) {
			$this->row2attribute( $query->row() );
		} else {
			return $query ;
		}
	}
	
}	 
?>