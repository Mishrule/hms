 <?php 

include('dbconfiguration.php');
include('session.php');
$msg = $output = '';
if (isset($_POST['registerBtn'])) {
  $userFirstName = mysqli_real_escape_string($conn, $_POST["userFirstName"]);
  $middlename = mysqli_real_escape_string($conn, $_POST["middlename"]);
  $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
  $userName = mysqli_real_escape_string($conn, $_POST["userName"]);
  $passwordd = mysqli_real_escape_string($conn, $_POST["passwordd"]);
  $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
  $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
  $accountType = mysqli_real_escape_string($conn, $_POST["accountType"]);
  $sQuestion = mysqli_real_escape_string($conn, $_POST["sQuestion"]);
  $sAnswer = mysqli_real_escape_string($conn, $_POST["sAnswer"]);

  //Date
  date_default_timezone_set("Africa/Accra");
  $currentTime = time();
  $dateTime = strftime("%B-%d-Y %H:%M:%S", $currentTime);


  $userSQL = "INSERT INTO useraccount VALUES('$userFirstName','$middlename','$lastName','$userName','$passwordd','$contact','$gender','$accountType','$sQuestion','$sAnswer','$dateTime')";
  $userResult = mysqli_query($conn, $userSQL);

  if ($userResult) {
    echo '<script>alert("User Created Successfully")</script>';
  } else {
    echo '<script>alert("Username already exist Try Another name...")</script>';
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
          <a class="js-scroll-trigger" href="keypage.php"><i class="fa fa-key"></i> Key Activities</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger nav-link active" href="userspage.php"><i class="fa fa-user"></i> Users</a>
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
                <h3><i class="fa fa-user"></i> User Account</h3>
             </div><br />
          </center>
        <div class="row">
            <div class="col-md-6">
               <div class="card text-center" style="background:#ffffcc;" >
                <div class="card-header">
                  Register a User
                </div>
                <div class="card-body">
                  <h4 class="card-title">User Login Details</h4>
                  <fieldset>
                      <form class="needs-validation" novalidate action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                          <div class="col-md-6 mb-3"> 
                            <label for="userFirstName" class="textcol">First Name</label>
                            <input type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="eg. Benard" required>
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
                            <label for="userName" class="textcol">Username</label>
                            <input type="text" class="form-control" id="userName" name="userName" placeholder="eg. any name" required>
                            <div class="invalid-feedback">
                            Please provide a userName.
                            </div>
                          </div>


                          <div class="col-md-6 mb-3"> 
                            <label for="passwordd" class="textcol">Password</label>
                            <input type="password" class="form-control" id="passwordd" name="passwordd" placeholder="eg. password here." required>
                            <div class="invalid-feedback">
                            Please provide a passwordd.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="contact" class="textcol"> Contact</label>
                            <input type="number" class="form-control" id="contact" maxlength="10" name="contact" placeholder="eg. 0245816854" required>
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
                          <div class="col-auto my-1">
                            <label class="mr-sm-6 textcol" for="accountType">Account Type</label>
                            <select class="custom-select mr-sm-6" id="accountType" name="accountType" required>
                              <option>Account Type</option>
                              <option value="porter">Porter</option>
                              <option value="Administrator">Administrator</option>
                            </select>
                            <div class="invalid-feedback">
                            Please Select a Account Type.
                            </div>
                          </div>

                         

                          <div class="col-auto my-1">
                            <label class="mr-sm-6 textcol" for="sQuestion">Security Question</label>
                            <select class="custom-select mr-sm-6" id="sQuestion" name="sQuestion" required>
                              <option>Security Question</option>
                              <option value="food">What is your favourite food</option>
                              <option value="car">What is the name of your dream car</option>
                              <option value="friend">Your best friend's name</option>
                            </select>
                            <div class="invalid-feedback">
                            Please Select a Question.
                            </div>
                          </div>

                          <div class="col-md-6 mb-3"> 
                            <label for="sAnswer" class="textcol">Security Answer</label>
                            <input type="text" class="form-control" id="sAnswer" name="sAnswer" placeholder="Security Answer" required>
                            <div class="invalid-feedback">
                            Please provide an Answer.
                            </div>
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
                        <button class="btn btn-primary" type="submit" name="registerBtn" id="registerBtn">Register User</button>  
                      
                      </form>

                </fieldset>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  User Account
                </div>
                <div class="card-body">
                  <h4 class="card-title">View Users</h4>
                  <div class="table table-responsive">
                    <div id="userTable"></div>
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
<!--<script type="text/javascript">
//  $('#student_data').bootgrid();
/*    //initialize query bootgrid
    var productTable = $('#student_data').bootgrid({
      ajax: true, //This operation will enable server processing by default it is set to false
      rowSelect: true, //This operation will enable the entire row clickable
      post:function(){ //This will return an array with a key and value.
        return{
          id:"b0df282a-0d67-40e5-8558-c9e93b7befed" // this will ensure the request object with additional properties
        };
      },
      url:"cpanelfetchdata.php", //This option set the data to the data services
      formatters:{
        "commands": function(column, row){
          return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.studentid+"'>Edit</button>"+ 
                  "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.studentid+"'>Delete</button>";
        }      
      }
    }); */
    $(document).ready(function(){
        fetchUser();
        function fetchUser(){
          var action = "selected";
          $.ajax({
              url:"select.php",
              method:"POST",
              data:{action:action},
              success:function(data){
                $('#publish').html(data);
              }
          });
        }

        $(document).on('click', '.delete', function(){
          var id = $(this).attr("id");
      //  var del = $('.delete').val();
        if(confirm("Are you sure")){

          var actions = "Delete";
          $.ajax({
            url:"select.php",
            method:"POST",
            data:{id:id, actions:actions},
            success:function(data){
             fetchUser();
              alert(data);
            }
          });
        }else{
          return false;
        }
    });

      /*  $(document).on('keyup', '#search', function(){
            var search = $('#search').val();

            $.ajax({
                url:
            });
        }); */
    });
    
</script> -->
 <script type="text/javascript">
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

      //===========================================CHECK BUTTON
      $('#registerBtn').attr('disabled', 'disabled');
      $('#invalidCheck').click(function(){
          if(this.checked){
      //  $('#registerBtn').show();
        
        $('#registerBtn').removeAttr('disabled');
      }else{
      //  $('#registerBtn').hide();
        $('#registerBtn').attr('disabled', 'disabled');
      }
      });
$(document).ready(function(){
  viewUsers();
  function viewUsers(){
    var view = "select";
    $.ajax({
      url:'scripts/userspageScript.php',
      method:'POST',
      data:{view:view},
      success:function(data){
        $('#userTable').html(data);
      }
    });
  }
//======================================SET FIELDS
  $(document).on('click', '.update', function(){
    var id = $(this).attr("id");
    $.ajax({
      url:'scripts/userspageScript.php',
      method:'POST',
      data:{id:id},
      dataType:'json',
      success:function(data){
        $('#user_name').val(data.username);
        $('#pass_word').val(data.pass);
        $('#s_Question').val(data.question);
        $('#security_A').val(data.ans);
      }
    });
  });

  //======================================SET FIELDS
  $(document).on('click', '.del', function(){
    var del = $(this).attr("id");
    if(confirm("ARE SURE YOU WANT TO DELETE A USER\nClick OK to Proceed or Cancel to Quit")){
      $.ajax({
        url:'scripts/userspageScript.php',
        method:'POST',
        data:{del:del},
        success:function(data){
          alert(data);
          viewUsers();
        }
      });
    }
  });

//=============================== UPDATE
$(document).on('click','#save', function(){
    var upName = $('#user_name').val();
    var upPass= $('#pass_word').val();
    var upQuestion = $('#s_Question').val();
    var upSecurity = $('#security_A').val();
    var save = $('#save').val();
    
    $.ajax({
      url:'scripts/userspageScript.php',
      method:'POST',
      data:{upName:upName, upPass:upPass, upQuestion:upQuestion, upSecurity:upSecurity, save:save},
      success:function(data){
        alert(data);
        viewUsers();
        $('#userModel').modal('hide');
      }
    });
})

});
  </script>
  <!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModel">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="userModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username" disabled>
       <input type="text" id="pass_word" name="pass_word" class="form-control" placeholder="Password here">
       <select class="custom-select mr-sm-6" id="s_Question" name="s_Question" required>
                              <option>Security Question</option>
                              <option value="food">What is your favourite food</option>
                              <option value="car">What is the name of your dream car</option>
                              <option value="friend">Your best friend's name</option>
                            </select>
       <input type="text" id="security_A" name="security_A" class="form-control" placeholder="Answer">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save" name="save" value="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



