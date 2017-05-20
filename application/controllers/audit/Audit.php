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
		// $subject_id = $this->input->post('subject_id');
		// $sql ="SELECT * FROM 'tresult_iscore' WHERE subject_id = '$subject_id'";
		// $query = $this->testresult_db->query($sql);
		// $this->data['testresult_score'] = $query;
		
		
		// $sql ="SELECT * FROM tb_payment LEFT JOIN tb_payment_status ON   pay_ps_id = ps_id ";
		// $query = $this->pa_db->query($sql);
		// $this->data['rs_payment'] = $query;
		
		// if($pay_id){
		// 	$sql ="SELECT * FROM tb_payment WHERE pay_id = '$pay_id' ";
		// 	$query = $this->pa_db->query($sql);
		// 	$this->data['rs_edit'] = $query;
		// }
		$this->output('Audit/v_report4');
	}
	
	
	public function report5()
	{
		
		$this->output('Audit/v_report5');
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
