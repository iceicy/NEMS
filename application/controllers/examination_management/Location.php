<?php
/**
 * Created by PhpStorm.
 * User: Natee
 * Date: 7/4/2560
 * Time: 21:31 น.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/../NEMs_Controller.php';

Class location extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function LocationManagement(){
        $this->output('examination_management/v_LocationManagement');
    }
    

}