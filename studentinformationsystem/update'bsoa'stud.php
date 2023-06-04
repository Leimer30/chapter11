<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		$stud_id = $_POST['stud_id'];
		$stud_no = $_POST['stud_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middle = $_POST['middle'];
		$course = $_POST['course'];
		$year = $_POST['year'];
		$section = $_POST['section'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$father = $_POST['father'];
		$work = $_POST['work'];
		$mother = $_POST['mother'];
		$wrk = $_POST['wrk'];
		$cntact = $_POST['cntact'];

	
		
		mysqli_query($conn, "UPDATE `students` SET `stud_no` = '$stud_no', `firstname` = '$firstname', `lastname` = '$lastname', `middle` = '$middle',`course` = '$course', `year` = '$year', `section` = '$section', `gender` = '$gender', `age` = '$age', `address` = '$address', `contact` = '$contact', `father` = '$father', `work` = '$work', `mother` = '$mother', `wrk` = '$wrk', `cntact` = '$cntact' WHERE `stud_id` = '$stud_id'") or die(mysqli_connect_error());
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'bsoa.php'</script>";
	}
?>