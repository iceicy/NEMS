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
        $this->pa_db = $this->load->database('default', TRUE); 
	}
	
	/* main function*/
	public function index()
	{
		$this->load->model("payment/M_pa_payment","payment");
		
		$this->data["rs_year_exam"] = $this->payment->get_year_exam();
		
		$this->output('Audit/report1');
	}
	
	/***************************************************/
	
	public function report1()
	{
		$this->load->model("payment/M_pa_payment","payment");
		
		
		$this->data["rs_year_exam"] = $this->payment->get_year_exam();
		
		$this->output('Audit/report1',$this->data);
		
	}
	
	public function table_report1(){
		$this->load->model("payment/M_audit","audit");
		$this->load->model("payment/M_pa_payment","payment");
		
		$im_edu_bgy = $this->input->post("im_edu_bgy");//ปีการศึกษา
		
		$rs_type_exam = $this->payment->get_type_exam_by_year($im_edu_bgy);
		
		
		if($rs_type_exam->num_rows()>0){
			$seq = 1;
			foreach($rs_type_exam->result() as $exam){
				echo "<tr>";									
					echo "<td>".$seq."</td>";	
					echo "<td>".$exam->TypeName." (".$exam->Term."/".($exam->Year+543).")</td>";	
					echo "<td>N/A</td>";	
					echo "<td>N/A</td>";	
					echo "<td>N/A</td>";	
					echo "<td>N/A</td>";	
					echo "<td>N/A</td>";
				echo "</tr>";
				$seq++;
			}
		}
		
		
		
	}//end fn table_report1
	/***************************************************/
	
	
	
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
		$this->output('Audit/v_report4');
	}
	
	
	public function report5()
	{
		$this->load->model("audit/M_tresult","tresult");
		
		$this->data["log_edit"] = $this->tresult->get_log();
		
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
