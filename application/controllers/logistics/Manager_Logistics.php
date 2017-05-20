<?php
/**
 * User: Developer Jirayus
 * Date: 6/5/2560
 * Time: 5:03
 */
include_once('Logistics_Controllers.php');

Class Manager_Logistics extends Logistics_Controllers
{
    function __construct()
    {
        parent::__construct();
    }

    function main()
    {
        $this->load->model($this->config->item('lg_dir') . 'M_Other', 'ot');
        $this->load->model($this->config->item('lg_dir') . 'M_mapping_exam', 'me');

        $this->data['op_year'] = $this->ot->get_option_year();

        $this->data['op_typeexam'] = $this->ot->get_option_typeexam();

        $this->data['header_name'] = "การกระจายข้อสอบ";

        $this->data['val_year'] = date('Y');
        $this->data['val_typeexam'] = key($this->data['op_typeexam']);

        if($this->input->post('Year') != "" )
        {

        }
        if($this->input->post('TypeExam') != "")
        {

        }

        $this->output($this->config->item('lg_dir') . 'manage_logistics/' . 'v_main');
    }

    function lc2ec()
    {
        $this->load->model($this->config->item('lg_dir') . 'M_Other', 'ot');

        $this->data['op_year'] = $this->ot->get_option_year();
        $this->data['op_location'] = $this->ot->get_option_location();


        $this->output($this->config->item('lg_dir') . 'manage_logistics/v_lc2ec');
    }

    function lc2ec_action()
    {
        $this->load->library('MY_upload');
        //PHP
        //Configure upload.
        $this->upload->initialize(array(
            "upload_path" => "uploads/logistics_picture/"
        ));

        //Perform upload.
        if ($this->upload->do_multi_upload("files")) {
            //Code to run upon successful upload.
        }

    }

    function confirm_from_lc()
    {
        $this->output($this->config->item('lg_dir') . 'manage_logistics/v_cflc');
    }

    function ec2lc()
    {
        $this->output($this->config->item('lg_dir') . 'manage_logistics/v_ec2lc');
    }

    function confirm_from_ec()
    {
        $this->output($this->config->item('lg_dir') . 'manage_logistics/cfec');
    }
}