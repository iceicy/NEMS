<?php
/**
 * User: Developer Jirayus
 * Date: 6/5/2560
 * Time: 14:54
 */
include_once('Logistics_Model.php');

Class M_Other extends Logistics_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_option_location()
    {
        $this->table = "Location";
        $data = $this->get_all(true);

        $opt = array();
        foreach ($data as $key => $value) {
            $opt[$value->LocID . '|' . $value->LocSeqNo] = $value->LocName;
        }
        if (count($opt) > 0) {
            return $opt;
        } else {
            return null;
        }
    }

    function get_option_subject()
    {
        $this->table="Subject";
        return $this->get_option('SubID','SubName');
    }

    function get_option_typeexam()
    {
        $this->table="TypeExam";
        $data = $this->get_all(true);

        $opt = array();
        foreach ($data as $key => $value) {
            $opt[$value->TypeID] = $value->TypeName.' (ปี '.($value->Year+543).' เทอม '.$value->Term.')';
        }
        if (count($opt) > 0) {
            return $opt;
        } else {
            return null;
        }
    }

    function get_option_year()
    {
        $sql = "SELECT Year FROM {$this->db_name}.tb_TypeExam GROUP BY Year";

        $query = $this->db->query($sql);

        $data = $query->result();

        $opt = array();
        foreach ($data as $key => $value) {
            $opt[$value->Year] = $value->Year+543;
        }
        if (count($opt) > 0) {
            return $opt;
        } else {
            return null;
        }
    }
}