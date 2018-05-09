<?php
class Login_Model extends CI_Model {

    public function registration_insert(){

        // Query to check whether username already exist or not
        $salt = 'sfretb470gjnbdvv8gout8rod4waqxbd';
        $password = $this->input->post('password');
        $hash_password = hash_hmac('sha256',$password,$salt);

        $data = array(
            'member_username' => htmlspecialchars($this->input->post('username')),
            'member_email' => htmlspecialchars($this->input->post('email_value')),
            'member_fname' => htmlspecialchars($this->input->post('firstname')),
            'member_lname' => htmlspecialchars($this->input->post('lastname')),
            'member_password' => $hash_password
        );
        $condition = "member_username =" . "'" . $data['member_username'] . "'";
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            // Query to insert data in database
            $this->db->insert('member', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function login_database(){

        $salt = 'sfretb470gjnbdvv8gout8rod4waqxbd';
        $password = $this->input->post('password');
        $hash_password = hash_hmac('sha256',$password,$salt);

        $data = array(
            'member_username' => htmlspecialchars($this->input->post('username')),
            'member_password' => $hash_password
        );
        //echo $data['member_username'];
        //echo $data['member_password'];
        //member_username = 'JameDy' AND member_password = 'e7856a69442c80451de5635697947535c3b36af8b724fd168b040f9083fcda92'
        //$condition = "member_username =" . "'" . $data['member_username'] . "'";
        $condition = "member_username =" . "'" . $data['member_username'] . "' AND " . "member_password =" . "'" . $data['member_password'] . "'";
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
        
    }

    public function read_user_information($username) {

        $condition = "member_username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where($condition);
        $this->db->limit(1);
        $result = $this->db->get();
    
        if ($result->num_rows() == 1) {
            return $result->result_array();
        } else {
            return false;
        }
    }

}
?>