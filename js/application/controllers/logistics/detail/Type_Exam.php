<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../../NEMs_Controller.php');

Class Type_Exam extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
         $this->output('logistics/detail/type_exam');
    }
    
}