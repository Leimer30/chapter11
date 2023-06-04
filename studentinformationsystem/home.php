<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">
	<head>
		<title>EVSU Dulag Files</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<style type="text/css">
			body{
				background: linear-gradient(90deg, rgba(0,1,94,1) 20%, rgba(14,173,8,1) 60%, rgba(0,1,94,1) 100%);
			}
			#title{
				color:#fff;
			}
			#sidebar{
				top: 5rem;
				height:100%;
				width:17%;
				position:fixed;
				border:1px solid #e7e7e7;
			}
			.user{
				color:#fff;
				margin-top:10px;
				margin-right:20px;
			}
			.home{
				width: 5rem;
				height: 5rem;
			}
			.dashbcontent h1{
				margin-left: 20%;
				line-height: 10rem;
				color: white;
				font-family: times new roman;
				font-size: 5rem;
			}
			.evsu{
				margin-left: 18%;
				margin-top: 8rem;
				width: 15rem;
				height: 15rem;
			}

		</style>
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:maroon;">
		<div class="container-fluid">
		<a href="home.php"><img class="home" src="images/home.png" alt="home"></a> <span style="color:white;font-size:1.5rem;font-family:arial black;">EVSU Student Management System</span>
		
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
	<?php include 'sidebar.php'?>



	<center>
	<div class="dashbcontent">
		<img class="evsu" src="images/Evsu.png" alt="Evsu">
		<h1>Eastern Visayas State University<br>Dulag Campus<br>Student Information System</h1>
	</div>
	</center>


<?php include 'script.php'?>	
</body>
</html>