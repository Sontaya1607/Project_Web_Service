<?php
    /* 
	if (isset($this->session->userdata['logged_in'])) {
		header("location: " . base_url());
	}
    */
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
	/* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
        background-color: #000000;
        margin-bottom: 0;
        border-radius: 0;

    }
    .navbar-brand {
        color: #FFFFFF;
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

    * {box-sizing: border-box}

    /* Add padding to containers */
    .container {
        padding: 16px;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
        background-color: #000000;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity:1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
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
                <li><a href="<?php echo base_url() . "user_authentication/register";?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <li><a href="<?php echo base_url() . "user_authentication/login"; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php }else {?>
                <li><a href="#"><span class="glyphicon glyphicon-edit"></span><?php echo $username ?></a></li>
                <li><a href="<?php echo base_url() . "user_authentication/logout"; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php } ?>
            </ul>
            </div>
        </div>
    </nav>

    <center><h1>Register</h1></center>
    <?php
		echo "<div class='error_msg'>";
		echo "<center><font  color='red' size='4'>" . validation_errors() . "</font></center>";
        echo "</div>";
        echo "<div class='container'>";
		echo form_open(base_url().'user_authentication/new_user_registration');

		echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo $message_display;
			}
	    echo "</div>";
        echo "<hr>";
        // --------- username ---------
        echo "<label for='username'><i class='fa fa-user'></i><b>   Username</b></label>";        
        $data = array(
            'type' => 'text',
            'name' => 'username',
            'placeholder' => 'Create Username'
        );
                        
        echo form_input($data);
        // --------- firstname ---------
        echo "<label for='firstname'><i class='fa fa-id-card'></i><b>   Firstname</b></label>";
        $data = array(
			'type' => 'text',
			'name' => 'firstname',
			'placeholder' => 'Firstname'
		);
        
        echo form_input($data);
        // --------- lastname ---------
        echo "<label for='lastname'><i class='fa fa-id-card'></i><b>   Lastname</b></label>";                
        $data = array(
			'type' => 'text',
			'name' => 'lastname',
			'placeholder' => 'Lastname'
		);
        
        echo form_input($data);
        // --------- email ---------
        echo "<label for='email'> <i class='fa fa-envelope'></i><b>   Email</b></label>";
        $data = array(
			'type' => 'text',
			'name' => 'email_value',
			'placeholder' => 'Email'
		);
        
        echo form_input($data);
        // --------- password ---------
        echo "<label for='psw'><i class='fa fa-lock'></i><b>   Password</b></label>";
        $data = array(
			'class' => 'input-field',
		    'type' => 'password',
			'name' => 'password',
			'placeholder' => 'Password'
		);
        
        echo form_input($data);
        // --------- confirm_password ---------
        echo "<label for='psw-repeat'><i class='fa fa-lock'></i><b>   Confirm Password</b></label>";
        $data = array(
			'type' => 'password',
			'name' => 'confirm_password',
			'placeholder' => 'Confirm Password'
		);
                        
        echo form_input($data);
        // --------- submit ---------
		$btn = array(
            'class' => 'registerbtn',
			'type' => 'submit',
			'name' => 'submit',
			'value' => 'Sign Up'
		);
        echo "<hr>";   
        echo form_submit($btn);
        echo form_close();
        echo "</div>"; 
	?>
</body>
</html>