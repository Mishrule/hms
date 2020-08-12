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
    echo '<script>alert("Sorry this Visitor is already registered")</script>';
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
      <ul class="sidebar-nav nav-pills">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#">Welcome: <?php echo $login_session; ?></a>
        </li>
        
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
      </ul>
    </nav>

   

    <section class="calout">
      <div class="container">
          <center>
             <div style="border-bottom: 1px solid white; float:center; color: white; font-weigth:bold;">
                <h3><i class="fa fa-street-view"></i> Visitors</h3>
             </div><br />
          </center>
        <div class="row">
            <div class="col-md-6">
               <div class="card text-center" style="background:#ffffcc;" >
                <div class="card-header">
                  Register a Visitor
                </div>
                <div class="card-body">
                  <h4 class="card-title">Visitor Registration</h4>
                  <fieldset>
                      <form class="needs-validation" novalidate action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                          <div class="col-md-6 mb-3"> 
                            <label for="userFirstName" class="textcol">First Name</label>
                            <input type="text" class="form-control" id="userFirstName" name="userFirstName" maxlength="10" placeholder="eg. Benard" required>
                            <div class="invalid-feedback">
                            Please provide your first Name.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="middlename" class="textcol">Middle name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="eg. Kojo">
                            <div class="invalid-feedback">
                            Please provide a Middle Name.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="lastName" class="textcol">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="eg. Mensah" required>
                            <div class="invalid-feedback">
                              Please provide a Last name.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="userName" class="textcol">index Number</label>
                            <input type="text" class="form-control" id="userName" name="userName" placeholder="eg. any name">
                            <div class="invalid-feedback">
                            Please provide a userName.
                            </div>
                          </div>


                          <div class="col-md-6 mb-3"> 
                            <label for="contact" class="textcol">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="eg. password here." required>
                            <div class="invalid-feedback">
                            Please provide a contact.
                            </div>
                          </div>

                         <div class="col-auto my-1">
                            <label class="mr-sm-6 textcol" for="gender">Gender</label>
                            <select class="custom-select mr-sm-6" id="gender" name="gender" required>
                              <option>Gender</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                            <div class="invalid-feedback">
                            Please Select a gender.
                            </div>
                          </div>

                          

                          <div class="col-md-6 mb-3"> 
                            <label class = "mr-sm-6 textcol" for ="friendsName" style = "font-weight:bold; " >            <strong> Friends Name </strong>
                            </label>
                           <!-- <input type="number" class="form-control" id="friendName"  name="friendName" required>-->
                              <div id="showRoomNames"></div>
                            <div class="invalid-feedback">
                            Please provide the Friends name.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label class="mr-sm-6 textcol" for="roomMembers"style="font-weight:bold;"><strong>Room Number</strong></label>
                            <select id="roomMembers" name="roomMembers" style="font-weight:bold;" class="form-control custom-select mr-sm-6" required>
                            <option value="select room" >Room number</option>
                            <?php
                            $pop_show = '';
                            $popRoomSQL = "SELECT DISTINCT(roomnumber) FROM studentregistration ORDER BY roomnumber ASC";
                            $popResult = mysqli_query($conn, $popRoomSQL);
                            $pop_num_row = mysqli_num_rows($popResult) > 0;
                            if ($pop_num_row) {
                              while ($row = mysqli_fetch_array($popResult)) {
                                $pop_show .= '<option value"' . $row["roomnumber"] . '">' . $row["roomnumber"] . '</option>';
                              }
                            } else {
                              $pop_show .= '<option>No Room Registered yet</option>';
                            }
                            ?>
                                <?php echo $pop_show; ?>
                            </select>
                            <div class="invalid-feedback">
                            Please Select a room number.
                            </div>
                          </div>
                        
                    </div>
          

                        
                        <div align="center">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                    <span class="textcol"> Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                    You must agree before submitting. 
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" name="registerVisitor" id="registerVisitor" value="check in">Register Visitor...</button>
                            
                        </div>
                          
                      
                      </form>

                </fieldset>
                </div>
              </div>
            </div>
