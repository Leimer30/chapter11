<?php
    require_once 'conn.php';

    if (isset($_POST['save'])) {
        $stud_no = $_POST['stud_no'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middle = $_POST['middle'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $section = $_POST['section'];
        $status = $_POST['status'];

        $query = "INSERT INTO `students` (stud_no, firstname, lastname, middle, course, year, section, status) VALUES ('$stud_no', '$firstname', '$lastname', '$middle', '$course', '$year', '$section', '$status')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'bsitstud_sr.php'</script>";
	}
?>