<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: 0.625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 0.8em;
                text-align: right;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
</head>
<body>
<?php
// Assuming you have a database connection established
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

    

    // Fetch student records from the 'students' table
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $stud_id = $row['stud_id'];
        $firstname = $row['firstname'];
        $middle = $row['middle'];
        $lastname = $row['lastname'];
        $grade = $row['grade'];
        $sub_code = $row['sub_code'];
        $sub = $row['sub'];
        $lec = $row['lec'];
        $lab = $row['lab'];
        $unit = $row['unit'];
        // Output the table for each student
        echo "<center>
            <h4>First Year/1st Semester</h4>
	<caption>Student Grades<br>$firstname $middle $lastname</caption>
            <table id=\"table\" style=\"width:70%;\" border=\"1\">
                <thead>
                    <tr>
                        <th style='text-align:center;'>Grade</th>
                        <th>Subject Code</th>
                        <th>Subject</th>
                        <th>Lec</th>
                        <th>Lab</th>
                        <th>Unit</th>
                        <th style=\"text-align: center;\">Action</th>
                    </tr>
                </thead>
                <tbody>";

        $query = mysqli_query($conn, "SELECT * FROM `1y_1s` WHERE id = '$stud_id'") or die(mysqli_connect_error());
        while ($fetch = mysqli_fetch_array($query)) {
            $stud_id = $fetch['stud_id'];
            $grade = $fetch['grade'];
            $sub_code = $fetch['sub_code'];
            $sub = $fetch['sub'];
            $lec = $fetch['lec'];
            $lab = $fetch['lab'];
            $unit = $fetch['unit'];

            echo "<tr class=\"del_student$stud_id\">
                    <td style=\"text-align: center;\">$grade</td>
                    <td style=\"text-align: center;\">$sub_code</td>
                    <td style=\"text-align: center;\">$sub</td>
                    <td style=\"text-align: center;\">$lec</td>
                    <td style=\"text-align: center;\">$lab</td>
                    <td style=\"text-align: center;\">$unit</td>
                    <td style=\"text-align: center;\">
                        <button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#edit_modal$stud_id\">
                            <span class=\"glyphicon glyphicon-edit\"></span>
                        </button>
                    </td>
                </tr>

                <div class=\"modal fade\" id=\"edit_modal$id\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <form method=\"POST\" action=\"update'bsit'sr.php\">
                                <div class=\"modal-header\">
                                    <h4 class=\"modal-title\">Update Student</h4>
                                </div>
                                <div class=\"modal-body\">
                                    <div class=\"col-md-3\"></div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <label>Grade</label>
                                            <input type=\"hidden\" name=\"id\" value=\"$id\" class=\"form-control\"/>
                                            <input type=\"text\" name=\"grade\" value=\"$grade\" class=\"form-control\" required=\"required\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <label>Subject Code</label>
                                            <input type=\"text\" name=\"sub_code\" value=\"$sub_code\" class=\"form-control\" readonly/>
                                        </div>
                                        <div class=\"form-group\">
                                            <label>Subject</label>
                                            <input type=\"text\" name=\"sub\" value=\"$sub\" class=\"form-control\" readonly/>
                                        </div>
                                        <div class=\"form-group\">
                                            <label>Lec</label>
                                            <input type=\"number\" name=\"lec\" value=\"$lec\" class=\"form-control\" readonly/>
                                        </div>
                                        <div class=\"form-group\">
                                            <label>Lab</label>
                                            <input type=\"number\" name=\"lab\" value=\"$lab\" class=\"form-control\" readonly/>
                                        </div>
                                        <div class=\"form-group\">
                                            <label>Unit</label>
                                            <input type=\"number\" name=\"unit\" value=\"$unit\" class=\"form-control\" readonly/>
                                        </div>
                                        <div style=\"clear:both;\"></div>
                                </div>
                                <div class=\"modal-footer\">
                                    <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">
                                        <span class=\"glyphicon glyphicon-remove\"></span> Close
                                    </button>
                                    <button name=\"update\" class=\"btn btn-warning\">
                                        <span class=\"glyphicon glyphicon-save\"></span> Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";
        }

        echo "</tbody>
            </table>
            </center>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
</body>
</html>