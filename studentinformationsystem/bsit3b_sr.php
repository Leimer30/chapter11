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
            .table{
                width: 90%;
                font-size: 10px;
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
	<div class="table">
		<table id="table">
			<thead>
				<tr>
					<th>Student no</th>
					<th>Name</th>
					<th>Status</th>
                    <th>Advanced Databased System</th>
                    <th>System Analysis&Design</th>
                    <th>Data Mining Analytics</th>
                    <th>System Integration&Architecture</th>
                    <th>CCNA Connecting Networks</th>
                    <th>Web Systems& Technology</th>
                    <th>Event-Driven Programming</th>
                    <th>Social&Professional Issues</th>
					<th></th>

				</tr>
				

			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `students`") or die(mysqli_connect_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['stud_id']?>">
						<td><?php echo $fetch['stud_no']?></td>
						<td><?php echo $fetch['lastname']?> <?php echo $fetch['firstname']?> <?php echo $fetch['middle']?></td>
						<td><?php echo $fetch['status']?></td>
                        <td><?php echo $fetch['ads']?></td>
                        <td><?php echo $fetch['sad']?></td>
                        <td><?php echo $fetch['dma']?></td>
                        <td><?php echo $fetch['sia']?></td>
                        <td><?php echo $fetch['ccna']?></td>
                        <td><?php echo $fetch['wst']?></td>
                        <td><?php echo $fetch['edp']?></td>
                        <td><?php echo $fetch['spi']?></td>
						<td><center><button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['stud_id']?>"><span class="glyphicon glyphicon-edit"></span></button></center></td>
					</tr>


					<div class="modal fade" id="edit_modal<?php echo $fetch['stud_id']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="update_it3b_sr.php">	
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
								<label>Status</label>
								<select name="status" value="<?php echo $fetch['status']?>" class="form-control" required="required">
									<option value="">Select Status</option>
									<option value="Regular">Regular</option>
									<option value="Irregular">Irregular</option>
									<option value="Returnee">Returnee</option>
									<option value="Transferee">Transferee</option>
								</select>
							</div>
                            <div class="form-group">
								<label>Advanced Databased System</label>
								<input type="text" name="ads" value="<?php echo $fetch['ads']?>" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>System Analysis & Design</label>
								<input type="text" name="sad" value="<?php echo $fetch['sad']?>" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Data Mining Analytics</label>
								<input type="text" name="dma" value="<?php echo $fetch['dma']?>" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>System Analysis & Design</label>
								<input type="text" name="sia" value="<?php echo $fetch['sia']?>" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Connecting Networks</label>
								<input type="text" name="ccna" value="<?php echo $fetch['ccna']?>" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Websystems & Technology</label>
								<input type="text" name="wst" value="<?php echo $fetch['wst']?>" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Event-Driven Programming</label>
								<input type="text" name="edp" value="<?php echo $fetch['edp']?>" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Social & Professional Issues</label>
								<input type="text" name="spi" value="<?php echo $fetch['spi']?>" class="form-control" required="required"/>
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
				<form method="POST" action="save_it3b_sr.php">	
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
								<label>Status</label>
								<select name="status" value="<?php echo $fetch['status']?>" class="form-control" required="required">
									<option value="">Select Status</option>
									<option value="Regular">Regular</option>
									<option value="Irregular">Irregular</option>
									<option value="Returnee">Returnee</option>
									<option value="Transferee">Transferee</option>
								</select>
							</div>
                            <div class="form-group">
								<label>Advanced Databased System</label>
								<input type="text" name="ads" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>System Analysis & Design</label>
								<input type="text" name="sad" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Data Mining Analytics</label>
								<input type="text" name="dma" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>System Analysis & Design</label>
								<input type="text" name="sia" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Connecting Networks</label>
								<input type="text" name="ccna" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Websystems & Technology</label>
								<input type="text" name="wst" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Event-Driven Programming</label>
								<input type="text" name="edp" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Social & Professional Issues</label>
								<input type="text" name="spi" class="form-control" required="required"/>
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