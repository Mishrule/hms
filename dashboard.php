<?php 
include('session.php');
include('dbconfiguration.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KMS | Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <script src="js/date_time.js"></script>

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">
     <style>
    .carrd{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 450px;
      margin: auto;
      text-align: center;
      font-family: arial;
      background-color:#ffffcc;
    }

  </style>

  </head>

  <body id="page-top">
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav nav-pills">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#">Welcome: <?php echo $login_session; ?></a>
        </li>
         <li class="sidebar-nav-item ">
          <a class="js-scroll-trigger nav-link active" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger " href="registrationpage.php"><i class="fa fa-pencil-square-o"></i> Register</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="managepage.php"><i class="fa fa-user-times"></i> Manage Student</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="profilepage.php"><i class="fa fa-user-secret"></i> Student Profile</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="keypage.php"><i class="fa fa-key"></i> Key Activities</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="userspage.php"><i class="fa fa-user"></i> Users</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
      </ul>
    </nav>

    

    <!-- Callout -->
    <section class="callout">
      <div class="container">
              
        <div align="center">
           <h1 class="text-uppercase col-10" style="font-size:60px; color:#ffffcc;;">
              <strong id="date_time"></strong>
           </h1>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="card" style="text-align:center; background-color:#ffffcc;">
              <div class="card-header">
                <h5><strong><em><i class="fa fa-users"></i> Total Students</em></strong></h5>
              </div>
              <div class="card-body">
                <?php
                $studentSQL = "SELECT count(studentid) AS student FROM studentregistration";
                $studentResult = mysqli_query($conn, $studentSQL);
                $student_row = mysqli_fetch_array($studentResult);
                $student_Count = $student_row["student"];
                ?>
                <h2><?php echo $student_Count; ?></h2><hr />
                <h5>Students</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="text-align:center; background-color:#ffffcc;">
              <div class="card-header">
                <h5><strong><em><i class="fa fa-male"></i> Total Males</em></strong></h5>
              </div>
              <div class="card-body">
                <?php
                $genda = "male";
                $genderSQL = "SELECT count(gender) AS gender FROM studentregistration WHERE gender='$genda'";
                $genderResult = mysqli_query($conn, $genderSQL);
                $gender_row = mysqli_fetch_array($genderResult);
                $gender_Count = $gender_row["gender"];
                ?>
                <h2><?php echo $gender_Count; ?></h2><hr />
                <h5>Males</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="text-align:center; background-color:#ffffcc;">
              <div class="card-header">
                <h5><strong><em><i class="fa fa-female"></i> Total Females</em></strong></h5>
              </div>
              <div class="card-body">
                <?php
                $genda = "female";
                $genderFemaleSQL = "SELECT count(gender) AS femalegender FROM studentregistration WHERE gender='$genda'";
                $genderFemaleResult = mysqli_query($conn, $genderFemaleSQL);
                $femalegender_row = mysqli_fetch_array($genderFemaleResult);
                $femalegender_Count = $femalegender_row["femalegender"];
                ?>
                <h2><?php echo $femalegender_Count; ?></h2><hr />
                <h5>Females</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="text-align:center; background-color:#ffffcc;">
              <div class="card-header">
                <h5><strong><em><i class="fa fa-street-view"></i> Total Visitors</em></strong></h5>
              </div>
              <div class="card-body">
                <?php

                $visitorsSQL = "SELECT count(indexnumber) AS visitors FROM visitors";
                $visitorsResult = mysqli_query($conn, $visitorsSQL);
                $visitors_row = mysqli_fetch_array($visitorsResult);
                $visitors_Count = $visitors_row["visitors"];
                ?>
                <h2><?php echo $visitors_Count; ?></h2><hr />
                <h5>Visitors</h5>
              </div>
            </div>
          </div>
        </div><br />
        <div align = "right">
          <a href="settings.php" class="btn btn-danger"><i class="fa fa-gears"></i>Click to go to Settings</a>
        </div>
      </div>
    </section>
  
    

     <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <!-- <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-facebook"></i>
          </a> -->
          </li>
          <li class="list-inline-item">
            <!--<a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-twitter"></i>
          </a>-->
          </li>
          <li class="list-inline-item">
            <!--<a class="social-link rounded-circle text-white" href="#">
            <i class="icon-social-github"></i>
          </a>-->
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; Powered by | MISH 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>
    
    <script type="text/javascript">window.onload = date_time('date_time');</script>
    

  </body>

</html>

