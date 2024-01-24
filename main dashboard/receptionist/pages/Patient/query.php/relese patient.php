<?php
include "../../../../../conn.inc.php";


session_start();
if ( ($_SESSION['UserEmail_employ']=="") && ($_SESSION['UserPasswords_employ']=="") ) {
  header( "refresh:0; url=http://localhost/my%20hospital/" );
  die();
}  
if($conn){

    $id = $_GET['id'];

    //  show all patient list
    $patient_list_sql = "SELECT * FROM `patient` WHERE id='$id'";
    $patient_list_query = mysqli_query($conn,$patient_list_sql);
    $patient_list_num_rows = mysqli_num_rows($patient_list_query);
    $patient_list_assoc = mysqli_fetch_assoc($patient_list_query);

    // total coast 
    $admit_coast = $patient_list_assoc['admit_fee'];
    $room_coast = $patient_list_assoc['room_fee'];
    $OT_coast = $patient_list_assoc['OT_fee'];
    $medicine_coast = $patient_list_assoc['medicine_fee'];
    $extra_service_coast = $patient_list_assoc['extra_services_fee'];

    $bill_payed = $patient_list_assoc['bill_payed'];
    $total_coast = $admit_coast+$room_coast+$OT_coast+$medicine_coast+$extra_service_coast ;
    // if total coast <= bill payed
    if($total_coast<=$bill_payed){

        $current_date = date("Y/m/d");
        $patient_relese_sql = "UPDATE patient SET status_ = 'relesed', release_date = '$current_date',final_payment_status='complete' WHERE id = '$id'";
        $patient_relese_query = mysqli_query($conn,$patient_relese_sql);
        if($patient_relese_query){
            header("Location: http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/Patient%20Bill%20Process.php?relese=1&id=$id");
        }
    }else{
        echo "bill not payed";
    }






    
}


?>