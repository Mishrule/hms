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
          <a class="js-scroll-trigger nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
      </ul>
    </nav>

   

    <section class="calout">
      <div class="container">
        
            <center>
                <div style="border-bottom: 1px solid white; float:center; color: white; font-weigth:bold;">
                    <h3><i class="fa fa-key"></i> Key Activities</h3>
                </div><br />
            </center>
            <div align="center">

                <label for="roomMembers"style="font-weight:bold; color:white;"><strong>Room Number</strong></label>
                <select id="roomMembers" name="roomMembers" style="font-weight:bold;" class="form-control-sm">
                <option value="select room" >Select the room number</option>
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
                <a href="visitorspage_porter.php" class="btn btn-primary" target="_blank">Visitors</a>
            </div><br />
        
        
      </div>
        
            <div id="publish"></div> <br />
    <div class="container">
      <div class="row">
      <div class="col-lg-12 col-md-12">
        <div id="publishStatus"></div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="alert alert-danger carrd">
          <div style="text-align:center">
            <div class="form-row">
                <div class="col-md-6 mb-3">  
                  <label for="stdindex" class="textcol">Index Number</label>
                  <input type="text" class="form-control" id="stdindex" name="stdindex" placeholder="Index Number" required disabled>
                  <div class="invalid-feedback">
                    Please provide an Index Number.
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="studentName" class="textcol">Student Name</label>
                  <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student name" required disabled>
                  <div class="invalid-feedback">
                    Please provide a student Name.
                  </div>
                </div>

               <input type="hidden" class="form-control" id="statusHidden" name="statusHidden" required disabled>

                <div class=" table-responsive">
                  <button class="btn btn-primary" type="button"  name="registerBtn" id="registerBtn" value="send">Log Records</button>
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
            
          </li>
          <li class="list-inline-item">
           
          </li>
          <li class="list-inline-item">
            
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

$(document).ready(function(){
  $(document).on('change','#roomMembers', function(){
    var roomNumber = $('#roomMembers').val();

    $.ajax({
      url:"scripts/keypageScript.php",
      method:"POST",
      data:{roomNumber:roomNumber},
      success:function(data){
        $('#publish').html(data);
        
        if(roomNumber == "select room" ){
          var sidindex = $('#stdindex').val("");
          var sName = $('#studentName').val("");
           $('#registerBtn').attr('disabled', 'disabled');
        }
      
      }
    });
  });

//===================================== CHECK IN 
$(document).on('click','.checkin', function(){
  
      var id = $(this).attr("id");
       $('#stdindex').val(id);
       var studIndex = $('#stdindex').val();
       
    $.ajax({
      url:"scripts/keypageScript.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data){
        $('#studentName').val(data.name);
        $('#registerBtn').removeAttr('disabled');
        $('#statusHidden').val("check in");
      }
    }); 

  });

  //===================================== CHECK IN 
$(document).on('click','.checkout', function(){
  
      var id = $(this).attr("id");
       $('#stdindex').val(id);
       var studIndex = $('#stdindex').val();
       
    $.ajax({
      url:"scripts/keypageScript.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data){
        $('#studentName').val(data.name);
        $('#registerBtn').removeAttr('disabled');
        $('#statusHidden').val("check out");
      }
    }); 

  });


    $('#registerBtn').attr('disabled', 'disabled'); // Disable button
  $(document).on('click', '#registerBtn', function(){
    var logButton = $('#registerBtn').val();
    var Members = $('#roomMembers'). val();
    var sidindex = $('#stdindex').val();
    var sName = $('#studentName').val();
    var varCheck = $('#statusHidden').val();

    $.ajax({
      url:"scripts/keypageScript.php",
      method:"POST",
      data:{logButton:logButton, Members:Members, sidindex:sidindex, sName:sName, varCheck:varCheck},
      
      success:function(data){
        alert(data);    
        $('#registerBtn').attr('disabled', 'disabled');
      }
    });

  });

//=======================================SHOW STATUS
  $(document).on('change','#roomMembers', function(){
    var roomNumberStatus = $('#roomMembers').val();

    $.ajax({
      url:"scripts/keypageScript.php",
      method:"POST",
      data:{roomNumberStatus:roomNumberStatus},
      success:function(data){
        $('#publishStatus').html(data);
        
        
      
      }
    });
  });

}); 
</script>


