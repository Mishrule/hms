 <?php 

include('dbconfiguration.php');
include('session.php');



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

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">

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
         <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
        </li>
        
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
      </ul>
    </nav>

    <section class="calout">
      <div class="container-fluid">
          <center>
             <div style="border-bottom: 1px solid white; float:center; color: white; font-weigth:bold;">
                <h3><i class="fa fa-gear"></i> Settings</h3>
             </div><br />
             <h4 style="color: #ffffcc;">This page provides you the avenue to<span style="color:red;"> DELETE </span>all Database records making the database empty for the new records</h4>
          </center><br />
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="text-align:center; background-color:#ffffcc;">
                    <div class="card-header"> 
                        <h5>Delete Student Records</h5>
                    </div>
                    <div class="card-body">  
                        <button type="button" class="btn btn-danger" name="studentRecord" id="studentRecord" value="studentRecord">Delete Student Records</button>  
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="text-align:center; background-color:#ffffcc;">
                    <div class="card-header"> 
                        <h5>Delete Visitors Records</h5>
                    </div>
                    <div class="card-body">    
                        <button type="button" class="btn btn-danger" name="visitorsRecords" id="visitorsRecords" value="visitorsRecords">Delete Visitors Records</button>  
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="text-align:center; background-color:#ffffcc;">
                    <div class="card-header"> 
                        <h5>Delete Visitors Log</h5>
                    </div>
                    <div class="card-body">    
                        <button type="button" class="btn btn-danger" name="visitorLog" id="visitorLog" value="visitorLog">Delete Visitors Log</button>  
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="text-align:center; background-color:#ffffcc;">
                    <div class="card-header"> 
                        <h5>Delete Key Log</h5>
                    </div>
                    <div class="card-body">  
                        <button type="button" class="btn btn-danger" name="keyLog" id="keyLog" value="keyLog">Delete Key Log</button>    
                    </div>
                </div>
            </div>
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

  </body>

</html>
<script>
    $(document).ready(function(){
//======================================| DELETE STUDENT RECORDS
        $(document).on('click','#studentRecord', function(){
        var student_Record = $('#studentRecord').val();
            if(confirm("YOU ARE ABOUT EMPTY STUDENT RECORDS\n Click OK to Process")){
                $.ajax({
                url:'scripts/settingsScript.php',
                method:'POST',
                data:{student_Record:student_Record},
                success:function(data){
                    alert(data);
                }
            });
            }
        });

//=======================================| DELETE VISITORS RECORDS
        $(document).on('click','#visitorsRecords', function(){
        var visitors_Record = $('#visitorsRecords').val();
            if(confirm("YOU ARE ABOUT EMPTY VISITORS RECORDS\n Click OK to Process")){
                $.ajax({
                url:'scripts/settingsScript.php',
                method:'POST',
                data:{visitors_Record:visitors_Record},
                success:function(data){
                    alert(data);
                }
            });
            }
        });

//=======================================| DELETE VISITORS RECORDS
        $(document).on('click', '#visitorLog', function(){
        var visitorsLog_Record = $('#visitorLog').val();
            if(confirm("YOU ARE ABOUT EMPTY VISITORS LOG RECORDS\n Click OK to Process")){
                $.ajax({
                url:'scripts/settingsScript.php',
                method:'POST',
                data:{visitorsLog_Record:visitorsLog_Record},
                success:function(data){
                    alert(data);
                }
            });
            }
        });
//=======================================| KEY LOGGER RECORDS
        $(document).on('click', '#keyLog', function(){
        var key_Record = $('#keyLog').val();
            if(confirm("YOU ARE ABOUT RESET KEY LOG RECORDS\n Click OK to Process")){
                $.ajax({
                url:'scripts/settingsScript.php',
                method:'POST',
                data:{key_Record:key_Record},
                success:function(data){
                    alert(data);
                }
            });
            }
        });
    });
</script>