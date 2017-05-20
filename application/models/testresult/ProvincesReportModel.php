<?php

class ProvincesReportModel extends CI_Model {

	public function getScoresProvincesAll() {
		// $this->db->select('*');
		// $this->db->from('tb_provinces_tresult');
		// $this->db->join('tb_schools_tresult', 'tb_schools_tresult.province_id = tb_provinces_tresult.province_id');
		// $this->db->group_by(array("tb_provinces_tresult.province_id"));
		// $query = $this->db->get();

		$sql = "select
		tb_provinces_tresult.province_id,
		tb_provinces_tresult.province_code,
		tb_provinces_tresult.province_name_th,
		tb_provinces_tresult.province_name_en,
		count(tb_schools_tresult.school_id) as count_school_stud_regis,
		max(tb_scores_tresult.score_point) as max_score_point,
		min(tb_scores_tresult.score_point) as min_score_point
		from tb_provinces_tresult
		inner join tb_schools_tresult on tb_schools_tresult.province_id = tb_provinces_tresult.province_id
		join tb_scores_tresult on tb_scores_tresult.school_id = tb_schools_tresult.school_id
		group by tb_provinces_tresult.province_id";

		$query = $this->db->query($sql);

		return $query->result_array();
	}


}