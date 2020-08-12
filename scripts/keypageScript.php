<?php

    //===============================================| CHANGE ROOM COMBO BOX|=======================================
include_once('../dbconfiguration.php');

$output = '';
if (isset($_POST["roomNumber"])) {
    $room = $_POST["roomNumber"];

    $sql = "SELECT * FROM studentregistration WHERE roomnumber='$room'";
    $result = mysqli_query($conn, $sql);
    $output .= '<div class = "container">
                        <div class="row">';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<div style="display:inline" class="col-lg-3 col-md-3 col-sm-12">';
            $output .= '<div class="card carrd" style="width: 18rem;">';
            $output .= '<div class="card-body">';

            $output .= ' <p><img height="200px" width="200px" style="border-radius: 15px; float:auto;" src="img/' . $row["imagename"] . '"</p>';
            $output .= '<p class="card-text sindex" ><h5><label id="">' . $row["studentid"] . '</label></h5></p>';
            $output .= '<p class="card-text fname"><h4><label id="">  ' . $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"] . '</label></h4></p>';
            $output .= '<p class="card-text" ><h6>' . $row["roomnumber"] . '</h6></p>';
            $output .= '<input type="hidden" id="room" name="room" value="' . $row["roomnumber"] . '"/>';
        
        //    $output .='<p class="card-text">Status: <label id="stat"></label></p>';
        //    $output .='<p class="card-text">Check in : <label id="status_timein"></label></p>';
        //    $output .='<p class="card-text">Check out : <label id="status_timeout"></label></p>';

            $output .= '<input type="hidden" id=" ' . $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"] . '" class="studentindex" name=" ' . $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"] . '" value="' . $row["studentid"] . '"/>';

            $output .= '<button type="button" class="btn btn-primary btn-sm checkin" id="' . $row["studentid"] . '" name="' . $row["studentid"] . '" value="' . $row["studentid"] . '">Check in</button>';

            $output .= '<button type="button" style="margin-left:10px;" class="btn btn-success btn-sm checkout" id="' . $row["studentid"] . '" name="' . $row["studentid"] . '" value="' . $row["studentid"] . '">Check out</button>';

            $output .= '</div>';
            $output .= ' </div>';
            $output .= '</div>';

        }

    } else {
        $output .= '<p>Sorry No Records Found</p>';
    }

    echo $output;
}

   //===============================================| CHANGE ROOM COMBO BOX|=======================================
//include_once('../dbconfiguration.php');
/*
$outpute = array();
if (isset($_POST["roomNumberChange"])) {
    $room = $_POST["roomNumberChange"];
    $stat = "check in";
    $sql = "SELECT * FROM st WHERE room ='$room' ";
    $result = mysqli_query($conn, $sql);
            
    
  //  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $outpute['statussd'] = $row["statuss"];
        $outpute['checkinTime'] = $row["checkindate"];
        $outpute['checkoutTime'] = $row["checkoutdate"];
    }

  //  } else {
      //  $outpute .= '<p>Sorry No Records Found</p>';
  //  }

    echo json_encode($outpute);
}
 */
//==================================| SET FIELD INSTEAD
if (isset($_POST["id"])) {
    $soutP = array();
    $sid = $_POST["id"];

    $sql = "SELECT * FROM studentregistration where studentid='$sid'";
  //  $sql = "UPDATE st SET studentid='', fullname='',statuss=''checkindate='', checkoutdate='' WHERE room ='$room' ";
    $result = mysqli_query($conn, $sql);
            
    
  //  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $soutP['name'] = $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"];

    }

  //  } else {
      //  $outpute .= '<p>Sorry No Records Found</p>';
  //  }

    echo json_encode($soutP);
}
//===============================| SET FIELDS
if (isset($_POST["logButton"])) {
    $logText = mysqli_real_escape_string($conn, $_POST["varCheck"]);
    $Membersroom = mysqli_real_escape_string($conn, $_POST["Members"]);
    $sidindex = mysqli_real_escape_string($conn, $_POST["sidindex"]);
    $sName = mysqli_real_escape_string($conn, $_POST["sName"]);

    date_default_timezone_set("Africa/Accra");
    $currentTime = time();
    $dateTIme = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    $logSQL = "UPDATE st SET studentid='$sidindex', fullname='$sName', statuss='$logText', checkindate='$dateTIme' WHERE room = '$Membersroom'";

    $logResult = mysqli_query($conn, $logSQL);

    if ($logResult) {
        echo "KEY LOGGED SUCCESSFULLY";
    } else {
        echo "Oooops! Something went wrong try again";
    }


}
$statusOupPutt = '';
if (isset($_POST["roomNumberStatus"])) {
    $room = $_POST["roomNumberStatus"];
    $stat = "check in";
    $sql = "SELECT * FROM st WHERE room ='$room' ";
    $result = mysqli_query($conn, $sql);

    $statusOupPutt .= '<div class="alert alert-danger col-lg-12 col-md-12 col-sm-12" role="alert">';
    $statusOupPutt .= '<div style ="text-align:center; font-weight:bold;">';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            $statusOupPutt .= '<span>Last Checked: </span><span style="color:black;"> ' . $row["fullname"] . ' </span>| Status: <span style="color:black;"> ' . $row["statuss"] . '</span>| Date and Time: <span style="color:black;"> ' . $row["checkindate"] . '</span>';
        }

    } else {
        $statusOupPutt .= '<p>Sorry No Records Found</p>';
    }
    $statusOupPutt .= '</div></div>';

    echo ($statusOupPutt);
}
?>