<?php
/**
 * User: Developer Jirayus
 * Date: 6/5/2560
 * Time: 5:03
 */

include_once('Logistics_Controllers.php');

class Report_Logistics extends Logistics_Controllers
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->output($this->config->item('lg_dir').'report/v_main');
    }
}