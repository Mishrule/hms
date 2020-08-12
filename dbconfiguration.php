<?php
$connectionError = "could not connect";
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbaseName = "bestsuitdatabase";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbaseName);

if ($conn) {
		//echo "connected";
} else {
    die($connectionError);
}
?>