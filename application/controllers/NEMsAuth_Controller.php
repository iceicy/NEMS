<?php
/**
 * Created by PhpStorm.
 * User: jirayus
 * Date: 9/2/2560
 * Time: 21:11 น.
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class NEMsAuth_Controller extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (!$this->session->userdata('user_name')) {
            redirect(site_url('registration/login'), 'refresh');
        }
        $this->data = array();
    }

    public function header()
    {
        $this->load->view('template/v_header');
    }
    public function footer()
    {
        $this->load->view('template/v_footer');
    }

    public function output($views, $data = '')
    {
        if ($data != '') {
            $this->data = array_merge($this->data, $data);
        }
        $this->data['body'] = $this->load->view($views, $this->data, true);
        $this->load->view('template/v_html_template', $this->data);
    }
}
