<?php 
if (isset($this->session->userdata['logged_in'])) {
	$id = ($this->session->userdata['logged_in']['member_id']);
	$username = ($this->session->userdata['logged_in']['member_username']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Score Member</title>
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
        color: #f1f1f1;
        border-radius: 0;
        transition: .2s;
        width: 32%;
    }

    /* On hover, the color of .btn will transition to white with black text */
    .btn1:hover, .btn:focus {
        border: 1px solid #337AB7;
        background-color: #fff;
        color: #337AB7;
    }

    .btn2:hover, .btn:focus {
        border: 1px solid #F0AD4E;
        background-color: #fff;
        color: #F0AD4E;
    }
    .btn3:hover, .btn:focus {
        border: 1px solid #5CB85C;
        background-color: #fff;
        color: #5CB85C;
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
        font-size: 84px;
        font-family: sans-serif,
        font-weight: bold;
        color: #3399ff;
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
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username ?></a></li>
                <li><a href="<?php echo base_url() . "user_authentication/logout"; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php } ?>
            </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 align="center">คะแนนที่ได้</h1><br>
                <div class="well">
                    <center>
                        <p id="font"><?php echo $score?> / 10</p>
                    </center>
                </div>
                <a href="<?php echo base_url();?>examination/examination/<?php echo $quiz_id ?>" class="btn btn1 btn-primary">กดเพื่อกลับ</a>&nbsp;&nbsp;
                <a href="<?php echo base_url();?>examination/ranking/<?php echo $quiz_id ?>" class="btn btn2 btn-warning">กดเพื่อดู ranking</a>&nbsp;
                <a href="<?php echo base_url();?>examination/answer/" class="btn btn3 btn-success">กดเพื่อดูเฉลย</a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>

<?php }else{ ?>

<!DOCTYPE html>
<html>
<head>
    <title>Score Member</title>
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
        color: #f1f1f1;
        border-radius: 0;
        transition: .2s;
        width: 49%;
    }

    /* On hover, the color of .btn will transition to white with black text */
    .btn1:hover, .btn:focus {
        border: 1px solid #337AB7;
        background-color: #fff;
        color: #337AB7;
    }

    .btn2:hover, .btn:focus {
        border: 1px solid #5CB85C;
        background-color: #fff;
        color: #5CB85C;
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
        font-size: 84px;
        font-family: sans-serif,
        font-weight: bold;
        color: #3399ff;
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
                    <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Start a free test</a></li>
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
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 align="center">คะแนนที่ได้</h1><br>
                <div class="well">
                    <center>
                        <p id="font"><?php echo $score?> / 10</p>
                    </center>
                </div>
                <a href="<?php echo base_url();?>" class="btn btn1 btn-primary">Home</a>&nbsp;       
                <a href="<?php echo base_url();?>examination/examination/<?php echo $quiz_id ?>" class="btn btn2 btn-success">กดเพื่อกลับ</a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
<?php } ?>