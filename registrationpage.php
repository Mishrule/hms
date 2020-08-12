 <?php 

include('dbconfiguration.php');
include('session.php');
$msg = $output = '';
if (isset($_POST['registerBtn'])) {

  $imagename = $_FILES['studentImage']['name'];
  $target = "img/" . basename($_FILES["studentImage"]["name"]);

  $studentid = $_POST['studentID'];
  $firstname = $_POST['firstName'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastName'];
  $level = $_POST['level'];
  $program = $_POST['program'];
  $gender = $_POST['gender'];
  $disability = $_POST['disability'];
  $age = $_POST['age'];
  $dateofbirth = $_POST['dateOfBirth'];
  $placeofbirth = $_POST['placeofBirth'];
  $studentemail = $_POST['studentemail'];
  $registrationdate = $_POST['registrationDate'];
  $guardianname = $_POST['guardianName'];
  $guardiancontact = $_POST['guardianContact'];
  $location = $_POST['location'];
  $guardianemail = $_POST['guardianemail'];
  $contact = $_POST['contact'];
  $room = $_POST['rooms'];

  $sql = "INSERT INTO studentregistration VALUES('$studentid', '$firstname', '$middlename', '$lastname', '$level', '$program', '$gender', '$disability', '$age', '$dateofbirth', '$placeofbirth', '$studentemail', '$registrationdate', '$guardianname', '$guardiancontact', '$location',  '$guardianemail', '$imagename', '$contact', '$room')";

  $result = mysqli_query($conn, $sql);
  move_uploaded_file($_FILES["studentImage"]["tmp_name"], $target);
  if ($result) {
    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>You have successfully registered ' . $firstname . ' ' . $middlename . ' ' . $lastname . '</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
  } else {
    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Registration Failed try again...</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
  }

}



$sqlcount = "SELECT studentid FROM studentregistration";

$results = mysqli_query($conn, $sqlcount);
$num_row = mysqli_num_rows($results);

$output = $num_row . " Student Registered";

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
          <a class="js-scroll-trigger nav-link active" href="registrationpage.php"><i class="fa fa-pencil-square-o"></i> Register</a>
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

   

    <section class="calout">
      <div class="container">
        <div class="row">
          <center>
            <div class="col-md-7">
              <div class="card text-center" style="background:#ffffcc;" >
              <div class="card-header">
              <h4 style="color: #000;">
                <legend><i class="fa fa-pencil-square-o"></i> Student Registration Forms</legend></h4>
              
                
                
                    <?php echo $msg; ?>
                    
                

              </div>
              <div class="card-body">
                <fieldset>
                      <form class="needs-validation" novalidate action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                          <div class="col-md-6 mb-3"> 
                            <label for="studentID" class="textcol">Student ID Number</label>
                            <input type="number" class="form-control" id="studentID" name="studentID" maxlength="10" placeholder="eg. 5458964748" required>
                            <div class="invalid-feedback">
                            Please provide an Index Number.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="firstName" class="textcol">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Bismarck" required>
                            <div class="invalid-feedback">
                            Please provide a First Name.
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

                         <!-- <div class="col-md-6 mb-3"> 
                            <label for="hostelid" class="textcol">Hostel ID Number</label>
                            <input type="text" class="form-control" id="hostelid" name="hostelid" placeholder="eg. Best25485a8" required>
                            <div class="invalid-feedback">
                            Please provide a HostelID Number.
                            </div>
                          </div> -->

                        

                          <div class="col-auto my-1">
                            <label class="mr-sm-2 textcol" for="level" class="textcol">Level</label>
                            <select class="custom-select mr-sm-2" id="level" name="level" required>
                              <option>Level</option>
                              <option value="Level 100">Level 100</option>
                              <option value="Level 200">Level 200</option>
                              <option value="Level 300">Level 300</option>
                              <option value="Level 400">Level 400</option>
                            
                            </select>
                            <div class="invalid-feedback">
                            Please select a Level.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="program" class="textcol">Program of Study</label>
                            <input type="text" class="form-control" id="program" name="program" placeholder="eg. Information Technology" required>
                            <div class="invalid-feedback">
                            Please provide a Program of Study.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="contact" class="textcol">Student Contact</label>
                            <input type="number" class="form-control" id="contact" maxlength="10" name="contact" placeholder="eg. 0245816854" required>
                            <div class="invalid-feedback">
                            Please provide Mobile Number.
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

                          <div class="col-md-3 mb-3">
                            <label class="mr-sm-6 textcol" for="rooms">Room</label>
                          <select  class="custom-select mr-sm-6" id="rooms"  name = "rooms" >
                                <option>Select Room</option>
                                <option value="room1">Room 1</option>
                                <option value="room2">Room 2</option>
                                <option value="room3">Room 3</option>
                                <option value="room4">Room 4</option>
                                <option value="room5">Room 5</option>
                                <option value="room6">Room 6</option>
                                <option value="room7">Room 7</option>
                                <option value="room8">Room 8</option>
                                <option value="room9">Room 9</option>
                                <option value="room10">Room10</option>
                                <option value="room11">Room 11</option>
                                <option value="room12">Room 12</option>
                                <option value="room13">Room 13</option>
                                <option value="room14">Room 14</option>
                                <option value="room15">Room 15</option>
                                <option value="room16">Room 16</option>
                                <option value="room17">Room 17</option>
                                <option value="room18">Room 18</option>
                                <option value="room19">Room 19</option>
                                <option value="room20">Room 20</option>
                                <option value="room21">Room 21</option>
                                <option value="room22">Room 22</option>
                                <option value="room23">Room 23</option>
                                <option value="room24">Room 24</option>
                                <option value="room25">Room 25</option>
                                <option value="room26">Room 26</option>
                                <option value="room27">Room 27</option>
                                <option value="room28">Room 28</option>
                                <option value="room29">Room 29</option>
                                <option value="room30">Room 30</option>
                                <option value="room31">Room 31</option>
                                <option value="room32">Room 32</option>
                                <option value="room33">Room 33</option>
                                <option value="room34">Room 34</option>
                                <option value="room35">Room 35</option>
                                <option value="room36">Room 36</option>
                                <option value="room37">Room 37</option>
                                <option value="room38">Room 38</option>
                                <option value="room39">Room 39</option>
                                <option value="room40">Room 40</option>
                                <option value="room41">Room 41</option>
                                <option value="room42">Room 42</option>
                                <option value="room43">Room 43</option>
                                <option value="room44">Room 44</option>
                                <option value="room45">Room 45</option>
                                <option value="room46">Room 46</option>
                                <option value="room47">Room 47</option>
                                <option value="room48">Room 48</option>
                                <option value="room49">Room 49</option>
                                <option value="room50">Room 50</option>
                            </select>
                            <div class="invalid-feedback">
                            Please Select a room number.
                            </div>
                          </div>

                          <div class="col-auto my-1">
                            <label class="mr-sm-6 textcol" for="disability">Student Disability</label>
                            <select class="custom-select mr-sm-6" id="disability" name="disability" required>
                              <option>Disability</option>
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                            </select>
                            <div class="invalid-feedback">
                            Please Select a Student disability status.
                            </div>
                          </div>

                          <div class="col-md-6 mb-6"> 
                            <label for="age" class="textcol">Age</label>
                            <input type="text" class="form-control" id="age" name="age" placeholder="Student Age">
                            <div class="invalid-feedback">
                            Please provide Student Age.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="dateOfBirth " class="textcol">Date of Birth</label>
                            <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Student Date of Birth" required>
                            <div class="invalid-feedback">
                            Please provide Student Date of Birth.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="placeofBirth" class="textcol">Place Of Birth</label>
                            <input type="text" class="form-control" id="placeofBirth" name="placeofBirth" placeholder="Student Place of Birth" required>
                            <div class="invalid-feedback">
                            Please provide Student Place of Birth.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="studentemail" class="textcol">Student Email</label>
                            <input type="email" class="form-control" id="studentemail" name="studentemail" placeholder="eg. someemail@somewhere.com">
                            <div class="invalid-feedback">
                            Please provide an Email.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="registrationDate" class="textcol">Date of Registration</label>
                            <input type="date" class="form-control" id="registrationDate" name="registrationDate" placeholder="Date of Registration" required>
                            <div class="invalid-feedback">
                            Please provide Registration Date.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3 custom-file">
                            
                            <label for="studentImage" class="textcol">Add Image</label>
                            <input type="file" class="form-control" id="studentImage" name="studentImage" required>
                            <div class="invalid-feedback">
                            Please provide a picture.
                            </div>
                          </div>

                        </div>
                        <hr />

                        <legend><span style="color: red;">Guardian Info</span></legend>

                        <div class="form-row">
                          <div class="col-md-6 mb-3">  
                            <label for="guardianName" class="textcol">Guardian Name</label>
                            <input type="text" class="form-control" id="guardianName" name="guardianName" placeholder="eg. Benard B. Arthur" required>
                            <div class="invalid-feedback">
                              Please provide Guardian Name.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="guardianContact" class="textcol">Guardian Contact</label>
                            <input type="number" class="form-control" id="guardianContact" maxlength="10" name="guardianContact" placeholder="eg. 0245859658" required>
                            <div class="invalid-feedback">
                              Please provide Guardian Mobile Number.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="location" class="textcol">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="eg. Kumasi-Tanoso" required>
                            <div class="invalid-feedback">
                              Please provide Guardian Location.
                            </div>
                          </div>
                        

                          <div class="col-md-6 mb-3">
                            <label for="email" class="textcol">Email</label>
                            <input type="email" class="form-control" id="guardianemail" name="guardianemail" placeholder="eg. someemail@somewhere.com">
                          <!-- <div class="invalid-feedback">
                              Please provide Guardian Location.
                            </div> -->
                          </div>
                        </div>
                        

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
                        <button class="btn btn-primary" type="submit" name="registerBtn" id="registerBtn" value="send">Register Student</button>  
                      
                      </form>

                </fieldset>
              </div>
              <div class="card-footer text-muted">
                
                <?php echo $output; ?>
              </div>  
            
            </div>
          </center>
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
  <script>
    $(document).ready(function(){
      $('#registerBtn').attr('disabled', 'disabled');
   /*   $(document).on('click','#registerBtn', function(){
          var registrationButton = $('#registerBtn').val();
          var student_ID = $('#studentID').val();
          var first_Name = $('#firstName').val();
          var middle_name = $('#middlename').val();
          var last_Name = $('#lastName').val();
          var room_Number = $('#rooms').val();
          var full_Name = first_Name+' '+middle_name+' '+last_Name;
         
         $.ajax({
           url:"scripts/registrationpageScript.php",
           method:"POST",
           data:{registrationButton:registrationButton, student_ID:student_ID, full_Name:full_Name, room_Number:room_Number},
           success:function(data){
             alert(data);
           }
         });
      }); */
//===========================================CHECK BUTTON
      $('#invalidCheck').click(function(){
          if(this.checked){
      //  $('#registerBtn').show();
        
        $('#registerBtn').removeAttr('disabled');
      }else{
      //  $('#registerBtn').hide();
        $('#registerBtn').attr('disabled', 'disabled');
      }
      });
      
    });
  </script>

