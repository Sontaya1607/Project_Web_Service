<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
        $this->load->helper('security');
	}
	public function index()
	{
		/*
		//$this->load->view('welcome_message');
		// ------- list_all_member -------
		$data['member'] = $this->Member_Model->list_all_member();
		$this->load->view('Data_Member_View',$data);

		// ------- list_all_subject -------
		$data['subject'] = $this->Subject_Model->list_all_subject();
		$this->load->view('Data_Subject_View',$data);
		
		// ------- list_all_quiz -------
		$data['quiz'] = $this->Quiz_Model->list_all_quiz();
		$this->load->view('Data_Quiz_View',$data);
		
		// ------- list_all_exam -------
		$data['exam'] = $this->Exam_Model->list_all_exam();
		$this->load->view('Data_Exam_View',$data);
		
		// ------- list_all_member_answer -------
		$data['member_answer'] = $this->Member_Answer_Model->list_all_member_answer();
		$this->load->view('Data_Member_Answer_View',$data);
		
		// ------- list_all_view_list_exam -------
		$data['list_exam'] = $this->List_Exam_Model->list_all_list_exam();
		$this->load->view('Data_List_Exam_View',$data);
		
		// ------- list_all_view_list_quiz -------
		$data['list_quiz'] = $this->List_Quiz_Model->list_all_list_quiz();
		$this->load->view('Data_List_Quiz_View',$data);
		*/

		// ------- home -------
		$url = 'http://13.229.115.177/api/api.php/Subject/subjects';

		$subject_json = file_get_contents($url);
		$subject_array = json_decode($subject_json, true);
		/*
		foreach($subject_array['result'] as $i => $row) {
			$dataapi[] = $row['subject_name'];
			//echo $i;
			//echo "BOOK_ID: " . $row['subject_id'] . "<br>" .
		 	//"BOOK_CATEGORY: " . $row['subject_name'] . "<br><hr>";
		}
		*/
		//print_r($dataapi);
		//echo $dataapi[0];
		$data['api'] = $subject_array['result'];
		$data['subject'] = $this->Subject_Model->list_all_subject();
		$this->load->view('Home_View',$data);

	}
	

}
