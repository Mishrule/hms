 <?php 

include('dbconfiguration.php');
include('session.php');
$msg = $output = '';
if (isset($_POST['registerVisitor'])) {
  $userFirstName = mysqli_real_escape_string($conn, $_POST["userFirstName"]);
  $middlename = mysqli_real_escape_string($conn, $_POST["middlename"]);
  $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
  $indeXNumber = mysqli_real_escape_string($conn, $_POST["userName"]);
  $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
  $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
  $friendsName = mysqli_real_escape_string($conn, $_POST["friendsName"]);
  $roomMembers = mysqli_real_escape_string($conn, $_POST["roomMembers"]);

  //Date
  date_default_timezone_set("Africa/Accra");
  $currentTime = time();
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);



  $checkINSQL = "INSERT INTO visitors VALUES('', '$userFirstName', '$middlename', '$lastName', '$indeXNumber', '$contact', '$gender', '$friendsName', '$roomMembers', '$DateTime')";

  $checkINResult = mysqli_query($conn, $checkINSQL);

  if ($checkINResult) {
    echo '<script>alert("Visitor Registered Successfully")</script>';
  } else {
    echo '<script>alert("Ooops Something went wrong. Try again")</script>';
  }
}
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
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#">Welcome: <?php echo $login_session; ?></a>
        </li>
         <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
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
          <a class="js-scroll-trigger nav-link active" href="keypage.php"><i class="fa fa-key"></i> Key Activities</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="userspage.php"><i class="fa fa-user"></i> Users</a>
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
                <h3><i class="fa fa-street-view"></i> View Visitors Log</h3>
             </div><br />
          </center>
        <div class="row">
            <div class="col-md-6">
               <div class="card text-center" style="background:#ffffcc;" >
                <div class="card-header">
                  Registered Visitors
                </div>
                <div class="card-body">
                  <p class="card-title">
                    <label for="viewMonth">View by Month</label>
                    <select id="viewMonth" name="viewMonth" style="font-weight:bold;" class="form-control-sm col-3 custom-select mr-sm-6">
                        <option>Select Month</option>
                        <option value="Jan">January</option>
                        <option value="Feb">February</option>
                        <option value="Mar">March</option>
                        <option value="Apr">April</option>
                        <option value="May">May</option>
                        <option value="Jun">June</option>
                        <option value="Jul">July</option>
                        <option value="Aug">August</option>
                        <option value="Sept">September</option>
                        <option value="Oct">October</option>
                        <option value="Not">November</option>
                        <option value="Dec">December</option>
                    </select>
                    <label for="viewLimit">View limit</label>
                    <select id="viewLimit" name="viewLimit" style="font-weight:bold;" class="form-control-sm col-3 custom-select mr-sm-6">
                        <option value="0">Select Limit</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500">500</option>
                        <option value="5000">All</option>
                    </select>
                  </p>
                  <div class="table table-responsive">
                    <div id="showTables"></div>
                  </div>
                </div>
              </div>
            </div>
<!--//============================================ VISITORS LOG -->
            <div class="col-md-6">
              <div class="card text-center" style="background:#ffffcc;" >
                <div class="card-header">
                  View Visitors Log
                </div>
                <div class="card-body">
                  <div>
                    <h4 class="card-title">View Log</h4>
                    <table class="table table-responsive">
                      <thead>
                       
                        <th>Names</th>
                        <th>Month</th>
                        <th>Status</th>
                        <th>Limit</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                             <select id="visitorLogName" name="visitorLogName" style="font-weight:bold;" class="form-control-sm custom-select mr-sm-6" required>
                            <option value="select room" >Visitor Name</option>
                            <?php
                            $visitor_Logshow = '';
                            $visitor_LogRoomSQL = "SELECT DISTINCT(fullname) FROM visitor_log";
                            $visitor_LogResult = mysqli_query($conn, $visitor_LogRoomSQL);
                            $visitor_num_row = mysqli_num_rows($visitor_LogResult) > 0;
                            if ($visitor_num_row) {
                              while ($row = mysqli_fetch_array($visitor_LogResult)) {
                               // $fullname = $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"];
                                $visitor_Logshow .= '<option value"' . $row["fullname"] . '">' . $row["fullname"] . '</option>';
                              }
                            } else {
                              $visitor_Logshow .= '<option>Visitor not Registered yet</option>';
                            }
                            ?>
                                <?php echo $visitor_Logshow; ?>
                            </select>
                          </td>
                          <td>
                            <select id="viewLogMonth" name="viewLogMonth" style="font-weight:bold;" class="form-control-sm  custom-select mr-sm-6">
                                <option>Select Month</option>
                                <option value="Jan">January</option>
                                <option value="Feb">February</option>
                                <option value="Mar">March</option>
                                <option value="Apr">April</option>
                                <option value="May">May</option>
                                <option value="Jun">June</option>
                                <option value="Jul">July</option>
                                <option value="Aug">August</option>
                                <option value="Sept">September</option>
                                <option value="Oct">October</option>
                                <option value="Not">November</option>
                                <option value="Dec">December</option>
                            </select>
                          </td>
                          <td>
                            <select id="viewLogStatus" name="viewLogStatus" style="font-weight:bold;" class="form-control-sm custom-select mr-sm-6">
                                <option>Select Status</option>
                                <option value="check in">Check in</option>
                                <option value="check out">Check out</option>
                            </select>
                          </td>
                          <td>
                            <select id="viewLogLimit" name="viewLogLimit" style="font-weight:bold;" class="form-control-sm custom-select mr-sm-6">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                                <option value="5000">All</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div><br />
                  <div class="table-responsive">
                  <div id="logShow"></div>
                  </div>
                  <div align="center">
                    <button type="button" class="btn btn-danger btn-sm" id="clear" name="clear" value="clear">Empty Log Database</button>
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
        showData();
         function showData(){
            var showdata = "show";
            

            $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{showdata:showdata},
                success:function(data){
                    $('#showTables').html(data);
                }
            });
        }
