<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/../NEMs_Controller.php';

Class subject extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function Addsubject(){
        $this->output('examination_management/v_addSubject');
    }
    public function Editsubject(){
        $this->output('examination_management/v_editSubject');
    }
    public function Deletesubject(){
        $this->output('examination_management/v_delSubject');
    }

}