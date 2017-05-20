<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/../NEMs_Controller.php';

Class Import extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function ImportData(){
        $this->output('examination_management/v_importdata');
    }
  
}