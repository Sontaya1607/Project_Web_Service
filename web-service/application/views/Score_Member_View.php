<?php 
if (isset($this->session->userdata['logged_in'])) {
	$id = ($this->session->userdata['logged_in']['member_id']);
	$username = ($this->session->userdata['logged_in']['member_username']);
    //echo $username;
    //echo $quiz_id;
    //echo $score;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Score Member</title>
</head>
<body>
    <?php echo $username; ?>
    Score <?php echo $score?> / 10
    <a href="<?php echo base_url();?>examination/examination/<?php echo $quiz_id ?>">กดเพื่อกลับ</a>
    <a href="<?php echo base_url();?>examination/ranking/<?php echo $quiz_id ?>">กดเพื่อดู ranking</a>
    <?php //} ?>
</body>
</html>

<?php }else{ ?>

<!DOCTYPE html>
<html>
<head>
    <title>Score Member</title>
</head>
<body>
    <?php //foreach ($show as $row) { ?>
    <!-- Score <?php //echo $row['score']?> / 10 -->
    Score <?php echo $score?> / 10
    <a href="<?php echo base_url();?>examination/examination/<?php echo $quiz_id ?>">กดเพื่อกลับ</a>
    <?php //} ?>
</body>
</html>
<?php } ?>