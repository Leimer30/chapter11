<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">
	<head>
		<title>Student Records</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
        <link rel = "stylesheet" type = "text/css" href = "css/dropdown.css" />
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
            .crs{
				color: white;
				text-decoration: none;
				font-size: 1.5rem;
			}.crs:hover{
				text-decoration: none;
				color: white;
				font-size: 2rem;
			}
			.evsu{
				margin-left: 18%;
				margin-top: 8rem;
				width: 15rem;
				height: 15rem;
			}
            .head_content h1{
				text-align: center;
				margin-left: 20%;
            }
            .yr{
                margin-left: 25rem;
                margin-top: 3rem;
            }
		</style>
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:maroon;">
    <div class="container-fluid">
		<a href="home.php"><img class="home" src="images/home.png" alt="home"></a> <span style="color:white;font-size:1.5rem;font-family:arial black;">Student Records</span> | <a class="crs" href= "courses_sp.php">Courses</a> | <a class="crs" href= "bsit_yr_sr.php">Year&Section</a> 

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
        </div>
	</center>

    <div class="head_content">
		<h1>Year&Sections</h1>
    </div>

<div class="yr">
    <center>
        <div class="dropdown">
            <button class="dropbtn">1st year</button>
            <div class="dropdown-content">
                <a href="#">1A</a>
                <a href="#">1B</a>
                <a href="#">1C</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">2nd Year</button>
            <div class="dropdown-content">
                <a href="#">2A</a>
                <a href="#">2B</a>
                <a href="#">2C</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">3rd Year</button>
            <div class="dropdown-content">
                <a href="#">3A</a>
                <a href="bsit3b_sr.php">3B</a>
                <a href="#">3C</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">4th Year</button>
            <div class="dropdown-content">
                <a href="#">4A</a>
                <a href="#">4B</a>
            </div>
        </div>
	</center>
</div>



<?php include 'script.php'?>	
</body>
</html>