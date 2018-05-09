<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: " . base_url());
}
?>
<head>
	<title>Login Form</title>
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