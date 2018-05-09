<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Member_Model');
		$this->load->model('Subject_Model');
		$this->load->model('Quiz_Model');
		$this->load->model('Exam_Model');
		$this->load->model('Member_Answer_Model');
		$this->load->model('List_Exam_Model');
        $this->load->model('List_Quiz_Model');
        $this->load->model('Login_Model');
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
	}

	public function register() {
        $this->load->view('Registration_Form_View');
    }

    public function new_user_registration() {
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|alpha_numeric|min_length[4]');
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean|alpha');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean|alpha');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]|max_length[25]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]|min_length[6]|max_length[25]');
        /*
        $salt = 'sfretb470gjnbdvv8gout8rod4waqxbd';
        $password = $this->input->post('password');
        $hash_password = hash_hmac('sha256',$password,$salt);
        */
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Registration_Form_View');
        }else{
            $result = $this->Login_Model->registration_insert();
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('Login_Form_View', $data);
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('Registration_Form_View', $data);
            }
        }
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_numeric|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Login_Form_View');
        }else{
            /*
            $salt = 'sfretb470gjnbdvv8gout8rod4waqxbd';
            $password = $this->input->post('password');
            $hash_password = hash_hmac('sha256',$password,$salt);
            $member_username = htmlspecialchars($this->input->post('username'));
            $member_password = $hash_password;
            $uri = 'http://13.229.115.177/api/api.php/Member/member/1';
            */

            $result = $this->Login_Model->login_database();
            if ($result == TRUE) {
                $username = $this->input->post('username');
                $data = $this->Login_Model->read_user_information($username);
                if ($data != false) {
                    
                    foreach($data as $i => $row){
                        $session_data = array(
                            'member_id' => $row['member_id'],
                            'member_username' => $row['member_username']
                        );
                    }
                    
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    /*
                    $data['subject'] = $this->Subject_Model->list_all_subject();
                    $this->load->view('Home_View',$data);
                    */
                    redirect(base_url(),'refresh');
				}
                
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('Login_Form_View', $data);
            }
        }
        
    }

    public function logout() {

        if(isset($this->session->userdata['logged_in']) ) {
            $username = $this->session->userdata['logged_in']['member_username'];
            //$this->Login_Model->logout($username);
        } else {
            redirect(base_url(),'refresh');
        }
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('Login_Form_View', $data);
    }

}
