 <?php 
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
         <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="sidebar-nav-item nav-item">
          <a class="js-scroll-trigger " href="registrationpage.php"><i class="fa fa-pencil-square-o"></i> Register</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="managepage.php"><i class="fa fa-user-times"></i> Manage Student</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger nav-link active" href="profilepage.php"><i class="fa fa-user-secret"></i> Student Profile</a>
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
        
            <center>
                <div style="border-bottom: 1px solid white; float:center; color: white; font-weigth:bold;">
                    <h3><i class="fa fa-user-secret"></i> Student Profile</h3>
                </div><br />
            </center>
            <div align="center">
                 <input type="number" id="search" name="search" placeholder="search by Index number" class="form-control col-sm-12" style="width:20%; border-radius:10px; /"><br /><button type="button" id="buttonsearch" name="buttonsearch" class="btn btn-primary" style="border-radius: 30px;">Search</button>
            </div><br />
    
        <div class="row">
          
            <div class="col-md-12">
             <center>  
            <div>              
                <div id="publish"></div>
            </div>
            </center>
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
<script type="text/javascript">
  $('#buttonsearch').hide();
//======================= Controls the Text Fields and Button ===================
  $(document).ready(function(){
    

    function updateRecords(){
      var select = "select";

      $.ajax({
              url:"scripts/profilepageScript.php",
              method:"POST",
              data:{select:select},
              success:function(data){
                $('#publish').html(data);
              }
          });
    }
/*    $('#search').focusin(function(){
      $('#buttonsearch').show();
    });

    $('#search').blur(function(){
      $('#buttonsearch').hide();
    }); */
    if($('#search').val.length == 0){
        $('#buttonsearch').hide();
    }else{
        $('#buttonsearch').show();
    }

//======================= Ajax Request to Populate ====================
      $('#buttonsearch').click(function(){
          var search = $('#search').val();
          var searchbutton = $('#buttonsearch').val();

          $.ajax({
              url:"scripts/profilepageScript.php",
              method:"POST",
              data:{search:search, searchbutton:searchbutton},
              success:function(data){
                $('#publish').html(data);
              }
          });
      });
//======================End Ajax Request to Populate ===================
//====================== SET FIELDS FOR UPDATE =========================
  $(document).on('click','.edit', function(){
    $('#indexnumber').val($('#updateindex').val());
    $('#firstname').val($('#updatefirst').val());
    $('#middlename').val($('#updatemiddle').val());
    $('#surname').val($('#updatelast').val());
    $('#rooms').val($('#updateroom').val());
  });

//===========================UPDATE STUDENT PROFILE ===================
  $(document).on('click','#updatebutton', function(){
      if(confirm("Are you sure you want to update student records")){
           var updatebutton = $('#updatebutton').val();
           var studentindex = $('#indexnumber').val();
           var studentFirst = $('#firstname').val();
           var studentMiddle = $('#middlename').val();
           var studentSur = $('#surname').val();
           var studentRoom = $('#rooms').val();

           $.ajax({
             url:"scripts/profilepageScript.php",
             method:"POST",
             data:{updatebutton:updatebutton, studentindex:studentindex, studentFirst:studentFirst, studentMiddle:studentMiddle, studentSur:studentSur, studentRoom:studentRoom},
             success:function(data){
               alert(data);
               $('#update').modal('hide');
             }
           });
      }else{
        alert("Aborted...");
      }
  });

//============================ DELETE STUDENT RECORDS ======================
  $(document).on('click','#del', function(){
      if(confirm("Are you sure you want to update student records")){
           var deletebutton = $('#del').val();
           

           $.ajax({
             url:"scripts/profilepageScript.php",
             method:"POST",
             data:{deletebutton:deletebutton},
             success:function(data){
               alert(data);
               updateRecords();
             }
           });
      }else{
        alert("Aborted...");
      }
  });


  });
</script>
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Student Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          <div class="form-group">
            <label class="form-control-label" for="formGroupExampleInput">Index number</label>
            <input type="text" class="form-control" id="indexnumber" name="indexnumber" placeholder="indexnumber" disabled>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="Firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="middlename">Other Name</label>
            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Other name">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="surname">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
          </div>
          <div class="col-md-6 mb-3">
               <label class="mr-sm-6 textcol" for="rooms">Room</label>
                <select  class="custom-select mr-sm-6" id="rooms"  name = "rooms" >
                   <option>Please Select a room</option>
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
            </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" name="updatebutton" id="updatebutton" class="btn btn-primary">Update Records</button>
      </div>
    </div>
  </div>
</div>



