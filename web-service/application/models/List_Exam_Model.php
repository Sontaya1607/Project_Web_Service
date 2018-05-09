<?php
class List_Exam_Model extends CI_Model {
	
	public function list_all_list_exam(){
		$result = $this->db->get('list_exam');
		return $result->result_array();
	}

	public function get_exam_by_id($id){
		$this->db->where('quiz_id',$id);
		$result = $this->db->get('quiz');
		return $result->result_array();
	}
}