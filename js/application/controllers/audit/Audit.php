<?php
/* Class Audit_controller
 * Main Controller Audit
 * @author: Jiranun
 * @Create Date: 2560-02-04
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__)."/../NEMs_Controller.php");
/*require_once('../NEMs_Controller.php');*/

class Audit extends NEMs_Controller {
	public function __construct(){
        parent::__construct();
	}
	
	/* main function*/
	public function index()
	{
		
		$this->output('Audit/report1');
	}
	
	public function report1()
	{
		
		$this->output('Audit/report1');
	}
	
	public function report2()
	{
		
		$this->output('Audit/report2');
	}
	
	public function report3()
	{
		
		$this->output('Audit/report3');
	}
	
	public function report4()
	{
		
		$this->output('Audit/report4');
	}
	
	
	public function report5()
	{
		
		$this->output('Audit/report5');
	}
	
	
	public function report6()
	{
		
		$this->output('Audit/report6');
	}
	
	
	public function report7()
	{
		
		$this->output('Audit/report7');
	}
	
	
	public function report8()
	{
		
		$this->output('Audit/report8');
	}
}//end Class Audit
