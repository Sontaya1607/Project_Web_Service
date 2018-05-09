<!DOCTYPE html>
<html>
<head>
	<title>Subject</title>
</head>
<body>
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
</body>
</html>