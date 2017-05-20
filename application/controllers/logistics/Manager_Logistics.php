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
        $this->output($this->config->item('lg_dir') . 'manage_logistics/' . 'v_main');
    }

    function lc2ec()
    {
        $this->load->
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