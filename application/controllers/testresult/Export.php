<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');

Class Export extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
         $this->output('testresult/v_export');
    }
}