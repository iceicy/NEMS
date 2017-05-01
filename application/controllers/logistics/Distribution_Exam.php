<?php
/**
 * User: Developer Jirayus
 * Date: 22/4/2560
 * Time: 12:28
 */


if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once(__DIR__ . '/../NEMs_Controller.php');

Class Distribution_Exam extends NEMs_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->output('logistics/distribution/v_main_distribution');
    }
}