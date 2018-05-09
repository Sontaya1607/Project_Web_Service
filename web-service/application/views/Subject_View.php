<!DOCTYPE html>
<html>
<head>
	<title>Subject</title>
</head>
<body>
	<table border=1>
		<tr>
			<td>เลือกระดับแบบทดสอบ</td>
		</tr>
		<?php foreach ($api as $i => $value) { ?>
		<tr>
			<td>
				<a href="<?php echo base_url();?>examination/examination/<?php echo $value['subject_id']; ?>"><?php echo $value['subject_name']; ?></a>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>