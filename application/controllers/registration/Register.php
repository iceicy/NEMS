<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once dirname(__FILE__).'/../NEMsAuth_Controller.php';
/*require_once('../NEMs_Controller.php');*/

class Register extends NEMsAuth_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function form()
    {
        //$this->_print($this->session->userdata());
        $arruser = array();
        if ($this->session->userdata('user_name')) {
            $student_ID = $this->session->userdata('user_name');
            $sql = " SELECT T2.student_ID,T2.gender,T2.title,T2.first_name,T2.last_name,T2.DOB,T2.student_pic
                  ,T4.*,T3.*
                  FROM tb_user_login T1
                  LEFT JOIN tb_student T2 ON T1.user_name = T2.student_ID
                  LEFT JOIN tb_contact T4 ON T1.user_name = T4.contact_ID
                  LEFT JOIN tb_address T3 ON T1.user_name = T3.citizen_ID
                  WHERE T1.user_name = '".trim($student_ID)."' AND T1.account_status = 'Activated'";
          //echo $sql;
          //INNER JOIN tb_address T3 ON T1.user_name = T3.citizen_ID
          //INNER JOIN tb_province T5 ON T3.tb_province_province_ID = T3.province_ID
          $query = $this->db->query($sql);
            $row = $query->row();
            if (isset($row)) {
                $arruser = json_decode(json_encode($row), true);
            }
        }
        //$this->_print($arruser);
        $this->data['head_name'] = 'Profile';
        $this->data['mode'] = 'edit';
        $this->data['n_controler'] = 'register';
        $this->data['mdata'] = $arruser;
        $this->output('registration/register/form', $this->data);
    }

    /* === function save profile === */
    public function saveaction()
    {
        $student_ID = $email = '';
        $student = $user = $contact = $address = array();
        $student = $this->input->post('student');
        $contact = $this->input->post('contact');
        $address = $this->input->post('field');
        $user = $this->input->post('user');
        $student_ID = $student['student_ID'];
        $email = $contact['e-mail'];
        //$this->_print($this->input->post('student'));
        //$this->_print($_FILES);
        //if (!empty($_FILES['field']['name']['pic'])) {
        //}
        if ($student_ID && $email) {
            $u_time = date('Y-m-d H:i:s');
            if ($user) {
                // tb_user_login
                /*$user['user_name'] = $student_ID;
                $user['password'] = md5($user['password']);
                $user['account_status'] = 'To Be Confirm';
                $user['create_date'] = $u_time;
                $this->db->insert('tb_user_login', $user);*/
            }
            if ($contact) {
                //tb_contact
                $this->db->where('contact_ID', $student_ID);
                $this->db->update('tb_contact', $contact);
            }
            if ($address) {
                //tb_address
                $this->db->where('citizen_ID', $student_ID);
                $this->db->update('tb_address', $address);
            }
            if ($student) {
                //tb_student
                if (!empty($_FILES['field']['name']['pic'])) {
                }
                $student['created_date'] = $u_time;
                $this->db->where('student_ID', $student_ID);
                $this->db->update('tb_student', $student);
            }
            // set data session
            $arruser = array();
            $arruser = $this->getdatauser($student_ID);
            $this->session->set_userdata($arruser);
        }
        redirect(site_url('registration/register/form'), 'refresh');
    }

    public function getdatauser($student_ID)
    {
        $arruser = array();
        if ($student_ID) {
            $sql = " SELECT T1.user_name,T1.GroupID,T1.account_status
                    ,T2.student_ID,T2.gender,T2.title,T2.first_name,T2.last_name,T2.DOB,T2.student_pic
                    ,T4.*,T3.*
                    FROM tb_user_login T1
                    LEFT JOIN tb_student T2 ON T1.user_name = T2.student_ID
                    LEFT JOIN tb_contact T4 ON T1.user_name = T4.contact_ID
                    LEFT JOIN tb_address T3 ON T1.user_name = T3.citizen_ID
                    WHERE T1.user_name = '".trim($student_ID)."'";
            //echo $sql;
            //INNER JOIN tb_address T3 ON T1.user_name = T3.citizen_ID
            //INNER JOIN tb_province T5 ON T3.tb_province_province_ID = T3.province_ID
            $query = $this->db->query($sql);
            $row = $query->row();
            if (isset($row)) {
                $arruser = json_decode(json_encode($row), true);
            }
        }

        return $arruser;
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
