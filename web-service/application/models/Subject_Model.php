<?php
class Subject_Model extends CI_Model {
	
	public function list_all_subject(){
		$result = $this->db->get('subject');
		return $result->result_array();
	}

	public function get_subject_by_id($id){
		$this->db->where('subject_id',$id);
		$result = $this->db->get('quiz');
		return $result->result_array();
	}
}