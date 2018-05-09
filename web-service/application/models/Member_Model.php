<?php
class Member_Model extends CI_Model {
	
	public function list_all_member(){
		$result = $this->db->get('member');
		return $result->result_array();
	}
}