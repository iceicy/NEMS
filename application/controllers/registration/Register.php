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
        //$this->load->helper('form');
        //$this->load->library('form_validation');
    }

    public function form()
    {
        $this->output('registration/register/form');
    }

    public function saveaction()
    {
        //echo '<pre>';
        $this->_print($this->input->post());
        //echo '</pre>';

        if (empty($_FILES['tresult_import_file']['name'])) {
            return false;
        } else {
            return true;
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
