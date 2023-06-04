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
			.crs{
				color: white;
				text-decoration: none;
				font-size: 1.5rem;
			}.crs:hover{
				text-decoration: none;
				color: white;
				font-size: 2rem;
			}
		</style>
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:maroon;">
		<div class="container-fluid">
		<a href="home.php"><img class="home" src="images/home.png" alt="home"></a> <span style="color:white;font-size:1.5rem;font-family:arial black;">Student's List</span> | <a class="crs" href= "courses_sp.php">Courses</a>
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
	<div id = "content">
		<button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span></button>
		<br><br>
		<table id="table">
			<thead>
				<tr>
					<th>Student no</th>
					<th>Name</th>
					<th>Course/Yr&Sec</th>
					<th>Status</th>
				</tr>

			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `students` WHERE `course`='BSE'") or die(mysqli_connect_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['stud_id']?>">
						<td><?php echo $fetch['stud_no']?></td>
						<td><?php echo $fetch['lastname']?> <?php echo $fetch['firstname']?> <?php echo $fetch['middle']?></td>
						<td><?php echo $fetch['course']?> <?php echo $fetch['year']?><?php echo $fetch['section']?></td>
						<td><?php echo $fetch['status']?></td>
						<td><center><button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['stud_id']?>"><span class="glyphicon glyphicon-edit"></span></button></center></td>
					</tr>


	<div class="modal fade" id="edit_modal<?php echo $fetch['stud_id']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="update'bse'sr.php">	
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
				<form method="POST" action="save'bse'sr.php">	
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