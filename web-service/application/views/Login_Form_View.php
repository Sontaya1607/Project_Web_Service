<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: " . base_url());
}
?>
<head>
<title>Login Form</title>

</head>
<body>

  	<?php
  		if (isset($logout_message)) {
			echo "<div class='message'>";
			echo $logout_message;
			echo "</div>";
		}
	?>
	<?php
		if (isset($message_display)) {
			echo "<center><div class='message'>";
			echo $message_display;
			echo "</div></center>";
		}
	?>

	<h2>Login Form</h2>

	<?php echo form_open(base_url().'user_authentication/login', 'style="max-width:500px;margin:auto"'); ?>
    <?php
    
		echo "<div class='error_msg'>";
		    if (isset($error_message)) {
			    echo $error_message;
		    }
        echo validation_errors();
		echo "</div>";
        // --------- username ---------
		echo "<div class='input-container'>";
		echo "<i class='fa fa-user icon' style='font-size:24px'></i>";
        
        $data = array(
			'class' => 'input-field',
			 'type' => 'text',
			 'name' => 'username',
			 'placeholder' => 'Username'
		);
        
        echo form_input($data);
		echo "</div>";
        // --------- password ---------
		echo "<div class='input-container'>";
		echo "<i class='fa fa-key icon' style='font-size:24px'></i>";
                
        $data = array(
			'class' => 'input-field',
			'type' => 'password',
		 	'name' => 'password',
		 	'placeholder' => '**********'
		);
        
        echo form_input($data);
		echo "</div>";
        // --------- login ---------
		$btn = array(
			'class' => 'btn input-field',
			'type' => 'submit',
			'name' => 'submit',
			'value' => 'Login'
		);
                        
        echo form_submit($btn);
		echo "<br>";
		echo form_close();
	?>

</body>
</html>