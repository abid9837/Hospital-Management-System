<?php
include "../../conn.inc.php";

session_start();
if ( ($_SESSION['UserEmail_employ']=="") && ($_SESSION['UserPasswords_employ']=="") ) {
  header( "refresh:0; url=http://localhost/my%20hospital/" );
  die();
}    

// for active task
$curentDate = date("Y/m/d");
$task_list_sql_active = "SELECT * FROM `nurse_audit_tasks` WHERE stauts='active' AND task_date='$curentDate'";
$task_list_query_active = mysqli_query($conn,$task_list_sql_active);
$task_list_num_rows_active = mysqli_num_rows($task_list_query_active);


// for complete task
$curentDate = date("Y/m/d");
$task_list_sql_active_complete = "SELECT * FROM `nurse_audit_tasks` WHERE stauts='complete' AND complete_task_date='$curentDate'";
$task_list_query_active_complete = mysqli_query($conn,$task_list_sql_active_complete);
$task_list_num_rows_active_complete = mysqli_num_rows($task_list_query_active_complete);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Receptionist</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <link rel="stylesheet" href="./nurse.index.css">
  </head>
  <body>
    <div class="container-scroller" >
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img style="height: 60px; width: auto;" src="../../assets/images/logo-my-hospital.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img style="height: auto; width: 30px;" src="../../assets/images/icon-my-hospital.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <!-- 
              START
              user img and names navbar
             -->
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../../photos/<?php echo $_SESSION["UserIMG_employ"]; ?>" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown logout_Div" aria-labelledby="profileDropdown">
                <style>
                  .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown:hover .dropdown-item{
                    color: blue;
                  }
                </style>
                <a class="dropdown-item" href="http://localhost/my%20hospital/logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Log out
                </a>
              </div>
            </li>
            <!-- 
              END
              user img and names navbar
             --> 

            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>

          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>



      <!-- partial -->
      <div class="container-fluid page-body-wrapper" style="display: flex;">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">

            <!-- 
              Start 
              user name img
              Left Side Bar
             -->
            <li class="nav-item nav-profile">
              <a href="#DOctor_logout" class="nav-link" aria-expanded="false" aria-controls="doctor2" data-bs-toggle="collapse">
                <div class="nav-profile-image">
                  <img src="../../photos/<?php echo $_SESSION["UserIMG_employ"]; ?>" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $_SESSION["UserName_employ"]; ?></span>
                  <span class="text-secondary text-small">Nurse</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
              <div class="collapse" id="DOctor_logout">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a style="color: brown; font-weight: bold; font-size: 15px;" class="nav-link" href="http://localhost/my%20hospital/logout.php">Log Out</a></li>
                 
                </ul>
              </div>
            </li>
            <!-- 
              END 
              user name img
              Left Side Bar
            -->

             <!-- for left sidebar DASHBOARD -->
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/nurse/">
                <span class="menu-title">Dashboard</span>
                
                <i class="fa-solid fa-house fa-xl menu-icon"></i>
              </a>
            </li>
             



            <!-- 
              Start 
              Nurse Audit left sidebar
            -->
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="collapse" href="#Nurse_Audit" aria-expanded="false" aria-controls="doctor2">
                <span class="menu-title"> Audit </span>
                <i class="menu-arrow"></i>
                <i class="fa-solid fa-user-nurse fa-xl"></i>
              </a>
              <div class="collapse" id="Nurse_Audit">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/nurse/pages/all%20task.php">All Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/nurse/pages/completed%20task.php">Completed Task</a></li>
                  
                </ul>
              </div>
            </li>
            <!-- 
              END 
              Nurse Audit left sidebar
            -->

              </span>
            </li>
          </ul>
        </nav>
        <!-- END for left sidebar DASHBOARD -->
        
        
        <!-- partial  -->
        <!-- start our right side code here -->
        
        <div class="main-panel">
            <div  class="content-wrapper ">
            <!-- right side -->

                <h5 style="margin-left: 4px; margin-bottom: 10px">Date : <?php echo date("Y/m/d"); ?> </h5>
                <div class="nurseDashboar_main">
                    <div class="card_main" style="height:180px;">
                        <h4>Tasks ( <?php echo $task_list_num_rows_active; ?> )</h4>
                        <p>You need to complete all the task in time</p>
                        <a href="http://localhost/my%20hospital/main%20dashboard/nurse/pages/all%20task.php" class="btn btn-primary btn-sm btn-edit Success">Do task</a>
                    </div>

                    <?php  

                    
                    ?>

                    <div class="card_main">
                        <h4>Complete tasks ( <?php echo $task_list_num_rows_active_complete; ?> )</h4>
                        <p>you have complete <?php echo $task_list_num_rows_active_complete; ?> task</p>
                        <a href="http://localhost/my%20hospital/main%20dashboard/nurse/pages/all%20task.php" class="btn btn-primary btn-sm btn-edit Success">Show complete task</a>
                    </div>

                    
                    
                </div>

            </div>

        </div>
              



            </div>

          <!-- end our right side code here -->
          <!-- partial -->
        </div>










        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script src="https://kit.fontawesome.com/40d90851b1.js" crossorigin="anonymous"></script>
  </body>
</html>