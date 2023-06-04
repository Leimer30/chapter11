<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EVSU Dulag</title>
<style type="text/css">
	body{
		margin:0;
		padding: 0;
		background: linear-gradient(90deg, rgba(0,1,94,1) 10%, rgba(14,173,8,1) 50%, rgba(0,1,94,1) 90%);
		font-family: sans-serif;
	}
	*{
		box-sizing: border-box;
		outline: none!important;
	}

	.login-page{
		background-size: cover;
		height: 70vh;
		position: relative;
	}
	.login-page:after{
	content: '';
	position: absolute;
	left: 0px;
	top: 0px;
	z-index: 1;
	}
	.login-page .box{
		position: absolute;
		left: 50%;
		top: 30%;
		transform: translate(-50%,-50%);
		display: flex;
		flex-direction: column;
		width: 280px;
		z-index: 2;
		
	}

	.login-page .box .form-head h2{
	text-align: center;
	margin:10px 0px 20px;
	color:#ffffff;
	font-family: times new roman;
	}

	.login-page .box .form-body{
	display: flex;
	flex-direction: column;
	border-radius: 50px;
	}
	.login-page .box .form-body input{
	height: 50px;
	margin-bottom: 20px;
	border:1px solid maroon;
	width: 100%;
	background-color: transparent;
	border-radius: 20px;
	text-align: center;
	font-family: arial;
	font-size: 1.1rem;
	color:maroon;
	transition:box-shadow .5s ease;
	}
	.login-page .box .form-body input:focus{
		box-shadow: 0px 0px 10px black;
	}
	.login-page .box .form-body input::placeholder{
		color:#ffffff;
		}
		.login-page .box .form-footer {
			text-align: center;
			color:maroon;

		}
	.login-page .box .form-footer button{

		height: 50px;
		font-size: 1.1rem;
		border-radius: 50px;
		padding: 0px 50px;
		color:#ffffff;
		background-color: maroon;
		border:none;
		cursor: pointer;
		transition:box-shadow .5s ease;
	}
	.login-page .box .form-footer button:hover{
		box-shadow: 0px 0px 10px black;
	}
	p{
		color:white;
		text-align: center;
		font-family: times new roman;
		font-size: 2.5rem;
	}

</style>
</head>
<body>

<p>Eastern Visayas State University <br>Student Information System Dulag Campus</p>
<center><img src="images/Evsu.png" alt="EVSU" style="width:7rem; height:7rem;"></center>

	<section class="login-page" >
  		<form method="POST">
  	 		<div class="box">
				<div class="form-head">
					<h2>Admin Login</h2>
				</div>
				<div class="form-body">
					<input class="form-control" name="username" placeholder="Username" type="text" required="required" >
					<input type="Password" name="password" placeholder="Password" required="required" />
				</div>
				<?php include 'login_query.php'?>
  	 	 	   <div class="form-footer">
  	 	 	   	  <button type="submit" name="login">Sign In</button>
  	 	 	   </div>
  	 		</div>
  		</form>
	</section>

</body>
</html>
