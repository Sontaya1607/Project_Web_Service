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
		//$this->form_validation->set_rules('answer['.'0'.']', 'answer'.'0', 'required');
		/*
		$this->form_validation->set_rules('answer[0]', 'answer0', 'required');
		if($quiz_id = $this->uri->segment(3)){
			$data['subject'] = $this->Quiz_Model->random_exam($quiz_id);
			
			print_r ($data);
			//echo $data['subject'][0]['subject_id']['subject_name']['quiz_id'];
			echo '<br>';
			echo $data['subject'][0]['subject_id'];
			echo $data['subject'][0]['exam_question'];
			/*
			if($this->form_validation->run() == FALSE){
				//$quiz_id = $this->uri->segment(3);
				//$data['subject'] = $this->Quiz_Model->random_exam($quiz_id);
				$this->load->view('Exam_View',$data);
				//return false;
			}else if($this->input->post('Submit') != NULL){
				
			}else{
				//$data['subjects'] = $data['subject'];
				$this->load->view('Exam_View',$data);
			} 
			
		}
		*/
		//test data exam
		/*
		for($i = 1; $i<=20; $i++){
			$this->form_validation->set_rules('answer['.$i.']', 'answer'.$i, 'required');
		}
		
		if($quiz_id = $this->uri->segment(3)){
			if ($this->form_validation->run() == FALSE) {
				$data['quiz'] = $this->Quiz_Model->get_quiz_by_id($quiz_id);
				$this->load->view('Exam_Data_View',$data);
			}else{
				$score = $this->Member_Answer_Model->insert_member_answer();
				$subject_id = $this->Member_Answer_Model->find_subject_id();
				// score user
				//echo $subject_id;
				$data['score'] = $score;
				$data['subject_id'] = $subject_id;
				//$this->score($data);
				$this->load->view('Score_Member_View',$data);
				//redirect(base_url().'Examination/score');
				$this->Member_Answer_Model->ranking();
			}

		}else if($this->uri->segment(3) == 0){
			redirect(base_url(),'refresh');
		}
		*/

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
					$member_id = ($this->session->userdata['logged_in']['member_id']);
					//$username = ($this->session->userdata['logged_in']['member_username']);
					$score = $this->Member_Answer_Model->insert_data_exam_by_member($data,$member_id);
					$data['score'] = $this->Member_Answer_Model->ranking($member_id,$quiz_id,$score);
					$data['quiz_id'] = $quiz_id;
					$this->load->view('Score_Member_View',$data);
					//redirect(base_url().'Examination/score');
				}else{
					$score = $this->Member_Answer_Model->insert_data_exam_by_user($data);
					echo $score;
					$data['quiz_id'] = $quiz_id;
					$data['score'] = $score;
					$this->load->view('Score_Member_View',$data);

				}
					
			}else{
				$url = 'http://13.229.115.177/api/api.php/Exam/quiz/'.$quiz_id.'/exam';

				$subject_json = file_get_contents($url);
				$subject_array = json_decode($subject_json, true);

				$data['api'] = $subject_array['result'];
				/*
				foreach($subject_array['result'] as $i => $row) {
					//$dataapi[] = $row['subject_name'];
					echo $i;
					echo "BOOK_ID: " . $row['quiz_id'] . "<br>" .
				 	"BOOK_CATEGORY: " . $row['exam_number'] . "<br><hr>";
				}
				*/
				$data['quiz'] = $this->Quiz_Model->get_quiz_by_id($quiz_id);
				$data['number'] = $number2;
				$this->load->view('Exam_Data_View',$data);
			}
			
		}

		
	}
	
	public function ranking() {
		$url = 'http://13.229.115.177/api/api.php/Ranking/rankings';	
		
		//if($subject_array['result'] != ""){
			//echo "Not Empty";
			//$subject_json = file_get_contents($url);
			//$subject_array = json_decode($subject_json, true);
			//$data['api'] = $subject_array['result'];
	//	} else {
      // echo "Empty";
    //}

		

		$uri = 'http://13.229.115.177/api/api.php/Quiz/quizs';
		$subject_json1 = file_get_contents($uri);
		$subject_array1 = json_decode($subject_json1, true);

		$data['api_quiz'] = $subject_array1['result'];

		
		$this->load->view('Ranking_View',$data);
	}
	
}
