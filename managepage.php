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

    <title>KMS | Manage Student Records</title>

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
        <li class="sidebar-nav-item nav-item">
          <a class="js-scroll-trigger " href="registrationpage.php"><i class="fa fa-pencil-square-o"></i> Register</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger nav-link active" href="managepage.php"><i class="fa fa-user-times"></i> Manage Student</a>
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
        
            <center>
                <div style="border-bottom: 1px solid white; float:center; color: white; font-weigth:bold;">
                    <h3><i class="fa fa-user-times"></i> Manage Student Records</h3>
                </div><br />
            </center>
            <div align="right">
                <label for="tableLimit"style="font-weight:bold; color:white;"><strong>Limit</strong></label>
                <select id="tableLimit" name="tableLimit" style="font-weight:bold;" class="form-control-sm">
                    <option value="5">5</option><hr />
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="10000">All</option>
                </select>
            </div>     
      </div>
      <div class="container">
          <div class="row">
              <div class="table table-responsive">              
                <div id="publish"></div>
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
        //  var tablelimit = $('#tableLimit').val();
          $.ajax({
              url:"scripts/managepageScript.php",
              method:"POST",
              data:{action:action},
              success:function(data){
                $('#publish').html(data);
                
              }
          });
        }

        $(document).on('change', '#tableLimit', function(){
                
                var tablelimit = $('#tableLimit').val();
                $.ajax({
                    url:"scripts/managepageScript.php",
                    method:"POST",
                    data:{tablelimit:tablelimit},
                    success:function(data){
                        $('#publish').html(data);
                        
                    }
            });
          
          });

        $(document).on('click', '.delete', function(){
          var id = $(this).attr("id");
      //  var del = $('.delete').val();
        if(confirm("Are you sure")){

          var actions = "Delete";
          $.ajax({
            url:"scripts/managepageScript.php",
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
    
</script>


