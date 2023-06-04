<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">
	<head>
		<title>BSIT 3B</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<style type="text/css">
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
			.home{
				width: 5rem;
				height: 5rem;
			}
			.dashbcontent h1{
				line-height: 3rem;
				color: maroon;
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
		<table id="table">
			<thead>
				<tr>
					<th>Student no</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Address</th>
					<th>Contact#</th>
					<th>Father</th>
					<th>Occupation</th>
					<th>Mother</th>
					<th>Occupation</th>
					<th>Contact#</th>
					<th></th>

				</tr>
				

			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `it3b`") or die(mysqli_connect_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['stud_id']?>">
						<td><?php echo $fetch['stud_no']?></td>
						<td><?php echo $fetch['lastname']?> <?php echo $fetch['firstname']?> <?php echo $fetch['middle']?></td>
						<td><?php echo $fetch['gender']?></td>
						<td><?php echo $fetch['age']?></td>
						<td><?php echo $fetch['address']?></td>
						<td><?php echo $fetch['contact']?></td>
						<td><?php echo $fetch['father']?></td>
						<td><?php echo $fetch['work']?></td>
						<td><?php echo $fetch['mother']?></td>
						<td><?php echo $fetch['wrk']?></td>
						<td><?php echo $fetch['cntact']?></td>
						<td><center>
							<button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['stud_id']?>"><span class="glyphicon glyphicon-edit"></span></button>
						</center></td>
					</tr>


	<div class="modal fade" id="edit_modal<?php echo $fetch['stud_id']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="update_it3b_sp.php">	
					<div class="modal-header">
						<h4 class="modal-title">Update Student</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Student no</label>
								<input type="hidden" name="stud_id" value="<?php echo $fetch['stud_id']?>" class="form-control"/>
								<input type="text" name="stud_no" value="<?php echo $fetch['stud_no']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" value="<?php echo $fetch['firstname']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" value="<?php echo $fetch['lastname']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Middle Initial</label>
								<input type="text" name="middle" value="<?php echo $fetch['middle']?>" class="form-control" required="required"/>
							</div>
							
							<div class="form-group">
								<label>Gender</label>
								<select name="gender" value="<?php echo $fetch['gender']?>" class="form-control" required="required">
									<option value=""></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<label>Age</label>
								<input type="number" name="age" value="<?php echo $fetch['age']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" value="<?php echo $fetch['address']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Contact No.</label>
								<input type="text" name="contact" value="<?php echo $fetch['contact']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Father</label>
								<input type="text" name="father" value="<?php echo $fetch['father']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" name="work" value="<?php echo $fetch['work']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Mother</label>
								<input type="text" name="mother" value="<?php echo $fetch['mother']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" name="wrk" value="<?php echo $fetch['wrk']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Contact No.</label>
								<input type="text" name="cntact" value="<?php echo $fetch['cntact']?>" class="form-control" required="required"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="update" class="btn btn-warning" ><span class="glyphicon glyphicon-save"></span> Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="save_it3b_sp.php">	
					<div class="modal-header">
						<h4 class="modal-title">Add Student</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Student no</label>
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
							
							<div class="form-group">
								<label>Gender</label>
								<select name="gender" class="form-control" required="required">
									<option value=""></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<label>Age</label>
								<input type="number" name="age" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Contact No.</label>
								<input type="number" name="contact" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Father</label>
								<input type="text" name="father" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" name="work" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Mother</label>
								<input type="text" name="mother" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" name="wrk" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Contact No.</label>
								<input type="number" name="cntact" class="form-control" required="required"/>
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