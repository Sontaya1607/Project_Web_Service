<?php 
if (isset($this->session->userdata['logged_in'])) {
	$id = ($this->session->userdata['logged_in']['member_id']);
	$username = ($this->session->userdata['logged_in']['member_username']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
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
  </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">BabyEnglish </a> <!-- ควยไรแชมป์ จากพี่บ่าว -->
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Start a free test</a></li>
                <?php if (!isset($this->session->userdata['logged_in'])) { ?>
                    <li><a href="<?php echo base_url() . "user_authentication/register"; ?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
			        <li><a href="<?php echo base_url() . "user_authentication/login"; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } else { ?>
                    <li><a href="#"><span class="glyphicon glyphicon-edit"></span><?php echo $username ?></a></li>
			        <li><a href="<?php echo base_url() . "user_authentication/logout"; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } ?>
                </ul>
            </div>

        </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://ec2-13-229-115-177.ap-southeast-1.compute.amazonaws.com/image/Infinity War.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>English from movies</h3>
                    <p>Coming soon ...</p>
                </div>   
            </div>

            <div class="item">
                <img src="http://ec2-13-229-115-177.ap-southeast-1.compute.amazonaws.com/image/British.jpg" alt="Image" >
                <div class="carousel-caption" >
                    <h3>Online English Quiz</h3>
                    <p>Test your English for free !</p>
                </div>      
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

    <div class="container text-center">    
        <h3>What is BabyEnglish ?</h3>
        <p>BabyEnglish is a website about online english testing.</p><br>

        <div class="row">
            <div class="col-sm-4">
                <img src="http://deknerd.informatics.buu.ac.th/887350/58160197/WebserviceProjectTest/Test 1.jpg" class="img-responsive" style="width:100%" alt="Image">
                <p>Measure your English skill.</p>
            </div>

            <div class="col-sm-4"> 
                <img src="http://deknerd.informatics.buu.ac.th/887350/58160197/WebserviceProjectTest/Test 2.jpg" class="img-responsive" style="width:90%" alt="Image">
                <p>Increase confidence in using English.</p>    
            </div>

            <div class="col-sm-4">
                <div class="well">
                    <a href="<?php echo base_url();?>examination/examination/1" class="btn" role="button">Start a free test</a>
                    <!-- test exam data -->
                    <a href="<?php echo base_url();?>examination/subject/" class="btn" role="button">Start a free test</a>
                </div>

                <div class="well">
                    <a href="<?php echo base_url();?>examination/ranking" class="btn" role="button">Ranking</a>
                </div>

            </div>
        </div>

    </div><br>

</body>
</html>