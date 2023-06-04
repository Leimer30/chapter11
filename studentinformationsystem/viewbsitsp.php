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
                width: 50%;
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
				text-decoration: none;
                color: black;
			}.crs:hover{
				text-decoration: none;
                color: #000;
			}
            /* Responsive form styles */
            .responsive-form {
                width: 90%;
                margin: 5rem;
				padding-left: 20rem;
            }
            .form-columns {
                display: flex;
                flex-wrap: wrap;
            }
            .form-column {
                flex: 0 0 30%; /* Adjust the width to change the number of columns */
                padding-right: 10px; /* Add some spacing between columns */
                box-sizing: border-box;
            }
            .responsive-form label {
                display: inline-block;
                width: 15%;
                
            }
            .responsive-form input {
                width: 50%;
                padding: 4px 0;
				margin-left: 5rem;
                margin-bottom: 5rem;
                box-sizing: border-box;
                border: none;
                border-bottom: 1px solid #ccc;
                outline: none;
            }
            /* Media queries for responsive styles */
            @media (max-width: 800px) {
                .form-column {
                    flex: 0 0 30%; /* Display one column on smaller screens */
                    padding-right: 0; /* Remove right padding on smaller screens */
                }
                
                .responsive-form label {
                    width: 100%;
                }
                
                .responsive-form input {
                    width: 100%;
                }
            }
			@media print {
            body {
                margin: 0;
                padding: 20px;
                font-family: Arial, sans-serif;
                font-size: 14px;
                line-height: 1.5;
            }
            h2 {
                margin: 0;
                padding: 10px 0;
                font-size: 24px;
            }
            .form-columns {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .form-column {
                width: 30%;
                padding: 5px;
            }
            label {
                font-weight: bold;
            }
            input[type="text"],
            input[type="number"],
            input[type="middle"] {
                border: none;
                border-bottom: 1px solid #000;
                width: 50%;
                padding: 5px;
                margin-bottom: 10px;
				margin-right: 3rem;
                font-size: 12px;
                line-height: 1.5;
            }
            button {
                display: none;
            }
            .print-button {
                display: none;
            }
        }
			/* Additional CSS for responsiveness */
			@media (max-width: 768px) {
            .form-columns {
                flex-direction: column;
            }

            .form-column {
                width: 100%;
                padding: 5px;
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
	</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:maroon;">
		<div class="container-fluid">
		<a href="home.php"><img class="home" src="images/home.png" alt="home"></a> <span style="color:white;font-size:1.5rem;font-family:arial black;">Student's List</span>
        |<button><a class="crs" href= "bsitstud_sp.php">Go Back</a></button>
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
    echo "<h4><b>Personal Info</b></h4>";
    echo "</div>";
	echo "<div class='form-column'>";echo "";echo "</div>";echo "<div class='form-column'>";echo "";echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='stud_no'>Student No:</label><br>
    <input type='hidden' name='stud_id' value='{$user['stud_id']}' readonly>
    <input type='text' name='stud_no' value='{$user['stud_no']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='name'>Name:</label><br><input class='name' type='text'  name='name' value='{$user['firstname']} {$user['middle']} {$user['lastname']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='course'>Course/Yr/Sec:</label><br><input type='text' name='course' value='{$user['course']} {$user['year']}{$user['section']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='gender'>Gender:</label><br><input type='text' name='gender' value='{$user['gender']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='age'>Age:</label><br><input type='number' name='age' value='{$user['age']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='address'>Address:</label><br><input type='text' name='address' value='{$user['address']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='contact'>Contact No:</label><br><input type='text' name='contact' value='{$user['contact']}' readonly>";
    echo "</div>";
	// Empty Column
	echo "<div class='form-column'>";
    echo "";
    echo "</div>";
	// .......
	echo "<div class='form-column'>";
    echo "";
    echo "</div>";
	echo "<div class='form-column'>";
    echo "<h4><b>Parent's Info</b></h4>";
    echo "</div>";
	echo "<div class='form-column'>";echo "";echo "</div>";echo "<div class='form-column'>";echo "";echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='father'>Father:</label><br><input type='text' name='father' value='{$user['father']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='work'>Occupation:</label><br><input type='text' name='work' value='{$user['work']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='mother'>Mother:</label><br><input type='text' name='mother' value='{$user['mother']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='wrk'>Occupation:</label><br><input type='text' name='wrk' value='{$user['wrk']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "";
    echo "</div>";
    echo "<div class='form-column'>";
    echo "<label for='cntact'>Contact No:</label><br><input type='text' name='cntact' value='{$user['cntact']}' readonly>";
    echo "</div>";
    echo "<div class='form-column'>";
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
                <label>Gender:</label>
                <select name="gender" value="<?php echo $user["gender"]; ?>" required>
                <option value="None">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-fetch">
                <label>Age:</label>
                <input type="number" name="age" value="<?php echo $user["age"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo $user["address"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Contact No:</label>
                <input type="number" name="contact" value="<?php echo $user["contact"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Father:</label>
                <input type="text" name="father" value="<?php echo $user["father"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Occupation:</label>
                <input type="text" name="work" value="<?php echo $user["work"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Mother:</label>
                <input type="text" name="mother" value="<?php echo $user["mother"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Occupation:</label>
                <input type="text" name="wrk" value="<?php echo $user["wrk"]; ?>" required>
            </div>
            <div class="form-fetch">
                <label>Contact No:</label>
                <input type="number" name="cntact" value="<?php echo $user["cntact"]; ?>" required>
            </div>
            <div class="form-actions">
                <button type="submit" name="update">Update</button>
                <button type="button" onclick="cancelUpdate()">Cancel</button>
            </div>
        </form>
    </div>
</center>
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