<?php

class My_model extends CI_Model {

	public $testresult_db;
	
	
	function My_model() {
		parent::__construct();

		//UserDB
		$this->testresult_db		= $this->load->database("default",TRUE);


	}
	
	
}//end class My_model
	


?>
