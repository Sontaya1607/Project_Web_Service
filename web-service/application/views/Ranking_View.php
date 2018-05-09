<!DOCTYPE html>
<html>
<head>
    <title>Ranking</title>
</head>
<body>
    RANKING <hr><br>
    
    <?php
    foreach($api_quiz as $value){
        echo '<b>' . $value['quiz_name'] . '</b>' . '<hr>' . '<br>';
        foreach($api as $row){
            if($value['quiz_id'] == $row['quiz_id']){
                echo $row['member_username'] . ' ';    
                echo $row['score'] . '<br>';
            }
        }
        echo '<br>';
    }
    ?>

</body>
</html>