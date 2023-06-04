<!DOCTYPE html>
<?php 
	require 'validator.php';
    require_once 'conn.php'
?>
<html lang = "en">
	<head>
		<title>BSIT</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<style type="text/css">
			body{
				background: linear-gradient(90deg, rgba(0,1,94,1) 20%, rgba(14,173,8,1) 60%, rgba(0,1,94,1) 100%);
			}
			#panel-margin{
				margin-top:40%;
				position: absolute;
			}
			#title{
				color:#fff;
			}
			#menu ul li{
				list-style-type:none;
				padding:5px;
				border-bottom:0;
			}
			#menu ul li a:hover{
				text-decoration:none;
			}
			.user{
				color:#fff;
				margin-top:10px;
				margin-right:20px;
			}
			#content{
				margin-top: 8rem;
				width:100%;
				margin-right:10px;
				
			}
            #table{
                width: 50%;
            }
			.home{
				width: 5rem;
				height: 5rem;
			}
			.dashbcontent h1{
				line-height: 3rem;
				color: white;
				font-family: sans-serif;
				font-size: 1.5rem;
			}
			.evsu{
				margin-top: 8rem;
				width: 10rem;
				height: 10rem;
			}
			.crs{
				color: white;
				text-decoration: none;
				font-size: 1.5rem;
			}.crs:hover{
				text-decoration: none;
				color: white;
				font-size: 1.7rem;
			}
		</style>
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:maroon;">
		<div class="container-fluid">
		<a href="home.php"><img class="home" src="images/home.png" alt="home"></a> <span style="color:white;font-size:1.5rem;font-family:arial black;">Student's List</span> | <a class="crs" href= "courses_sp.php">Courses</a> | <button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus">Add</span></button>
			<?php 
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_connect_error());
				$fetch = mysqli_fetch_array($query);
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $fetch['firstname']." ".$fetch['lastname'];
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
		</div>
	</nav>
	<center>
	<div class="dashbcontent">
		<img class="evsu" src="images/Evsu.png" alt="Evsu">
		<h1><b>Eastern Visayas State University<br>Dulag Campus</b><br>Student Lists</h1>
	</div>
	</center>
	<div>
<?php
    $conn = mysqli_connect("localhost", "root", "", "may_mid");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	
	$default_query = mysqli_query($conn, "SELECT * FROM `user`") or die(mysqli_connect_error());
	$check_default = mysqli_num_rows($default_query);
	
	if($check_default === 0){
		$enrypted_password = md5('admin');
		mysqli_query($conn, "INSERT INTO `user` VALUES('', 'Administrator', '', 'admin', '$enrypted_password', 'administrator')") or die(mysqli_connect_error());
		return false;
	}


// Query the database to fetch the data
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die('Failed to fetch data from MySQL: ' . mysqli_error($conn));
}

// Fetch all rows from the result set as an associative array
$pros = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free the result set
mysqli_free_result($result);




// Display the data in an HTML table
echo "<table border=1 id=table>";
echo "<tr><th>Student No</th><th>Name</th><th>Course/Yr/Sec</th><th>Status</th><th style='text-align:center'>Action</th></tr>";

foreach ($pros as $pros) {
    echo "<tr>";
    echo "<td>{$pros['stud_no']}</td>";
    echo "<td>{$pros['firstname']} {$pros['middle']} {$pros['lastname']}</td>";
    echo "<td>{$pros['course']} {$pros['year']}{$pros['section']}</td>";
	echo "<td>{$pros['status']}</td>";
    echo "<td style='text-align:center'><a href='viewbsitsr.php?id={$pros['stud_id']}'>View</a></td>";
    echo "</tr>";
}

echo "</table>";
?>



<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="save'bsitstud'sr.php">	
					<div class="modal-header">
						<h4 class="modal-title">Add Student</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Student no</label>
								<input type="hidden" name="stud_id" class="form-control" required="required"/>
								<input type="text" name="stud_no" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Middlename</label>
								<input type="text" name="middle" class="form-control"/>
							</div>
							<div class="form-inline">
								<select name="course" value="<?php echo $fetch['course']?>" class="form-control" required="required">
									<option value="">Course</option>
									<option value="BSIT">BSIT</option>
									<option value="BSOA">BSOA</option>
									<option value="BSE">BSE</option>
								</select>

								<select name="year" value="<?php echo $fetch['year']?>" class="form-control" required="required">
									<option value="">Year</option>
									<option value="1">1st Year</option>
									<option value="2">2nd Year</option>
									<option value="3">3rd Year</option>
									<option value="4">4th Year</option>
								</select>
							</div>
							<div class="form-inline">
								<select name="section" value="<?php echo $fetch['section']?>" class="form-control" required="required">
									<option value="">Section</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
								</select>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="status" value="<?php echo $fetch['status']?>" class="form-control" required="required">
									<option value="">Select Status</option>
									<option value="Regular">Regular</option>
									<option value="Irregular">Irregular</option>
									<option value="Returnee">Returnee</option>
									<option value="Transferee">Transferee</option>
								</select>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-success" ><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    
	
<?php include 'script.php'?>

</body>
</html>