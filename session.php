<?php
include_once('dbconfiguration.php');
session_start();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn, "SELECT * FROM useraccount WHERE username ='$user_check' ");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['username'];
if (!isset($_SESSION['login_user'])) {
    header("location:index.php");
}

?>