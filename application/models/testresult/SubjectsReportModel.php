<?php

class SubjectsReportModel extends CI_Model {

	public function getSubjectAll() {
		return $this->db->get('tb_subjects_tresult')->result_array();
	}


}