<?php

include "../../../../../conn.inc.php";

if($conn){
    if( isset($_POST['submit']) ){
        $date = htmlspecialchars( $_POST['date']);
        $fullname = htmlspecialchars($_POST['fullname']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);
        $address = htmlspecialchars($_POST['address']);
        $reason = htmlspecialchars($_POST['reason']);
        $date_birth = htmlspecialchars($_POST['date_birth']);
        $referance = htmlspecialchars($_POST['referance']);
        $gender = htmlspecialchars($_POST['gender']);
        $blood_group = htmlspecialchars($_POST['blood_group']);

        $Room_Number = htmlspecialchars($_POST['Room_Number']);
        $room_type = htmlspecialchars($_POST['room_type']);
        $PatientRoom = $room_type.$Room_Number;

        // file operation
        $File_name = $_FILES['image']['name'];
        $File_temp_location = $_FILES['image']['tmp_name'];
        $File_move_directory = "../patient photos/".$File_name;
        $file_Extention = pathinfo($File_name, PATHINFO_EXTENSION);

        if( ($file_Extention=="jpg") || ($file_Extention=="jpeg") || ($file_Extention=="png") ){
            $fileupload =  move_uploaded_file($File_temp_location,$File_move_directory);
            if($fileupload){
    
                $sql = "INSERT INTO patient (dates,full_name,phone,addresss,reason,date_of_birth,referring_by,gender,blood_group,img,room_number,status_ )
                VALUES ('$date','$fullname','$phonenumber','$address','$reason','$date_birth','$referance','$gender','$blood_group','$File_name','$PatientRoom','active')";
                $query = mysqli_query($conn,$sql);
                if($query){

                    header("Location: ../Enroll New Patient.php?file_insert=1&img=$File_name&patient_name=$fullname");
                }
    
    
            }else{
                echo "file error";
            }
        }else{
            header("Location: ../Enroll New Patient.php?file=0&file_extention=$file_Extention");
            
        }




    


    }
    
}





?>