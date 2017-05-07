<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once dirname(__FILE__).'/../NEMs_Controller.php';

class Singup extends NEMs_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function register()
    {
        $this->data['head_name'] = 'Register';
        $this->data['mode'] = 'new';
        $this->data['n_controler'] = 'singup';
        $this->data['mdata'] = array();
        $this->load->view('registration/singup', $this->data);
    }

    /* === function save profile === */
    public function saveaction()
    {
        //  $this->data['head_name'] = 'Activation';
        //$this->_print($this->input->post());
        //exit;
        //$this->_print($_FILES);
        $student_ID = $email = '';
        $student = $user = $contact = $address = array();
        $student = $this->input->post('student');
        $contact = $this->input->post('contact');
        $address = $this->input->post('field');
        $user = $this->input->post('user');
        $student_ID = $student['student_ID'];
        $email = $contact['e-mail'];

        if ($student_ID && $email) {
            // Random confirmation code
            $message = '';
            $verify = array();
            $confirm_code = md5(uniqid(rand()));
            $u_time = date('Y-m-d H:i:s');
            if ($user) {
                // tb_user_login
                $user['user_name'] = $student_ID;
                $user['password'] = md5($user['password']);
                $user['account_status'] = 'Activated'; //'To Be Confirm';// Fix for test
                $user['create_date'] = $u_time;
                $this->db->insert('tb_user_login', $user);
              //tb_temp_verify_user

                $verify['confirm_code'] = $confirm_code;
                $verify['student_ID'] = $student_ID;
                $verify['email'] = $email;
                $verify['created_date'] = $u_time;
                //$this->db->insert('tb_temp_verify_user', $verify); // Fix For test
            }
            if ($contact) {
                //tb_contact
                $contact['contact_ID'] = $student_ID;
                $this->db->insert('tb_contact', $contact);
            }
            if ($address) {
                //tb_address
                $address['citizen_ID'] = $student_ID;
                $address['tb_province_province_ID'] = '100101'; //Fix For test
                $this->db->insert('tb_address', $address);
            }
            if ($student) {
                //tb_student
                if (!empty($_FILES['field']['name']['pic'])) {
                }
                $student['student_pic'] = '';
                $student['created_date'] = $u_time;
                $student['tb_contact_contact_ID'] = $student_ID;
                $student['tb_address_citizen_ID'] = $student_ID;
                $this->db->insert('tb_student', $student);
            }
            // send mail Activation
            $verify['subject'] = 'Activation Code For NEMs';
            $message = "Activation Code For Nems \r\n";
            $message .= "Click on this link to activate your account \r\n";
            $message .= "<a href='".site_url().'/registration/singup/confirmation?passkey='.$confirm_code."'> : Activate</a>";
            $verify['message'] = $message;
            //$this->send_email($verify);//Fix For test
            $this->data['st_ck'] = 'wait_confirm';
            $this->load->view('registration/activation', $this->data);
        }
    }
    public function send_email($verify)
    {
        include 'SendMail.php';
        $mail = new SendMail();
        $mail->send_email($verify);
    }

    // check dup student_ID
    public function callback_check_id()
    {
        $student_ID = $this->input->post('id');
        $m_mode = $this->input->post('mode');
        $ckdup = false;
        if ($m_mode == 'edit' && $this->session->userdata('user_name') == trim($student_ID)) {
            $ckdup = false;
        } else {
            $sql = "SELECT user_name FROM tb_user_login WHERE user_name = '".trim($student_ID)."'";
          //echo $sql;
          $query = $this->db->query($sql);
            $row = $query->row();
            if (isset($row)) {
                //echo $row->user_name;
              $ckdup = true; // dup
            } else {
                $ckdup = false;
            }
        }
        //echo $ckdup;
        $data['ck_dup'] = $ckdup;
        echo json_encode($data);
    }

    // check dup mail
    public function callback_check_mail()
    {
        $email = $this->input->post('email');
        $m_mode = $this->input->post('mode');
        $ckdup = false;
        //$this->_print($this->session->userdata());
        if ($m_mode == 'edit' && $this->session->userdata('e_mail') == trim($email)) {
            $ckdup = false;
        } else {
            $sql = "SELECT `e-mail` FROM tb_contact WHERE `e-mail` = '".trim($email)."'";
        //echo $sql;
        $query = $this->db->query($sql);
            $row = $query->row();
            if (isset($row)) {
                $ckdup = true;
            } else {
                $ckdup = false;
            }
        }
        //echo $ckdup;
        $data['ck_dup'] = $ckdup;
        echo json_encode($data);
    }

    public function confirmation()
    {
        $passkey = '';
        $passkey = $this->input->get('passkey');
        //$this->_print($passkey);
        if ($passkey) {
            $ck = true;
            $u_time = date('Y-m-d H:i:s');
            $sql = "SELECT student_ID FROM tb_temp_verify_user WHERE confirm_code = '".trim($passkey)."'";
            $query = $this->db->query($sql);
            //echo $sql;
            $row = $query->row();
            if (isset($row)) {
                //echo $row->student_ID;
                // Activated user
                $sql = "UPDATE tb_user_login SET account_status = 'Activated',update_date = '".$u_time."' WHERE user_name = '".trim($row->student_ID)."'";
                $this->db->query($sql);
                // Delete temp verify  user
                $sql = "DELETE FROM tb_temp_verify_user WHERE confirm_code = '".trim($passkey)."'";
                $this->db->query($sql);
                $ck = true;
            } else {
                $ck = false;
            }
            $this->data['st_ck'] = ($ck == true) ? 'activated' : 'error';
            $this->load->view('registration/activation', $this->data);
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
