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
        //$this->_db = $this->load->database('default', true);
    }

    public function form()
    {
        $this->data['head_name'] = 'Profile';
        $this->data['mode'] = 'edit';
        $this->data['n_controler'] = 'register';
        $this->output('registration/register/form', $this->data);
    }

    /* === function save profile === */
    public function saveaction()
    {
        $this->data['head_name'] = 'Profile';
        $this->data['mode'] = 'edit';
        $this->data['n_controler'] = 'register';
        $this->_print($this->input->post('student'));
        //$ck = $this->callback_check_mail($this->input->post('field[email]'));
        /*if ($ck == false) { // check mail
            $this->data['err_msg'] = '<small class="text-danger">E-mail is already in use !!</small>';
            $this->output('registration/register/form', $this->data);
        } else { // save update insert*/
        $this->_print($_FILES);
        if (!empty($_FILES['field']['name']['pic'])) {
        }
        $this->data['err_msg'] = '';
        //$this->send_email();
        $this->output('registration/register/form', $this->data);
    }

    // check dup student_ID
    public function callback_check_id()
    {
        $student_ID = $this->input->post('id');
        $ckdup = false;
        $sql = "SELECT user_name FROM tb_user_login WHERE user_name = '".trim($student_ID)."'";
        //echo $sql;
        $query = $this->db->query($sql);
        $row = $query->row();
        if (isset($row)) {
            echo $row->user_name;
            $ckdup = true;
        } else {
            $ckdup = false;
        }
        //echo $ckdup;
        $data['ck_dup'] = $ckdup;
        echo json_encode($data);
    }

    // check dup mail
    public function callback_check_mail()
    {
        $email = $this->input->post('email');
        $ckdup = false;
        if ($email == 'dogie.joy@gmail.com') {
            $ckdup = true;
        } else {
            $ckdup = false;
        }
        //echo $ckdup;
        $data['ck_dup'] = $ckdup;
        echo json_encode($data);
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
