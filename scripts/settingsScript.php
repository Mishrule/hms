<?php
include_once('../dbconfiguration.php');
//======================================| DELETE STUDENT RECORDS
if (isset($_POST["student_Record"])) {
    $studentRecordSQL = "TRUNCATE TABLE studentregistration";
    $studentResult = mysqli_query($conn, $studentRecordSQL);

    if ($studentResult) {
        echo "STUDENT DATABASE EMPTY SUCCESSFULLY";
    } else {
        echo "OOPs SOMETHINGS WENT WRONG TRY AGAIN...";
    }
}
//=======================================| DELETE VISITORS RECORDS
if (isset($_POST["visitors_Record"])) {
    $visitorsRecordSQL = "TRUNCATE TABLE visitors";
    $visitorsResult = mysqli_query($conn, $visitorsRecordSQL);

    if ($visitorsResult) {
        echo "VISITORS DATABASE EMPTY SUCCESSFULLY";
    } else {
        echo "OOPs SOMETHINGS WENT WRONG TRY AGAIN...";
    }
}

//=======================================| DELETE VISITORS RECORDS
if (isset($_POST["key_Record"])) {
    $keyRecordSQL = "UPDATE st SET studentid='null', fullname='null', statuss='null', checkindate='null' ";
    $keyResult = mysqli_query($conn, $keyRecordSQL);

    if ($keyResult) {
        echo "KEY LOG DATABASE RESET SUCCESSFULLY";
    } else {
        echo "OOPs SOMETHINGS WENT WRONG TRY AGAIN...";
    }
}

//=======================================| UPDATE KEY
if (isset($_POST["visitorsLog_Record"])) {
    $visitorslogRecordSQL = "TRUNCATE TABLE visitor_log";
    $visitorslogResult = mysqli_query($conn, $visitorslogRecordSQL);

    if ($visitorslogResult) {
        echo "VISITORS LOG DATABASE EMPTY SUCCESSFULLY";
    } else {
        echo "OOPs SOMETHINGS WENT WRONG...";
    }
}
?>