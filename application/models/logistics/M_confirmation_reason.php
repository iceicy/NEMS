<?php
/**
 * User: Developer Jirayus
 * Date: 4/5/2560
 * Time: 21:48
 */
include_once('Logistics_Model.php');

Class M_confirmation_reason extends Logistics_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "confirmation_reason";
    }

}