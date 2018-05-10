<?php 
	if (isset($this->session->userdata['logged_in'])) {
		$id = ($this->session->userdata['logged_in']['member_id']);
		$username = ($this->session->userdata['logged_in']['member_username']);
	}
	/*if(empty($api)) {
		header("location:" . base_url());
	}*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz View</title>
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
        transition: .2s;\
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
    #font {
    	font-size: 18px;
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
				<li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $username ?></a></li>
				<li><a href="<?php echo base_url() . "user_authentication/logout"; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			<?php } ?>
			</ul>
			</div>
		</div>
	</nav>
	<br>
	<?php 
		//echo count($number);
		//print_r ($number);
		foreach ($api as $i => $value) {
		for($i = 0;$i < count($number);$i++){
		//foreach ($number as $row) {
			//foreach ($api as $i => $value) {
				//if($row == $value['exam_number']){
				if($value['exam_number'] == $number[$i]){
					$quiz_name = $value['quiz_name'];
					$exam_number[] = $value['exam_number'];
					$exam_question[] = $value['exam_question'];
					$exam_answer1[] = $value['exam_answer1'];
					$exam_answer2[] = $value['exam_answer2'];
					$exam_answer3[] = $value['exam_answer3'];
					$exam_answer4[] = $value['exam_answer4'];
				}
			}
		
		}
		$count = count($exam_number);
		//echo $count;
	?>
	<?php $id = $this->uri->segment(3)?>
	<div class="container">
	  	<h2>ข้อสอบ <?php echo $quiz_name?></h2>
	 	<div class="well">
	 		<form name="QuizForm" method=post action="<?php echo base_url();?>examination/doexam/<?php echo $id?>">
				<?php for($i = 0 ;$i < $count ; $i++){ ?>
					<p id="font"><b>ข้อที่ <?php echo $i+1 ?> </b><?php echo $exam_question[$i]?></p>
						<input type="hidden" name="exam_number[<?php echo $i?>]" value="<?php echo $exam_number[$i]?>">
						<div class="col-xs-3 col-md-6">
							<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer1[$i] ?>" required> <?php echo $exam_answer1[$i] ?>
						</div>

						<div class="col-xs-3 col-md-6">
							<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer2[$i] ?>" > <?php echo $exam_answer2[$i] ?>
						</div>

						<div class="col-xs-3 col-md-6">
							<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer3[$i] ?>" > <?php echo $exam_answer3[$i] ?>
						</div>

						<div class="col-xs-3 col-md-6">
							<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer4[$i] ?>" > <?php echo $exam_answer4[$i] ?><br><br>
						</div>
				<?php } ?>
				<br><br>
				</div>
				<center><input type="submit" class="btn" name="Submit" value="Submit"></center><br>
			</form>	
		</div>
	</div>

</body>
</html>