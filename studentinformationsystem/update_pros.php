<?php
    require_once 'conn.php';

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $grade = $_POST['grade'];

        $query = "UPDATE 1y_1s SET grade = '$grade' WHERE id = '$id'";
        mysqli_query($conn, $query) or die(mysqli_error($conn));

        echo "<script>alert('Successfully updated!')</script>";
        echo "<script>window.location = 'bsitstud_sr.php'</script>";
    }
?>
