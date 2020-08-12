<?php
include_once('../dbconfiguration.php');
$nameOut = '';
if (isset($_POST["showName"])) {
    $showNames = mysqli_real_escape_string($conn, $_POST["showName"]);

    $NamesSQL = "SELECT * FROM studentregistration WHERE roomnumber='$showNames'";
    $result = mysqli_query($conn, $NamesSQL);

    $nameOut .= '<select id = "friendsName" name = "friendsName" style = "font-weight:bold;" class ="form-control custom-select mr-sm-6" required>
        <option value = "select room" > Select Name </option > ';

    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $fName = $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"];
            $nameOut .= '<option value = "' . $fName . '" >' . $fName . '</option >';
        }
    } else {
        $nameOut .= '<option value = "" >No Name found</option >';
    }
    $nameOut .= '</select>';
    echo $nameOut;
}

$visitOut = '';
if (isset($_POST["vistingName"])) {
    $vistingNames = mysqli_real_escape_string($conn, $_POST["vistingName"]);

    $visitSQL = "SELECT * FROM studentregistration WHERE roomnumber='$vistingNames'";
    $visitResult = mysqli_query($conn, $visitSQL);

    $visitOut .= '<select id = "friendsVisitedName" name = "friendsVisitedName" style = "font-weight:bold;" class ="form-control custom-select mr-sm-6" required>
        <option value = "" > Select Name </option > ';

    $num_row = mysqli_num_rows($visitResult);
    if ($num_row > 0) {
        while ($row = mysqli_fetch_array($visitResult)) {

            $fName = $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"];
            $visitOut .= '<option value = "' . $fName . '" >' . $fName . '</option >';
        }
    } else {
        $visitOut .= '<option value = "" >No Name found</option >';
    }
    $visitOut .= '</select>';
    echo $visitOut;
}

