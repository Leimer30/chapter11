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
            .siscontent{
                color: white;
                font-size: 2rem;
                line-height: 5rem;
                margin-top: 6.5rem;
                padding-left: 20%;
                padding-right: 5%;
                text-align: center;
            }
            .siscontent h1, h3{
                font-family: broadway;
            }
		</style>
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:maroon;">
		<div class="container-fluid">
			<a href="home.php"><img class="home" src="images/home.png" alt="home"></a> <span style="color:white;font-size:1.5rem;font-family:arial black;">About Us</span>

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
	
    <div class="siscontent">
        <img src="images/Evsu.png" alt="EVSU" style="width: 15rem; height: 15rem;"><h1>Student Information System</h1>
        <p>
        Student Information System (SIS) is a platform that contains all the information of the students in an institute, in a digital format. From the student’s profile to academic grades, SIS maintains records spanning the student’s entire academic career. Rather than keeping manual records of student data, the SIS manages school’s data in a secure manner.<br>The system is made as much as possible to avoid errors while entering the data. It is an easy way designed to track and maintain the data and information of the students. Furthermore, it helps the administrator of the institution to save time.<br>Putting the data through the computer is an easier way to do than writing it through the help of pen and paper. It includes the personal information of the students, and their overall average grades.
        </p>
        <h3>Members</h3>
        <p>Remiel Olendan<br>Desiree Vacal<br>Shiela Mea Agravante<br>Reynato Roy Caamic<br>Carl Anderson Delacruz</p>
    </div>
	
<?php include 'script.php'?>	
</body>
</html>