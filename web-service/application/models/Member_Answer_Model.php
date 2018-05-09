<?php
class Member_Answer_Model extends CI_Model {
	// 4
	public function check_answer($quiz_id){
		for($i = 0 ; $i < 10 ; $i++){
			$exam_number[] = $this->input->post('exam_number['.$i.']');
			$ans[] = $this->input->post('answer['.$i.']');
		}

		$correct = $this->correct_by_quiz_id($quiz_id);

		foreach ($correct as $j => $row) {
			for($i = 0 ; $i < 10 ; $i++){
				if($exam_number[$i] == $row['exam_number']){
					$exam_number_quiz[] = $row['exam_number'];
					$exam_correct[] = $row['exam_correct'];
				}
			}
		}

		$score = 0;
		for($i = 0 ; $i < 10 ; $i++){
			for($j = 0 ; $j < 10 ; $j++){
				if($exam_number[$i] == $exam_number_quiz[$j]){
					if($ans[$i] == $exam_correct[$j]){
						$score += 1;
					}

					$result[] = array(
						'quiz_id' => $quiz_id,
						'exam_number' => $exam_number[$i],
						'answer' => $ans[$i],
						'exam_correct' => $exam_correct[$j],
						'score' => $score
					);

				}
			}
		}
		return $result;
	}
	// 5
	public function correct_by_quiz_id($quiz_id){
		$this->db->where('quiz_id',$quiz_id);
		$result = $this->db->get('list_exam');
		return $result->result_array();
	}
	// 1
	public function insert_data_exam_by_member($data,$member_id){
		foreach($data as $i => $value){
			$result[] = array(
				'member_id' => $member_id,
				'quiz_id' => $value['quiz_id'],
				'exam_number' => $value['exam_number'],
				'member_answer' => $value['answer'],
				'exam_correct' => $value['exam_correct'],
				'score' => $value['score']
			);
		}
		
		foreach($result as $i => $value){
			$this->db->insert('member_answer',$result[$i]);
		}
		
		return $value['score'];
	}
	// 2
	public function ranking($member_id,$quiz_id,$score){

		$result = $this->db->get('ranking');
		if($result->num_rows() == 0){
			$data = array(
				'member_id' => $member_id,
				'quiz_id' => $quiz_id,
				'score' => $score
			);
			$this->db->insert('ranking',$data);
			return $score;

		}else{
			$this->db->where('member_id',$member_id);
			$this->db->where('quiz_id',$quiz_id);
			$result = $this->db->get('ranking');
			$result = $result->result_array();

			foreach($result as $row){
				if($score > $row['score']){
					$in = $score;
				}else if($score < $row['score']){
					$in = $row['score'];
				}else{
					$in = $row['score'];
				}
			}
			
			$data = array(
				'score' => $in
			);
			$this->db->where('member_id',$member_id);
			$this->db->where('quiz_id',$quiz_id);
			$this->db->update('ranking',$data);
			
			return $in;
		}
		
	}
	// 3
	public function insert_data_exam_by_user($data){
		
		foreach($data as $i => $value){		
			$result = array(
				'quiz_id' => $value['quiz_id'],
				'score' => $value['score']
			);
			$score = $value['score'];
		}
		$this->db->insert('user',$result);

		return $score;

	}

}