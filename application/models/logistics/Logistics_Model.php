<?php

/**
 * User: Developer Jirayus
 * Date: 2/5/2560
 * Time: 9:43
 */
class Logistics_Model extends CI_Model
{
    protected $db;
    protected $db_name;

    public $table;
    public $id_name;

    public $last_insert_id;

    public function __construct()
    {
        $this->db = $this->load->database('default', TRUE);
        $this->db_name = $this->db->database;
    }

    public function get_all($return_result = false)
    {
        $sql = "SELECT * FROM  {$this->db_name}.{$this->config->item('perfix_db_logistics')}{$this->table}";

        $query = $this->db->query($sql);
        if ($return_result) {
            return $query->result();
        }
        return $query;
    }

    public function get_by_id($id = null, $get_only_row = true)
    {
        $sql = "SELECT * FROM {$this->db_name}.{$this->config->item('perfix_db_logistics')}{$this->table}
                WHERE {$this->id_name} = ?";
        $query = $this->db->query($sql, array($id));

        if ($get_only_row) {
            return $query->row();
        }
        return $query;

    }

    public function get_option($field_value, $field_alias)
    {
        $data = $this->get_all(true);

        $opt = array();
        foreach ($data as $key => $value) {
            $opt[$value->$field_value] = $value->$field_alias;
        }
        if (count($opt) > 0) {
            return $opt;
        } else {
            return null;
        }
    }

    public function insert($data)
    {
        $this->db->insert($this->db_name . '.' . $this->config->item('perfix_db_logistics') . $this->table, $data);
        $this->last_insert_id = $this->db->insert_id();
        return $this->last_insert_id;
    }

    public function insert_multi($datas)
    {
        $this->db->insert_batch($this->db_name . '.' . $this->config->item('perfix_db_logistics') . $this->table, $datas);
    }

    public function update($id, $data)
    {
        $this->db->where($this->id_name, $id);
        $this->db->update($this->db_name . '.' . $this->config->item('perfix_db_logistics') . $this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where($this->id_name, $id);
        $this->db->delete($this->db_name . '.' . $this->config->item('perfix_db_logistics') . $this->table);
    }
}