//============================LIMIT
        $(document).on('change', '#viewLimit', function(){
           
            var viewlimit =$('#viewLimit').val();

            $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{viewlimit:viewlimit},
                success:function(data){
                    $('#showTables').html(data);
                }
            });
        });

        //============================LIMIT and MONTH
        $(document).on('change', '#viewLimit', function(){
           
            var vlimit = $('#viewLimit').val();
            var vMonth = $('#viewMonth').val();

            $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{vlimit:vlimit, vMonth:vMonth},
                success:function(data){
                    $('#showTables').html(data);
                }
            });
        });


//============================ VIEW MONTH
        $(document).on('change', '#viewMonth', function(){
           
            var viewMonth =$('#viewMonth').val();

            $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{viewMonth:viewMonth},
                success:function(data){
                    $('#showTables').html(data);
                }
            });
        });
    //============================ DELETE INDIVIDUALLY
    $(document).on('click', '.del', function(){
        var id = $(this).attr("id");
       
        if(confirm("ARE YOU SURE YOU WANT TO DELETE")){
            $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{id:id},
                success:function(data){
                    alert(data);
                    showData();
                }
            });
        }
    });
//================================================================================
//                              VISITORS LOG SCRIPTS
//================================================================================
/*    showLog();
    function showLog(){
      $(document).on('change', '#viewLogLimit', function(){
        var log_show = "show";
        var viewLog = $('#viewLogLimit').val();
        $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{log_show:log_show, viewLog:viewLog},
                success:function(data){
                    $('#logShow').html(data);
                }
            });
      });
      
    }
*/
//================================= NAME
  
    $(document).on('change', '#visitorLogName', function(){
        var log_shOwLimit = $('#viewLogLimit').val();
        var vieWLogName = $('#visitorLogName').val();
     //   alert(vieWLogName);
        $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{log_shOwLimit:log_shOwLimit, vieWLogName:vieWLogName},
                success:function(data){
                    $('#logShow').html(data);
                }
            });
      });

//================================= MONTH
  
    $(document).on('change', '#viewLogMonth', function(){
        var log_shOwLimitMonth = $('#viewLogLimit').val();
        var vieWLogNameMonth = $('#visitorLogName').val();
        var vieWLogMonth = $('#viewLogMonth').val();
     //   alert(vieWLogMonth);
        $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{log_shOwLimitMonth:log_shOwLimitMonth, vieWLogNameMonth:vieWLogNameMonth, vieWLogMonth:vieWLogMonth},
                success:function(data){
                    $('#logShow').html(data);
                }
            });
      });

//================================= STATUS
  
    $(document).on('change', '#viewLogStatus', function(){
        var log_shOwLimitStatus = $('#viewLogLimit').val();
        var vieWLogNameStatus = $('#visitorLogName').val();
        var vieWLogMonthStatus = $('#viewLogMonth').val();
        var view_LogStatus = $('#viewLogStatus').val();

        $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{log_shOwLimitStatus:log_shOwLimitStatus, view_LogStatus:view_LogStatus, vieWLogNameStatus:vieWLogNameStatus, vieWLogMonthStatus:vieWLogMonthStatus},
                success:function(data){
                    $('#logShow').html(data);
                }
            }); 
      });

    $(document).on('click', '#clear', function(){
      if(confirm("WARNING!!!\n This Will Clear all Visitor's Log\n ARE YOU SURE CLEAR VISITORS RECORDS\n Click OK to Confirm clearance or Cancel to Quit ")){
         var clearVisitors = $('#clear').val();
         $.ajax({
                url:'scripts/visitorspageScript.php',
                method:'POST',
                data:{clearVisitors:clearVisitors},
                success:function(data){
                    alert(data);
                     showLog();
                }
            });
      }
     

    });

    });
</script>
 

