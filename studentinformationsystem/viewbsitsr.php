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
                width: 100%;
				font-size: 1.2rem;
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
/* Responsive form styles */
.responsive-form {
    width: 100%;
    margin: 5rem;
}

.form-columns {
    display: flex;
    flex-wrap: wrap;
}

.form-column {
    flex: 0 0 50%; /* Adjust the width to change the number of columns */
    padding-right: 10px; /* Add some spacing between columns */
    box-sizing: border-box;
}

.form-column:last-child {
    flex: 0 0 33.33%; /* Display three columns per line */
    padding-right: 0; /* Remove right padding for the last column */
}

.responsive-form label {
    display: inline-block;
    width: 15%;
    margin-bottom: 8px;
}

.responsive-form input {
    width: 50%;
    padding: 4px 0;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid #ccc;
    outline: none;
}

.responsive-form input[type="text"] {
    width: 40%;
    padding: 4px 0;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid #ccc;
    outline: none;
}

/* Media queries for responsive styles */
@media (max-width: 800px) {
    .form-column {
        flex: 0 0 20%; /* Display one column on smaller screens */
        padding-right: 0; /* Remove right padding on smaller screens */
    }
    
    .responsive-form label {
        width: 100%;
    }
    
    .responsive-form input {
        width: 100%;
    }
}

.update-form {
            display: none;
            margin-top: 20px;
        }
        .update-form .form-fetch {
            margin-bottom: 10px;
        }
        .update-form label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        .update-form input[type="text"] {
            border: none;
            border-bottom: 1px solid #ddd;
            padding: 5px;
            width: 200px;
            text-align: center;
        }
        .update-form input[type="number"] {
            border: none;
            border-bottom: 1px solid #ddd;
            padding: 5px;
            width: 200px;
            text-align: center;
        }
        .update-form .form-actions {
            margin-top: 20px;
        }
        .update-form .form-actions button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
</style>
		</style>
	</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:maroon;">
		<div class="container-fluid">
		<a href="home.php"><img class="home" src="images/home.png" alt="home"></a> <span style="color:white;font-size:1.5rem;font-family:arial black;">Student's List</span>
		| <button onclick='goBack()'>Go Back</button>
		|<button onclick="showUpdateForm()">Update</button>
        |<button class="print-button" onclick="window.print()">Print</button>
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
		<h1><b>Eastern Visayas State University<br>Dulag Campus<br>Bachelor of Science in Information Technology</b></h1>
	</div>
	</center>
	<div>
    
<?php
$conn = mysqli_connect("localhost", "root", "", "may_mid");
	
if(!$conn){
    die("Error: Failed to connect to database!");
}

$default_query = mysqli_query($conn, "SELECT * FROM `students`") or die(mysqli_connect_error());
$check_default = mysqli_num_rows($default_query);

// Get the user ID from the URL parameter
$userId = $_GET['id'];

// Query the database to fetch the user information based on the ID
$query = "SELECT * FROM students WHERE stud_id = $userId";
$result = mysqli_query($conn, $query);

// Check if the query was successful and the user exists
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Display personal information form
    echo "<form class='responsive-form' action='#' method='POST'>";
    echo "<div class='form-columns'>";
    echo "<div class='form-column'>";
	echo "";
    echo "<label for='stud_no'>Student No:</label>
	<input type='hidden' id='stud_id' name='stud_id' value='{$user['stud_id']}' readonly>
	<input type='text' id='stud_no' name='stud_no' value='{$user['stud_no']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='name'>Name:</label><br><input class='name' type='text'  name='name' value='{$user['firstname']} {$user['middle']} {$user['lastname']}' readonly>";
    echo "</div>";
	echo "<div class='form-column'>";
    echo "<label for='course'>Course/Yr/Sec:</label><br><input type='text' name='course' value='{$user['course']} {$user['year']}{$user['section']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='status'>Status:</label> <input type='text' name='status' value='{$user['status']}' readonly>";
    echo "</div>";
    echo "</div>";
    echo "</form>";

} else {
    echo "User not found.";
}

?>


