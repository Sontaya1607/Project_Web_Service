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
	}
	
	public function exam_view() {
		$data['list_exam'] = $this->List_Exam_Model->list_all_list_exam();
		$this->load->view('Exam_View',$data);
		echo $this->uri->segment(3);
	}
}