<!--//============================================ VISITORS LOG -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  VISITOR'S LOG
                </div>
                <div class="card-body">
                  <h4 class="card-title">LOG VISITOR'S INFORMATION</h4><hr>
                  <div align="center">
                       <div class="col-md-6 mb-3">    
                          <label for="visitorName">Visitor's Name</label>
                            <select id="visitorName" name="visitorName" style="font-weight:bold;" class="form-control custom-select mr-sm-6" required>
                            <option value="">Visitor Name</option>
                            <?php
                            $visitor_show = '';
                            $visitorRoomSQL = "SELECT * FROM visitors";
                            $visitorResult = mysqli_query($conn, $visitorRoomSQL);
                            $visitor_num_row = mysqli_num_rows($visitorResult) > 0;
                            if ($visitor_num_row) {
                              while ($row = mysqli_fetch_array($visitorResult)) {
                                $fullname = $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"];
                                $visitor_show .= '<option value"' . $fullname . '">' . $fullname . '</option>';
                              }
                            } else {
                              $visitor_show .= '<option>Visitor not Registered yet</option>';
                            }
                            ?>
                                <?php echo $visitor_show; ?>
                            </select>
                       </div>   
                       <div class="col-md-6 mb-3"> 
                          <label for="visitingRoom">Room Number</label>
                            <select id="visitingRoom" name="visitingRoom" style="font-weight:bold;" class="form-control custom-select mr-sm-6" required>
                            <option value="" >Room number</option>
                            <?php
                            $visit_show = '';
                            $visitRoomSQL = "SELECT DISTINCT(roomnumber) FROM studentregistration ORDER BY roomnumber ASC";
                            $visitResult = mysqli_query($conn, $visitRoomSQL);
                            $visit_num_row = mysqli_num_rows($visitResult) > 0;
                            if ($visit_num_row) {
                              while ($row = mysqli_fetch_array($visitResult)) {
                                $visit_show .= '<option value"' . $row["roomnumber"] . '">' . $row["roomnumber"] . '</option>';
                              }
                            } else {
                              $visit_show .= '<option>No Room Registered yet</option>';
                            }
                            ?>
                                <?php echo $visit_show; ?>
                            </select>
                        </div>  
                        <div class="col-md-6 mb-3">
                        <label for="">Friend Name</label>
                        <div id="vistingRoomNames"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="mr-sm-6" for="status">Status</label>
                            <select class="custom-select mr-sm-6" id="status" name="status" required>
                              <option value="">Status</option>
                              <option value="check in">Check in</option>
                              <option value="check out">Check out</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-danger" id=visitorBtn name="visitorBtn" value="log">Log Visitor</button><hr /><br />
                        <a href="viewVisitors_porter.php" target="_blank">Click to view Visitors Log</a>
                  </div>
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
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
        $('#registerVisitor').attr('disabled', 'disabled');
        $('#visitorBtn').attr('disabled', 'disabled');
        $('#status').attr('disabled', 'disabled');
  //========================= SHOW NAMES TO FIELDS
    $(document).on('change', '#roomMembers', function(){
      var showName = $('#roomMembers').val();
      
      $.ajax({
        url:'scripts/visitorspageScript.php',
        method:'POST',
        data:{showName:showName},
        success:function(data){
          $('#showRoomNames').html(data);
        },
      });
    });
 //========================= SHOW NAMES TO FIELDS FOR VISITORS FRIENDS
    $(document).on('change', '#visitingRoom', function(){
      var vistingName = $('#visitingRoom').val();
      
      $.ajax({
        url:'scripts/visitorspageScript.php',
        method:'POST',
        data:{vistingName:vistingName},
        success:function(data){
          $('#vistingRoomNames').html(data);
        },
      });
    });

//=========================== SUBMIT CHECK IN's
  $(document).on('change', '#roomMembers', function(){
      var showName = $('#roomMembers').val();
      
      $.ajax({
        url:'scripts/visitorspageScript.php',
        method:'POST',
        data:{showName:showName},
        success:function(data){
          $('#showRoomNames').html(data);
        },
      });
    });

//=========================== SUBMIT CHECK IN' BUTTONS
  $(document).on('click', '#registerVisitor', function(){
      var showName = $('#registerVisitor').val();
      
      $.ajax({
        url:'scripts/visitorspageScript.php',
        method:'POST',
        data:{showName:showName},
        success:function(data){
          $('#showRoomNames').html(data);
        },
      });
    });


    //===========================================CHECK BUTTON
        
      $('#invalidCheck').click(function(){
          if(this.checked){
      //  $('#registerBtn').show();
        
        $('#registerVisitor').removeAttr('disabled');
      //  $('#checkoutregisterBtn').removeAttr('disabled');
      }else{
      //  $('#registerBtn').hide();
        $('#registerVisitor').attr('disabled', 'disabled');
      //  $('#checkoutregisterBtn').attr('disabled', 'disabled');
      }
    });

//============================================================
  $(document).on('change', '#friendsVisitedName', function(){
    if($('#friendsVisitedName').val()==""){
      $('#visitorBtn').attr('disabled', 'disabled');
      $('#status').attr('disabled', 'disabled');
      $('#status').val("");
    }else{
      $('#status').removeAttr('disabled');
    //  $('#visitorBtn').removeAttr('disabled');
      
    }
  });

  $(document).on('change', '#status', function(){
    if($('#status').val()==""){
      $('#visitorBtn').attr('disabled', 'disabled');
    //  $('#status').attr('disabled', 'disabled');
      
    }else{
    //  $('#status').removeAttr('disabled');
      $('#visitorBtn').removeAttr('disabled');
      
    }
  });

  //============================ VISITOR BUTTON TO INSERT TO DATABASE
  $(document).on('click', '#visitorBtn', function(){
    var log = $('#visitorBtn').val();
    var visitorName = $('#visitorName').val();
    var visitingRoom = $('#visitingRoom').val();
    var friendsVisitedName = $('#friendsVisitedName').val();
    var status = $('#status').val();

    $.ajax({
        url:'scripts/visitorspageScript.php',
        method:'POST',
        data:{log:log, visitorName:visitorName, visitingRoom:visitingRoom, friendsVisitedName:friendsVisitedName, status:status},
        success:function(data){
          alert(data);
              $('#visitorName').val("");
              $('#visitingRoom').val("");
              $('#friendsVisitedName').val("");
              $('#status').val("");
              $('#status').attr('disabled', 'disabled');
              $('#visitorBtn').attr('disabled', 'disabled');
        },
      });
  });


});
</script>


