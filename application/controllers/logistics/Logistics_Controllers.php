<?php

/**
 * User: Developer Jirayus
 * Date: 2/5/2560
 * Time: 9:20
 */
include_once(__DIR__ . '/../NEMs_Controller.php');

class Logistics_Controllers extends NEMs_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->path = "logistics/";
        $this->form = array();
        $this->table = array();
        $this->load->library('form_validation');
        $this->config->load('logistic_config');
    }
}