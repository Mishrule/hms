<?php
	//Select.php
include_once('../dbconfiguration.php');

$output = '';
if (isset($_POST["action"])) {
    $tablelimit = 5;
    $sql = "SELECT * FROM studentregistration  ORDER BY roomnumber ASC LIMIT $tablelimit";

    $result = mysqli_query($conn, $sql);

    $output .= '
			<table class="table table-bordered table-responsive table-hover table-striped">
				<tr>
					<th>Student id</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Surname</th>
					<th>Level</th>
					<th>Program of Study</th>
					<th>Gender</th>
					<th>Student Email</th>
					<th>Location</th>
					<th>Room Number</th>
					<th>Action</th>
				</tr>
		';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
					<tr>
						<td>' . $row["studentid"] . '</td>
						<td id="' . $row["firstname"] . '" name="' . $row["firstname"] . '">' . $row["firstname"] . '</td>
						<td>' . $row["middlename"] . '</td>
						<td>' . $row["lastname"] . '</td>
						<td id="' . $row["level"] . '" name="' . $row["level"] . '">' . $row["level"] . '</td>
						<td id="' . $row["program"] . '" name="' . $row["program"] . '">' . $row["program"] . '</td>
						<td>' . $row["gender"] . '</td>
						<td>' . $row["studentemail"] . '</td>
						<td>' . $row["location"] . '</td>
						<td id="' . $row["roomnumber"] . '" name="' . $row["roomnumber"] . '">' . $row["roomnumber"] . '</td>
						<td><button type="button" id="' . $row["studentid"] . '" name="' . $row["studentid"] . '" class="delete btn btn-success btn-xs">Delete</button></td>
						
					</tr>
				';
        }
    } else {
        $output .= '
				<tr>
					<td colspan = "12">Records Empty</td>
				</tr>
			';
    }
    $output .= '</table>';
    echo $output;
}

$outlimit = '';
if (isset($_POST["tablelimit"])) {
    $tablelimit = mysqli_real_escape_string($conn, $_POST["tablelimit"]);
    $sql = "SELECT * FROM studentregistration  ORDER BY roomnumber ASC LIMIT $tablelimit";

    $result = mysqli_query($conn, $sql);

    $outlimit .= '
			<table class="table table-bordered table-responsive table-striped table-hover">
				<tr>
					<th>Student id</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Surname</th>
					<th>Level</th>
					<th>Program of Study</th>
					<th>Gender</th>
					<th>Student Email</th>
					<th>Location</th>
					<th>Room Number</th>
					<th>Action</th>
				</tr>
		';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $outlimit .= '
					<tr>
						<td>' . $row["studentid"] . '</td>
						<td id="' . $row["firstname"] . '" name="' . $row["firstname"] . '">' . $row["firstname"] . '</td>
						<td>' . $row["middlename"] . '</td>
						<td>' . $row["lastname"] . '</td>
						<td id="' . $row["level"] . '" name="' . $row["level"] . '">' . $row["level"] . '</td>
						<td id="' . $row["program"] . '" name="' . $row["program"] . '">' . $row["program"] . '</td>
						<td>' . $row["gender"] . '</td>
						<td>' . $row["studentemail"] . '</td>
						<td>' . $row["location"] . '</td>
						<td id="' . $row["roomnumber"] . '" name="' . $row["roomnumber"] . '">' . $row["roomnumber"] . '</td>
						<td><button type="button" id="' . $row["studentid"] . '" name="' . $row["studentid"] . '" class="delete btn btn-success btn-xs">Delete</button></td>
						
					</tr>
				';
        }
    } else {
        $outlimit .= '
				<tr>
					<td colspan = "12">Records Empty</td>
				</tr>
			';
    }
    $outlimit .= '</table>';
    echo $outlimit;
}


if (isset($_POST["actions"])) {
    $del = $_POST["id"];
    $sql = "DELETE FROM studentregistration Where studentid = $del ";
    $result = mysqli_query($conn, $sql);
    echo 'Deleted successfully';
}
?>