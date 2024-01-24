<?php
include "./conn.inc.php";

$terms_select = "";
$icorrect_input = "none";

if($conn){
    if( isset($_POST['submit']) ){
        if( isset($_POST['terms_conditions']) ){
            $emai = $_POST['email'];
            $pass = $_POST['password'];
            $user_role = $_POST['user_role'];
            
            $login_check_sql = "SELECT * FROM `user_role` WHERE email='$emai' AND passwords='$pass' AND roles='$user_role'";
            $login_query = mysqli_query($conn,$login_check_sql);
            $login_fetch = mysqli_fetch_assoc($login_query);
            
            
            if( $login_fetch ){
                echo "Login Success";
                

                session_start();
                $_SESSION["UserName_employ"] = $login_fetch['name'];
                $_SESSION["UserIMG_employ"] = $login_fetch['img'];
                $_SESSION["UserEmail_employ"] = $login_fetch['email'];
                $_SESSION["UserPasswords_employ"] = $login_fetch['passwords'];
                


                if( $user_role=="admin" ){
                    header("Location: ./main dashboard/admin/");
                    die();

                }else if( $user_role=='nurse' ){
                    header("Location: ./main dashboard/nurse/");
                    die();
                }
                else if( $user_role=='doctor' ){
                    header("Location: ./main dashboard/doctor/");
                    die();
                }
                else if( $user_role=='receptionist' ){

                    header("Location: ./main dashboard/receptionist/");
                    die();
                }else{
                    echo "role dont catch";
                }




            }else{
                $icorrect_input = "block";
            }
             
    
    
    
    
            
        }else{
            $terms_select = "You must be select terms & conditions";
        }
    }
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index login.css">

</head>
<body>
    
<!-- login form main section -->
<section id="login_main_section">
    <div class="overlay_main">
            <!-- bootstrab  -->
        <form method="post">
            <div class="mb-3">
                <h3>Log Into Our Hospital</h3>
                <br>
            </div>
                <!-- email -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div style="color: rgb(195, 195, 195);" id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <!-- password -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <!-- user role -->
                <div class="mb-3 form-check" style="padding: 0px;">
                    <label class="form-check-label" for="userrole" style="margin-bottom: 7px;">User Role</label>
                    <select name="user_role" class="form-select" aria-label="Default select example" id="userrole">
                        <option value="admin">Admin</option>
                        <option value="doctor">Doctor</option>
                        <option value="nurse">Nurse</option>
                        <option value="receptionist">Receptionist</option>
                    </select>
                </div>
                <!-- check box -->
                <div class="mb-3 form-check">
                    <input name="terms_conditions" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Terms and Conditions</label>
                    <label style="margin-left: -24px !important; color: red; " > <?php echo $terms_select; ?> </label>
                    <br>
                    <label style="display: <?php echo $icorrect_input; ?>; color: red;" for="">Please input a valid email and password!</label>
                </div>
                
                
                
                <!-- submit -->
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
                <a style="text-decoration: none; margin-left: 10px; color: white;" href="./main dashboard">Visite our website</a>
        </form>
    <!-- bootstrab  -->
    </div>


</section>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>