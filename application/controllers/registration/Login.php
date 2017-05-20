<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        //$this->_print($this->session->userdata());
        $this->data['err_msg'] = '';
        $this->load->view('registration/login.php', $this->data);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
    public function recover()
    {
        $this->data['err_msg'] = '';
        $this->load->view('registration/recover.php', $this->data);
    }
    public function checkrecover()
    {
        $student_ID = $email = '';
        $this->data['err_msg'] = '';
        $_user = '';
        //$this->_print($this->input->post());
        $student_ID = $this->input->post('user_name');
        $email = $this->input->post('email');
        $ck = false;
        if ($student_ID && $email) {
            $sql = " SELECT T1.user_name
                    FROM tb_user_login T1
                    LEFT JOIN tb_contact T4 ON T1.user_name = T4.contact_ID
                    WHERE T1.user_name = '".trim($student_ID)."' AND T4.`e-mail` = '".$email."' AND T1.account_status = 'Activated'";
            $query = $this->db->query($sql);
            $row = $query->row();
            if (isset($row)) {
                //echo $row->user_name;
                $_user = $row->user_name; //json_decode(json_encode($row), true);
                //$this->_print($arruser);
                $ck = true; // dup
            } else {
                $ck = false;
            }
        } else {
            $ck = false;
        }
        //var_dump($ck);
        //exit;
        if ($ck == false) { // check mail
            $this->data['err_msg'] = '<small class="text-danger">Please Check ID or Email !!</small>';
            $this->load->view('registration/recover.php', $this->data);
        } else {
            $this->data['st_ck'] = 'recover';
            $npass = rand(1000, 99999999);
            $this->data['npass'] = $npass;
            $userArr = array();
            $userArr['password'] = md5($npass);
            $this->db->where('user_name', trim($student_ID));
            $this->db->update('tb_user_login', $userArr);
            $this->load->view('registration/activation', $this->data);
        }
    }
    public function checkaction()
    {
        $student_ID = $pass = '';
        $this->data['err_msg'] = '';
        $arruser = array();
        //$this->_print($this->input->post());
        $student_ID = $this->input->post('user_name');
        $pass = $this->input->post('password');
        $ck = false;
        if ($student_ID && $pass) {
            $sql = " SELECT T1.user_name,T1.GroupID,T1.account_status
                    ,T2.student_ID,T2.gender,T2.title,T2.first_name,T2.last_name,T2.DOB,T2.student_pic
                    ,T4.*
                    FROM tb_user_login T1
                    LEFT JOIN tb_student T2 ON T1.user_name = T2.student_ID
                    LEFT JOIN tb_contact T4 ON T1.user_name = T4.contact_ID
                    WHERE T1.user_name = '".trim($student_ID)."' AND T1.password = '".md5(trim($pass))."' AND T1.account_status = 'Activated'";
            //echo $sql;
            //INNER JOIN tb_address T3 ON T1.user_name = T3.citizen_ID
            //INNER JOIN tb_province T5 ON T3.tb_province_province_ID = T3.province_ID
            $query = $this->db->query($sql);
            $row = $query->row();
            if (isset($row)) {
                //echo $row->user_name;
                $arruser = json_decode(json_encode($row), true);
                //$this->_print($arruser);
                $ck = true; // dup
            } else {
                $ck = false;
            }
        } else {
            $ck = false;
        }
        //var_dump($ck);
        //exit;
        if ($ck == false) { // check mail
            $this->data['err_msg'] = '<small class="text-danger">Please Check ID or Password !!</small>';
            $this->load->view('registration/login.php', $this->data);
        } else {
            $this->session->set_userdata($arruser);
            redirect(base_url(), 'refresh');
        }
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