<center>
<div id="update-form" class="update-form">
        <h3>Update Personal Information</h3>
        <form method="POST" action="updateform_sp.php">
            <div class="form-fetch">
                <label>Student No:</label>
                <input type="hidden" name="stud_id" value="<?php echo $user['stud_id']?>" class="form-control"/>
                <input type="text" name="stud_no" value="<?php echo $user["stud_no"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Firstname:</label>
                <input type="text" name="firstname" value="<?php echo $user["firstname"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Lastname:</label>
                <input type="text" name="lastname" value="<?php echo $user["lastname"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Middle:</label>
                <input type="text" name="middle" value="<?php echo $user["middle"]; ?>">
            </div>
            <div class="form-fetch">
                <label>Course:</label>
                <select name="course" value="<?php echo $user["course"]; ?>" required>
                <option value="None">Select</option>
                <option value="BSIT">BSIT</option>
                <option value="BSOA">BSOA</option>
                <option value="BSE">BSE</option>
                </select>
            </div>
            <div class="form-fetch">
                <label>Year:</label>
                <select name="year" value="<?php echo $user["year"]; ?>" required>
                <option value="None">Select</option>
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
                <option value="3">3rd Year</option>
                <option value="4">4th Year</option>
                </select>
            </div>
            <div class="form-fetch">
                <label>Section:</label>
                <select name="section" value="<?php echo $user["section"]; ?>" required>
                <option value="None">Select</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                </select>
            </div>
            <div class="form-fetch">
                <label>Status:</label>
                <select name="status" value="<?php echo $user["status"]; ?>" required>
                <option value="None">Select</option>
                <option value="Regular">Regular</option>
                <option value="Irregular">Irregular</option>
                <option value="Transferee">Transferee</option>
                </select>
			<div class="form-actions">
                <button type="submit" name="update">Update</button>
                <button type="button" onclick="cancelUpdate()">Cancel</button>
            </div>
        </form>
    </div>
</center>

<center>
<h4>First Year/1st Semester</h4>
<table id="table" style="width:70%;" border="1">
			<thead>
				<tr>
					<th style="text-align: center;">Grade</th>
					<th>Subject Code</th>
					<th>Subject</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Unit</th>
					<th style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `1y_1s`") or die(mysqli_connect_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['id']?>">
						<td style="text-align: center;"><?php echo $fetch['grade']?></td>
						<td><?php echo $fetch['sub_code']?></td>
						<td><?php echo $fetch['sub']?></td>
                        <td style="text-align: center;"><?php echo $fetch['lec']?></td>
                        <td style="text-align: center;"><?php echo $fetch['lab']?></td>
                        <td style="text-align: center;"><?php echo $fetch['unit']?></td>
						<td style="text-align: center;"><button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['id']?>"><span class="glyphicon glyphicon-edit"></span></button></td>
					</tr>

	<div class="modal fade" id="edit_modal<?php echo $fetch['id']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="update_pros.php">	
					<div class="modal-header">
						<h4 class="modal-title">Update Student</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Grade</label>
								<input type="hidden" name="id" value="<?php echo $fetch['id']?>" class="form-control"/>
								<input type="text" name="grade" value="<?php echo $fetch['grade']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Subject Code</label>
								<input type="text" name="sub_code" value="<?php echo $fetch['sub_code']?>" class="form-control" readonly/>
							</div>
							<div class="form-group">
								<label>Subject</label>
								<input type="text" name="sub" value="<?php echo $fetch['sub']?>" class="form-control" readonly/>
							</div>
							<div class="form-group">
								<label>Lec</label>
								<input type="number" name="lec" value="<?php echo $fetch['lec']?>" class="form-control" readonly/>
							</div>
							<div class="form-group">
								<label>Lab</label>
								<input type="number" name="lab" value="<?php echo $fetch['lab']?>" class="form-control" readonly/>
							</div>
							<div class="form-group">
								<label>Unit</label>
								<input type="number" name="unit" value="<?php echo $fetch['unit']?>" class="form-control" readonly/>
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
</center>


<?php include 'script.php'?>
<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
	// Function to check if printing is supported and show the print button
	function checkPrintingSupport() {
            if (window.matchMedia) {
                var mediaQueryList = window.matchMedia('print');
                mediaQueryList.addListener(function (mql) {
                    if (mql.matches) {
                        document.getElementsByClassName("print-button")[0].style.display = "block";
                    } else {
                        document.getElementsByClassName("print-button")[0].style.display = "none";
                    }
                });
            }
        }
		function showUpdateForm() {
            var updateForm = document.getElementById("update-form");
            updateForm.style.display = "block";
        }

        function cancelUpdate() {
        var updateForm = document.getElementById("update-form");
        updateForm.style.display = "none";
    }
</script>
</body>
</html>