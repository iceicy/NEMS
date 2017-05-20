<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once dirname(__FILE__).'/../NEMs_Controller.php';
/*require_once('../NEMs_Controller.php');*/

class Register extends NEMs_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function form()
    {
        $this->output('registration/register/form');
    }

    /* === function save profile === */
    public function saveaction()
    {
        $this->form_validation->set_rules('tresult_import_subject', 'เลือกรายวิชาผลคะแนนสอบ', 'required',
                  array('required' => '<small class="text-danger">กรุณาเลือก%s</small>')
        );
        //echo '<pre>';
        $this->_print($this->input->post());
        //echo '</pre>';
        $this->_print($_FILES);
        if (!empty($_FILES['field']['name']['pic'])) {
        }
        exit;
    }
    public function _print($mval = '')
    {
        if ($mval) {
            echo '<pre>';
            print_r($mval);
            echo '</pre>';
        }
    }
}
