<?php

class IndividualsReportModel extends CI_Model {

	public function getScoresIndividuals() {
		return $this->db->get('tb_scores_tresult')->result_array();
	}


}