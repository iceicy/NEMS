<?php
class Nems_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
		
	}

	function row2attribute($rw) {
		foreach ($rw as $key => $value) {
			if ( is_null($value) )
				eval("\$this->$key = NULL;");
			else
				eval("\$this->$key = '$value';");
		}
	}

}//end class Nems_model

?>
