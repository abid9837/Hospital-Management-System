<?php
include "../../conn.inc.php";

session_start();
if ( ($_SESSION['UserEmail_employ']=="") && ($_SESSION['UserPasswords_employ']=="") ) {
  header( "refresh:0; url=http://localhost/my%20hospital/" );
  die();
}    

$curentDate = date("Y/m/d");

// PATIENT section     ////////////////////////
//  show all patient list dashboard
$patient_list_sql = "SELECT * FROM `patient`";
$patient_list_query = mysqli_query($conn,$patient_list_sql);
$patient_list_num_rows = mysqli_num_rows($patient_list_query);

// for active patient dashboard
$patien_active_list_sql = "SELECT * FROM `patient` where status_='active'";
$patient_active_list_query = mysqli_query($conn,$patien_active_list_sql);
$patient_active_list_num_rows = mysqli_num_rows($patient_active_list_query);

$relesed_patients = $patient_list_num_rows-$patient_active_list_num_rows;


// NURSE section     ////////////////////////////

// TOTAL task dashboard

$task_list_sql_total = "SELECT * FROM `nurse_audit_tasks` WHERE task_date='$curentDate'";
$task_list_query_total = mysqli_query($conn,$task_list_sql_total);
$task_list_num_rows_total = mysqli_num_rows($task_list_query_total);


// for active task dashboard
$task_list_sql_active = "SELECT * FROM `nurse_audit_tasks` WHERE stauts='active' AND task_date='$curentDate'";
$task_list_query_active = mysqli_query($conn,$task_list_sql_active);
$task_list_num_rows_active = mysqli_num_rows($task_list_query_active);

// for complete task dashboard
$task_list_sql_active_complete = "SELECT * FROM `nurse_audit_tasks` WHERE stauts='complete' AND complete_task_date='$curentDate'";
$task_list_query_active_complete = mysqli_query($conn,$task_list_sql_active_complete);
$task_list_num_rows_active_complete = mysqli_num_rows($task_list_query_active_complete);

// final bill payed current date staus dashboard
$patien_final_bill_payment_sql = "SELECT * FROM `patient` where bill_paid_date='$curentDate'";
$patient_final_bill_payment_query = mysqli_query($conn,$patien_final_bill_payment_sql);
$patient_final_bill_payment_num_rows = mysqli_num_rows($patient_final_bill_payment_query);


// bill pending  dashboard

