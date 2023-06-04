<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$stud_no = $_POST['stud_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middle = $_POST['middle'];
		$course = $_POST['course'];
		$year = $_POST['year'];
		$section = $_POST['section'];
		$status = $_POST['status'];

	
		
		mysqli_query($conn, "UPDATE `students` SET `stud_no` = '$stud_no', `firstname` = '$firstname', `lastname` = '$lastname', `middle` = '$middle',`course` = '$course', `year` = '$year', `section` = '$section', $status = `status` WHERE `stud_id` = '$stud_id'") or die(mysqli_connect_error());


		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'bsitstud_sr.php'</script>";
	}
?>