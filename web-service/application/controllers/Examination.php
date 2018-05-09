<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Member_Model');
		$this->load->model('Subject_Model');
		$this->load->model('Quiz_Model');
		$this->load->model('Exam_Model');
		$this->load->model('Member_Answer_Model');
		$this->load->model('List_Exam_Model');
		$this->load->model('List_Quiz_Model');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	public function subject(){
		$url = 'http://13.229.115.177/api/api.php/Subject/subjects';

		$subject_json = file_get_contents($url);
		$subject_array = json_decode($subject_json, true);

		$data['api'] = $subject_array['result'];
		$this->load->view('Subject_View',$data);
	}

	public function examination(){
		$id = $this->uri->segment(3);
		$url = 'http://13.229.115.177/api/api.php/Quiz/quiz/'. $id;

		$subject_json = file_get_contents($url);
		$subject_array = json_decode($subject_json, true);

		$data['api'] = $subject_array['result'];
		$data['subject'] = $this->Subject_Model->get_subject_by_id($id);
		$this->load->view('Quiz_View',$data);
	}

	public function doexam(){

		if($quiz_id = $this->uri->segment(3)){
			$number = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
			$co = count($number);
			
			$number2 = array();

			for($i = 0 ; $i >= 0 ;$i++){
				//echo $number[$i];
				$co2 = count($number2);
				if($co2 == 10){
					break;
				}
				$count = 0;
				$random = random_int(1, 20);
				for($j = 0 ; $j < $co2 ; $j++){
					if($number2[$j] == $random){
						$count++;
						//echo $count;
					}
				}
				if($count == 0){
					array_push($number2 , $random);
				}
			}	
			
			if($this->input->post('Submit') != NULL){
				$data = $this->Member_Answer_Model->check_answer($quiz_id);
				if(isset($this->session->userdata['logged_in'])){
					// OK
					$member_id = ($this->session->userdata['logged_in']['member_id']);
					$score = $this->Member_Answer_Model->insert_data_exam_by_member($data,$member_id);
					$data['score'] = $this->Member_Answer_Model->ranking($member_id,$quiz_id,$score);
					$data['quiz_id'] = $quiz_id;
					$this->load->view('Score_Member_View',$data);
				}else{
					// OK
					$score = $this->Member_Answer_Model->insert_data_exam_by_user($data);
					$data['quiz_id'] = $quiz_id;
					$data['score'] = $score;
					$this->load->view('Score_Member_View',$data);

				}
					
			}else{
				// OK
				$url = 'http://13.229.115.177/api/api.php/Exam/quiz/'.$quiz_id.'/exam';

				$subject_json = file_get_contents($url);
				$subject_array = json_decode($subject_json, true);

				$data['api'] = $subject_array['result'];
				$data['number'] = $number2;
				$this->load->view('Exam_Data_View',$data);
			}
			
		}

		
	}
	// end 1 //
	public function ranking() {
		$url = 'http://13.229.115.177/api/api.php/Ranking/rankings';	
		
		$subject_json = file_get_contents($url);
		$subject_array = json_decode($subject_json, true);
		$data['api'] = $subject_array['result'];

		$uri = 'http://13.229.115.177/api/api.php/Quiz/quizs';
		$subject_json1 = file_get_contents($uri);
		$subject_array1 = json_decode($subject_json1, true);

		$data['api_quiz'] = $subject_array1['result'];

		$this->load->view('Ranking_View',$data);

	}

	public function answer(){
		if($quiz_id = $this->uri->segment(3)){
			if (isset($this->session->userdata['logged_in'])) {
				$id = ($this->session->userdata['logged_in']['member_id']);
				$username = ($this->session->userdata['logged_in']['member_username']);
			}
			//echo $id . ' ' . $username;

			$url = 'http://13.229.115.177/api/api.php/MemberAnswer/member/'.$id.'/quiz/'.$quiz_id.'/memanswer';
			$subject_json = file_get_contents($url);
			$subject_array = json_decode($subject_json, true);
			$data['api_memberanswer'] = $subject_array['result'];

			$uri = 'http://13.229.115.177/api/api.php/Exam/quiz/'.$quiz_id.'/exam';
			$subject_json1 = file_get_contents($uri);
			$subject_array1 = json_decode($subject_json1, true);
			$data['api_exam'] = $subject_array1['result'];

			$this->load->view('Answer_View',$data);

		}else{

		}
	}
	
}
