<?php
class Member_Answer_Model extends CI_Model {

	public function checkscore_member($quiz_id,$member_id){
		for($i = 1 ; $i < 21 ; $i++){
			$ans[] = $this->input->post('answer['.$i.']');
		}
		/*
		//print_r ($ans);
		for($i = 0 ; $i < 20 ; $i++){
			echo $ans[$i] . ' ';
		}
		*/
		// เรียกใช้ correct_by_quiz_id
		$correct = $this->correct_by_quiz_id($quiz_id);
		foreach ($correct as $j => $row) {
			$data[] = $row['exam_correct'];
		}

		$score = 0;
		for($i = 0 ; $i < 20 ; $i++){
			if($ans[$i] === $data[$i]){
				$score += 1;
			}
			//need member_id , exam_number(random)
			$result[] = array(
				'member_id' => $member_id,
				'quiz_id' => $quiz_id,
				'exam_number' => $i+1,
				'member_answer' => $ans[$i],
				'exam_correct' => $data[$i],
				'score' => $score
			);
		}
		/*
		echo $score;
		print_r ($result[0]);
		foreach($result as $j => $value){
			//echo $j . ' ';
			echo $value['member_id'] . ' ';
			echo $value['exam_id'] . ' ';
			echo $value['member_answer'] . ' ';
			//echo $value['correct'] . ' ';
			echo $value['score'] . '<br>';
		}
		*/
		//print_r($data);
		return $result;
	}

	public function insert_member_answer(){
		//need member_id , exam_id
		if(isset($this->session->userdata['logged_in'])){
			$member_id = $this->session->userdata['logged_in']['member_id'];
			echo $member_id;

			$quiz_id = $this->uri->segment(3);
			$data = $this->checkscore_member($quiz_id,$member_id);

			foreach($data as $j => $value){
				//$sorce = $value['score'];
				//echo $j . ' ';
				//echo $value['member_id'] . ' ';
				//echo $value['quiz_id'] . ' ';
				//echo $value['exam_number'] . ' ';
				//echo $value['member_answer'] . ' ';
				//echo $value['exam_correct'] . ' ';
				//echo $value['score'] . '<br>';
				$this->db->insert('member_answer',$data[$j]);
			}
		
		}else{
			
			$user_username = 'unknown';
			$quiz_id = $this->uri->segment(3);
			$data = $this->checkscore_user($quiz_id,$user_username);

			foreach($data as $j => $value){
				$this->db->insert('user',$data[$j]);
			}
			
		}


		$score = $data[$j]['score'];
		return $score;
		
	}

	public function find_subject_id(){
		$quiz_id = $this->uri->segment(3);
		$data = $this->correct_by_quiz_id($quiz_id);

		foreach ($data as $row) {
			$subject_id = $row['subject_id'];
		}

		return $subject_id;
	}

	public function checkscore_user($quiz_id,$user_username){
		for($i = 1 ; $i < 21 ; $i++){
			$ans[] = $this->input->post('answer['.$i.']');
		}
		// เรียกใช้ correct_by_quiz_id
		$correct = $this->correct_by_quiz_id($quiz_id);
		foreach ($correct as $j => $row) {
			$data[] = $row['exam_correct'];
		}

		$score = 0;
		for($i = 0 ; $i < 20 ; $i++){
			if($ans[$i] === $data[$i]){
				$score += 1;
			}
			//need exam_number(random)
			$result[] = array(
				'user_username' => $user_username,
				'quiz_id' => $quiz_id,
				'exam_number' => $i+1,
				'user_answer' => $ans[$i],
				'exam_correct' => $data[$i],
				'score' => $score
			);
		}
		return $result;
	}

	public function check_answer($quiz_id){
		for($i = 0 ; $i < 10 ; $i++){
			//check exam_number , check answer
			$exam_number[] = $this->input->post('exam_number['.$i.']');
			$ans[] = $this->input->post('answer['.$i.']');
		}

		$correct = $this->correct_by_quiz_id($quiz_id);

		foreach ($correct as $j => $row) {
			for($i = 0 ; $i < 10 ; $i++){
				if($exam_number[$i] == $row['exam_number']){
					//echo $row['exam_number'] . ' ';
					//echo $row['exam_question'] . ' ';
					//echo $row['exam_correct'] . ' ';
					//echo '<br>';
					$exam_number_quiz[] = $row['exam_number'];
					$exam_correct[] = $row['exam_correct'];
				}
			}
		}

		$score = 0;
		for($i = 0 ; $i < 10 ; $i++){
			for($j = 0 ; $j < 10 ; $j++){
				if($exam_number[$i] == $exam_number_quiz[$j]){
					//echo 'ข้อที่ '. $exam_number[$i] . ' ' . $exam_number_quiz[$j] . ' ';
					if($ans[$i] == $exam_correct[$j]){
						//echo 'คำตอบที่ตรงวัน ' . $ans[$i] . ' ' . $exam_correct[$j] . ' ' . '<br>';
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
		/*
		echo '<br>';
		print_r($exam_number);
		echo '<br>';
		print_r($ans);
		echo '<br>';
		print_r($result);
		echo '<br>';
		*/
		return $result;
	}

	public function correct_by_quiz_id($quiz_id){
		$this->db->where('quiz_id',$quiz_id);
		$result = $this->db->get('list_exam');
		return $result->result_array();
	}

	public function insert_data_exam_by_member($data,$member_id){
		foreach($data as $i => $value){
			//echo $value['quiz_id'] . ' ';
			//echo $value['exam_number'] . ' ';
			//echo $value['answer'] . ' ';
			//echo $value['exam_correct'] . ' ';
			//echo $value['score'] . '<br>';
			
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
			//$this->db->insert('member_answer',$result[$i]);
		}
		
		return $value['score'];
	}

	public function get_ranking_by_id($member_id,$quiz_id){
		$this->db->where('member_id',$member_id);
		$this->db->where('quiz_id',$quiz_id);
		$result = $this->db->get('ranking');
		return $result->result_array();
	}

	public function ranking($member_id,$quiz_id,$score){

		$result = $this->db->get('ranking');
		//echo $result->num_rows();
		if($result->num_rows() == 0){
			//echo $result->num_rows();
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
				echo $row['member_id'];
				echo $row['quiz_id'];
				if($score > $row['score']){
					$in = $score;
				}else if($score < $row['score']){
					$in = $row['score'];
				}else{
					$in = $row['score'];
				}
				echo $in;
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

	public function insert_data_exam_by_user($data){
		
		foreach($data as $i => $value){		
			$result = array(
				'quiz_id' => $value['quiz_id'],
				'score' => $value['score']
			);
			$score = $value['score'];
		}
		$this->db->insert('user',$result);
		//print_r ($result);

		return $score;

	}

}