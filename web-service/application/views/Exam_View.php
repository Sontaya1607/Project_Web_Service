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
	<title>ข้อสอบโว้ยยยย</title>
</head>
<body>
	<a href="<?php echo base_url();?>">Home</a>
	<?php 
		$id = $this->uri->segment(3);
		echo form_open(base_url().'examination/doexam/'.$id);
		echo "<font color='red'>" . validation_errors() . "</font>";
		echo "<div class='input-container'>";

		foreach ($subject as $row){
			//echo $row['exam_number'] . ' ';
			$number[] = $row['exam_number'];
			//$exam[] = $row['']
		}
		if(validation_errors() != NULL){
			//echo '1';
		}else{
			shuffle($number);
		}
		
		//print_r ($number);
		//echo '<br>';
		/*
		foreach ($quiz as $key => $row) { 
			$exam[] = $row['exam_question'];
			$quiz_id = $row['quiz_id'];
		}
		*/
		//print_r($exam[0] . $exam[1]);
		
		foreach($subject as $i => $values){
			foreach($subject as $j => $value){
				if($number[$i] == $value['exam_number']){
					$exam_question[] = $value['exam_question'] .'<br>';
					$exam_answer1[] = $value['exam_answer1'].'<br>';
					$exam_answer2[] = $value['exam_answer2'].'<br>';
					$exam_answer3[] = $value['exam_answer3'].'<br>';
					$exam_answer4[] = $value['exam_answer4'].'<br>';
				}
			}
		}
		/*
		print_r ($exam_question);
		echo '<br>';
		print_r ($exam_answer1);
		echo '<br>';
		print_r ($exam_answer2);
		echo '<br>';
		print_r ($exam_answer3);
		echo '<br>';
		print_r ($exam_answer4);
		echo '<br>';
		*/
		
	?>
	
	<?php
		/*
		foreach ($subject as $i => $row){
			echo 'ข้อที่ ' . $i . ' ' . $exam_question[$i] ;
			//echo 'ข้อที่ ' . $row['exam_number'] . ' ' . $row['exam_question'] . '<br>';  
			echo $exam_question[$i];
			$data = array(
				'type' => 'radio',
				'name' => 'answer[' . $exam_question[$i] . ']',
				'value' => $exam_answer1[$i]
			);
			echo form_input($data) . $exam_answer1[$i];
			
			/*
			$data = array(
				'type' => 'radio',
				'name' => 'answer['.$row['exam_number'].']',
				'value' => $row['exam_answer1']
			);
			echo form_input($data) . $row['exam_answer1'];
			*/
			/*
			$data = array(
				'type' => 'radio',
				'name' => 'answer['.$row['exam_number'].']',
				'value' => $row['exam_answer2']
			);
			echo form_input($data) . $row['exam_answer2'];

			$data = array(
				'type' => 'radio',
				'name' => 'answer['.$row['exam_number'].']',
				'value' => $row['exam_answer3']
			);
			echo form_input($data) . $row['exam_answer3'];

			$data = array(
				'type' => 'radio',
				'name' => 'answer['.$row['exam_number'].']',
				'value' => $row['exam_answer4']
			);
			echo form_input($data) . $row['exam_answer4'] . '<br>';
			*/

		//}

		/*
		for($i = 0 ; $i < 10 ;$i++){
			echo 'ข้อที่ ' . $i . ' ' . $exam_question[$i];
			echo $exam_question[$i];
			
		}
		$names = $exam_answer1[0];
		echo $names;
		*/
		foreach ($api as $value) {
			$value['exam_number'];

		}
		//echo 'ข้อที่ ' . '0' . ' ' . $exam_question[0] ;
		/*
		$data = array(
			'type' => 'radio',
			'name' => 'answer[' . '0' . ']',
			'value' => $exam_answer1[0]
		);
		echo form_input($data) . $exam_answer1[0];
		*/
		echo "<input type='submit' name='Submit' value='Submit'>";
		echo form_close();
		
    ?>
</body>
</html>