<?php
/**
 * User: Developer Jirayus
 * Date: 4/5/2560
 * Time: 21:48
 */
include_once('Logistics_Model.php');

Class M_picture_return_exam extends Logistics_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "picture_return_exam";
        $this->id_name = "pictureId";
    }

}