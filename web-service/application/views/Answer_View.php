<?php
    if (isset($this->session->userdata['logged_in'])) {
        $id = ($this->session->userdata['logged_in']['member_id']);
        $username = ($this->session->userdata['logged_in']['member_username']);
    }else if(!isset($this->session->userdata['logged_in'])){
        header("location:" . base_url());
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Answer</title>
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
    เฉลยข้อสอบ
    <table border='1'>
        <tr>
            <td>ข้อสอบชุดที่</td>
            <td>ข้อสอบข้อที่</td>
            <td>คำถาม</td>
            <td>เฉลย</td>
            <td>คำตอบของ member</td>
            <td>ถูกหรือผิด</td>
        </tr>
        <tr>
    <?php 

    foreach($api_exam as $value){
        echo '<td>' . $value['quiz_id'] . '</td>';
        //$exam_number_answer[] = $value['exam_number'];
        echo '<td>' . $value['exam_number'] . '</td>';
        echo '<td>' . $value['exam_question'] . '</td>';
        echo '<td>' . $value['exam_correct'] . '</td>';
        foreach($api_memberanswer as $row){
            if($value['exam_number'] == $row['exam_number']){
                echo $row['member_answer'] . ' ';
                if($value['exam_correct'] == $row['member_answer']){
                    echo '/';
                }else{
                    echo 'X';
                }
            }
        }
        
        echo '<br>';
    }
    /*
    echo '<br>';
    foreach($api_memberanswer as $value){
        foreach($api_exam as $row){
            if($value['exam_number'] == $row['exam_number']){
                echo $row['exam_number'] . ' ';
                echo $row['exam_question'] . ' ';
                echo $value['member_answer'] . ' ';
                echo $value['exam_correct'] . ' ';
                if($value['member_answer'] == $value['exam_correct']){
                    echo '/';
                }else{
                    echo 'X';
                }
                echo '<br>';
            }
        }
    }
    */
    ?>
    </table>
</body>
</html>