// final bill payed staus dashboard
$patien_final_bill_payment_pending_sql = "SELECT * FROM `patient` where final_payment_status=''";
$patient_final_bill_payment_pending_query = mysqli_query($conn,$patien_final_bill_payment_pending_sql);
$patient_final_bill_payment_pending_num_rows = mysqli_num_rows($patient_final_bill_payment_pending_query);

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
    <link rel="stylesheet" href="../../css/receptionist.index.css">

    <!--  -->
  </head>

  <!--  -->
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
                  <span class="text-secondary text-small">Receptionist</span>
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
              <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/">
                <span class="menu-title">Dashboard</span>
                
                <i class="fa-solid fa-house fa-xl menu-icon"></i>
              </a>
            </li>
             


             <!-- 
              Start 
              Patient left sidebar
            -->
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="collapse" href="#Patient" aria-expanded="false" aria-controls="doctor2">
                <span class="menu-title"> Patient </span>
                <i class="menu-arrow"></i>
                <i class="fa-solid fa-bed-pulse fa-lg"></i>
              </a>
              <div class="collapse" id="Patient">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/Patient%20List.php">Patient List</a></li>
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/Enroll%20New%20Patient.php">Enroll New Patient </a></li>
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/Patient%20Bill%20Process.php"> Add Patient Bills</a></li>
                  
                </ul>
              </div>
            </li>
            <!-- 
              END 
              Patient left sidebar
            -->


            <!-- 
              Start 
              Nurse Audit left sidebar
            -->
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="collapse" href="#Nurse_Audit" aria-expanded="false" aria-controls="doctor2">
                <span class="menu-title"> Nurse Audit </span>
                <i class="menu-arrow"></i>
                <i class="fa-solid fa-user-nurse fa-xl"></i>
              </a>
              <div class="collapse" id="Nurse_Audit">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Nurse%20Audit/all%20task.php">All Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Nurse%20Audit/complete%20task.php">Completed Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Nurse%20Audit/incomplete%20task.php">In-complete Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Nurse%20Audit/add%20task.php">Add Task</a></li>
                  
                </ul>
              </div>
            </li>
            <!-- 
              END 
              Nurse Audit left sidebar
            -->




            <!-- 
              Start 
              Assign nurse for an operation  left sidebar
            -->
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="collapse" href="#Make_an_Operation" aria-expanded="false" aria-controls="doctor2">
                <span class="menu-title"> Make an OT </span>
                <i class="menu-arrow"></i>
                <i class="fa-solid fa-bed-pulse fa-lg"></i>
              </a>
              <div class="collapse" id="Make_an_Operation">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">All OT list</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Completed Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">In-complete Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Add Task</a></li>
                  
                </ul>
              </div>
            </li>
            <!-- 
              END 
              Assign nurse for an operation left sidebar
            -->



            <!-- 
              Start 
              Bill Process  left sidebar
            -->
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="collapse" href="#Bill_Process" aria-expanded="false" aria-controls="doctor2">
                <span class="menu-title"> Bill Process </span>
                <i class="menu-arrow"></i>
                <i class="fa-solid fa-bed-pulse fa-lg"></i>
              </a>
              <div class="collapse" id="Bill_Process">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="./pages/Nurse Audit/all task.html">All OT list</a></li>
                  <li class="nav-item"> <a class="nav-link" href="./pages/Nurse Audit/complete task.html">Completed Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="./pages/Nurse Audit/incomplete task.html">In-complete Task</a></li>
                  <li class="nav-item"> <a class="nav-link" href="./pages/Nurse Audit/add task.html">Add Task</a></li>
                  
                </ul>
              </div>
            </li>
            <!-- 
              END 
              Bill Process left sidebar
            -->

            








            

              </span>
            </li>
          </ul>
        </nav>
        <!-- END for left sidebar DASHBOARD -->
        
        
        <!-- partial  -->
        <!-- start our right side code here -->
        <div class="main-panel">
            <div  class="content-wrapper">
                <h4>Date : <?php echo $curentDate; ?></h4>
              <!-- main card right -->
              <div class="right_main_start">
                  
                <!-- card start -->
                <div class="cards Info">
                  <h4><b>Patient</b> ( <?php echo $patient_list_num_rows; ?> )</h4>
                  <!-- progress circle -->
                  <?php  
                  $relesedPatientModules = ($relesed_patients / $patient_list_num_rows) * 100;
                  $activePatientModules = ($patient_active_list_num_rows / $patient_list_num_rows) * 100;
                  ?>
                  <p style="margin-bottom: 5px;">Relesed patient <?php echo $relesed_patients; ?> </p>
                  <div class="progress" style="height: 15px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $relesedPatientModules; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <!-- progress circle -->
                  <br>
                  <p style="margin-bottom: 5px;">Active patient <?php echo $patient_active_list_num_rows; ?> </p>
                  <div class="progress" style="height: 15px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $activePatientModules; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <a class="btn btn-danger" style="padding: 10px 10px; margin-top: 10px;" href="">Show Active Patient</a>
                  <!--  -->
                </div>
                <!-- card end -->
                

                <!-- Total TAsk card start -->
                <?php
                 

                ?>
                <div class="cards">
                  <h4><b>Total Task/Nurse</b> ( <?php echo $task_list_num_rows_total; ?> )</h4>
                  <!-- progress circle -->
                  <?php  
                  $complete_task_progress = ($task_list_num_rows_active_complete / $task_list_num_rows_total) * 100;
                  $acrive_task_progress = ($task_list_num_rows_active / $task_list_num_rows_total) * 100;
                  ?>
                  <p style="margin-bottom: 5px;">Complete Task <?php echo $task_list_num_rows_active_complete; ?> </p>
                  <div class="progress" style="height: 15px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $complete_task_progress; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <!-- progress circle -->
                  <br>
                  <p style="margin-bottom: 5px;">Active Task <?php echo $task_list_num_rows_active; ?> </p>
                  <div class="progress" style="height: 15px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $acrive_task_progress; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <a class="btn btn-danger" style="padding: 10px 10px; margin-top: 10px;" href="">Task Details</a>
                  <!--  -->


                </div>
                <!--  -->

                
                <div style="height: 160px;" class="cards">
                  <h4><b>Bill Pending </b> ( <?php echo $patient_final_bill_payment_pending_num_rows; ?> )</h4>
                  <!-- progress circle -->
                  <?php  
                  $totady_bill_payed = ($patient_final_bill_payment_num_rows / $patient_final_bill_payment_pending_num_rows) * 100;
                  ?>
                  <p style="margin-bottom: 5px;">Today Bill Payed <?php echo $patient_final_bill_payment_num_rows; ?> </p>
                  <div class="progress" style="height: 15px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $totady_bill_payed; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <!-- progress circle -->
                  
                  <a class="btn btn-danger" style="padding: 10px 10px; margin-top: 10px;" href="">Bill's Details</a>
                  <!--  -->
                </div>

              


              </div>
              <!-- end main card right -->





              <!--  -->
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