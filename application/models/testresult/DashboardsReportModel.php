<?php

class DashboardsReportModel extends CI_Model {

	public function getTotalOfStudentsAllType() {
		$sql = "select
			count(tb_scores_tresult.type_id) as count_type_id,
			tb_exam_type_tresult.type_name as type_name
			from tb_scores_tresult
			right join tb_exam_type_tresult on tb_exam_type_tresult.type_id = tb_scores_tresult.type_id
			group by tb_scores_tresult.type_id";

		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getStudentOfSubject() {
		$sql = "select count(tb_scores_tresult.student_id) as student_id , tb_subjects_tresult.subject_name from tb_scores_tresult
				join tb_subjects_tresult on tb_subjects_tresult.subject_id = tb_scores_tresult.subject_id
				group by tb_scores_tresult.subject_id";
	
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getExamTypePerformance() {
		$sql = "select
				tb_subjects_tresult.subject_name,
				cast(AVG(tb_scores_tresult.score_point) as decimal(6, 2)) as score_point,
				concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color
				from tb_subjects_tresult
				left join tb_scores_tresult on tb_scores_tresult.subject_id = tb_subjects_tresult.subject_id
				group by tb_scores_tresult.subject_id";
	
		$query = $this->db->query($sql);
		return $query->result_array();
	}


}