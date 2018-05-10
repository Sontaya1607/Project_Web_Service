<?php 
if (isset($this->session->userdata['logged_in'])) {
	$id = ($this->session->userdata['logged_in']['member_id']);
	$username = ($this->session->userdata['logged_in']['member_username']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subject</title>
	<meta charset="utf-8" />
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
  </style>
</head>
<body>
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">BabyEnglish</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($this->session->userdata['logged_in'])) { ?>
                    <li><a href="<?php echo base_url() . "user_authentication/register"; ?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
			        <li><a href="<?php echo base_url() . "user_authentication/login"; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } else { ?>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username ?></a></li>
			        <li><a href="<?php echo base_url() . "user_authentication/logout"; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } ?>
                </ul>
            </div>

        </div>
    </nav>

	<center> <br>
		<h3><u> เลือกระดับแบบทดสอบ </u></h3> <br>
		<div class="row text-center">
			<div class="col-sm-4 col-centered">
				<div class="thumbnail">
				<img src="http://deknerd.informatics.buu.ac.th/887350/58160197/WebserviceProjectTest/Big English 1.jpg" alt="English I">
				<p><strong>English I</strong></p>
				<p>Sat. 5 May 2018</p>
				<a href="<?php echo base_url();?>examination/examination/2" class="btn" role="button">Click</a>
				</div>
			</div>
			<div class="col-sm-4 col-centered">
				<div class="thumbnail">
				<img src="http://deknerd.informatics.buu.ac.th/887350/58160197/WebserviceProjectTest/Big English 2.jpg" alt="English II" >
				<p><strong>English II</strong></p>
				<p>Sun. 6 May 2018</p>
				<a href="<?php echo base_url();?>examination/examination/3" class="btn" role="button">Click</a>
				</div>
			</div>
			<div class="col-sm-4 col-centered" >
				<div class="thumbnail">
				<img src="http://deknerd.informatics.buu.ac.th/887350/58160197/WebserviceProjectTest/Big English 3.jpg" alt="English III">
				<p><strong>English III</strong></p>
				<p>Mon. 7 May 2018</p>
				<a href="<?php echo base_url();?>examination/examination/4" class="btn" role="button">Click</a>
				</div>
			</div>
		</div>
	</center>
</body>
</html>