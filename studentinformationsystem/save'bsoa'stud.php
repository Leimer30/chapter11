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
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$father = $_POST['father'];
		$work = $_POST['work'];
		$mother = $_POST['mother'];
		$wrk = $_POST['wrk'];
		$cntact = $_POST['cntact'];
		
		
		mysqli_query($conn, "INSERT INTO `students` VALUES('', '$stud_no', '$firstname', '$lastname', '$middle', '$course', '$year', '$section', '$gender', '$age', '$address', '$contact', '$father', '$work', '$mother', '$wrk', '$cntact' )") or die(mysqli_connect_error());
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'bsoa.php'</script>";
	}
?>