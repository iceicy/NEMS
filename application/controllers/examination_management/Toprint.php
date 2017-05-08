<?php
/**
 * Created by PhpStorm.
 * User: Montira
 * Date: 1/5/2560
 * Time: 12.32 AM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/../NEMs_Controller.php';

Class Toprint extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function Invoice(){
        $this->output('examination_management/v_printInvoice');
    }
    public function Examcard(){
        $this->output('examination_management/v_printExamcard');
    }


}
