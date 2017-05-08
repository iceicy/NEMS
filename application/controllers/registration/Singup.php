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
        /* == get option ==*/
        $optProvince = $optDistrict = $optSubdis = array();
        $optProvince = $this->getoptprovince();
        $optDistrict = $this->getoptdistrict();
        $optSubdis = $this->getoptsubdist();
        $this->data['optProvince'] = $optProvince;
        $this->data['optDistrict'] = $optDistrict;
        $this->data['optSubdis'] = $optSubdis;
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
                $ckProID = $address;
                $tb_province_province_ID = $this->getProvinceID($ckProID);
                unset($address['province'], $address['district'], $address['sub_district'], $address['zipcode']);
                $address['tb_province_province_ID'] = $tb_province_province_ID; //Fix For test
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
    public function getProvinceID($arrCk)
    {
        $province_ID = $sql = $where = '';
        $where = "province LIKE '".$arrCk['province']."' AND district LIKE '".$arrCk['province']."'";
        $where .= " AND sub_district LIKE '".$arrCk['sub_district']."' AND zipcode = '".$arrCk['zipcode']."'";

        $sql = 'SELECT province_ID FROM tb_province WHERE '.$where;
      //echo $sql;
      $query = $this->db->query($sql);
        $row = $query->row();
        if (isset($row)) {
            $province_ID = $row->province_ID;
        }

        return $province_ID;
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

    public function getoptprovince()
    {
        $optProvince = array();
        $sql = '';
        $sql = ' SELECT province FROM tb_province GROUP BY `province` ORDER BY `province` ASC ';
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            if ($row['province']) {
                $optProvince[$row['province']] = $row['province'];
            }
        }

        return $optProvince;
    }
    public function getoptdistrict($province = '')
    {
        /* == get option ==*/
        $optDistrict = array();
        $where = $sql = '';
        if ($province) {
            $where = " AND province LIKE '".$province."'";
        }
        $sql = ' SELECT district FROM tb_province WHERE 1 '.$where.' GROUP BY `district` ORDER BY `district` ASC ';
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            if ($row['district']) {
                $optDistrict[$row['district']] = $row['district'];
            }
        }

        return $optDistrict;
    }
    public function getoptsubdist($province = '', $district = '')
    {
        $optSubdis = array();
        $where = $sql = '';
        if ($province) {
            $where = " AND province LIKE '".$province."'";
        }
        if ($district) {
            $where .= " AND district LIKE '".$district."'";
        }
        $sql = ' SELECT sub_district FROM tb_province WHERE 1 '.$where.' GROUP BY `sub_district` ORDER BY `sub_district` ASC ';
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            if ($row['sub_district']) {
                $optSubdis[$row['sub_district']] = $row['sub_district'];
            }
        }

        return $optSubdis;
    }
    // render option District
    public function renderOptDistrict()
    {
        $optDistrict = array();
        $province = '';
        $province = $this->input->post('province');
        $optDistrict = $this->getoptdistrict($province);
        //echo $ckdup;
        $data['opt_data'] = $optDistrict;
        echo json_encode($data);
    }
    // render option sub District
    public function renderOptsubDistrict()
    {
        $opt = array();
        $province = $district = $where = $zipcode = '';
        $province = $this->input->post('province');
        $district = $this->input->post('district');
        $opt = $this->getoptsubdist($province, $district);
        //echo $ckdup;
        if ($province && $district) {
            $where = " AND province LIKE '".$province."' AND district LIKE '".$district."'";
            $sql = ' SELECT zipcode FROM tb_province WHERE 1 '.$where.' GROUP BY `zipcode` ORDER BY `zipcode` ASC ';
            $query = $this->db->query($sql);
            $row = $query->row();
            if (isset($row)) {
                $zipcode = $row->zipcode;
            }
        }
        $data['opt_data'] = $opt;
        $data['zipcode'] = $zipcode;
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
