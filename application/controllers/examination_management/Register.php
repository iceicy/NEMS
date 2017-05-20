<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require_once dirname(__FILE__).'/../NEMsAuth_Controller.php';

// Class Register extends NEMsAuth_Controller{
require_once dirname(__FILE__).'/../NEMsAuth_Controller.php';

Class Register extends NEMsAuth_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    	$this->config->load('logistic_config');
    	$this->config->load('exam_config');
    	$this->load->helper('mysqli');
    }

    public function Select_Subject(){
    	$this->load->model($this->config->item('lg_dir') . 'M_Other', 'ot');
    	$this->data['op_subject'] = $this->ot->get_option_subject();

    	$this->load->model($this->config->item('exam_dir') . 'registration', 'exam');
    	$this->data['data_tables'] = $this->exam->getRegistrations();

    	// $this->load->model($this->config->item('lg_dir') . 'M_Other', 'ot');
    	// $this->data['data_tables'] = $this->me->get_data_mapping();

        $this->output('examination_management/v_RegisterSubjectexam');
    }
  
  	public function saveRegistration(){
  		$arrayName = array(
  			'pAction' => 'INSERT', 
  			'pStudentID' => $this->session->userdata('student_ID'), 
  			'pContactID' => $this->session->userdata('contact_ID'),
  			'pRegID' => '', 
  			'pTypeID' => '', 
  			'pSubID' => $this->input->post('SubID'), 
  			'pLocID' => '', 
  			'pLocSeqNo' => '', 
  			'pReqDescrp' => 'save registration', 
  			'pUser' => $this->session->userdata('first_name').' '.$this->session->userdata('last_name'), 
  			);
  		// $this->db->query( 'CALL spRegistration(?,?,?,?,?,?,?,?,?,?)', array($arrayName) );
  		$sql = "CALL spRegistration(?,?,?,?,?,?,?,?,?,?)";
  // 		$sql = "CALL spRegistration(".'INSERT'.", ".$this->session->userdata('student_ID').", ".$this->session->userdata('contactID').", ".''.", ".''.", ".$this->session->userdata('SubID').", ".''.", ".''.", ".'save registration'.", ".$this->session->userdata('first_name').' '.$this->session->userdata('last_name').")";
		$this->db->query($sql,$arrayName);
  		// $this->db->call_function('spRegistration', $arrayName);
  		// clean_mysqli_connection($this->db->conn_id);
  		redirect($this->config->item('exam_dir') . 'Register/Select_Subject');
  		// $this->output($this->config->item('exam_dir') . 'Register/' . 'Select_Subject');
  	}
}