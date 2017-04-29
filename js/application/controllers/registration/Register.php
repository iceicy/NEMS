<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once dirname(__FILE__).'/../NEMs_Controller.php';
/*require_once('../NEMs_Controller.php');*/

class Register extends NEMs_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function form()
    {
        $this->output('registration/register/form');
    }
}
