<?php
if (isset($this->session->userdata['logged_in'])) {
	$id = ($this->session->userdata['logged_in']['member_id']);
	$username = ($this->session->userdata['logged_in']['member_username']);
	echo $username;
}
if(empty($subject)) {
    header("location:" . base_url());
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
</head>
<body>
	<?php //echo "<a id='a' href='" .base_url(). ">Home</a>".'<br>'; ?>
	<a href="<?php echo base_url();?>">Home</a>
	<table border=1>
		<tr>
			<td>กรุณาเลือกชุดข้อสอบ</td>
		</tr>
		<?php foreach ($subject as $row) { ?>
		<tr>
			<td>
				<a href="<?php echo base_url();?>examination/doexam/<?php echo $row['quiz_id']; ?>"><?php echo $row['quiz_name']; ?></a>
			</td>
		</tr>
		<?php } ?>
	</table>

	<table border=1>
		<tr>
			<td>กรุณาเลือกชุดข้อสอบ</td>
		</tr>
		<?php foreach ($api as $value) { ?>
		<tr>
			<td>
				<a href="<?php echo base_url();?>examination/doexam/<?php echo $value['quiz_id']; ?>"><?php echo $value['quiz_name']; ?></a>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>