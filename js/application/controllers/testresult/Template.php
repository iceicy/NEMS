<?php
/**
 * Created by PhpStorm.
 * User: jirayus
 * Date: 9/2/2560
 * Time: 21:31 น.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');

Class Template extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->output('testresult/template');
    }
}