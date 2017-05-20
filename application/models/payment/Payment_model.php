<?php

class Payment_model extends CI_Model {

	public $pa_db; //ชื่อฐาน
	
	function __construct() {
		parent::__construct();
		
		//UserDB
		$this->pa_db		= $this->load->database("default",TRUE);


	}
	
	
}//end class My_model
	


?>
