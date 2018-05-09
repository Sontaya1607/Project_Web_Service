<?php 
	if (isset($this->session->userdata['logged_in'])) {
		$id = ($this->session->userdata['logged_in']['member_id']);
		$username = ($this->session->userdata['logged_in']['member_username']);
		echo $username;
	}
	if(empty($quiz)) {
		header("location:" . base_url());
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ข้อสอบโว้ยยยย</title>
</head>
<body>
	<?php 
		foreach ($number as $row) {
			foreach ($api as $i => $value) {
				if($row == $value['exam_number']){
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
		//for($i = 0 ;$i < $count ;$i++){
			//echo $exam_number[$i];
			//echo $exam_question[$i];
			//echo $exam_answer1[$i];
			//echo $exam_answer2[$i];
			//echo $exam_answer3[$i];
			//echo $exam_answer4[$i];
		//}
		/*
		foreach ($quiz as $key => $row) { 
			//$id[] = $key+1;
			$exam_number[] = $row['exam_number'];  
			$exam_question[] = $row['exam_question'];
			$exam_answer1[] = $row['exam_answer1'];
			$exam_answer2[] = $row['exam_answer2'];
			$exam_answer3[] = $row['exam_answer3'];
			$exam_answer4[] = $row['exam_answer4'];

			$quiz_id = $row['quiz_id'];
		}
		*/
		//print_r($exam[0] . $exam[1]);
		//print_r($id);
		//print_r($exam);
	?>
	<?php $id = $this->uri->segment(3)?>
	
	<form name="QuizForm" method=post action="<?php echo base_url();?>examination/doexam/<?php echo $id?>">
	<?php //foreach ($quiz as $i => $row) { ?>
	<?php for($i = 0 ;$i < $count ; $i++){ ?>
		ข้อที่ <?php echo $i+1 ?>/10
		คำถาม <?php echo $exam_question[$i]?><br>
			<?php //echo form_error('answer['.$i.']'); ?>
			<input type="hidden" name="exam_number[<?php echo $i?>]" value="<?php echo $exam_number[$i]?>">
			<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer1[$i] ?>" required> <?php echo $exam_answer1[$i] ?><br>
			<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer2[$i] ?>" > <?php echo $exam_answer2[$i] ?><br>
			<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer3[$i] ?>" > <?php echo $exam_answer3[$i] ?><br>
			<input type="radio" name="answer[<?php echo $i?>]" value="<?php echo $exam_answer4[$i] ?>" > <?php echo $exam_answer4[$i] ?><br>
			
	<?php } ?>
	<input type="submit" name="Submit" value="Submit"><br>
	</form>

</body>
</html>