<?php
class List_Quiz_Model extends CI_Model {
	
	public function list_all_list_quiz(){
		$result = $this->db->get('list_quiz');
		return $result->result_array();
	}
}