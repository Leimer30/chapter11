<?php
    require_once 'conn.php';

    if (isset($_POST['update'])) {
        $stud_id = $_POST['stud_id'];
        $stud_no = $_POST['stud_no'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middle = $_POST['middle'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $section = $_POST['section'];
        $status = $_POST['status'];


        $query = "UPDATE students SET stud_no = '$stud_no', firstname = '$firstname', lastname = '$lastname', middle = '$middle', course = '$course', year = '$year', section = '$section', status = '$status' WHERE stud_id = '$stud_id'";
        mysqli_query($conn, $query) or die(mysqli_error($conn));

        echo "<script>alert('Successfully updated!')</script>";
        echo "<script>window.location = 'bsitstud_sr.php'</script>";
    }