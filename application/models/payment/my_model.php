<?php

class My_model extends CI_Model {

	public $pa_db;
	
	
	function My_model() {
		parent::__construct();

		//UserDB
		$this->pa_db		= $this->load->database("default",TRUE);


	}
	
	
}//end class My_model
	


?>
