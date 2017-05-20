<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/../NEMs_Controller.php';

Class Export extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function ExportData(){
        $this->output('examination_management/v_exportdata');
    }
  
}