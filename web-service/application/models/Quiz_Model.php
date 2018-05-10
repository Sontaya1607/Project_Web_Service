<?php
class Quiz_Model extends CI_Model {
	
	public function random_exam($quiz_id){
		//echo $quiz_id;
		$numbers = range(1, 20);
		shuffle($numbers);
		//print_r ($numbers);
		for($i = 0 ; $i < 10 ; $i++){
			$number[] = $numbers[$i];
		}

		$where = "quiz_id = '$quiz_id'
		AND (exam_number = '$number[0]' OR exam_number = '$number[1]' OR exam_number = '$number[2]' 
		OR exam_number = '$number[3]' OR exam_number = '$number[4]' OR exam_number = '$number[5]' 
		OR exam_number = '$number[6]' OR exam_number = '$number[7]' OR exam_number = '$number[8]' 
		OR exam_number = '$number[9]')";

		$wheres = "quiz_id = '$quiz_id'
		AND exam_number = '1' ";

		$this->db->where($wheres);
		$result = $this->db->get('list_exam');
		return $result->result_array();
    }

    public function get_quiz_by_id($id){
		$this->db->where('quiz_id',$id);
		$result = $this->db->get('list_exam');
		return $result->result_array();
	}

	public function get_quiz_all(){
		$result = $this->db->get('quiz');
		return $result->result_array();
	}

	public function get_quiz_by_member_id($member_id){

		$query = $this->db->query("SELECT DISTINCT e.quiz_id , e.exam_number , e.exam_question
			, e.exam_answer1 , e.exam_answer2 , e.exam_answer3
			, e.exam_answer4 , e.exam_correct , e.exam_reason
			FROM exam e
			WHERE e.quiz_id IN (SELECT quiz_id FROM member_answer WHERE member_id = $member_id)");
		return $query->result_array();
	}
    
}