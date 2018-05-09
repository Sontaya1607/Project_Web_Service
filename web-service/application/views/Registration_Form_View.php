<?php 
	if (isset($this->session->userdata['logged_in'])) {
		header("location: " . base_url());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2><br>
    <?php
		echo "<div class='error_msg'>";
		echo validation_errors();
        echo "</div>";
        
		echo form_open(base_url().'user_authentication/new_user_registration');
        // --------- username ---------
        echo "<label>Username:</label>";        
        $data = array(
			'type' => 'text',
			'name' => 'username',
			'placeholder' => 'Create Username'
		);
                        
        echo form_input($data);

		echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo $message_display;
			}
	    echo "</div>";
        // --------- firstname ---------
        
        $data = array(
			'type' => 'text',
			'name' => 'firstname',
			'placeholder' => 'Firstname'
		);
        
        echo form_input($data);
        // --------- lastname ---------
                        
        $data = array(
			'type' => 'text',
			'name' => 'lastname',
			'placeholder' => 'Lastname'
		);
        
        echo form_input($data);
        // --------- email ---------
        
        $data = array(
			'type' => 'email',
			'name' => 'email_value',
			'placeholder' => 'Email'
		);
        
        echo form_input($data);
        // --------- password ---------
        
        $data = array(
			'class' => 'input-field',
		    'type' => 'password',
			'name' => 'password',
			'placeholder' => 'Password'
		);
        
        echo form_input($data);
        // --------- confirm_password ---------
        
        $data = array(
			'type' => 'password',
			'name' => 'confirm_password',
			'placeholder' => 'Confirm Password'
		);
                        
        echo form_input($data);
        // --------- submit ---------
		$btn = array(
			'type' => 'submit',
			'name' => 'submit',
			'value' => 'Sign Up'
		);
                        
        echo form_submit($btn);
        echo form_close();
	?>
</body>
</html>