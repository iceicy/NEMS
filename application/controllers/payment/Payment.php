<?php
/* Class Payment_controller
 * Main Controller Payment
 * @author: Natcha
 * @Create Date: 2560-04-06
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__)."/../NEMs_Controller.php");

class Payment extends NEMs_Controller {
	public function __construct(){
        parent::__construct();
	}
	
	/* main function*/
	public function index()
	{
		
		$this->output('Payment/payment1');
	}
	
	public function payment1()
	{
		
		$this->output('Payment/payment1');
	}

	public function payment2()
	{
		
		$this->output('Payment/payment2');
	}

	public function payment3()
	{
		
		$this->output('Payment/payment3');
	}

}//end Class Payment
