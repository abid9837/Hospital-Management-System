<?php
include "../../../../conn.inc.php";


session_start();
if ( ($_SESSION['UserEmail_employ']=="") && ($_SESSION['UserPasswords_employ']=="") ) {
  header( "refresh:0; url=http://localhost/my%20hospital/" );
  die();
}  


//  show all patient list
$patient_list_sql = "SELECT * FROM `patient`";
$patient_list_query = mysqli_query($conn,$patient_list_sql);
$patient_list_num_rows = mysqli_num_rows($patient_list_query);



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Receptionist</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller" >
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img style="height: 60px; width: auto;" src="../../../../assets/images/logo-my-hospital.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img style="height: auto; width: 30px;" src="../../../../assets/images/icon-my-hospital.png" alt="logo" /></a>
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
                  <img src="http://localhost/my%20hospital/photos/<?php echo $_SESSION["UserIMG_employ"]; ?>" alt="image">
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
                  <img src="../../../../photos/<?php echo $_SESSION["UserIMG_employ"]; ?>" alt="profile">
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
                <i class="fa-solid fa-bed-pulse fa-lg"></i>
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


                  <!-- 

                   -->

                   <h3>Search Patient for payments</h3>
                <form action="" method="post" style="display: flex;" class="form-inline my-2 my-lg-0">
                  <input name="search" type="number" style="width: 200px;" class="form-control form-control-sm mr-sm-2" placeholder="Search by patient id" >
                  <button name="searcBTN"  class="btn btn-outline-success my-2 my-sm-0" type="submit" aria-label="Submit">Search</button>
                </form>


                <?php
                  if($conn){
                    // search patient result  
                    if(isset($_POST['searcBTN'])){
                      
                      $searchValue = $_POST['search'];
                      if($searchValue!=""){
                        $search_sql = "SELECT * FROM `patient` WHERE id=$searchValue";
                        $search_query = mysqli_query($conn,$search_sql);
                        $search_num_rows = mysqli_num_rows($search_query);
                        $search_fetch_assoc = mysqli_fetch_assoc($search_query);
                        
                        


                        
                        
                        
                        if($search_fetch_assoc){
                        
                         
                ?>
                          <br>
                          
                        
                        <div style="width:100%; display: flex; justify-content: center; align-items: center;">
                          <div style="width:50%;">
                              <br><br>

                              <?php
                                // total coast 
                                $admit_coast = $search_fetch_assoc['admit_fee'];
                                $room_coast = $search_fetch_assoc['room_fee'];
                                $OT_coast = $search_fetch_assoc['OT_fee'];
                                $medicine_coast = $search_fetch_assoc['medicine_fee'];
                                $extra_service_coast = $search_fetch_assoc['extra_services_fee'];
                                $discount = $search_fetch_assoc['discount_in_fees'];
                                
                                $total_coast = $admit_coast+$room_coast+$OT_coast+$medicine_coast+$extra_service_coast ;
                                $total_bill_payed_ = $search_fetch_assoc['bill_payed'];
                                
                                $bill_payed = $total_bill_payed_;
                                $due = $total_bill_payed_ - $total_coast;
                                // $discount_amount = 

                              ?>
                              <h4>Search Result <?php echo $search_num_rows; ?> out of <?php echo $patient_list_num_rows; ?></h4>
                              
                              <img style="width: 70px; height: 70px; border-radius: 100px; border: 2px solid pink;" src="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/patient%20photos/<?php echo $search_fetch_assoc['img'] ?>" alt="">
                              
                              <br><br>
                              <h4>Total Cost : <?php echo $total_coast; ?> </h4>
                              <h4>Bill Payed : <?php echo $bill_payed; ?> </h4>
                              <h4 style="color:red;">Due : <?php echo $due; ?>  </h4>
                              <h4>Discount : <?php echo $discount; ?></h4>
                              <br><br>
                              <!-- check if patient was relesed or not -->
                              <?php

                                $relesea_btn = "inline-block";
                                $input_readonly = "";
                                $resit_btn = "none";

                                if($search_fetch_assoc['status_']=='relesed'){
                                  echo '<p style="color: red;">This patient was relese from our hospital!</p>';
                                  $relesea_btn = "none";
                                  $input_readonly = "readonly";
                                  $resit_btn = "inline-block";
                                }
                              ?>
                              
                              <p><strong>Patient Name :</strong> <?php echo $search_fetch_assoc['full_name']; ?></p>
                              <p style="margin-top: -10px;"><strong>Address :</strong> <?php echo $search_fetch_assoc['addresss']; ?></p>
                              <p style="margin-top: -10px;"><strong>Phone :</strong> <?php echo $search_fetch_assoc['phone']; ?></p>
                              <p style="margin-top: -10px;"><strong>Treatment By :</strong> <?php echo $search_fetch_assoc['treatment_by_doctor']; ?></p>
                              <br><br><a style="display: <?php echo $resit_btn; ?>;" href="" class="btn btn-primary" > Download Resit </a>
                              <br><br>
                              

                              <h4>Add Bill for Patient :</h4>
                              <form action="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/query.php/patient%20bill.php?id=<?php echo $search_fetch_assoc['id'] ?>&total_coast=<?php echo $total_coast; ?>" method="post" class="was-validated">

                                <div class="form-group">
                                  <label for="Admit_Fee" class="floating-label">Admit Fee</label>
                                  <input name="admit_fee" type="text" class="form-control" id="Admit_Fee" value="<?php echo $search_fetch_assoc['admit_fee'] ?>" required <?php echo $input_readonly; ?> >
                                  
                                </div>
                                <!--  -->
                                <div class="form-group">
                                  <label for="room_fee" class="floating-label">Room Fee</label>
                                  <input name="room_fee" type="text" class="form-control" id="room_fee" value="<?php echo $search_fetch_assoc['room_fee'] ?>" required <?php echo $input_readonly; ?> >
                                  
                                </div>
                               <!--  -->
                               <div class="form-group">
                                  <label for="OT_fee" class="floating-label">OT Fee</label>
                                  <input name="OT_fee" type="text" class="form-control" id="OT_fee" value="<?php echo $search_fetch_assoc['OT_fee'] ?>" required <?php echo $input_readonly; ?>>
                                  
                                </div>
                                <!--  -->
                               <div class="form-group">
                                  <label for="medicine_fee" class="floating-label">Medicine Fee</label>
                                  <input name="medicine_fee" type="text" class="form-control" id="medicine_fee" value="<?php echo $search_fetch_assoc['medicine_fee'] ?>" required <?php echo $input_readonly; ?>>
                                  
                                </div>
                                
                                <!--  -->
                               <div class="form-group">
                                  <label for="extra_services_fee" class="floating-label">Extra Services Fee</label>
                                  <input name="extra_services_fee" type="text" class="form-control" id="extra_services_fee" value="<?php echo $search_fetch_assoc['extra_services_fee'] ?>" required <?php echo $input_readonly; ?>>
                                  
                                </div>
                                 <!--  -->
                               <div class="form-group">
                                  <label for="discount_in_fees" class="floating-label">Discount % (optional)</label>
                                  <input name="discount_in_fees" type="text" class="form-control" id="discount_in_fees" value="<?php echo $search_fetch_assoc['discount_in_fees'] ?>" placeholder="10%" <?php echo $input_readonly; ?>>
                                  
                                </div>
                                <br><br>


                                <div class="form-group">
                                  <label for="Bill_pay" class="floating-label">Bill Pay </label>
                                  <input name="bill_payed" name="discount_in_fees" type="text" class="form-control" id="Bill_pay" <?php echo $input_readonly; ?> >
                                  
                                </div>
                                
                                
                                


                                <input style="display: <?php echo $relesea_btn; ?>;" name="update" type="submit" class="btn btn-primary" value="Update">
                                <a style="display: <?php echo $relesea_btn; ?>;" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/query.php/relese%20patient.php?id=<?php echo $search_fetch_assoc['id']; ?>" class="btn bg-danger ">Release this patient</a>
                                 
                                <a style="display: <?php echo $resit_btn; ?>;" href="" class="btn btn-primary" > Download Resit </a>
                                                                
                              </form>
                          </div>
                          </div>
                          
                <?php
                        }else{
                          echo "<br>data not found <br><br>";
                        }
                      }else{
                        echo "<br>Invalid input";
                      }
                    }
                    // search patient result end                   
                    }
                    // conn end  
                ?>



                   <!-- 

                    -->


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
    <script src="../../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../../assets/js/off-canvas.js"></script>
    <script src="../../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../../../assets/js/dashboard.js"></script>
    <script src="../../../../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script src="https://kit.fontawesome.com/40d90851b1.js" crossorigin="anonymous"></script>
  </body>
</html>