<?php
class Exam_Model extends CI_Model {
	
	public function list_all_exam(){
		$result = $this->db->get('exam');
		return $result->result_array();
	}
}