<?php
include_once('../dbconfiguration.php');

$output = '';
if (isset($_POST['searchbutton'])) {
	$search = mysql_real_escape_string($_POST['search']);

	$sql = "SELECT * FROM studentregistration WHERE studentid = $search";
	$result = mysqli_query($conn, $sql);

	$output .= '
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="carrd">
			
		';
	if ($num_row = mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= '
				
						<br /><br /><p><img height="200px" class="thumbnil" width="200px" style="border-radius: 50px;" src="img/' . $row["imagename"] . '"</p>
					
					
						<p><h3>' . $row["studentid"] . '</h3></p>
					
						<p><h2>' . $row["lastname"] . ' ' . $row["middlename"] . ' ' . $row["firstname"] . '</h2></p>
					
						<p><h4>' . $row["roomnumber"] . '<h4></p>
						<p>' . $row["level"] . '</p>
						<input type="hidden" name="updateindex" id="updateindex" value="' . $row["studentid"] . '" />
						<input type="hidden" name="updatefirst" id="updatefirst" value="' . $row["firstname"] . '" />
						<input type="hidden" name="updatemiddle" id="updatemiddle" value="' . $row["middlename"] . '" />
						<input type="hidden" name="updatelast" id="updatelast" value="' . $row["lastname"] . '" />
						<input type="hidden" name="updateroom" id="updateroom" value="' . $row["roomnumber"] . '" />
						
				
						<p>' . $row["program"] . '</p>
					
				
						<p>' . $row["gender"] . '</p>
					
				
						<p>' . $row["dateofbirth"] . '</p>
					
				
						<p>' . $row["placeofbirth"] . '</p>
					
				
						<p>' . $row["studentcontact"] . '</p>
					
				
						<p>' . $row["studentemail"] . '</p>
						
				
						<p>' . $row["registrationdate"] . '</p>

						<p style="color: red;"><marquee><strong><h4>Guardian Information</h4><strong></marquee></p>
				
						<p>' . $row["guardianname"] . '</p>
					
				
						<p>' . $row["guardiancontact"] . '</p>
					
				
						<p>' . $row["location"] . '</p>
					
				
						
					
				
						<p><button type="button" class="btn btn-danger btn-xs delete" value="' . $row["studentid"] . '" id="del" name="del">Delete</button>
						<button type="button" class="btn btn-success btn-xs edit" value="' . $row["studentid"] . '" data-toggle="modal" data-target="#update">Edit</button></p><br />
					
				';
		}
	} else {
		$output .= '
				<br />
				<p class="text text-danger"><strong><marquee> No Student Records Found </marquee><strong></p>
				
			';
	}
	$output . '</div></div>';
	echo $output;
}
//============================== UPDATE AFTER DELETE
$outputs = '';
if (isset($_POST['select'])) {
	$search = 0;

	$sql = "SELECT * FROM studentregistration WHERE studentid = $search";
	$result = mysqli_query($conn, $sql);

	$outputs .= '
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="carrd">
			
		';
	if ($num_row = mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$outputs .= '
				
						<br /><br /><p><img height="200px" class="thumbnil" width="200px" style="border-radius: 50px;" src="img/' . $row["imagename"] . '"</p>
					
					
						<p><h3>' . $row["studentid"] . '</h3></p>
					
						<p><h2>' . $row["lastname"] . ' ' . $row["middlename"] . ' ' . $row["firstname"] . '</h2></p>
					
						<p><h4>' . $row["roomnumber"] . '<h4></p>
						<p>' . $row["level"] . '</p>
						<input type="hidden" name="updateindex" id="updateindex" value="' . $row["studentid"] . '" />
						<input type="hidden" name="updatefirst" id="updatefirst" value="' . $row["firstname"] . '" />
						<input type="hidden" name="updatemiddle" id="updatemiddle" value="' . $row["middlename"] . '" />
						<input type="hidden" name="updatelast" id="updatelast" value="' . $row["lastname"] . '" />
						<input type="hidden" name="updateroom" id="updateroom" value="' . $row["roomnumber"] . '" />
						
				
						<p>' . $row["program"] . '</p>
					
				
						<p>' . $row["gender"] . '</p>
					
				
						<p>' . $row["dateofbirth"] . '</p>
					
				
						<p>' . $row["placeofbirth"] . '</p>
					
				
						<p>' . $row["studentcontact"] . '</p>
					
				
						<p>' . $row["studentemail"] . '</p>
						
				
						<p>' . $row["registrationdate"] . '</p>

						<p style="color: red;"><marquee><strong><h4>Guardian Information</h4><strong></marquee></p>
				
						<p>' . $row["guardianname"] . '</p>
					
				
						<p>' . $row["guardiancontact"] . '</p>
					
				
						<p>' . $row["location"] . '</p>
					
				
						
					
				
						<p><button type="button" class="btn btn-danger btn-xs delete" value="' . $row["studentid"] . '" id="del" name="del">Delete</button>
						<button type="button" class="btn btn-success btn-xs edit" value="' . $row["studentid"] . '" data-toggle="modal" data-target="#update">Edit</button></p><br />
					
				';
		}
	} else {
		$outputs .= '
				<br />
				<p class="text text-danger"><strong><marquee> No Student Records Found </marquee><strong></p>
				
			';
	}
	$outputs . '</div></div>';
	echo $outputs;
}

//=====================================UPDATE
if (isset($_POST["updatebutton"])) {
	$studentindex = mysqli_real_escape_string($conn, $_POST["studentindex"]);
	$studentFirst = mysqli_real_escape_string($conn, $_POST["studentFirst"]);
	$studentMiddle = mysqli_real_escape_string($conn, $_POST["studentMiddle"]);
	$studentSur = mysqli_real_escape_string($conn, $_POST["studentSur"]);
	$studentRoom = mysqli_real_escape_string($conn, $_POST["studentRoom"]);

	$updateSQL = "UPDATE studentregistration SET firstname='$studentFirst', middlename='$studentMiddle', lastname='$studentSur', roomnumber='$studentRoom' WHERE studentid='$studentindex'";

	$updateResult = mysqli_query($conn, $updateSQL);

	if ($updateResult) {
		echo "Student Records updated successfully";
	} else {
		echo "OOOPs! Something went wrong try again...";
	}
}

//============================== DELETE
if (isset($_POST["deletebutton"])) {
	$del = $_POST["deletebutton"];
	$deleteSQL = "DELETE FROM studentregistration WHERE studentid='$del'";
	$deleteResult = mysqli_query($conn, $deleteSQL);

	if ($deleteResult) {
		echo "You have successfully Delete " . $del . " Records";
	} else {
		echo "OOPs! Something went wrong try again later";
	}
}
?>