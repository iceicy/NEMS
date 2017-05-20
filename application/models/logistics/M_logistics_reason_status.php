<?php
/**
 * User: Developer Jirayus
 * Date: 4/5/2560
 * Time: 21:48
 */
include_once('Logistics_Model.php');

Class M_logistics_reason_status extends Logistics_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "logistics_reason_status";
        $this->id_name = "reasonId";
    }

}