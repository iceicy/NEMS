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

class NEMs_Controller extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
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

//        $this->header();
        $this->data['body'] = $this->load->view($views, $this->data, true);
        //print_r($this->data);
        $this->load->view('template/v_html_template', $this->data);
//        $this->footer();
    }
}
