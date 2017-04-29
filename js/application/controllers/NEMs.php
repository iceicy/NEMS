<?php
/* Class NEMs
 * Main Controller NEMs
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once ('NEMs_Controller.php');

class NEMs extends NEMs_Controller {
	public function __construct(){
        parent::__construct();
	}
	
	public function index()
	{
		/*NEMs*/
		redirect('registration/news/listview');
	}

}//end Class NEMs
