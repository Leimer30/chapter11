<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		$stud_id = $_POST['stud_id'];
		$stud_no = $_POST['stud_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middle = $_POST['middle'];
		$status = $_POST['status'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$father = $_POST['father'];
		$work = $_POST['work'];
		$mother = $_POST['mother'];
		$wrk = $_POST['wrk'];
		$cntact = $_POST['cntact'];
        $ads = $_POST['ads'];
        $sad = $_POST['sad'];
        $dma = $_POST['dma'];
        $sia = $_POST['sia'];
        $ccna = $_POST['ccna'];
        $wst = $_POST['wst'];
        $edp = $_POST['edp'];
        $spi = $_POST['spi'];
        

	
		
		mysqli_query($conn, "UPDATE `students` SET `stud_no` = '$stud_no', `firstname` = '$firstname', `lastname` = '$lastname', `middle` = '$middle', `status` = '$status', `ads` = '$ads', `sad` = '$sad', `dma` = '$dma', `sia` = '$sia', `ccna` = '$ccna', `wst` = '$wst', `edp` = '$edp', `spi` = '$spi' WHERE `stud_id` = '$stud_id'") or die(mysqli_connect_error());


		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'bsit3b_sr.php'</script>";
	}
?>