if (isset($_POST["log"])) {
    $visitorName = mysqli_real_escape_string($conn, $_POST["visitorName"]);
    $visitingRoom = mysqli_real_escape_string($conn, $_POST["visitingRoom"]);
    $friendsVisitedName = mysqli_real_escape_string($conn, $_POST["friendsVisitedName"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);

    //Date
    date_default_timezone_set("Africa/Accra");
    $currentTime = time();
    $dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    $logSQL = "INSERT INTO visitor_log VALUES('','$visitorName','$visitingRoom','$friendsVisitedName','$status','$dateTime')";
    $logResult = mysqli_query($conn, $logSQL);

    if ($logResult) {
        echo $visitorName . " is Logged Successfully";
    } else {
        echo "Ooops Something went wrong";
    }
}
//==========================================================================================
//                                      VIEW VISITORS LOG
//==========================================================================================
$showDataTables = '';
if (isset($_POST["showdata"])) {
  //  $varLimit = mysqli_real_escape_string($conn, $_POST["varLimit"]);
    $showSQL = "SELECT * FROM visitors ORDER BY date_time DESC";
    $showResult = mysqli_query($conn, $showSQL);
    $showDataTables .= '
        <table class="table table-responsive">
        <thead>
            <th>No.</th>
            <th>Fullname</th>
            <th>Contact</th>
            <th>Reg Date</th>
            <th>Controls</th>
        </thead>
        <tbody>
    ';
    $s = 1;
    $num_rows = mysqli_num_rows($showResult);
    if ($num_rows > 0) {
        while ($rows = mysqli_fetch_array($showResult)) {
            $showDataTables .= '
                    <tr>
                        <td>' . $s . '</td>
                        <td>' . $rows["firstname"] . ' ' . $rows["middlename"] . ' ' . $rows["lastname"] . '</td>
                        <td>' . $rows["contact"] . '</td>
                        <td>' . $rows["date_time"] . '</td>
                        <td><button type="button" class="btn btn-danger btn-sm del" name="' . $rows["indexnumber"] . '" id="' . $rows["indexnumber"] . '" value="' . $rows["indexnumber"] . '">Delete</button></td>
                    </tr>
            ';
            $s++;
        }
    } else {
        $showDataTables .= '
            <tr>
                <td colspan="5">Nothing found</td>
            </tr>
        ';
    }
    $showDataTables .= '</tbody>';
    $showDataTables .= '</table>';
    echo $showDataTables;
}

//======================================== TABLE LIMIT
$viewDataTables = '';
if (isset($_POST["viewlimit"])) {
    $varLimit = mysqli_real_escape_string($conn, $_POST["viewlimit"]);
    $showSQLI = "SELECT * FROM visitors ORDER BY date_time DESC LIMIT $varLimit";
    $showResultI = mysqli_query($conn, $showSQLI);
    $viewDataTables .= '
        <table class="table table-responsive">
        <thead>
            <th>No.</th>
            <th>Fullname</th>
            <th>Contact</th>
            <th>Reg Date</th>
            <th>Controls</th>
        </thead>
        <tbody>
    ';
    $s = 1;
    $num_rows = mysqli_num_rows($showResultI);
    if ($num_rows > 0) {
        while ($rows = mysqli_fetch_array($showResultI)) {
            $viewDataTables .= '
                    <tr>
                        <td>' . $s . '</td>
                        <td>' . $rows["firstname"] . ' ' . $rows["middlename"] . ' ' . $rows["lastname"] . '</td>
                        <td>' . $rows["contact"] . '</td>
                        <td>' . $rows["date_time"] . '</td>
                        <td><button type="button" class="btn btn-danger btn-sm del" name="' . $rows["indexnumber"] . '" id="' . $rows["indexnumber"] . '" value="' . $rows["indexnumber"] . '">Delete</button></td>
                    </tr>
            ';
            $s++;
        }
    } else {
        $viewDataTables .= '
            <tr>
                <td colspan="5">Nothing found</td>
            </tr>
        ';
    }
    $viewDataTables .= '</tbody>';
    $viewDataTables .= '</table>';
    echo $viewDataTables;
}

//======================================== TABLE LIMIT AND MONTH
$vDataTables = '';
if (isset($_POST["vlimit"])) {
    $vLimit = mysqli_real_escape_string($conn, $_POST["vlimit"]);
    $vMonth = mysqli_real_escape_string($conn, $_POST["vMonth"]);
    $vshowSQLI = "SELECT * FROM visitors  WHERE date_time LIKE '$vMonth%' ORDER BY date_time DESC LIMIT $vLimit";
    $vshowResultI = mysqli_query($conn, $vshowSQLI);
    $vDataTables .= '
        <table class="table table-responsive">
        <thead>
            <th>No.</th>
            <th>Fullname</th>
            <th>Contact</th>
            <th>Reg Date</th>
            <th>Controls</th>
        </thead>
        <tbody>
    ';
    $s = 1;
    $num_rows = mysqli_num_rows($vshowResultI);
    if ($num_rows > 0) {
        while ($rows = mysqli_fetch_array($vshowResultI)) {
            $vDataTables .= '
                    <tr>
                        <td>' . $s . '</td>
                        <td>' . $rows["firstname"] . ' ' . $rows["middlename"] . ' ' . $rows["lastname"] . '</td>
                        <td>' . $rows["contact"] . '</td>
                        <td>' . $rows["date_time"] . '</td>
                        <td><button type="button" class="btn btn-danger btn-sm del" name="' . $rows["indexnumber"] . '" id="' . $rows["indexnumber"] . '" value="' . $rows["indexnumber"] . '">Delete</button></td>
                    </tr>
            ';
            $s++;
        }
    } else {
        $vDataTables .= '
            <tr>
                <td colspan="5">Nothing found</td>
            </tr>
        ';
    }
    $vDataTables .= '</tbody>';
    $vDataTables .= '</table>';
    echo $vDataTables;
}

//=============================================VIEW BY MONTH
$showDataMonthTables = '';
if (isset($_POST["viewMonth"])) {
    $viewMonth = mysqli_real_escape_string($conn, $_POST["viewMonth"]);
    $showSQLMonth = "SELECT * FROM visitors WHERE date_time LIKE '$viewMonth%' ORDER BY date_time DESC";
    $showResultMonth = mysqli_query($conn, $showSQLMonth);
    $showDataMonthTables .= '
        <table class="table table-responsive">
        <thead>
            <th>No.</th>
            <th>Fullname</th>
            <th>Contact</th>
            <th>Reg Date</th>
            <th>Controls</th>
        </thead>
        <tbody>
    ';
    $s = 1;
    $num_rows = mysqli_num_rows($showResultMonth);
    if ($num_rows > 0) {
        while ($rows = mysqli_fetch_array($showResultMonth)) {
            $showDataMonthTables .= '
                    <tr>
                        <td>' . $s . '</td>
                        <td>' . $rows["firstname"] . ' ' . $rows["middlename"] . ' ' . $rows["lastname"] . '</td>
                        <td>' . $rows["contact"] . '</td>
                        <td>' . $rows["date_time"] . '</td>
                        <td><button type="button" class="btn btn-danger btn-sm del" name="' . $rows["indexnumber"] . '" id="' . $rows["indexnumber"] . '" value="' . $rows["indexnumber"] . '">Delete</button></td>
                    </tr>
            ';
            $s++;
        }
    } else {
        $showDataMonthTables .= '
            <tr>
                <td colspan="5">Nothing found</td>
            </tr>
        ';
    }
    $showDataMonthTables .= '</tbody>';
    $showDataMonthTables .= '</table>';
    echo $showDataMonthTables;
}
//================================================= DELETE INDIVIDUALLY
if (isset($_POST["id"])) {
    $del = $_POST["id"];
    $delSQL = "DELETE FROM visitors WHERE indexnumber = '$del'";
    $delResult = mysqli_query($conn, $delSQL);

    if ($delResult) {
        echo $del . " Deleted successfully";
    } else {
        echo "Ooops Something went wrong try again";
    }
}

//==================================================== LOG SHOWS
$logshow = '';
if (isset($_POST["log_show"])) {
    $logviewLog = mysqli_real_escape_string($conn, $_POST["viewLog"]);
    $sqlLOG = "SELECT * FROM visitor_log ORDER BY date_time DESC LIMIT $logviewLog";
    $resultLOG = mysqli_query($conn, $sqlLOG);
    $logshow .= '<ol class="list-inline">';
 //   $logshow .= '<li class="list-item"><strong>N0. | NAME | STATUS | ROOM NUMBER | DATE_TIME</strong></li><hr />';
    $count = 1;
    $log_num_rows = mysqli_num_rows($resultLOG);
    if ($log_num_rows > 0) {
        while ($logRow = mysqli_fetch_array($resultLOG)) {
            $logshow .= '<li class="list-item"><strong>' . $count . ' | ' . $logRow["fullname"] . ' | ' . $logRow["statuss"] . ' | ' . $logRow["RoomNumber"] . ' | ' . $logRow["date_time"] . '</strong></li><hr />';
            $count++;
        }

    } else {
        $logshow .= '<li class="list-inline-item">No Log Found</li>';
    }
    $logshow .= '</ol>';
    echo $logshow;
}

//==================================================== LOG SHOWS BY NAMES
$logshow = '';
if (isset($_POST["log_shOwLimit"])) {
    $logviewLog = mysqli_real_escape_string($conn, $_POST["log_shOwLimit"]);
    $logviewName = mysqli_real_escape_string($conn, $_POST["vieWLogName"]);
    $sqlLOG = "SELECT * FROM visitor_log WHERE fullname = '$logviewName' ORDER BY date_time DESC LIMIT $logviewLog";
    $resultLOG = mysqli_query($conn, $sqlLOG);
    $logshow .= '<ol class="list-inline">';
 //   $logshow .= '<li class="list-item"><strong>N0. | NAME | STATUS | ROOM NUMBER | DATE_TIME</strong></li><hr />';
    $count = 1;
    $log_num_rows = mysqli_num_rows($resultLOG);
    if ($log_num_rows > 0) {
        while ($logRow = mysqli_fetch_array($resultLOG)) {
            $logshow .= '<li class="list-item"><strong>' . $count . ' | ' . $logRow["fullname"] . ' | ' . $logRow["statuss"] . ' | ' . $logRow["RoomNumber"] . ' | ' . $logRow["date_time"] . '</strong></li><hr />';
            $count++;
        }

    } else {
        $logshow .= '<li class="list-inline-item">No Log Found</li>';
    }
    $logshow .= '</ol>';
    echo $logshow;
}
//============================================ MONTH
$logshowMonth = '';
if (isset($_POST["vieWLogMonth"])) {
    $logviewLogLimitMonth = mysqli_real_escape_string($conn, $_POST["log_shOwLimitMonth"]);
    $logviewNameMonth = mysqli_real_escape_string($conn, $_POST["vieWLogNameMonth"]);
    $logviewMonth = mysqli_real_escape_string($conn, $_POST["vieWLogMonth"]);

    $sqlLOGMonth = "SELECT * FROM visitor_log WHERE fullname = '$logviewNameMonth' AND date_time LIKE '$logviewMonth%' ORDER BY date_time DESC LIMIT $logviewLogLimitMonth";
    $resultLOGMonth = mysqli_query($conn, $sqlLOGMonth);
    $logshowMonth .= '<ol class="list-inline">';
 //   $logshowMonth .= '<li class="list-item"><strong>N0. | NAME | STATUS | ROOM NUMBER | DATE_TIME</strong></li><hr />';
    $countMonth = 1;
    $log_num_rowsMonth = mysqli_num_rows($resultLOGMonth);
    if ($log_num_rowsMonth > 0) {
        while ($logRow = mysqli_fetch_array($resultLOGMonth)) {
            $logshowMonth .= '<li class="list-item"><strong>' . $countMonth . ' | ' . $logRow["fullname"] . ' | ' . $logRow["statuss"] . ' | ' . $logRow["RoomNumber"] . ' | ' . $logRow["date_time"] . '</strong></li><hr />';
            $countMonth++;
        }

    } else {
        $logshowMonth .= '<li class="list-inline-item">No Log Found</li>';
    }
    $logshowMonth .= '</ol>';
    echo $logshowMonth;
}

//===================================================== STATUS
$logshowStatus = '';
if (isset($_POST["view_LogStatus"])) {
    $logviewLogLimitStatus = mysqli_real_escape_string($conn, $_POST["log_shOwLimitStatus"]);
    $logviewNameStatus = mysqli_real_escape_string($conn, $_POST["vieWLogNameStatus"]);
    $logviewStatus = mysqli_real_escape_string($conn, $_POST["view_LogStatus"]);
    $logviewMonthStatus = mysqli_real_escape_string($conn, $_POST["vieWLogMonthStatus"]);

    $sqlLOGStatus = "SELECT * FROM visitor_log WHERE fullname = '$logviewNameStatus' AND date_time LIKE '$logviewMonthStatus%' AND statuss = '$logviewStatus' ORDER BY date_time DESC LIMIT $logviewLogLimitStatus";
    $resultLOGStatus = mysqli_query($conn, $sqlLOGStatus);
    $logshowStatus .= '<ol class="list-inline">';
 //   $logshowStatus .= '<li class="list-item"><strong>N0. | NAME | STATUS | ROOM NUMBER | DATE_TIME</strong></li><hr />';
    $countStatus = 1;
    $log_num_rowsMonth = mysqli_num_rows($resultLOGStatus);
    if ($log_num_rowsMonth > 0) {
        while ($logRow = mysqli_fetch_array($resultLOGStatus)) {
            $logshowStatus .= '<li class="list-item"><strong>' . $countStatus . ' | ' . $logRow["fullname"] . ' | ' . $logRow["statuss"] . ' | ' . $logRow["RoomNumber"] . ' | ' . $logRow["date_time"] . '</strong></li><hr />';
            $countStatus++;
        }

    } else {
        $logshowStatus .= '<li class="list-inline-item">No Log Found</li>';
    }
    $logshowStatus .= '</ol>';
    echo $logshowStatus;
}

//===================================================== CLEAR
if (isset($_POST["clearVisitors"])) {
    $clearSql = "DELETE FROM visitor_log";
    $clearResult = mysqli_query($conn, $clearSql);
    if ($clearResult) {
        echo "VISITORS RECORDS ARE DELETED FROM THE DATABASE SUCCESSFULLY";
    } else {
        echo "Oops Something went wrong TRY AGAIN";
    }

}
?>