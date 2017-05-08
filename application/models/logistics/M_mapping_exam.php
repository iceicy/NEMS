<?php
/**
 * User: Developer Jirayus
 * Date: 4/5/2560
 * Time: 21:48
 */
include_once('Logistics_Model.php');

Class M_mapping_exam extends Logistics_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "mapping_exam";
        $this->id_name = "mapId";
    }

    function get_data_mapping()
    {
        $sql = "SELECT 
                  me.mapId,
                  (me.Year+543) as Year,
                  me.GenaratorCode,
                  me.numberExam,
                  sj.SubName,
                  te.TypeName,
                  lt.LocName
                FROM {$this->db_name}.tb_mapping_exam AS me
                LEFT JOIN {$this->db_name}.tb_TypeExam AS te ON me.TypeID = te.TypeID
                LEFT JOIN {$this->db_name}.tb_Subject AS sj ON me.SubID = sj.SubID
                LEFT JOIN {$this->db_name}.tb_Location AS lt ON me.LocID = lt.LocID AND me.LocSeqNo = lt.LocSeqNo
                
                ORDER BY me.Year
                ";
        $query = $this->db->query($sql);

        return $query;
    }
}