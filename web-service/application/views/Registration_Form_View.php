<?php 
	if (isset($this->session->userdata['logged_in'])) {
		header("location: " . base_url());
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
	/* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
        background-color: #000000;
        margin-bottom: 0;
        border-radius: 0;
    }

    
    /* Add a gray background color and some padding to the footer */
    footer {
        background-color: #f2f2f2;
        padding: 25px;
    }
    
    .carousel-inner img {
        -webkit-filter: grayscale(10%);
        filter: grayscale(10%); /* make all photos black and white */ 
        width: 100%;

        margin: auto;
        
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
        .carousel-caption {
        display: none; 
        }
    }

    /* Black buttons with extra padding and without rounded borders */
    .btn {
        padding: 10px 20px;
        background-color: #333;
        color: #f1f1f1;
        border-radius: 0;
        transition: .2s;
    }

    /* On hover, the color of .btn will transition to white with black text */
    .btn:hover, .btn:focus {
        border: 1px solid #333;
        background-color: #fff;
        color: #000;
    }

    .col-sm-4 {

    width: 20%;
    }
    .col-centered{
    display: block;
    margin-left: 10%;
    margin-right: auto;
    text-align: center;
    }

    .Rank-topic {
    background-color: #000000; 
    color: #FFFFFF;
    }

    .goldrank {
    background-color: #ffd700;
    }

    .silverrank {
    background-color: #c0c0c0;

    }

    .bronzerank {
    background-color: #cd7f32;
    }

    </style>
</head>
<body>
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">BabyEnglish</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($this->session->userdata['logged_in'])) { ?>
                <li><a href="<?php echo base_url() . "user_authentication/register";?>"><span class="glyphicon glyphicon-edit"></span> Register</a></li>
                <li><a href="<?php echo base_url() . "user_authentication/login"; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php }else {?>
                <li><a href="#"><span class="glyphicon glyphicon-edit"></span><?php echo $username ?></a></li>
                <li><a href="<?php echo base_url() . "user_authentication/logout"; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php } ?>
            </ul>
            </div>
        </div>
    </nav>

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