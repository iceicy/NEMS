<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once dirname(__FILE__).'/../NEMs_Controller.php';
/*require_once('../NEMs_Controller.php');*/
///Applications/MAMP/htdocs/NEMs/application/controllers/registration
class News extends NEMs_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function form()
    {
        $this->output('registration/news/form');
    }

    public function list()
    {
        $this->output('registration/news/list');
    }
    public function listview()
    {
        //$this->_print($this->session->userdata());
        $this->output('registration/news/listview');
    }
    public function _print($mval = '')
    {
        if ($mval) {
            echo '<pre>';
            print_r($mval);
            echo '</pre>';
        }
    }
}
