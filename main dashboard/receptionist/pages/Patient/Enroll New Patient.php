<?php

session_start();
if ( ($_SESSION['UserEmail_employ']=="") && ($_SESSION['UserPasswords_employ']=="") ) {
  header( "refresh:0; url=http://localhost/my%20hospital/" );
  die();
}    


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
                  <img src="../../../../photos/<?php echo $_SESSION["UserIMG_employ"]; ?>" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <!-- <div class="nav-profile-text">
                  <p class="mb-1 text-black">David Greymaax</p>
                </div> -->
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
                  <li class="nav-item"> <a class="nav-link" href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/Patient%20Bill%20Process.php">Add Patient Bills</a></li>
                  
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
                <i class="fa-brands fa-creative-commons-sampling-plus fa-xl"></i>
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
                <i class="fa-solid fa-wallet fa-xl"></i>
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
              
              <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h2 class="mb-4">Enroll new patient</h2>

                        <!-- alert enroll succecc -->
                        <?php
                          
                          
                          if( (isset($_GET['file_insert'])) && ($_GET['file_insert']==1) ){
                            $img = $_GET['img'];
                            $patient_name = $_GET['patient_name'];
                            ?>
                            <div style="border-radius: 10px;" class="alert alert-warning alert-dismissible fade show bg-info" role="alert">
                              <img style="width: 50px; height: 50px; border-radius: 100px;" src="./patient photos/<?php echo $img; ?>" alt="img file">
                              <strong> <?php echo $patient_name; ?> </strong>
                              <a href="http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/Enroll%20New%20Patient.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div>
                        <?php
                           
                          }

                        ?>
                        

                        <!--  -->
                        <form action="./query.php/add patient DB.php" method="post" enctype="multipart/form-data">

                            <!-- date -->
                            <div class="form-group">
                              <label for="Date">Date</label>
                              <input name="date" type="date" class="form-control" id="Date" required>
                            </div>

                            <!-- full name -->
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input name="fullname" type="text" class="form-control" id="name" placeholder="Enter your Full Name" required>
                            </div>

                            <!-- phone -->
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input name="phonenumber" type="number" class="form-control" id="phone" placeholder="Enter your phone" required>
                            </div>

                            <!-- address -->
                            <div class="form-group">
                              <label for="Address">Address</label>
                              <input name="address" type="text" class="form-control" id="Address" placeholder="Enter your address" required>
                            </div>

                            <!-- reason -->
                            <div class="form-group">
                              <label for="Reason">Reason</label>
                              <div class="form-floating">
                                <textarea name="reason" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px" required></textarea>
                                <label for="floatingTextarea2">Reason</label>
                              </div>
                            </div>

                            <!-- date_of_birth -->
                            <div class="form-group">
                              <label for="date_of_birth">Date_of_birth</label>
                              <input name="date_birth" type="date" class="form-control" id="date_of_birth" required>
                            </div>

                            <!-- referring_by -->
                            <div class="form-group">
                              <label for="referring_by">Referring_by</label>
                              <input name="referance" type="text" class="form-control" id="referring_by" placeholder="Enter Your Refarance" required>
                            </div>

                            <!-- Gender -->
                            <div class="form-group">
                              <label for="referring_by">Gender</label><br>
                              <input style="margin-left: 10px;" type="radio" name="gender" value="male" id="male" required><label style="margin: 2px 0px 0px 6px;" for="male">Male</label> <br>
                              <input style="margin-left: 10px;" type="radio" name="gender" value="female"  id="female" required><label style="margin: 2px 0px 0px 6px;" for="female">Female</label><br>
                              <input style="margin-left: 10px;" type="radio" name="gender" value="others"  id="others" required><label style="margin: 2px 0px 0px 6px;" for="others">Others</label>
                            </div>

                            <!-- Blood Group -->
                            <div class="form-group">
                              <label for="Blood_Group">Blood Group</label>
                              <select name="blood_group" class="form-select" aria-label="Default select example" required>
                                <option value="A+" required>A+</option>
                                <option value="A-" required>A-</option>
                                <option value="B+" required>B+</option>
                                <option value="B-" required>B-</option>
                                <option value="AB+" required>AB+</option>
                                <option value="AB-" required>AB-</option>
                                <option value="O+" required>O+</option>
                                <option value="O-" required>O-</option>
                              </select>
                            </div>

                            <!-- Image -->
                            <div class="form-group">
                              <label for="Image">Patient Image</label>
                              <input name="image" type="file" class="form-control" id="Image"required >
                              <?php   
                                $file_extention_error_msg = " ";
                                if (isset($_GET['file']) && ($_GET['file']==0) ){
                                  $file_extention = $_GET['file_extention'];
                                  $file_extention_error_msg = "<br>"."inncorect file extention ".$file_extention."<br>"."please use jpg, jpeg or png file formate" ;
                                }
                                
                              ?>
                              <p id="fileErrorMsg" style="color: brown;"><?php echo $file_extention_error_msg; ?></p>
                            </div>

                            <!-- Room_Number -->
                            <div class="form-group">
                              <label for="">Room</label>
                              <select name="room_type" class="form-select selectpicker" data-live-search="true">
                                <option value="Normal">Normal</option>
                                <option value="Medium">Medium</option>
                                <option value="VIP">VIP</option>
                              
                              </select>
                              <input name="Room_Number" type="text" class="form-control" id="Room_Number" placeholder="Room Number" required>


                            </div>

                            <!-- Room_Number -->
                            <div class="form-group">
                              <label for="">Doctor</label>
                              <input name="Room_Number" type="text" class="form-control" id="Room_Number" placeholder="Room Number" required>
                            </div>

                            
                            
                            <!--  -->
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            <button name="reset" type="reset" class="btn btn-primary" onclick="ResetBtnClick()">Reset</button>


                            <script>
                              function ResetBtnClick() {
                                document.getElementById("fileErrorMsg").innerHTML = "";
                              }
                            </script>



                        </form>
                            
                        <!--  -->

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