<?php
/* Class Payment_controller
 * Main Controller Payment
 * @author: Natcha
 * @Create Date: 2560-04-06
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');

class Payment extends NEMs_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $newdata = array(
            'username'  => 'suphunnee'
        );
        $this->session->set_userdata($newdata);
        $this->pa_db = $this->load->database('default', TRUE);  
		
		// the TRUE paramater tells CI that you'd like to return the database object.


    }
	

	/* main function*/
	public function index($pay_id="")
	{
		//author by suphunnee prajongjai 18/04/2017
		date_default_timezone_set('Asia/Bangkok');
		$sql ="SELECT * FROM `tb_payment_status` WHERE ps_type = 'B'";
		$query = $this->pa_db->query($sql);
		$this->data['rs_option_status'] = $query;
		
		
		$sql ="SELECT * FROM tb_payment LEFT JOIN tb_payment_status ON   pay_ps_id = ps_id ";
		$query = $this->pa_db->query($sql);
		$this->data['rs_payment'] = $query;
		
		if($pay_id){
			$sql ="SELECT * FROM tb_payment WHERE pay_id = '$pay_id' ";
			$query = $this->pa_db->query($sql);
			$this->data['rs_edit'] = $query;
		}
		
		$this->output('Payment/v_payment',$this->data);
	}
	
	function splitDateFormTH($date,$sp="-") {
		list($dd, $mm, $yy) = preg_split("[/|-]", $date);
		return $yy.'-'.$mm.'-'.$dd;
	}
public function insert()
	{
		//author by suphunnee prajongjai 18/04/2017
		date_default_timezone_set('Asia/Bangkok');
		
		$pay_id 		= $this->input->post('pay_id');
		$pay_bs_id		= $this->input->post('pay_bs_id');
		$pay_bill		= $this->input->post('pay_bill');
		echo $this->input->post('pay_date');
		echo $pay_date		= $this->splitDateFormTH($this->input->post('pay_date')); //die;
		$pay_amount		= $this->input->post('pay_amount');
		$pay_receiver	= $this->input->post('pay_receiver');
		$pay_createdate	= date("Y-m-d H:i:s");
		$pay_creator	= $this->session->userdata('username');
		
		//echo $pay_id;
		if($pay_id!="0"){
			
			$sql = "UPDATE tb_payment 
					SET	pay_ps_id='$pay_bs_id',pay_bill='$pay_bill',pay_date='$pay_date',pay_amount='$pay_amount',pay_receiver='$pay_receiver',pay_createdate='$pay_createdate',pay_creator='$pay_creator'
					WHERE pay_id='$pay_id'";
			$this->pa_db->query($sql);
			
		}else{
			$sql = "INSERT INTO tb_payment (pay_id,pay_ps_id,pay_bill,pay_date,pay_amount,pay_receiver,pay_createdate,pay_creator)
					VALUES('$pay_id', '$pay_bs_id', '$pay_bill', '$pay_date', '$pay_amount','$pay_receiver', '$pay_createdate','$pay_creator')";
			
			$this->pa_db->query($sql);
			
		}
		//echo $sql;
		 redirect('/payment/Payment/index'); //$this->index();
	}
	
	function delete_by_payid(){
		//author by suphunnee prajongjai 18/04/2017
		$pay_id = $this->input->post('pay_id');
		$sql = "DELETE FROM tb_payment
				WHERE pay_id= $pay_id";
		$this->pa_db->query($sql);
		echo "YES";
	}
	
	public function payment3()
	{
		
		$this->output('Payment/payment3');
	}

}//end Class Payment
