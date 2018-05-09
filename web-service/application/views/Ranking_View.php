<?php 
if (isset($this->session->userdata['logged_in'])) {
	$id = ($this->session->userdata['logged_in']['member_id']);
	$username = ($this->session->userdata['logged_in']['member_username']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ranking</title>
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

    <?php
    foreach($api_quiz as $i => $value){
        $sum_quiz = $i+1;
        $j = 0;
        foreach($api as $row){
            if($value['quiz_id'] == $row['quiz_id']){
                $j++;
                $sum[$i] = $j;
            }
        }
    }
    ?>

    <center> <br>
    
    <div class="container">
    <h2>Ranking</h2><br>

    <?php foreach($api_quiz as $i => $value){ 
        echo '<h3>' . $value['quiz_name'] . '</h3>' . '<br>';
    ?>
        <table class="table">
            <tr class="Rank-topic">
                <th></th>
                <th>Ranking</th>
                <th>Username</th>
                <th>Score</th>
            </tr>
            <?php 
            $j = 0;
            foreach($api as $k => $row){
                echo '<tr>';
                if($value['quiz_id'] == $row['quiz_id']){
                    $j++;
                    if($sum[$i] == 1){
                        echo '<td class="goldrank"></td>';
                        echo '<td>#' . $j . '</td>';
                        echo '<td>' . $row['member_username'] . '</td>';
                        echo '<td>' . $row['score'] . '</td>';
                    }else if($sum[$i] == 2){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 3){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 4){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 5){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 6){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 7){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 8){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 9){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 9){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 10){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 9){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 10){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 11){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 9){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 10){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 11){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 12){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 9){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 10){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 11){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 12){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 13){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 9){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 10){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 11){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 12){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 13){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 14){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 9){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 10){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 11){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 12){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 13){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 14){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }else if($sum[$i] == 15){
                        if($j == 1){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 2){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 3){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 4){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 5){
                            echo '<td class="goldrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 6){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 7){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 8){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 9){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 10){
                            echo '<td class="silverrank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 11){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 12){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 13){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 14){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }else if($j == 15){
                            echo '<td class="bronzerank"></td>';
                            echo '<td>#' . $j . '</td>';
                            echo '<td>' . $row['member_username'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                        }
                    }
                    

                }
                echo '</tr>';
            }

            ?>

        </table>
    <?php } ?>

</body>
</html>